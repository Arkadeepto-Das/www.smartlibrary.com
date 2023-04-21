<?php
  require_once 'vendor/autoload.php';

  use application\model\Database;

  if (!isset($_SESSION)) {
    session_start();
  }
  if (isset($_POST["list"])) {
    $query = new Database();
    $userDetails = $query->userDetails($_SESSION["userName"]);
    $fullName = $userDetails["firstname"] . " " . $userDetails["lastname"];
    $bookList = $query->fetchReaderList($_SESSION["userName"]);
    $count = $query->fetchCount();
    $_SESSION["count"] = $count;
    $_SESSION["end"] = 1;
    require_once 'templates/reader_list.php';
  }
  else {
    require_once 'application/view/reader_page.php';
  }
