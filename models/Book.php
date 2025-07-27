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
                user_id, title, author, price, category, condition, description, isbn,
                pages, edition, publisher, dimensions, language, image_path,
                weight, views, created_at, update_at
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NULL)
        ");

        $stmt->bind_param(
            "issdssssisssssdii",
            $data['user_id'],
            $data['title'],
            $data['author'],
            $data['price'],
            $data['category'],
            $data['condition'],
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
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM books");
        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
        return $books;
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
                title = ?, author = ?, price = ?, category = ?, condition = ?, description = ?, isbn = ?,
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
            $data['condition'],
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
}
