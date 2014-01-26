<?php /* Smarty version Smarty-3.1.16, created on 2014-01-26 14:48:14
         compiled from "vues\suppression.php" */ ?>
<?php /*%%SmartyHeaderCode:265952e5121e410346-67771704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a15bfbca5683d48cdd7114833575c9bd77a9b59e' => 
    array (
      0 => 'vues\\suppression.php',
      1 => 1390725579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265952e5121e410346-67771704',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52e5121e4607c5_62436241',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e5121e4607c5_62436241')) {function content_52e5121e4607c5_62436241($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("includes/haut.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<h2>Suppression d'un article</h2>
<p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
<p><a href="index.php">Retour à l'accueil</a></p>

<?php echo $_smarty_tpl->getSubTemplate ("includes/bas.inc.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
