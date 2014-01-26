{include file="includes/haut.inc.php"}

{if isset($idArticle)}
	<h2>Modifier un article</h2>
{else}
	<h2>Rédiger un article</h2>
{/if}

<div id="erreur" class="alert alert-info hide">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p></p>
</div>

<form action="cAdministrateur.php?action=validerRedaction" method="POST" enctype="multipart/form-data" id="formulaire">

	{if isset($idArticle)} <!-- Si c'est une modification d'article, on créée un champ caché avec l'id de l'article à modifier dans le formulaire -->
		<input type="hidden" name="idArticle" id="idArticle" value="{$idArticle}"/>
	{/if}

	<div class="clearfix">
		<label for="titre">Titre : </label>
		<div class="input"><input type="text" name="titre" id="titre" value="{$article.titre}" /></div>
	</div>
	<div class="clearfix">
		<label for="texte">Contenu : </label>
		<div class="input"><textarea id="texte" name="texte">{$article.texte}</textarea></div>
	</div>
	<div class="clearfix">
		<label for="img">Image : </label>
		<input type="file" id="img" name="img"/>
	</div>
	{if isset($article.image) && $article.image}
		<p>image actuelle : <img src="data/img/{$article.id}.jpg"></p>
	{/if}
	<div class="clearfix">
		<label for="img">Tag : </label>
		<input type="text" id="tag" name="tag" value="{$article.tag}"/>
	</div>
	<div class="clearfix">
		<div class="form-actions"><input class="btn btn-large btn-primary" type="submit" value="Valider" name="valider" id="valider"/></div>
	</div>
</form>

{literal}
	<script type="text/javascript" >

		$(function() {
			$("#formulaire").submit(function() {
				if ($("#titre,#texte").val() === "") {
					$("#erreur").removeClass();
					$("#erreur").addClass("alert alert-danger");
					$("#erreur>p").html("Veuillez remplir les champs titre et contenu.");
					$("#erreur").slideDown("slow");
					return false;
				}else{
					return true;
				}
			});
		});

	</script>
{/literal}
{include file="includes/bas.inc.php"}