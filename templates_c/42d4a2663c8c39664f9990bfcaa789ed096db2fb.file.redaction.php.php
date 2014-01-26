<?php /* Smarty version Smarty-3.1.16, created on 2014-01-26 14:51:39
         compiled from "vues\redaction.php" */ ?>
<?php /*%%SmartyHeaderCode:156552e5114e1ae8c6-43226672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42d4a2663c8c39664f9990bfcaa789ed096db2fb' => 
    array (
      0 => 'vues\\redaction.php',
      1 => 1390744294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156552e5114e1ae8c6-43226672',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52e5114e212c96_31636932',
  'variables' => 
  array (
    'idArticle' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e5114e212c96_31636932')) {function content_52e5114e212c96_31636932($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("includes/haut.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if (isset($_smarty_tpl->tpl_vars['idArticle']->value)) {?>
	<h2>Modifier un article</h2>
<?php } else { ?>
	<h2>Rédiger un article</h2>
<?php }?>

<div id="erreur" class="alert alert-info hide">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p></p>
</div>

<form action="cAdministrateur.php?action=validerRedaction" method="POST" enctype="multipart/form-data" id="formulaire">

	<?php if (isset($_smarty_tpl->tpl_vars['idArticle']->value)) {?> <!-- Si c'est une modification d'article, on créée un champ caché avec l'id de l'article à modifier dans le formulaire -->
		<input type="hidden" name="idArticle" id="idArticle" value="<?php echo $_smarty_tpl->tpl_vars['idArticle']->value;?>
"/>
	<?php }?>

	<div class="clearfix">
		<label for="titre">Titre : </label>
		<div class="input"><input type="text" name="titre" id="titre" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
" /></div>
	</div>
	<div class="clearfix">
		<label for="texte">Contenu : </label>
		<div class="input"><textarea id="texte" name="texte"><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>
</textarea></div>
	</div>
	<div class="clearfix">
		<label for="img">Image : </label>
		<input type="file" id="img" name="img"/>
	</div>
	<?php if (isset($_smarty_tpl->tpl_vars['article']->value['image'])&&$_smarty_tpl->tpl_vars['article']->value['image']) {?>
		<p>image actuelle : <img src="data/img/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg"></p>
	<?php }?>
	<div class="clearfix">
		<label for="img">Tag : </label>
		<input type="text" id="tag" name="tag" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['tag'];?>
"/>
	</div>
	<div class="clearfix">
		<div class="form-actions"><input class="btn btn-large btn-primary" type="submit" value="Valider" name="valider" id="valider"/></div>
	</div>
</form>


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

<?php echo $_smarty_tpl->getSubTemplate ("includes/bas.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
