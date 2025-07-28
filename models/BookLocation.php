<?php
class BookLocation {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    // Add a new book location
    public function addLocation($book_id, $location) {
        $stmt = $this->conn->prepare("INSERT INTO book_locations (book_id, location) VALUES (?, ?)");
        $stmt->bind_param("is", $book_id, $location);
        return $stmt->execute();
    }

    // Get all locations for a specific book
    public function getLocationsByBook($book_id) {
        $stmt = $this->conn->prepare("SELECT location FROM book_locations WHERE book_id = ?");
        $stmt->bind_param("i", $book_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Delete all locations for a specific book
    public function deleteLocationsByBook($book_id) {
        $stmt = $this->conn->prepare("DELETE FROM book_locations WHERE book_id = ?");
        $stmt->bind_param("i", $book_id);
        return $stmt->execute();
    }
}
