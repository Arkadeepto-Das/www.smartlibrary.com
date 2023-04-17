<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  require_once 'vendor/autoload.php';
  $env = new EnvHandler();
  $envArray = $env->fetchEnvValues();
  $query = new Database($envArray["serverName"], $envArray["userName"], $envArray["password"], $envArray["dbName"]);
  $bookList = $query->fetchReaderList($_SESSION["userName"]);
  $count = $query->fetchCount();
  $_SESSION["count"] = $count;
  $_SESSION["end"] = 2;
  $listData = [];
  if ($bookList !== NULL) {
    $listData["readingList"] = $bookList["readingList"];
    $listData["bucketList"] = $bookList["bucketList"];
    require_once 'Templates/reader_list.php';
  }
