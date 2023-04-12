<?php
  require 'vendor/autoload.php';
  require './classes/EnvHandler.php';
  $userName = $_POST["username"];
  $password = $_POST["password"];
  $env = new EnvHandler();
  $env->fetchEnvValues();
?>
