<?php
  $page = $_GET['page'] ?? 'home';

  include 'views/partials/header.php';
  include 'views/partials/navbar.php';

  //route the request to the appropriate view
  switch ($page) {
    case 'home':
      include 'views/home.php';
      break;
    case 'login':
      include 'views/auth/login.php';
      break;
    case 'register':
      include 'views/auth/register.php';
      break;
    default:
      include 'views/404.php';
      break;
  }
  include 'views/partials/footer.php';
?>