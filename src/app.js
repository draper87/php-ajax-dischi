var $ = require( "jquery" );
const Handlebars = require("handlebars");

$(document).ready(function() {


  $('#filtra-musica').change(function() {
    filtraDischi();
  })

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
      var source = $("#entry-template").html();
      var template = Handlebars.compile(source);


      for (var i = 0; i < databaseArray.length; i++) {
        var context = databaseArray[i];
        var html = template(context);
        $('main .container').append(html);
      }
    }
  }

  chiamaDischi();



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
