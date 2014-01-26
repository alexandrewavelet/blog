{include file="includes/haut.inc.php"}

{foreach from=$listeArticles item=article}

	<h3>{$article.titre} - <small>{$article.date|date_format:"%d/%m/%Y, %H h %M"}</small></h3>
	<p><a href="index.php?action=detail&id={$article.id}">Lire l'article</a></p>

	{if $article.image}
		<img src="data/img/{$article.id}.jpg">
	{/if}

	{$article.texte|nl2br|truncate:200}
	<br><br>

	{if $article.tag}
		<p>Tag : <a href="index.php?action=recherche&tag={$article.tag}">{$article.tag}</a></p>
	{/if}

	{if $utilisateur_connecte} <!-- // Si l'utilisateur est connecté, on affiche les boutons de gestion des articles -->
		<a href="cAdministrateur.php?action=modifier&id={$article.id}" class="btn btn-primary">Modifier</a>
		<a href="cAdministrateur.php?action=supprimer&id={$article.id}" class="btn btn-primary">Supprimer</a><br/>
	{/if}


{/foreach}

<h4>Pages</h4>

<ul class="pagination">
	{for $i=1 to $nombrePages}
		{if $i == $page}
			<li class="active"><a href="index.php?page={$i}">{$i}</a></li>
		{else}
			<li><a href="index.php?page={$i}">{$i}</a></li>
		{/if}
	{/for}
<ul>

{include file="includes/bas.inc.php"}