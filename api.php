<?php
  include 'database.php';

  $database_json = json_encode($database);

  header('Content-Type: application/json');

  echo $database_json;

 ?>
