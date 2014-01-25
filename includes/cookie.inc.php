<?php

	// Permet de vérifier si l'utilisateur a coché la case "Se souvenir de moi" lors d'une de ses précédentes visites et le connecte le cas échéant
	if (isset($_COOKIE['souvenir']) && $_COOKIE['souvenir']) {
		$connecte = connexionUtilisateur($_COOKIE['login'], $_COOKIE['mdp'], false);
	}

?>