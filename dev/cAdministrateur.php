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
				$article = array('titre' => '', 'texte' => '');
				include('vues/redaction.php');

				break;

			case 'modifier':
				$idArticle = htmlentities(mysql_real_escape_string($_GET['id']));
				$article = getArticle($idArticle); // à implémenter
				include('vues/redaction.php');

				break;

			case 'validerRedaction':
				$titre = htmlspecialchars(mysql_real_escape_string($_POST['titre']));
				$texte = htmlspecialchars(mysql_real_escape_string($_POST['texte']));
				if (isset($_POST['idArticle'])) { // On vérifie si l'on a affaire à une modification ou une création d'article
					modifierArticle($_POST['idArticle'], $titre, $texte);
				}else{
					creerArticle($titre, $texte);
				}
				header("Location:index.php");
				exit();

				break;

			case 'supprimer':
				$idArticle = htmlentities(mysql_real_escape_string($_GET['id']));
				$message = supprimerArticle($idArticle);
				include('vues/suppression.php');
				break;

			default:
				header("Location:index.php");
				exit();

				break;
		}

	}else{
		$erreur = "Vous n'êtes pas connecté.";
		include('vues/erreur.php');
	}



?>