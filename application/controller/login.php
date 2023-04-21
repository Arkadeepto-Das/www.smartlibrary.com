<?php
  require_once 'vendor/autoload.php';
  
  use application\model\Database;
  use application\model\Validation;

  if (!isset($_SESSION)) {
    session_start();
  }
  if (isset($_POST["userName"]) && isset($_POST["password"])) {
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $query = new Database();
    $validate = new Validation();
    $userDetails = $query->userDetails($userName);
    $response = [];
    if ($userDetails === NULL || $userName != $userDetails["username"]) {
      $response['status'] = 0;
      $response['userName'] = "Username doesn't exist.";
      print_r(json_encode($response));
      exit();
    }
    else {
      if ($validate->passwordValidation($password) === FALSE) {
        $response['status'] = 0;
        $response['password'] = "Password should be of min 8 characters with atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character.";
        print_r(json_encode($response));
        exit();
      }
      else {
        if ($password != $userDetails["password"]) {
          $response['status'] = 0;
          $response['password'] = "Incorrect password";
          print_r(json_encode($response));
          exit();
        }
        else {
          $response['status'] = 1;
          $_SESSION["userName"] = $userDetails["username"];
          $response['role'] = $userDetails["role"];
          print_r(json_encode($response));
        }
      }
    }  
  }
  else {
    require_once 'application/view/login_page.php';
  }
