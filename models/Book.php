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
                weight, views, created_at, update_at
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NULL)
        ");

        $stmt->bind_param(
            "issdssssisssssdi",
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
            $data['views']
        );

        return $stmt->execute();
    }

    // Fetch all books
  public function getAllWithImages() {
    $query = "
        SELECT b.*, bi.image_path
        FROM books b
        LEFT JOIN book_images bi ON b.id = bi.book_id
        ORDER BY b.id
    ";

    $result = $this->conn->query($query);
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
    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Delete book by ID
    public function deleteById($id) {
        $stmt = $this->conn->prepare("DELETE FROM books WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
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


}
