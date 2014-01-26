<?php /* Smarty version Smarty-3.1.16, created on 2014-01-26 14:14:39
         compiled from "vues\accueil.php" */ ?>
<?php /*%%SmartyHeaderCode:2032552e50a3f332791-67711118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4abb372c32e0d8f67d6c49c718e0aa128b291f2' => 
    array (
      0 => 'vues\\accueil.php',
      1 => 1390742072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2032552e50a3f332791-67711118',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listeArticles' => 0,
    'article' => 0,
    'nombrePages' => 0,
    'i' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52e50a3f3a8678_41241080',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e50a3f3a8678_41241080')) {function content_52e50a3f3a8678_41241080($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\web\\blog\\tpl\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include 'E:\\web\\blog\\tpl\\plugins\\modifier.nl2br.php';
if (!is_callable('smarty_modifier_truncate')) include 'E:\\web\\blog\\tpl\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("includes/haut.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listeArticles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

	<?php if ('utilisateur_connecte') {?> <!-- // Si l'utilisateur est connecté, on affiche les boutons de gestion des articles -->
		<a href="cAdministrateur.php?action=modifier&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-primary">Modifier</a>
		<a href="cAdministrateur.php?action=supprimer&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-primary">Supprimer</a><br/>
	<?php }?>


<?php } ?>

<h4>Pages</h4>

<ul class="pagination">
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nombrePages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nombrePages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
		<?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['page']->value) {?>
			<li class="active"><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
		<?php } else { ?>
			<li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
		<?php }?>
	<?php }} ?>
<ul>

<?php echo $_smarty_tpl->getSubTemplate ("includes/bas.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
