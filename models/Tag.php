<?php
  class Tag {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Add new tag or get existing tag ID
    public function getOrCreateTagId($tagName) {
        $stmt = $this->conn->prepare("SELECT id FROM tags WHERE name = ?");
        $stmt->bind_param("s", $tagName);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result) return $result['id'];

        $stmt = $this->conn->prepare("INSERT INTO tags (name) VALUES (?)");
        $stmt->bind_param("s", $tagName);
        $stmt->execute();
        return $stmt->insert_id;
    }

    // Assign tags to a book
    public function assignTagsToBook($book_id, $tags) {
        foreach ($tags as $tagName) {
            $tag_id = $this->getOrCreateTagId(trim($tagName));
            $stmt = $this->conn->prepare("INSERT IGNORE INTO book_tags (book_id, tag_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $book_id, $tag_id);
            $stmt->execute();
        }
    }

    // Get tags by book ID
    public function getTagsByBookId($book_id) {
        $stmt = $this->conn->prepare("
            SELECT t.name FROM tags t
            JOIN book_tags bt ON t.id = bt.tag_id
            WHERE bt.book_id = ?
        ");
        $stmt->bind_param("i", $book_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return array_column($result->fetch_all(MYSQLI_ASSOC), 'name');
    }
}
