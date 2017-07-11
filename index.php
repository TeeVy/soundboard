<!DOCTYPE html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="theme-color" content="#8bc34a" />

      <title>Soundboard</title>

      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import Font Awesome-->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
      <!--Import custom css-->
      <link type="text/css" rel="stylesheet" href="/css/style.css">
      <!--favicon-->
      <link rel="icon" href="/src/favicon.ico">
    </head>

    <body>

      <div class="navbar-fixed">
        <nav class="light-green">
          <div class="nav-wrapper">            
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="#" class="title"></a>
          </div>
        </nav>
      </div>

      <ul id="slide-out" class="side-nav">
        <li>
          <div class="user-view">
            <div class="background deep-orange">
              <img src="/src/bg.svg">
            </div>
            <a href="/"><img class="circle" src="/src/logo.svg"></a>
            <a href="/"><span class="white-text name">Soundboard</span></a>
            <span class="email no-padding">
              <a href="//robincarlo.fr" class="white-text waves-effect waves-circle"><i class="fa fa-globe" aria-hidden="true"></i></a>
              <a href="//twitter.com/robinowned" class="white-text waves-effect waves-circle"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="//github.com/teevy" class="white-text waves-effect waves-circle"><i class="fa fa-github" aria-hidden="true"></i></a>
            </span>
          </div>
        </li>
        <li><a class="waves-effect waves-green menu-adjust" href="/">Home<i class="material-icons">home</i></a></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header waves-effect waves-green active">Catégories<i class="material-icons">view_list</i></a>
              <div class="collapsible-body">
                <ul>                  
                  <?php
                    $categories = scandir('categories');
                    unset($categories[0], $categories[1]);
                    foreach ($categories as $categorie) {
                      $anchor = str_replace(" ","-",$categorie);
                      echo '<li><a class="waves-effect waves-green" href="#'.$anchor.'">'.$categorie.'</a></li>'. PHP_EOL ;
                    }
                  ?>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li><a class="waves-effect waves-green menu-adjust" href="#modal1">À propos<i class="material-icons">info</i></a></li></li>
      </ul>

      <div id="container" class="container">
      </div>

      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>À propos</h4>
          <p>
            On ne va pas se le cacher, nombreux des sons disponibles sur cette soundboard ont été choppé à droite, à gauche.
          </p>
          <p>
            Bien entendu, tous sont biens issues des oeuvres originales que je vous invite à regarder de ce pas si ce n'est pas déjà fait !
          </p>
          <p>
            Certains sons ont été soigneusement découpés par mes soins tandis que d'autres ont été téléchargés sur des sites ou applications déjà existants.
          </p>
          <p>
            Quoi qu'il en soit, je ne détiens aucun droit et cette soundboard n'a jamais et ne sera jamais à but lucratif. La preuve, aucune publicité vient poluer le site.<br>
            J'ai créé ce site pour unique but d'avoir une soundboard qui me plaît et que je peux partager ainsi que d'avoir un petit challenge pour coder le tout.<br>
          </p>
          <p>
            Bref, tout ça pour dire que si jamais vous détenez certains droits sur l'une des oeuvres cités sur ce site, ayez donc un minimum de race et voyez-ça comme un hommage. Cela ne vous causera pas d'ennuis, bien au contraire, ça poussera probablement la personne à jeter (de nouveau ou non) un œil à votre oeuvre.
          </p>
          <p>
            Cela dit, je pense qu'il va de soit de citer les oeuvres originales ainsi que les quelques sources où j'ai pu attraper certains sons...
          </p>
          <p>
            <a rel="nofollow" target="_blank" href="https://docs.google.com/spreadsheets/d/1BLbNpZ5zW3Rch3wXNng3DC8JdBykZ-1tX1LyFs6H-OM/edit?usp=sharing" class="waves-effect waves-light btn deep-orange">Sources</a>
          </p>

          <p>
            <b>Note</b> : <i>Le Google Sheet est encore en cours de construction... </i>
          </p>
        </div>
        <div class="modal-footer">
          <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
        </div>
      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="/js/materialize.min.js"></script>
      <script type="text/javascript">
      //Get URL and Loading its page
      var anchor = window.location.hash;
      anchor = anchor.substring(1,anchor.length);
      if(anchor) {
        var page = '/categorie/'+anchor;
        var title = anchor.replace(/-/g,' ');
        $(".collapsible-body a:contains('" + title + "')").addClass('active');
        $(".title").text(title);
      } else {
        var page = 'home.php';
        $(".title").text('Soundboard');
      }
      $('#container').load(page);
      // Initialize collapse button
      $('.button-collapse').sideNav({
          menuWidth: 300, // Default is 300
          edge: 'left', // Choose the horizontal origin
          closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true, // Choose whether you can drag to open on touch screens,
          onOpen: function(el) {console.log("ouverture du menu");}, // A function to be called when sideNav is opened
          onClose: function(el) {console.log("fermeture du menu");} // A function to be called when sideNav is closed
        }
      );
      // Initialize collapsible (uncomment the line below if you use the dropdown variation)
      //$('.collapsible').collapsible();
      //Links Menu
      $(function () {
          $('.collapsible-body a').on('click', function (e) {
            e.preventDefault();
            $('.collapsible-body a').removeClass('active');
            //var page = $(this).attr('href');
            var anchor = $(this).attr('href');
            anchor = anchor.substring(1,anchor.length);
            var page = '/categorie/'+anchor;
            var categorie = $(this).text();
            $('#container').load(page);
            window.location.hash = anchor;
            window.scrollTo(0, 0);
            $(this).addClass('active');
            $(".title").text(categorie);
          });
      });
      //Modal
      $(document).ready(function(){
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
      });
      </script>
    </body>
  </html>