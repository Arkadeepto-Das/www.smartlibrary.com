<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  require_once 'vendor/autoload.php';
  $bookId = $_POST["bookId"];
  $env = new EnvHandler();
  $envArray = $env->fetchEnvValues();
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
