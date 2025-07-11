<?php
$page = htmlspecialchars($_GET['page'] ?? 'home');

// Layout
include 'views/partials/header.php';
include 'views/partials/navbar.php';

// Route the request
switch ($page) {
  case 'home':
    include 'views/home.php';  
    break;
  case 'login':
    include 'views/auth/login.php';  #in navbar <a href="index.php?page=login"
    break;
  case 'register':
    include 'views/auth/register.php';
    break;
  case 'browse':
    include 'views/books/browse.php';
    break;
  default:
    include 'views/404.php';
    break;
}

include 'views/partials/footer.php';
?>
