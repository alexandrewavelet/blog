<?php /* Smarty version Smarty-3.1.16, created on 2014-01-26 14:16:20
         compiled from "vues\erreur.php" */ ?>
<?php /*%%SmartyHeaderCode:1746652e50aa4012b24-42714930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ecd1348dea37123555867001984506e5fba1a5e' => 
    array (
      0 => 'vues\\erreur.php',
      1 => 1390725624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1746652e50aa4012b24-42714930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'erreur' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52e50aa4063a39_85236850',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e50aa4063a39_85236850')) {function content_52e50aa4063a39_85236850($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("includes/haut.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<h2>Une erreur est survenue</h2>
<p><?php echo $_smarty_tpl->tpl_vars['erreur']->value;?>
</p>
<p><a href="index.php">Retour à l'accueil</a></p>

<?php echo $_smarty_tpl->getSubTemplate ("includes/bas.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
