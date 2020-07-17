var $ = require( "jquery" );
const Handlebars = require("handlebars");

$(document).ready(function() {

  // quando seleziono la select parte una funzione che fa la chiamata API al mio database musicale
  $('#filtra-musica').change(function() {
    filtraDischi();
  })

  // funzione che fa chiamata API per tutti gli album quando apro la pagina web e stampa i risultati
  function chiamaDischi() {
    $.ajax({
      url: 'http://localhost:8888/php-ajax-dischi/api.php',
      method: 'GET',
      success: function(dataResponse) {
        stampaDischi(dataResponse);
      },
      error: function() {
        alert('il server non funziona');
      }
    })

    function stampaDischi(databaseArray) {
      $('main .container').html('');
      var source = $("#entry-template").html();
      var template = Handlebars.compile(source);


      for (var i = 0; i < databaseArray.length; i++) {
        var context = databaseArray[i];
        var html = template(context);
        $('main .container').append(html);
      }
    }
  }

  chiamaDischi(); // chiamo la funzione per stampare i risultati


  // funzione che fa una chiamata API personalizzata in base all autore del album, come parametro gli passo il valore della select
  // come risultato stampera a schermo solamente gli album dell autore selezionato
  function filtraDischi() {

    if ($('#filtra-musica').val() == 'all') {
      chiamaDischi();
      return;
    }

    $.ajax({
      url: 'http://localhost:8888/php-ajax-dischi/apifiltro.php',
      method: 'GET',
      data: {
        artista: $('#filtra-musica').val(),
      },
      success: function(dataResponse) {
        stampaDischiFiltrati(dataResponse);
      },
      error: function() {
        alert('il server non funziona');
      }
    })

    function stampaDischiFiltrati(databaseArray) {
      $('main .container').html('');

        var source = $("#entry-template").html();
        var template = Handlebars.compile(source);


        for (var i = 0; i < databaseArray.length; i++) {
          var context = databaseArray[i];
          var html = template(context);
          $('main .container').append(html);
        }


    }


  }

})
