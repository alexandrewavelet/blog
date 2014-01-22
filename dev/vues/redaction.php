<?php

	include('includes/haut.inc.php');

	if (isset($idArticle)) {
		echo '<h2>Modifier un article</h2>';
	}else{
		echo '<h2>Rédiger un article</h2>';
	}

?>

<form action="cAdministrateur.php?action=validerRedaction" method="POST" enctype="multipart/form-data">
	<?php
		if(isset($idArticle)){ // Si c'est une modification d'article, on créée un champ caché avec l'id de l'article à modifier dans le formulaire
			echo '<input type="hidden" name="idArticle" id="idArticle" value="'.$idArticle.'"/>';
		}
	?>
	<div class="clearfix">
		<label for="titre">Titre : </label>
		<div class="input"><input type="text" name="titre" id="titre" <?php echo "value='".$article['titre']."'"; ?> /></div>
	</div>
	<div class="clearfix">
		<label for="texte">Contenu : </label>
		<div class="input"><textarea id="texte" name="texte"><?php echo $article['texte']; ?></textarea></div>
	</div>
	<div class="clearfix">
		<label for="img">Image : </label>
		<input type="file" id="img" name="img"/>
	</div>
	<div class="clearfix">
		<div class="form-actions"><input class="btn btn-large btn-primary" type="submit" value="Valider" name="valider" id="valider"/></div>
	</div>
</form>

<?php
	include('includes/bas.inc.php');
?>