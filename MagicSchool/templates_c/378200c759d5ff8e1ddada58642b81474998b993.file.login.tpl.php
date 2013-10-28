<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 06:05:01
         compiled from "./templates/pages/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:926319165526bb03ac63468-33824863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '378200c759d5ff8e1ddada58642b81474998b993' => 
    array (
      0 => './templates/pages/login.tpl',
      1 => 1382853899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '926319165526bb03ac63468-33824863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526bb03ac714b0_88288755',
  'variables' => 
  array (
    'CONFIG_HOST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526bb03ac714b0_88288755')) {function content_526bb03ac714b0_88288755($_smarty_tpl) {?><div class="well login">
<form class="form-signin" action="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
" method="post">
	<h2 class="form-signin-heading">Моля, впишете се</h2>
	<div class="form-group">
	<input type="text" name="username" class="form-control" placeholder="Потребителско име" autofocus="">
	</div>
	<div class="form-group">
	<input type="password" name="password" class="form-control" placeholder="Парола"/>
	</div>
	<input class="btn btn-primary btn-lg btn-block" type="submit" name="login" value="Вход"  />
</form>
</div>
<?php }} ?>