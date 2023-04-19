<?php
  if(!isset($_SESSION)) {
    session_start();
  }
  require_once 'vendor/autoload.php';
  $env = new EnvHandler();
  $envArray = $env->fetchEnvValues();
  $query = new Database($envArray["serverName"], $envArray["userName"], $envArray["password"], $envArray["dbName"]);
  $bookList = $query->fetchBookList($_SESSION["end"]);
  if ($_SESSION["end"] < $_SESSION["count"]) {
    if ($_SESSION["end"] == $_SESSION["count"] - 1) {
      $_SESSION["end"] = $_SESSION["count"] - 1;
    }
      $_SESSION["end"] += 1;
  }
  if ($bookList !== NULL) {
    require 'Templates/home_list.php';
  }
