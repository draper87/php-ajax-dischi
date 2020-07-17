<?php

  // API che restituisce come risultato il database con gli album musicali
  include 'database.php';

  // formatto il database ottenuto in formato json
  $database_json = json_encode($database);

  // comunico che il formato utilizzato e json
  header('Content-Type: application/json');

  // stampo il risultato
  echo $database_json;

 ?>
