<?php
  require_once 'vendor/autoload.php';
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
    $env = new EnvHandler();
    $envArray = $env->fetchEnvValues();
    $query = new Database($envArray["serverName"], $envArray["userName"], $envArray["password"], $envArray["dbName"]);
    $result = $query->addNewBook($bookId, $bookName, $author, $date);
    if ($result === TRUE) {
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
