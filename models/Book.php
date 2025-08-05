<?php
class Book {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create new book
    public function create($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO books (
                user_id, title, author, price, category, book_condition, description, isbn,
                pages, edition, publisher, dimensions, language, image_path,
                weight, views,status, created_at, update_at
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, NOW(), NULL)
        ");

        $stmt->bind_param(
            "issdssssisssssdis",
            $data['user_id'],
            $data['title'],
            $data['author'],
            $data['price'],
            $data['category'],
            $data['book_condition'],
            $data['description'],
            $data['isbn'],
            $data['pages'],
            $data['edition'],
            $data['publisher'],
            $data['dimensions'],
            $data['language'],
            $data['image_path'],
            $data['weight'],   
            $data['views'],
            $data['status']
        );

        return $stmt->execute();
    }

    // Fetch all books
    public function getAllWithImages($limit, $offset, $categories = [], $conditions = [], $search = '', $sort = '') {
        $limit = (int) $limit;
        $offset = (int) $offset;

        $whereClauses = [];

        if (!empty($categories)) {
            $escapedCats = array_map([$this->conn, 'real_escape_string'], $categories);
            $catList = "'" . implode("','", $escapedCats) . "'";
            $whereClauses[] = "category IN ($catList)";
        }

        if (!empty($conditions)) {
            $escapedConds = array_map([$this->conn, 'real_escape_string'], $conditions);
            $condList = "'" . implode("','", $escapedConds) . "'";
            $whereClauses[] = "book_condition IN ($condList)";
        }

        if (!empty($search)) {
            $escapedSearch = $this->conn->real_escape_string($search);
            $whereClauses[] = "(title LIKE '%$escapedSearch%' OR author LIKE '%$escapedSearch%' OR description LIKE '%$escapedSearch%')";
        }

        $whereSQL = '';
        if (!empty($whereClauses)) {
            $whereSQL = 'WHERE ' . implode(' AND ', $whereClauses);
        }

        // Sorting
        $orderClause = "ORDER BY id DESC"; 
        switch ($sort) {
            case 'oldest':
                $orderClause = "ORDER BY id ASC";
                break;
            case 'price-low':
                $orderClause = "ORDER BY price ASC";
                break;
            case 'price-high':
                $orderClause = "ORDER BY price DESC";
                break;
            case 'title':
                $orderClause = "ORDER BY title ASC";
                break;
        }
        $query = "
            SELECT b.*, bi.image_path
            FROM (
                SELECT * FROM books
                $whereSQL
                $orderClause
                LIMIT $limit OFFSET $offset
            ) AS b
            LEFT JOIN book_images bi ON b.id = bi.book_id
        ";

        $result = $this->conn->query($query);

        if (!$result) {
            error_log("MySQL Error: " . $this->conn->error);
            return [];
        }

        $books = [];

        while ($row = $result->fetch_assoc()) {
            $bookId = $row['id'];

            if (!isset($books[$bookId])) {
                $books[$bookId] = $row;
                $books[$bookId]['images'] = [];
            }

            if (!empty($row['image_path'])) {
                $books[$bookId]['images'][] = $row['image_path'];
            }
        }

        return array_values($books);
    }


    // Find book by ID
    public function findByIdWithImages($id) {
        $id = (int)$id;
        $stmt = $this->conn->prepare("
            SELECT b.*, bi.image_path
            FROM books b
            LEFT JOIN book_images bi ON b.id = bi.book_id
            WHERE b.id = ?
        ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $book = null;
        while ($row = $result->fetch_assoc()) {
            if (!$book) {
                $book = $row;
                $book['images'] = [];
            }
            if (!empty($row['image_path'])) {
                $book['images'][] = $row['image_path'];
            }
        }

        return $book??[];
    }


    // Delete book by ID
    public function deleteById($id) {
        $user_id = $_SESSION['user_id'] ?? 0;

        $stmt = $this->conn->prepare("DELETE FROM books WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $user_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Unauthorized or book not found.']);
        }
    }


    // Update book by ID
    public function updateById($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE books SET
                title = ?, author = ?, price = ?, category = ?, book_condition = ?, description = ?, isbn = ?,
                pages = ?, edition = ?, publisher = ?, dimensions = ?, language = ?, image_path = ?,
                weight = ?, views = ?, update_at = NOW()
            WHERE id = ?
        ");

        $stmt->bind_param(
            "ssdssssisssssdii",
            $data['title'],
            $data['author'],
            $data['price'],
            $data['category'],
            $data['book_condition'],
            $data['description'],
            $data['isbn'],
            $data['pages'],
            $data['edition'],
            $data['publisher'],
            $data['dimensions'],
            $data['language'],
            $data['image_path'],
            $data['weight'],  
            $data['views'],
            $id
        );

        return $stmt->execute();
    }

    // Save book images
    public function saveImages($bookId, $imagePaths) {
        $stmt = $this->conn->prepare("INSERT INTO book_images (book_id, image_path) VALUES (?, ?)");
        foreach ($imagePaths as $path) {
            $stmt->bind_param("is", $bookId, $path);
            $stmt->execute();
        }
    }

    // Get last inserted book ID
    public function getLastInsertId() {
        return $this->conn->insert_id;
    }

    public function getNumberOfBooks(){
        $stmt = $this->conn->prepare("SELECT COUNT(*) as count FROM books");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function getBooksByUserId($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addToFavorites($user_id, $book_id) {
        $stmt = $this->conn->prepare("INSERT INTO favorites (user_id, book_id, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ii", $user_id, $book_id);
        return $stmt->execute();
    }

    public function removeFromFavorites($user_id, $book_id) {
        $stmt = $this->conn->prepare("DELETE FROM favorites WHERE user_id = ? AND book_id = ?");
        $stmt->bind_param("ii", $user_id, $book_id);
        return $stmt->execute();
    }

    public function isFavourite($user_id, $book_id) {
        $stmt = $this->conn->prepare("SELECT * FROM favorites WHERE user_id = ? AND book_id = ?");
        $stmt->bind_param("ii", $user_id, $book_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }


    public function getFavouriteBooksWithImages($user_id) {
        $stmt = $this->conn->prepare("
            SELECT b.*, bi.image_path
            FROM books b
            JOIN favorites f ON b.id = f.book_id
            LEFT JOIN book_images bi ON b.id = bi.book_id
            WHERE f.user_id = ?
            ORDER BY f.created_at DESC
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $books = [];

        while ($row = $result->fetch_assoc()) {
            $bookId = $row['id'];

            if (!isset($books[$bookId])) {
                $books[$bookId] = $row;
                $books[$bookId]['images'] = [];
            }

            if (!empty($row['image_path'])) {
                $books[$bookId]['images'][] = $row['image_path'];
            }
        }

        return array_values($books);
    }

}
