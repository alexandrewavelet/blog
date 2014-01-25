<?php
	include('includes/haut.inc.php');

	echo '<h2>Résultat de la recherche <small> terme : "'.$termeRecherche.'"</small></h2>';

	if (count($articlesCorrespondants) == 0) {
		echo '<p>Il n\'y a aucun résultat correspondant à votre recherche.</p>';
	}else{
		echo '<p>Nombre de résultats : '.count($articlesCorrespondants).'</p>';
		foreach ($articlesCorrespondants as $article) {
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
	}


?>
<p><a href="index.php">Retour à l'accueil</a></p>

<?php
	include('includes/bas.inc.php');
?>