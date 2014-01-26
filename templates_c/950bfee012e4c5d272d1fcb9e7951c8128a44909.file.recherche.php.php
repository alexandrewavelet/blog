<?php /* Smarty version Smarty-3.1.16, created on 2014-01-26 14:48:39
         compiled from "vues\recherche.php" */ ?>
<?php /*%%SmartyHeaderCode:1801652e5123750fab8-49023434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '950bfee012e4c5d272d1fcb9e7951c8128a44909' => 
    array (
      0 => 'vues\\recherche.php',
      1 => 1390743645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1801652e5123750fab8-49023434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rappelRecherche' => 0,
    'articlesCorrespondants' => 0,
    'article' => 0,
    'utilisateur_connecte' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52e512375b8dd0_93512486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e512375b8dd0_93512486')) {function content_52e512375b8dd0_93512486($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\web\\blog\\tpl\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include 'E:\\web\\blog\\tpl\\plugins\\modifier.nl2br.php';
if (!is_callable('smarty_modifier_truncate')) include 'E:\\web\\blog\\tpl\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("includes/haut.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<h2>Résultat de la recherche <small> - <?php echo $_smarty_tpl->tpl_vars['rappelRecherche']->value;?>
</small></h2>

<p>Il y a <?php echo count($_smarty_tpl->tpl_vars['articlesCorrespondants']->value);?>
 résultat(s) pour cette recherche.</p>

<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articlesCorrespondants']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>

	<h3><?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
 - <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['date'],"%d/%m/%Y, %H h %M");?>
</small></h3>
	<p><a href="index.php?action=detail&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">Lire l'article</a></p>

	<?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
		<img src="data/img/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg">
	<?php }?>

	<?php echo smarty_modifier_truncate(smarty_modifier_nl2br($_smarty_tpl->tpl_vars['article']->value['texte']),200);?>

	<br><br>

	<?php if ($_smarty_tpl->tpl_vars['article']->value['tag']) {?>
		<p>Tag : <a href="index.php?action=recherche&tag=<?php echo $_smarty_tpl->tpl_vars['article']->value['tag'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['tag'];?>
</a></p>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['utilisateur_connecte']->value) {?> <!-- // Si l'utilisateur est connecté, on affiche les boutons de gestion des articles -->
		<a href="cAdministrateur.php?action=modifier&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-primary">Modifier</a>
		<a href="cAdministrateur.php?action=supprimer&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-primary">Supprimer</a><br/>
	<?php }?>

<?php } ?>

<p><a href="index.php">Retour à l'accueil</a></p>

<?php echo $_smarty_tpl->getSubTemplate ("includes/bas.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
