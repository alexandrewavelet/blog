{include file="includes/haut.inc.php"}

	<h2>{$article.titre} - <small>{$article.date|date_format:"%d/%m/%Y, %H h %M"}</small></h2>

	{if $article.image}
		<img src="data/img/{$article.id}.jpg">
	{/if}

	{$article.texte|nl2br}
	<br><br>

	{if $article.tag}
		<p>Tag : <a href="index.php?action=recherche&tag={$article.tag}">{$article.tag}</a></p>
	{/if}

	{if utilisateur_connecte} <!-- // Si l'utilisateur est connecté, on affiche les boutons de gestion des articles -->
		<a href="cAdministrateur.php?action=modifier&id={$article.id}" class="btn btn-primary">Modifier</a>
		<a href="cAdministrateur.php?action=supprimer&id={$article.id}" class="btn btn-primary">Supprimer</a><br/>
	{/if}

	<p><a href="index.php">Retour à l'accueil</a></p>

{include file="includes/bas.inc.php"}