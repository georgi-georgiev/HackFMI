<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 09:30:26
         compiled from "templates/pages/teacher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:792186286526bb0c0b82b61-84223292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8baf249abcb987c326cc4d0a17a58909216b599' => 
    array (
      0 => 'templates/pages/teacher.tpl',
      1 => 1382865715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '792186286526bb0c0b82b61-84223292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526bb0c0c3ea28_45370812',
  'variables' => 
  array (
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526bb0c0c3ea28_45370812')) {function content_526bb0c0c3ea28_45370812($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='code_list'){?> <?php echo $_smarty_tpl->getSubTemplate ('templates/pages/code_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='get_users'){?><?php echo $_smarty_tpl->getSubTemplate ('templates/pages/get_users.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['action']->value=='attach_to_class'){?><?php echo $_smarty_tpl->getSubTemplate ('templates/pages/atach_to_class.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='questions'){?><?php echo $_smarty_tpl->getSubTemplate ('templates/pages/questions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<?php }} ?>