<?php
require_once 'controllers/AuthController.php';
require_once 'config/db.php';
require_once __DIR__ . '/config/routes.php';

$db = Database::getInstance()->getConnection();
$authController = new AuthController($db);

include 'views/partials/header.php';
include 'views/partials/navbar.php';

switch ($page) {
  case 'home':
    include 'views/home.php';
    break;
  case 'login':
    $authController->login();
    break;
  case 'signup':
    $authController->register();
    break;
  case 'browse':
    include 'views/books/browse.php';
    break;
  case 'mybooks':
    include 'views/books/mybooks.php';
    break;
  case 'add_a_book':
    include 'views/books/addABook.php';
    break;
  case 'book_details':
    if ($param) $_GET['book_id'] = $param;
    include 'views/books/bookDetails.php';
    break;
  case 'logout':
    $authController->logout();
    break;
  case 'profile':
    if (isset($_SESSION['user_id'])) {
        $authController->profile($_SESSION['user_id']);
    } else {
        echo "Unauthorized.";
    }
    break;
  case 'update_profile':
    $authController->updateProfile();
    break;
  default:
    include 'views/404.php';
    break;
}

include 'views/partials/footer.php';
