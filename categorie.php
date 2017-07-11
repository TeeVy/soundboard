<script type="text/javascript">
  var url = document.location.href;
  if (url.indexOf("categorie") >= 0) {
    var categorie_index = url.lastIndexOf('/');
    var categorie_get = url.substring(categorie_index + 1);
    categorie_get = categorie_get.replace(/%20/g,'-');
    document.location.href = '/#'+categorie_get;
  }
</script>
<div class="loader">
	<div class="progress deep-orange lighten-4">
    <div class="indeterminate deep-orange"></div>
  </div>
</div>
<?php
$error = '<div class="row">
            <div class="col s12 center">
              <h3><b>ERREUR</b></h3>
              <h4>Cette catégorie n\'existe pas !</h4><br>
              <h5>Désolé !<br>¯\_(ツ)_/¯</h5>
            </div>
          </div>';
if (isset($_GET["categorie"])) {
  $categorie = $_GET["categorie"];
  $categorie = str_replace("-"," ",$categorie);
  if (is_dir('categories/'.$categorie)) {
    if (empty($categorie)) {
      echo $error;
    } else {
  $sounds = scandir('categories/'.$categorie);
  unset($sounds[0], $sounds[1]);
  if (is_dir('categories/'.$categorie.'/'.$sounds[2])) { // on vérifie si le troisième array est un dossier
    $sub_categorie = true; // si oui, on créé une variable pour les sous-catégories et on la set à true
  } else {
    $sub_categorie = false; // on créé une variable pour les sous-catégories et on la set à false
  }
  ?>
<script>
  function play(element){
    var audio = document.getElementById(element);
    audio.play();
  }
  function stop(){
    $('audio').each(function(){
        this.pause();
        this.currentTime = 0;
    });
  }
  function check(element){
    $('.'+element).toggleClass('hide');
  }
  function unselectAll() {
    $('.sound').addClass('hide');
    $('.filled-in').prop('checked', false);
  }
  function selectAll() {
    $('.sound').removeClass('hide');
    $('.filled-in').prop('checked', true);
  }
</script>

<?php
if ($sub_categorie == true) { // s'il y a des sous-catégories...
  echo '<div class="row">
          <div class="col s12">
            <h4>Sous-catégories</h4>
          </div>
        </div>';
  echo '<div class="row">';
  foreach ($sounds as $sound) { // pour chaque sous dossiers (sous-catégories)...
    $cat_id = str_replace(str_split(" '"),"",$sound);
    echo '<div class="col s6 l4 xl2">
            <input type="checkbox" class="filled-in checkbox-deep-orange" id="'.$sound.'" checked="checked" onclick="check(\''.$cat_id.'\')" />
            <label for="'.$sound.'">'.$sound.'</label>
          </div>'; // on balance la div et tout le bordel qui correspond à une checkbox
  }
  echo '</div>'; // on ferme la div row
  echo '<div class="row">
          <div class="col s12">
            <div class="btn-select">
              <a class="waves-effect waves-light btn deep-orange" onclick="selectAll()">
                <i class="material-icons left">label</i>Tout sélectionner
              </a>
            </div>
            <div class="btn-select">
              <a class="waves-effect waves-light btn deep-orange" onclick="unselectAll()">
                <i class="material-icons left">label_outline</i>Tout désélectionner
              </a>
            </div>
          </div>
        </div>';
}
?>

<div class="row">
<?php
foreach ($sounds as $sound) { // pour chaque array (élément dans le dossier catégorie)...
  if ($sub_categorie == true) { // s'il y a des sous-catégories...
    $cat_id = str_replace(str_split(" '"),"",$sound);
    $sub_sounds = scandir('categories/'.$categorie.'/'.$sound); // on scan chaque sous-dossier (sous-catégorie)
    unset($sub_sounds[0], $sub_sounds[1]); // on supprime les deux premiers arrays correspondant aux dossiers "." & ".."
    foreach ($sub_sounds as $sub_sound) { // pour chaque array (son de sous-catégorie)...
      $sound_disp = substr($sub_sound, 0, -4); // on supprime le ".mp3"
      $sound_id = str_replace("'","",$sound_disp);
      echo '<div class="col s12 m6 l4 xl3 padding-top '.$cat_id.' sound">
              <button type="button" class="light-green darken-3 waves-effect btn-large btn-sound" onclick="play(\''.$sound_id.'\')">'.$sound_disp.'</button>
              <audio id="'.$sound_id.'" src="/categories/'.$categorie.'/'.$sound.'/'.$sub_sound.'" ></audio>
            </div>'. PHP_EOL; // on balance la div et tout le bordel qui correspond à un bouton
    }
  } else { // s'il n'y a pas de sous-catégories...
    $sound_disp = substr($sound, 0, -4); // on supprime le ".mp3"
    $sound_id = str_replace("'","",$sound_disp);
    echo '<div class="col s12 m6 l4 xl3 padding-top">
            <button type="button" class="light-green darken-3 waves-effect btn-large btn-sound" onclick="play(\''.$sound_id.'\')">'.$sound_disp.'</button>
            <audio id="'.$sound_id.'" src="/categories/'.$categorie.'/'.$sound.'" ></audio>
          </div>'. PHP_EOL; // on balance la div et tout le bordel qui correspond à un bouton 
  }
}
?>
</div>

<div class="fixed-action-btn">
  <a id="StopButton" class="btn-floating btn-large deep-orange waves-effect waves-light scale-transition" onclick="stop()">
    <i class="large material-icons">stop</i>
  </a>
</div>
<?php
    }
  } else {
    echo $error;
  }
} else {
  echo $error;
}
?>
<script type="text/javascript">
$(document).ajaxStart(function() {
     $(".loader").show();
});

$(document).ajaxComplete(function() {
     $(".loader").hide();
});
</script>