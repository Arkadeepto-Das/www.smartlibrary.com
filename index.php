<?php
$uri = $_SERVER["REQUEST_URI"];
$uri = rtrim($uri);
switch ($uri) {
  case '/' :
    require_once 'application/controller/login.php';
    break;
  
  case '/login' :
    require_once 'application/controller/login.php';
    break;

  case '/reader' :
    require_once 'application/controller/reader.php';
    break;

  case '/admin' :
    require_once 'application/controller/admin.php';
    break;

  case '/home' :
    require_once 'application/controller/home.php';
    break;

  default :
    require_once 'application/controller/login.php';
    break;
}
