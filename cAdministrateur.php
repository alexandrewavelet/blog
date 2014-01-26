<?php
	
	session_start();

	// On inclut la connexion à la BDD, le fichier de fonctions, la vérification des cookies et le fichier Smarty
	include('includes/connexion.inc.php');
	include('modeles/fonctions.php');
	include('includes/cookie.inc.php');
	require('tpl/Smarty.class.php');

	// On créée un objet Smarty pour utiliser le moteur de template
	$smarty = new Smarty();

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
				$article = array('titre' => '', 'texte' => '', 'tag' => '');
				$smarty->assign(array('article' => $article,
					'utilisateur_connecte' => estConnecte()));
				$fichier = 'redaction.php';

				break;

			case 'modifier':
				$idArticle = htmlentities(mysql_real_escape_string($_GET['id']));
				$smarty->assign(array('article' => getArticle($idArticle),
					'idArticle' => $idArticle,
					'utilisateur_connecte' => estConnecte()));
				$fichier = 'redaction.php';

				break;

			case 'validerRedaction':
				$titre = htmlspecialchars(mysql_real_escape_string($_POST['titre']));
				$texte = htmlspecialchars(mysql_real_escape_string($_POST['texte']));

				if (isset($_POST['idArticle'])) { // On vérifie si l'on a affaire à une modification ou une création d'article
					$idArticle = $_POST['idArticle'];
					modifierArticle($idArticle, $titre, $texte);
				}else{
					$idArticle = creerArticle($titre, $texte);
				}

				if (isset($_POST['tag'])) { // Ajou/Suppression du tag de l'article
					if (empty($_POST['tag'])) {
						supprimerTagArticle($idArticle);
					}else{
						$tag = $_POST['tag'];
						ajouterTagArticle($idArticle, $tag);
					}
				}

				if (isset($_FILES['img'])) { // Enregistrement de l'image, si elle existe
					$message = enregistrerImage($_FILES['img'], $idArticle);
				}

				if (isset($message) && !$message) {
					$smarty->assign(array('erreur' => $message,
						'utilisateur_connecte' => estConnecte()));
					$fichier = 'erreur.php';
				}else{
					header('Location:index.php');
					exit();
				}

				break;

			case 'supprimer':
				$idArticle = htmlentities(mysql_real_escape_string($_GET['id']));
				$smarty->assign(array('message' => supprimerArticle($idArticle),
					'utilisateur_connecte' => estConnecte()));
				$fichier = 'suppression.php';

				break;

			default:
				header('Location:index.php');
				exit();

				break;
		}

		// On affiche la page demandée
		$smarty->display('vues/'.$fichier);

	}else{

		$smarty->assign(array('erreur' => 'Vous n\'êtes pas connecté'));
		$smarty->display('vues/erreur.php');

	}

?>