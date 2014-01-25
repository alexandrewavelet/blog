<?php
	include('includes/haut.inc.php');

	echo '<h2>'.$article['titre'].' - <small>'.date('d/m/Y, G:i', $article['date']).'</small></h2>';
	if ($article['image']) {
		echo '<img src="data/img/'.$article['id'].'.jpg">';
	}
	$texte = nl2br(htmlspecialchars($article['texte']));
	echo $texte.'<br/><br/>';
	echo '<p>Tag : <a href="index.php?action=recherche&tag='.$article['tag'].'">'.$article['tag'].'</a></p>';
	if (estConnecte()) { // Si l'utilisateur est connecté, on affiche les boutons de gestion des articles
		echo '<a href="cAdministrateur.php?action=modifier&id='.$article['id'].'" class="btn btn-primary">Modifier</a>';
		echo '<a href="cAdministrateur.php?action=supprimer&id='.$article['id'].'" class="btn btn-primary">Supprimer</a><br/>';
	}
?>
<p><a href="index.php">Retour à l'accueil</a></p>

<?php
	include('includes/bas.inc.php');
?>