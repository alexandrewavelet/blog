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

	// Return $booleen : true si l'utilisateur est connecté, false sinon
	function estConnecte(){

	}

?>