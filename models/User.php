<?php
class User {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($data) {
        //Set default user_type if not provided
        $userType = isset($data['user_type']) ? $data['user_type'] : 'user';

        //Hash the password
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("INSERT INTO users (fname, lname, email, password, user_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $data["fname"], $data["lname"], $data["email"], $hashedPassword, $userType);

        return $stmt->execute();
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        //Validate password
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
?>
