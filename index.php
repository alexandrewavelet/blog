<?php
	
	session_start();

	// On inclut la connexion à la BDD et le fichier de fonctions
	include('includes/connexion.inc.php');
	include('modeles/fonctions.php');
	include('includes/cookie.inc.php');

	// On récupère l'action à effectuer par le contrôleur
	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = '';
	}

	// Switch pour effectuer les traitements selon l'action demandée
	switch ($action) {

		case 'connexion':
			if (isset($_POST['valider'])) {
				$login = htmlentities(mysql_real_escape_string($_POST['identifiant']));
				$mdp = md5(htmlentities(mysql_real_escape_string($_POST['mdp'])));
				$seSouvenir = false;
				if (isset($_POST['seSouvenir'])) {
					$seSouvenir = true;
				}			
				$connecte = connexionUtilisateur($login, $mdp, $seSouvenir);
			}else{
				$connecte = array(false, "Une erreur s'est produite, veuillez réessayer.");
			}

			if ($connecte[0]) {
				$page = 1;
				$listeArticles = getArticlesPage($page);
				$nombrePages = getNombrePages();
				include('vues/accueil.php');		
			}else{
				$erreur = $connecte[1];
				include('vues/erreur.php');
			}

			break;

		case 'deconnexion':
			deconnexionUtilisateur();
			$page = 1;
			$listeArticles = getArticlesPage($page);
			$nombrePages = getNombrePages();
			include('vues/accueil.php');

			break;

		case 'detail':
			$idArticle = htmlentities(mysql_real_escape_string($_GET['id']));
			$article = getArticle($idArticle);
			include('vues/detail.php');
			
			break;

		case 'recherche':
			if (isset($_GET['q']) || isset($_GET['tag'])) {
				if (isset($_GET['q'])) {
					$termeRecherche = htmlspecialchars(mysql_real_escape_string($_GET['q']));
					$articlesCorrespondants = rechercherArticlesContenant($termeRecherche);
					$rappelRecherche = 'terme : '.$termeRecherche;
				}else{
					$tag = htmlspecialchars(mysql_real_escape_string($_GET['tag']));
					$articlesCorrespondants = rechercherArticlesAvecTag($tag);
					$rappelRecherche = 'tag : '.$tag;
				}
				include('vues/recherche.php');
			}else{
				$erreur = 'Veuillez entrer une recherche';
				include('vues/erreur.php');
			}

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