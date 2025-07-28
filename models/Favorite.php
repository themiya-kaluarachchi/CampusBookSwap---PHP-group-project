<?php
  class Favorite {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    //add book to the favorite list
    public function add($user_id, $book_id) {
        $stmt = $this->conn->prepare("INSERT INTO favorites (user_id, book_id, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ii", $user_id, $book_id);
        return $stmt->execute();
    }

    //fetch all favorite books of the user by id
    public function getUserFavorites($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM favorites WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    //delete a book from the user's favorite list
    public function deleteUserFavorites($user_id,$book_id){
        $stmt = $this->conn->prepare("DELETE FROM favorites WHERE user_id = ? AND book_id = ?");
        $stmt->bind_param("ii", $user_id,$book_id);
        $stmt->execute();
    }
}
