<?php
function getPageName($page) {
  $pageName = "";

  $path = $_SERVER['REQUEST_URI'];
  $path_parts = pathinfo($path);
  $filename = $path_parts['filename'];

  switch ($filename) {
    case 'index':
      $pageName = 'Home';
      break;
    case 'about':
      $pageName = 'About';
      break;
    case 'contact':
      $pageName = 'Contact';
      break;
    case 'login':
      $pageName = 'Login';
      break;
    case 'register':
      $pageName = 'Register';
      break;
    default:
      $pageName = 'Unknown';
      break;
  }

  return $pageName;
}


?>
