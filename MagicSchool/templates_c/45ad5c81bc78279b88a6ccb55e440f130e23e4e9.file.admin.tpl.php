<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 05:13:38
         compiled from "templates/pages/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:480819991526c8f43ed17c0-34232751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45ad5c81bc78279b88a6ccb55e440f130e23e4e9' => 
    array (
      0 => 'templates/pages/admin.tpl',
      1 => 1382850815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '480819991526c8f43ed17c0-34232751',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526c8f43f10318_24290181',
  'variables' => 
  array (
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526c8f43f10318_24290181')) {function content_526c8f43f10318_24290181($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='register'){?> <?php echo $_smarty_tpl->getSubTemplate ('templates/pages/register.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='admin_class'){?><?php echo $_smarty_tpl->getSubTemplate ('templates/pages/admin_class.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='teachers_list'){?><?php echo $_smarty_tpl->getSubTemplate ('templates/pages/teachers_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<?php }} ?>