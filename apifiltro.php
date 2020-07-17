<?php
  // API che restituisce come risultato il database con gli album musicali, in questo caso il database viene filtrato in base
  // alla select fatta dall utente direttamente dalla pagina web.

  // includo il database
  include 'database.php';

  // mi prendo il valore dalla chiamata Ajax che a sua volta lo prende dal .val() della select
  $artista = $_GET["artista"];

  // mi creo un array vuoto che andro a popolare con i soli dati filtrati del mio database originario
  $array_artista = [];

  // faccio un ciclo che va a popolare l array appena creato, faccio push solamente nel caso in cui l autore corrisponda
  // a quello che ha scelto l utente
  foreach ($database as $singolo_cd) {
    if (($singolo_cd['author'] == $artista)) {
      $array_artista[] = $singolo_cd;
    };

  }

  // formatto il database ottenuto in formato json
  $database_json = json_encode($array_artista);

  // comunico che il formato utilizzato e json
  header('Content-Type: application/json');

  // stampo il risultato
  echo $database_json;

 ?>
