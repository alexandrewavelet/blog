<?php
	
	// Param $page : la page demandée
	// Return $listeArticles : tableau comprenant les articles de la page
	function getArticlesPage($page){
		$articlesParPage = 5;
		$premierArticle = ($page - 1) * $articlesParPage;
		$requeteArticlesPage = 'SELECT * FROM articles ORDER BY date DESC LIMIT '.$premierArticle.', '.$articlesParPage;
		$res = mysql_query($requeteArticlesPage);
		$listeArticles = array();
		while ($article = mysql_fetch_array($res)) {
			extract($article);
			array_push($listeArticles, array('id' => $id, 'titre' => $titre, 'texte' => $texte, 'date' => $date));
		}
		return $listeArticles;
	}

	// Return $nombrePages : le nombre de pages d'articles du blog
	function getNombrePages(){
		$articlesParPage = 5;
		$requeteNombreArticles = 'SELECT COUNT(id) AS nombreArticles FROM articles';
		$res = mysql_query($requeteNombreArticles);
		$nombreArticles = mysql_fetch_array($res)['nombreArticles'];
		$nombrePages = ceil($nombreArticles/$articlesParPage);
		return $nombrePages;
	}

	// Param $login : identifiant de l'utilisateur
	// Param $mdp : le mot de passe rentré
	// Param $seSouvenir : checkbox pour savoir si on doit enregistrer sa connexion dans un cookie
	// Return $connexion : tableau : [0] true si la connexion est réussie, [1] message d'erreur à afficher si la connexion échoue
	function connexionUtilisateur($login, $mdp, $seSouvenir){
		$requeteConnexion = 'SELECT COUNT(*) AS connecte FROM utilisateurs WHERE login = "'.$login.'" AND mdp = "'.$mdp.'"';
		$res = mysql_query($requeteConnexion);
		$connecte = mysql_fetch_array($res)['connecte'];
		if ($connecte == 1) {
			$connexion = array(true, "Connexion réussie");
			$_SESSION['utilisateur'] = $login;
			$_SESSION['connecte'] = true;
			if ($seSouvenir) {
				setcookie('souvenir', true, time() + 365*24*3600);
				setcookie('login', $login, time() + 365*24*3600);
				setcookie('mdp', $mdp, time() + 365*24*3600);
			}
		}else{
			$connexion = array(false, "La combinaison identifiant/mot de passe entrée est incorrecte.");
		}
		return $connexion;
	}

	// Supprime les variables de session et les cookies
	function deconnexionUtilisateur(){
		$_SESSION = array();
		session_destroy();
		setcookie('souvenir', NULL, -1);
		setcookie('login', NULL, -1);
		setcookie('mdp', NULL, -1);
	}

	// Return $booleen : true si l'utilisateur est connecté, false sinon
	function estConnecte(){
		$booleen = false;
		if (isset($_SESSION['connecte']) && $_SESSION['connecte']) {
			$booleen = true;
		}
		return $booleen;
	}

?>