<?php
  include 'database.php';

  $artista = $_GET["artista"];


  $array_artista = [];

  // var_dump($artista);


  foreach ($database as $singolo_cd) {
    if (($singolo_cd['author'] == $artista)) {
      $array_artista[] = $singolo_cd;
    };

  }

  // var_dump($array_artista);

  $database_json = json_encode($array_artista);

  header('Content-Type: application/json');

  echo $database_json;

 ?>
