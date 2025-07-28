<?php
  class message{
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll($user_id) {
        $result = $this->conn->query("SELECT * FROM messages WHERE user_id = $user_id");
        $messages = [];
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
        return $messages;
    }

    function add($sender_id, $receiver_id, $book_id, $message) {
        $stmt = $this->conn->prepare("INSERT INTO messages (sender_id, receiver_id, book_id, message, sent_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("iiss", $sender_id, $receiver_id, $book_id, $message);
        return $stmt->execute();
    }

    function deleteById($id) {
        $stmt = $this->conn->prepare("DELETE FROM messages WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
    
  }