<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Soundboard</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>
    <div id="wrapper">
      <div class="content"></div>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="btn btn-menu navbar-btn" id="menu-toggle">
              <i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
            <a class="navbar-brand" href="/">Soundboard</a>
          </div>
        </div>
      </nav>

      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">          
<?php
$categories = scandir('categories');
unset($categories[0], $categories[1]);
foreach ($categories as $categorie) {
  $categorie_displayed = str_replace("-"," ",$categorie);
  if ($_GET["categorie"] == $categorie ){
    echo '          <li><a class="active" href="/categorie/'.$categorie.'">'.$categorie_displayed.'</a></li>'. PHP_EOL;
  } else {
    echo '          <li><a href="/categorie/'.$categorie.'">'.$categorie_displayed.'</a></li>'. PHP_EOL;
  }
}
?>
        </ul>
      </div>

      <div id="page-content-wrapper">
        <div class="container-fluid margin-40 text-center">
          <h1>Soundboard</h1>
<?php
//On vérifie si une catégorie est sélectionnée.
if (isset($_GET["categorie"])){
  $categorie = $_GET["categorie"];
  if (is_dir('categories/'.$categorie)) { //Si oui, on vérifie bien qu'elle existe.
    $categorie_displayed = str_replace("-"," ",$categorie);
?>
          <p class="lead">Catégorie sélectionnée : <b><?php echo $categorie_displayed; ?></b>.</p>
<?php
$sounds = scandir('categories/'.$categorie);
unset($sounds[0], $sounds[1]);
?>
          <script>
            function play(element){
              var audio = document.getElementById(element);
              audio.play();
            }
          </script>
          <div class="row">
<?php
foreach ($sounds as $sound) {
  $sound_id = substr($sound, 0, -4);
  echo '            <div class="col-xs-6 col-sm-4 col-md-2 padding-top">
              <button type="button" class="btn btn-default btn-90" onclick="play(\''.$sound_id.'\')">'.$sound_id.'</button>
              <audio id="'.$sound_id.'" src="/categories/'.$categorie.'/'.$sound.'" ></audio>
            </div>'. PHP_EOL;
}
?>
          </div>
<?php
  } else { // Si la catégorie sélectionnée n'existe pas, on affiche un message d'erreur.
?> 
          <p class="lead"><b>Erreur</b> : La catégorie n'existe pas.</p>
          <div class="row">
            <div class="col-xs-12">
              <button type="button" class="btn btn-default" onclick="location.href='/';">Retour à l'accueil</button></p>
            </div>
          </div>
<?php
  }
} else { // Si aucune catégorie est sélectionnée, on affiche la page d'accueil contenant toutes les catégories.
?>
          <p class="lead">Bienvenue sur la Soundboard,<br>
          Pour commencer, sélectionnez une <b>catégorie</b>.</p>
          <div class="row">
<?php
foreach ($categories as $categorie) {
  $categorie_displayed = str_replace("-"," ",$categorie);
  echo '            <div class="col-xs-6 col-sm-4 col-md-2 padding-top">
              <button type="button" class="btn btn-default btn-90" onclick="location.href=\'/categorie/'.$categorie.'\';">'.$categorie_displayed.'</button>
            </div>'. PHP_EOL;
}
?>
          </div>
<?php
}
?>
        </div>
      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(".content").click(function(e) {
        e.preventDefault();
        $("#wrapper").removeClass("toggled");
    });
    </script>
    <script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("1000");
    })
    </script>
  </body>
</html>