<?php
  require_once 'vendor/autoload.php';
  use application\model\Database;

  if (!isset($_SESSION)) {
    session_start();
  }
  $query = new Database();
  if (isset($_POST["refresh"])) {
    unset($_POST["refresh"]);
    $bookList = $query->fetchBookList(1);
    $_SESSION["end"] = 2;
    if ($bookList !== NULL) {
      require 'templates/home_list.php';
    }
  }
  elseif (isset($_POST["load"])) {
    unset($_POST["load"]);
    $bookList = $query->fetchBookList($_SESSION["end"]);
    if ($_SESSION["end"] < $_SESSION["count"]) {
      $_SESSION["end"]++;
    }
    if ($bookList !== NULL) {
      require 'templates/home_list.php';
    }
  }
  elseif (isset($_POST["add"])) {
    $bookId = $_POST["bookId"];
    $result = $query->addToList($_SESSION["userName"], $bookId);
    $response = [];
    if ($result === TRUE) {
      $response["status"] = 1;
      $response["message"] = "Added";
      print_r(json_encode($response));
    }
    else {
      $response["status"] = 0;
      print_r(json_encode($response));
    }
  }
  else {
    require_once 'application/view/home_page.php';
  }
