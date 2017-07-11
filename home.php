<script type="text/javascript">
  var url = document.location.href;
  if (url.indexOf("home.php") >= 0) {
    document.location.href = '/';
  }
</script>
<div class="loader">
  <div class="progress deep-orange lighten-4">
    <div class="indeterminate deep-orange"></div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <h3>Bienvenue !</h3>
    <p>
    	Pour commencer, choisissez-donc une catégorie en <b>cliquant sur le petit menu en haut à gauche</b> ou en <b>swippant vers la droite</b>.
    </p>
  </div>
</div>
<div class="row">
	<div class="col s12">
	  <ul class="collapsible" data-collapsible="accordion">
	    <li>
	      <div class="collapsible-header active"><i class="material-icons">volume_up</i>Nouveaux sons</div>
	      <div class="collapsible-body">
	      	<span>
	      		- Klaxon du Tatamonique (Pop Culture FR)<br>
	      		- Nouvelle catégorie : <b>Toy Story</b><br>
	      		- Petits ajouts dans TF2<br>
	      		- You're God damn right! (Breaking Bad) + J'aime l'argent + Le dessert (Pop Culture FR)<br>
	      		- Nouvelle catégorie : <b>Portal</b>. GLaDOS is watching you !<br>
	      		- TCHAAAW ! (Pop Culture FR)<br>
	      		- DJ Heavy Baby est dans la place ! (Pop Culture FR)<br>
	      		- Nouvelle catégorie : <b>Les Quenouilles</b><br>
	      		- Je suis pas venue ici pour souffrir okay + AH (Pop Culture FR)<br>
	      		- De la poudre de Perlimpinpin + NOTRE PROJET + VIVE LA REPUBLIQUE (Pop Culture FR)<br>
	      		- Une série de Osef (Golden Show)
	      	</span>
	      </div>
	    </li>
	    <li>
	      <div class="collapsible-header"><i class="material-icons">new_releases</i>Dernières mises à jour</div>
	      <div class="collapsible-body">
	      	<span>
	      		<p>
	      		- Pleins de petits fixes de bugs et diverses optimisations<br>
	      		- <b>Sous-catégories</b> ! <br>
	      		- Nom de la catégorie dynamique dans la navbar.<br>
	      		- Page home remaniée.<br>
	      		- Bug de scroll au niveau de la navigation corrigé.<br>
	      		- Bouton Stop.
	      		</p>
	      		<p>
	      		<h5>À venir :</h5>
	      		- Sources
	      		</p>
	      	</span>
	      </div>
	    </li>
	  </ul>
  </div>
</div>

<script type="text/javascript">
//Loader
$(document).ajaxStart(function() {
     $(".loader").show();
});

$(document).ajaxComplete(function() {
     $(".loader").fadeOut('slow');
});
//Collapsible
$(document).ready(function(){
  $('.collapsible').collapsible();
});
</script>