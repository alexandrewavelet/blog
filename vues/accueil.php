<?php
	include('includes/haut.inc.php');

	// Affichage des articles de la page
	foreach ($listeArticles as $article) {
		echo '<h3>'.$article['titre'].' - '.date('d/m/Y, G:i', $article['date']).'</h3><br/>';
		echo '<p><a href="index.php?action=detail&id='.$article['id'].'">Lire l\'article</a></p>';
		if ($article['image']) {
			echo '<img src="data/img/'.$article['id'].'.jpg">';
		}
		$texte = nl2br(htmlspecialchars($article['texte']));
		echo $texte.'<br/>';
		if (estConnecte()) { // Si l'utilisateur est connecté, on affiche les boutons de gestion des articles
			echo '<a href="cAdministrateur.php?action=modifier&id='.$article['id'].'" class="btn btn-primary">Modifier</a>';
			echo '<a href="cAdministrateur.php?action=supprimer&id='.$article['id'].'" class="btn btn-primary">Supprimer</a><br/>';
		}
	}

	// Affichage de la pagination
	echo '<h4>Pages</h4>';
	echo '<ul class="pagination">';
	for ($i=1; $i <= $nombrePages; $i++) {
		if ($i = $page) {
			echo '<li class="active"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
		}else{
			echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
		}	
	}
	echo '<ul>';

	include('includes/bas.inc.php');
?>