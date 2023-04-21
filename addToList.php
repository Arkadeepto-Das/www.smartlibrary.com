<?php
  require_once 'vendor/autoload.php';
  use application\model\Database;

  if (!isset($_SESSION)) {
    session_start();
  }
  $bookId = $_POST["bookId"];
  $query = new Database($envArray["serverName"], $envArray["userName"], $envArray["password"], $envArray["dbName"]);
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
