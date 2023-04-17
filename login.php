<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  require_once 'vendor/autoload.php';
  $userName = $_POST["userName"];
  $password = $_POST["password"];
  $env = new EnvHandler();
  $envArray = $env->fetchEnvValues();
  $query = new Database($envArray["serverName"], $envArray["userName"], $envArray["password"], $envArray["dbName"]);
  $validate = new Validation();
  $userDetails = $query->userDetails($userName);
  $response = [];
  if ($userDetails === NULL || $userName != $userDetails["Username"]) {
    $response['status'] = 0;
    $response['userName'] = "Username doesn't exist.";
    echo json_encode($response);
    exit();
  }
  else {
    if ($validate->passwordValidation($password) === FALSE) {
      $response['status'] = 0;
      $response['password'] = "Password should be of min 8 characters with atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character.";
      echo json_encode($response);
      exit();
    }
    else {
      if ($password != $userDetails["Password"]) {
        $response['status'] = 0;
        $response['password'] = "Incorrect password";
        echo json_encode($response);
        exit();
      }
      else {
        $response['status'] = 1;
        $_SESSION["userName"] = $userDetails["Username"];
        $response['role'] = $userDetails["Role"];
        echo json_encode($response);
      }
    }
  }
