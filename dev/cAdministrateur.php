<?php
	
	session_start();

	// On inclut la connexion à la BDD et le fichier de fonctions
	include('includes/connexion.inc.php');
	include('modeles/fonctions.php');
	include('includes/cookie.inc.php');

	if (estConnecte()) {

		// On récupère l'action à effectuer par le contrôleur
		if (isset($_GET['action'])) {
			$action = htmlentities($_GET['action']);
		}else{
			$action = '';
		}

		// Switch pour effectuer les traitements selon l'action demandée
		switch ($action) {
			case 'rediger':
				# code...
				break;

			case 'modifier':
				# code...
				break;

			case 'supprimer':
				# code...
				break;
		}

	}else{
		$erreur = "Vous n'êtes pas connecté.";
		include('vues/erreur.php');
	}



?>