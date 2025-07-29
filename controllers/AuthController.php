<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {

    private $authModel;

    public function __construct($db) {
        $this->authModel = new User($db);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Register
    public function register() {
        file_put_contents("debug.log", "Method: " . $_SERVER['REQUEST_METHOD'] . PHP_EOL, FILE_APPEND);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

             header('Content-Type: application/json');

            $data = [
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password'])
            ];

            if (empty($data['fname']) || empty($data['lname']) || empty($data['email']) || empty($data['password']) || empty($data['confirm_password'])) {
                echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
                return;
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
                return;
            }

            if ($data['password'] !== $data['confirm_password']) {
               echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
                return;
            }

            if ($this->authModel->emailExists($data['email'])) {
                echo json_encode(['success' => false, 'message' => 'Email already exists.']);
                return;
            }

            $cleanData = [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'password' => $data['password'] 
            ];

            if ($this->authModel->register($cleanData)) {
                echo json_encode(['success' => true, 'message' => 'Registration successful. Redirecting...']);
                
                return;
            } else {
                echo json_encode(['success' => false, 'message' => 'Registration failed.']);
                return;    
            }
        } else {
            require __DIR__ . '/../views/auth/signUp.php';
        }
    }

    // Login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->authModel->login($email, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fname'] = $user['fname'];
                header('Location: ' . BASE_URL . '/');
                exit;
            } else {
                echo 'Invalid email or password.';
            }
        } else {
            require __DIR__ . '/../views/auth/login.php';
        }
    }

    // Logout
    public function logout() {
        session_destroy();
        header('Location: /');
    }

    // View profile
    public function profile($id) {
        $user = $this->authModel->getById($id);
        require __DIR__ . '/../views/profile.php';
    }

    // Update profile
    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $data = [
                'profile_picture' => $_POST['profile_picture'] ?? '',
                'bio' => $_POST['bio'] ?? '',
                'location' => $_POST['location'] ?? '',
                'rating' => $_POST['rating'] ?? 0
            ];
            $userId = $_SESSION['user_id'];

            if ($this->authModel->updateProfile($userId, $data)) {
                header('Location: /profile');
            } else {
                echo "Failed to update profile.";
            }
        }
    }

    // Delete account
    public function delete($id) {
        if ($this->authModel->deleteById($id)) {
            session_destroy();
            echo "User deleted.";
        } else {
            echo "Failed to delete user.";
        }
    }
}
