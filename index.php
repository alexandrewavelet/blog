<?php
	
	session_start();

	// On inclut la connexion à la BDD, le fichier de fonctions, la vérification des cookies et le fichier Smarty
	include('includes/connexion.inc.php');
	include('modeles/fonctions.php');
	include('includes/cookie.inc.php');
	require('tpl/smarty.class.php');

	// On récupère l'action à effectuer par le contrôleur
	if (isset($_GET['action'])) {
		$action = htmlentities($_GET['action']);
	}else{
		$action = '';
	}

	// On créée un objet Smarty pour utiliser le moteur de template
	$smarty = new Smarty();

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
				$connecte = array(false, 'Une erreur s\'est produite, veuillez réessayer.');
			}

			if ($connecte[0]) {
				$smarty->assign(array('listeArticles' => getArticlesPage(1),
					'page' => 1,
					'nombrePages' => getNombrePages(),
					'utilisateur_connecte' => estConnecte()));
				$fichier = 'accueil.php';		
			}else{
				$smarty->assign(array('erreur' => $connecte[1],
					'utilisateur_connecte' => estConnecte()));
				$fichier = 'erreur.php';
			}

			break;

		case 'deconnexion':
			deconnexionUtilisateur();
			$smarty->assign(array('listeArticles' => getArticlesPage(1),
				'page' => 1,
				'nombrePages' => getNombrePages(),
				'utilisateur_connecte' => estConnecte()));
			$fichier = 'accueil.php';

			break;

		case 'detail':
			$idArticle = htmlentities(mysql_real_escape_string($_GET['id']));
			$smarty->assign(array('article' => getArticle($idArticle),
				'utilisateur_connecte' => estConnecte()));
			$fichier = 'detail.php';
			
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
				$smarty->assign(array('articlesCorrespondants' => $articlesCorrespondants,
					'rappelRecherche' => $rappelRecherche,
					'utilisateur_connecte' => estConnecte()));
				$fichier = 'recherche.php';
			}else{
				$smarty->assign(array('erreur' => 'Veuillez entrer un terme à rechercher.',
					'utilisateur_connecte' => estConnecte()));
				$fichier = 'erreur.php';
			}

			break;
		
		default:
			// Par défaut, on affiche la page d'accueil, avec les articles correspondants à la page demandée (ou ceux de la première page si rien n'est spécifié)
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}else{
				$page = 1;
			}

			$smarty->assign(array('listeArticles' => getArticlesPage($page),
				'page' => $page,
				'nombrePages' => getNombrePages(),
				'utilisateur_connecte' => estConnecte()));
			$fichier = 'accueil.php';

			break;

	}

	// On affiche la page demandée
	$smarty->display('vues/'.$fichier);

?>