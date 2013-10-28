<?php /* Smarty version Smarty-3.1.8, created on 2013-10-25 21:09:23
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4429526aa637a8ded5-15772789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43b807af9cc8df7d350c3baf9e47f167c9520a0' => 
    array (
      0 => 'index.tpl',
      1 => 1382728140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4429526aa637a8ded5-15772789',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526aa637b16a70_69921645',
  'variables' => 
  array (
    'user_info' => 0,
    'CONFIG_HOST' => 0,
    'page' => 0,
    'username' => 0,
    'password' => 0,
    'email' => 0,
    'name' => 0,
    'lang' => 0,
    'access_level' => 0,
    'classes' => 0,
    'class_in_school' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526aa637b16a70_69921645')) {function content_526aa637b16a70_69921645($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\hackfmi\\lib\\smarty\\plugins\\function.html_options.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php if (!$_smarty_tpl->tpl_vars['user_info']->value){?>
<form action="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
" >
<input type="text" name="username" />
<input type="password" name="password" />
<input type="submit" name="login" value="login" />
</form>
<?php }else{ ?>
<?php if ($_smarty_tpl->tpl_vars['user_info']->value['access_level']!=3){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/index.php?page=register">register</a>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['page']->value=='register'){?>
<form action="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
" >
username <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"/>
password <input type="password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" />
email <input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" />
name <input type="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" />
<select name="access_level">
<option value="1" selected="selected"><?php echo $_smarty_tpl->tpl_vars['lang']->value['director'];?>
</option>
<option value="2" <?php if ($_smarty_tpl->tpl_vars['access_level']->value==2){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['teacher'];?>
</option>
<option value="3" <?php if ($_smarty_tpl->tpl_vars['access_level']->value==3){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['student'];?>
</option>
</select>
<select name="class_in_school">
 	<option value="0" selected="selected"><?php echo $_smarty_tpl->tpl_vars['lang']->value['select'];?>
</option>
	<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['classes']->value,'selected'=>$_smarty_tpl->tpl_vars['class_in_school']->value),$_smarty_tpl);?>
    
</select>
<input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" />
<input type="submit" name="save" value="save" />
</form>

<?php }?>
<?php }?>
</body>
</html>
<?php }} ?>