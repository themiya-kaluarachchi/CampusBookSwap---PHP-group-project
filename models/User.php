<?php
class User {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register a new user
    public function register($data) {
        $verified = 0;
        #hash the password
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("
            INSERT INTO users (fname, lname, email, password, verified, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, NOW(), NULL)
        ");

        $stmt->bind_param(
            "ssssi",
            $data['fname'],
            $data['lname'],
            $data['email'],
            $hashedPassword,
            $verified
        );

        return $stmt->execute();
    }

    // Login user by email and password
    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        //verify the password
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // Get user details by ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // Update user profile after login
    public function updateProfile($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE users
            SET profile_picture = ?, bio = ?, location = ?, rating = ?, updated_at = NOW()
            WHERE id = ?
        ");
        $stmt->bind_param(
            "sssdi",
            $data['profile_picture'],
            $data['bio'],
            $data['location'],
            $data['rating'],
            $id
        );

        return $stmt->execute();
    }
}
?>
