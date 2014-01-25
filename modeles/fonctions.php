<?php
	
	// Param $page : la page demandée
	// Return $listeArticles : tableau comprenant les articles de la page
	function getArticlesPage($page){
		$articlesParPage = 5;
		$premierArticle = ($page - 1) * $articlesParPage;
		$requeteArticlesPage = 'SELECT articles.id, titre, texte, date, image, tag FROM articles LEFT JOIN tagsarticles ON articles.id = idArticle LEFT JOIN tags ON tags.id = idTag ORDER BY date DESC LIMIT '.$premierArticle.', '.$articlesParPage;
		$res = mysql_query($requeteArticlesPage);
		$listeArticles = array();
		while ($article = mysql_fetch_array($res)) {
			extract($article);
			array_push($listeArticles, array('id' => $id, 'titre' => $titre, 'texte' => $texte, 'date' => $date, 'image' => $image, 'tag' => $tag));
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
			$connexion = array(true, 'Connexion réussie');
			$_SESSION['utilisateur'] = $login;
			$_SESSION['connecte'] = true;
			if ($seSouvenir) {
				setcookie('souvenir', true, time() + 365*24*3600);
				setcookie('login', $login, time() + 365*24*3600);
				setcookie('mdp', $mdp, time() + 365*24*3600);
			}
		}else{
			$connexion = array(false, 'La combinaison identifiant/mot de passe entrée est incorrecte.');
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

	// Param $idArticle : id de l'article à supprimer
	// Return $message : message d'information sur la suppression
	function supprimerArticle($idArticle){
		$requeteMessage = 'SELECT titre FROM articles WHERE id = '.$idArticle;
		$res = mysql_query($requeteMessage);
		$message = 'L\'article "'.mysql_fetch_array($res)['titre'].'" (id : '.$idArticle.') a correctement été supprimé.';
		$requeteSuppression = 'DELETE FROM articles WHERE id = '.$idArticle;
		$res = mysql_query($requeteSuppression);
		return $message;
	}

	// Param $idArticle : l'article demandé
	// Return $infos : tableau contenant le titre et le contenu de l'article
	function getArticle($idArticle){
		$requeteInfos = 'SELECT articles.id, titre, texte, date, image, tag FROM articles LEFT JOIN tagsarticles ON articles.id = idArticle LEFT JOIN tags ON tags.id = idTag WHERE articles.id = '.$idArticle;
		$res = mysql_query($requeteInfos);
		$infos = mysql_fetch_array($res);
		return $infos;
	}

	// Param $titre : titre de l'article
	// Param $texte : contenu de l'article
	// Return $idArticle : l'id de l'article inséré
	function creerArticle($titre, $texte){
		$requeteInsertion = 'INSERT INTO articles VALUES (0, "'.$titre.'", "'.$texte.'", UNIX_TIMESTAMP(), false)';
		$res = mysql_query($requeteInsertion);
		$idArticle = mysql_insert_id();
		return $idArticle;
	}

	// Param $id : identifiant de l'article à modifier
	// Param $titre : titre de l'article
	// Param $texte : contenu de l'article
	// Ne retourne rien, modifie les champs d'un article dans la BDD
	function modifierArticle($id, $titre, $texte){
		$requeteModification = 'UPDATE articles SET titre = "'.$titre.'", texte = "'.$texte.'", date = UNIX_TIMESTAMP() WHERE id = '.$id;
		$res = mysql_query($requeteModification);
	}

	// Param $expression : chaîne à chercher dans les titres et contenus des articles
	// Return $listeArticles : tableau contenant les articles correspondants
	function rechercherArticlesContenant($expression){
		$requeteRecherche = 'SELECT articles.id, titre, texte, date, image, tag FROM articles LEFT JOIN tagsarticles ON articles.id = idArticle LEFT JOIN tags ON tags.id = idTag WHERE titre LIKE "%'.$expression.'%" OR texte LIKE "%'.$expression.'%" ORDER BY date DESC';
		$res = mysql_query($requeteRecherche);
		$listeArticles = array();
		while ($article = mysql_fetch_array($res)) {
			extract($article);
			array_push($listeArticles, array('id' => $id, 'titre' => $titre, 'texte' => $texte, 'date' => $date, 'image' => $image, 'tag' => $tag));
		}
		return $listeArticles;
	}

	// Fonction qui enregistre l'image uploadée dans le formulaire (avec le nom correspondant à l'id de l'article qu'elle illustre)
	// Param $image : l'image à enregistrer
	// Param $nomImage : le nom à lui attribuer
	// Return $info : le message d'erreur ou true si l'upload s'est bien passé
	function enregistrerImage($image, $nomImage){
		if($image['error'] = 0){
			$info = "Erreur lors du transfert de l'image";
		}else{
			$extensions_valides = array('jpg','jpeg');
			$extension_upload = strtolower(substr(strrchr($image['name'],'.'),1));
			if(in_array($extension_upload,$extensions_valides)){
				creerImage($image, $nomImage);
				$info = true;
				// On signale que l'article a une image en passant son champ "image" à true
				$requeteAffectationImage = 'UPDATE articles SET image = true WHERE id = '.$nomImage;
				$res = mysql_query($requeteAffectationImage);
			}else{
				$info = "Le fichier uploadé n'est pas une image jpeg.";
			}
		}
		return $info;
	}

	// Param $image : l'image à enregistrer
	// Param $nomImage : le nom à lui attribuer
	// Ne retourne rien. Enregistre l'image dans le dossier "data/img/"
	function creerImage($image, $nomImage){
		$largeur = 200;
		$dossier = "data/img/";

		$imageRedimensionnee = imagecreatefromjpeg($image['tmp_name']);
		$tailleImage = getimagesize($image['tmp_name']);
		$reduction = ($largeur * 100)/$tailleImage[0];
		$hauteur = (($tailleImage[1] * $reduction)/100);
		$imageFinale = imagecreatetruecolor($largeur , $hauteur);
		imagecopyresampled($imageFinale , $imageRedimensionnee, 0, 0, 0, 0, $largeur, $hauteur, $tailleImage[0],$tailleImage[1]);
		imagejpeg($imageFinale, $dossier.$nomImage.'.jpg', 100);
	}

	// FONCTIONNALITE DE TAGS

	// Param $tag : le tag sur lequel faire la recherche
	// Return : liste des articles tagés avec le tag spécifié
	function rechercherArticlesAvecTag($tag){
		$requeteRecherche = 'SELECT articles.id, titre, texte, date, image, tag FROM articles LEFT JOIN tagsarticles ON articles.id = idArticle LEFT JOIN tags ON tags.id = idTag WHERE tag = "'.$tag.'" ORDER BY date DESC';
		$res = mysql_query($requeteRecherche);
		$listeArticles = array();
		while ($article = mysql_fetch_array($res)) {
			extract($article);
			array_push($listeArticles, array('id' => $id, 'titre' => $titre, 'texte' => $texte, 'date' => $date, 'image' => $image, 'tag' => $tag));
		}
		return $listeArticles;
	}

	// Ajoute un tag à l'article en paramètre
	// Param $idArticle : l'article concerné
	// Param $tag : le tag à ajouter
	// Ne retourne rien
	function ajouterTagArticle($idArticle, $tag){
		if (articleTage($idArticle)) {
			supprimerTagArticle($idArticle);
		}
		$idTag = getIdTag($tag);
		$requeteAjout = 'INSERT INTO tagsarticles VALUES ('.$idArticle.', '.$idTag.')';
		$res = mysql_query($requeteAjout);
	}

	// Param $idArticle : l'article concerné
	// Return $booleen : true si l'article possède un tag, faux sinon
	function articleTage($idArticle){
		$requeteNombreTags = 'SELECT COUNT(*) AS nombreTags FROM tagsarticles WHERE idArticle = '.$idArticle;
		$res = mysql_query($requeteNombreTags);
		$nbTags = mysql_fetch_array($res)['nombreTags'];
		$booleen = false;
		if ($nbTags > 0) {
			$booleen = true;
		}
		return $booleen;
	}

	// Supprime le tag de l'article et vérifie si le tag est encore attribué (le supprime sinon)
	// Param $idArticle : l'article concerné
	// Ne retourne rien
	function supprimerTagArticle($idArticle){
		$requeteTagPrecedent = 'SELECT idTag FROM tagsarticles WHERE idArticle = '.$idArticle;
		$res = mysql_query($requeteTagPrecedent);
		$idTagPrecedent = mysql_fetch_array($res)['idTag'];
		$requeteSuppression = 'DELETE FROM tagsarticles WHERE idArticle = '.$idArticle;
		$res = mysql_query($requeteSuppression);
		$requeteNbArticlesTagPrecedent = 'SELECT COUNT(*) AS nombreArticles FROM tagsarticles WHERE idTag = '.$idTagPrecedent;
		$res = mysql_query($requeteNbArticlesTagPrecedent);
		$nbArticlesTagPrecedent = mysql_fetch_array($res)['nombreArticles'];
		if ($nbArticlesTagPrecedent == 0) {
			supprimerTag($idTagPrecedent);
		}
	}

	// Param $tag = le nom du tag à créer
	// Return $id = l'identifiant du tag créé
	function creerTag($tag){
		$requeteAjout = 'INSERT INTO tags VALUES (0, "'.$tag.'")';
		$res = mysql_query($requeteAjout);
		$id = mysql_insert_id();
		return $id;
	}

	// Retourne l'id du tag placé en paramètre. S'il n''existe pas, la fonction appelle creerTag() pour le créer et renvoie son id
	// Param $tag : le tag dont on veut récupérer l'identifiant
	// Return $id : l'id du tag cherché
	function getIdTag($tag){
		$requeteIdTag = 'SELECT id FROM tags WHERE tag = "'.$tag.'"';
		$res = mysql_query($requeteIdTag);
		if (mysql_num_rows($res) == 0) {
			$id = creerTag($tag);
		}else{
			$id = mysql_fetch_array($res)['id'];
		}
		return $id;
	}

	// Param $id : identifiant du tag à supprimer
	// Ne retourne rien, supprime le tag de la BDD
	function supprimerTag($id){
		$requeteSuppression = 'DELETE FROM tags WHERE id = '.$id;
		$res = mysql_query($requeteSuppression);
	}

?>