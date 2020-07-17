<?php

// Stampare a schermo una decina di dischi musicali (vedi screenshot nel file zip) in due modi diversi:
// 	- Solo con l’utilizzo di PHP, che stampa direttamente i dischi in pagina: al caricamento della pagina ci saranno tutti i dischi.
// 	- Attraverso l’utilizzo di AJAX: al caricamento della pagina ajax chiederà attraverso una chiamata i dischi a php e li stamperà attraverso handlebars.

require 'database.php';

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dist/app.css">
    <title>Spotify</title>
  </head>
  <body>

    <!-- Inizio header -->
    <header>
      <div class="container">
        <img src="img/logo.png" alt="logo">
      </div>
    </header>
    <!-- Fine Header -->

    <!-- Inizio Main -->
    <main>
      <select id="filtra-musica" name="">
        <option value="all">Tutti</option>
        <?php foreach ($database as $singolo_cd) { ?>
          <option value="<?php echo $singolo_cd['author']; ?>"><?php echo $singolo_cd['author']; ?></option>
        <?php } ?>
      </select>
      <div class="container">

      </div>
    </main>
    <!-- Fine main -->


    <!-- Inizio template -->
    <script id="entry-template" type="text/x-handlebars-template">
      <div class="singolocd">
        <img src="{{ poster }}" alt="poster">
        <h4>{{ title }}</h4>
        <h5>{{ author }}</h5>
        <p>{{ year }}</p>
      </div>
    </script>
    <!-- Fine template -->

    <script src="dist/app.js" charset="utf-8"></script>

  </body>
</html>
