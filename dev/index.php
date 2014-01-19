<?php
	
	// On inclut la connexion à la BDD et le fichier de fonctions
	include('includes/connexion.inc.php');
	include('modeles/fonctions.php');

	// On récupère l'action à effectuer par le contrôleur
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}else{
		$action = '';
	}

	// Switch pour effectuer les traitements selon l'action demandée
	switch ($action) {
		case 'connexion':
			# code...
			break;

		case 'deconnexion':
			# code...
			break;
		
		default:
			// Par défaut, on affiche la page d'accueil, avec les articles correspondants à la page demandée (ou ceux de la première page si rien n'est spécifié)
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}else{
				$page = 1;
			}
			$listeArticles = getArticlesPage($page);
			$nombrePages = getNombrePages();
			include('vues/accueil.php');
			break;
	}

?>