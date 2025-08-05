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
        
        $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');

            $fname = trim($_POST['fname'] ?? '');
            $lname = trim($_POST['lname'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $confirm_password = trim($_POST['confirm_password'] ?? '');

            // Validate fields
            if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($confirm_password)) {
                echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
                exit;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
                exit;
            }

            if ($password !== $confirm_password) {
                echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
                exit;
            }

            if ($this->authModel->emailExists($email)) {
                echo json_encode(['success' => false, 'message' => 'Email already exists.']);
                exit;
            }

            // Register user
            $cleanData = [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            if ($this->authModel->register($cleanData)) {
                echo json_encode(['success' => true, 'message' => 'Registration successful.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Registration failed.']);
            }

            exit;
        }

        // Show HTML form on GET (non-AJAX)
        if (!$isAjax) {
            require __DIR__ . '/../views/auth/signUp.php';
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request.']);
        }
    }

    // Login
    public function login() {
          $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->authModel->login($email, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['email'] = $user['email'];
                echo json_encode(['success' => true, 'message' => 'Login successful.']);

                exit;
            } else {
                 echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
            }
            exit;
        }

        // Show HTML form on GET (non-AJAX)
        if (!$isAjax) {
            require __DIR__ . '/../views/auth/login.php';
        }
        
    }

    // Logout
    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit(); 
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

?>