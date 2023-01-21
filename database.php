<?php
  $databaseHost = 'localhost';
  $databaseName = 'alpro_layananrt';
  $databaseUsername = 'root';
  $databasePassword = '';
  
  $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die(mysqli_connect_errno() . ":" . mysqli_connect_error());

  session_start();
?>