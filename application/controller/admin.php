<?php
  require_once 'vendor/autoload.php';
  use application\model\Database;
  
  if (isset($_POST["add"])) {
    $bookId = $_POST["bookId"];
    $bookName = $_POST["bookName"];
    $author = $_POST["author"];
    $date = $_POST["date"];
    $response = [];
    if ($bookId == '' || $bookName == '' || $author == '') {
      $response["status"] = 0;
      $response["message"] = "Book-ID, Book-name and Author field cannot be empty.";
      print_r(json_encode($response));
      exit();
    }
    else {
      $query = new Database();
      $result = $query->addNewBook($bookId, $bookName, $author, $date);
      if ($result) {
        $response["status"] = 1;
        $response["message"] = "New book added.";
        print_r(json_encode($response));
      }
      else {
        $response["status"] = 0;
        $response["message"] = "New book cannot be added.";
        print_r(json_encode($response));  
      }
    }
  }
  else {
    require_once 'application/view/admin_page.php';
  }
