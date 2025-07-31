<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/BookController.php';
require_once 'config/db.php';
require_once __DIR__ . '/config/routes.php';

$db = Database::getInstance()->getConnection();
$authController = new AuthController($db);
$bookController = new BookController($db);

// Check if it's an AJAX request
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isAjax) {
    switch ($page) {
        case 'signup':
            $authController->register();
            break;
        case 'login':
            $authController->login();
            break;
        case 'browse':
            $bookController->browse();
            break;
        case 'count':
            $bookController->count();
            break;
       
    }
    exit; 
}

// Render full layout only for non-AJAX requests
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
        $bookController->browse();
        break;
    case 'mybooks':
        include 'views/books/mybooks.php';
        break;
    case 'add_a_book':
        $bookController->addABook();
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
/*     case 'count':
        $bookController->count();
        break; */
    default:
        include 'views/404.php';
        break;
}

include 'views/partials/footer.php';
