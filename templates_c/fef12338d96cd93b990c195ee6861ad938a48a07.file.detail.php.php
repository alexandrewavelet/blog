<?php /* Smarty version Smarty-3.1.16, created on 2014-01-26 13:24:48
         compiled from "vues\detail.php" */ ?>
<?php /*%%SmartyHeaderCode:1680952e4fd59c54ab7-88537876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fef12338d96cd93b990c195ee6861ad938a48a07' => 
    array (
      0 => 'vues\\detail.php',
      1 => 1390739083,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1680952e4fd59c54ab7-88537876',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52e4fd59cc20d9_75062375',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e4fd59cc20d9_75062375')) {function content_52e4fd59cc20d9_75062375($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\web\\blog\\tpl\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include 'E:\\web\\blog\\tpl\\plugins\\modifier.nl2br.php';
?><?php echo $_smarty_tpl->getSubTemplate ("includes/haut.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<h2><?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
 - <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['date'],"%d/%m/%Y, %H h %M");?>
</small></h2>

	<?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
		<img src="data/img/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg">
	<?php }?>

	<?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['article']->value['texte']);?>

	<br><br>

	<?php if ($_smarty_tpl->tpl_vars['article']->value['tag']) {?>
		<p>Tag : <a href="index.php?action=recherche&tag=<?php echo $_smarty_tpl->tpl_vars['article']->value['tag'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['tag'];?>
</a></p>
	<?php }?>

	<?php if ('utilisateur_connecte') {?> <!-- // Si l'utilisateur est connecté, on affiche les boutons de gestion des articles -->
		<a href="cAdministrateur.php?action=modifier&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-primary">Modifier</a>
		<a href="cAdministrateur.php?action=supprimer&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-primary">Supprimer</a><br/>
	<?php }?>

	<p><a href="index.php">Retour à l'accueil</a></p>

<?php echo $_smarty_tpl->getSubTemplate ("includes/bas.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
