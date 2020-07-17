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

     <header>
       <div class="container">
         <img src="img/logo.png" alt="logo">
       </div>
     </header>

     <main>
       <div class="container">
         <?php foreach ($database as $singolo_cd) { ?>
           <div class="singolocd">
             <img src="<?php echo $singolo_cd['poster']; ?>" alt="poster">
             <h4><?php echo $singolo_cd['title']; ?></h4>
             <h5><?php echo $singolo_cd['author']; ?></h5>
             <p><?php echo $singolo_cd['year']; ?></p>
           </div>
         <?php } ?>
       </div>
     </main>


   </body>
 </html>
