<?php
  if(!isset($_SESSION)) {
    session_start();
  }
  require_once 'vendor/autoload.php';
  $env = new EnvHandler();
  $envArray = $env->fetchEnvValues();
  $query = new Database($envArray["serverName"], $envArray["userName"], $envArray["password"], $envArray["dbName"]);
  $bookList = $query->fetchBookList(1);
  $_SESSION["end"] = 2;
  if ($bookList !== NULL) {
    require 'Templates/home_list.php';
  }