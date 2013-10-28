<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 04:43:19
         compiled from "templates/pages/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:882403226526c8f5e8f7d92-68972088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fbff07719f8abd041c9e96d7dee1134cfb2da44' => 
    array (
      0 => 'templates/pages/register.tpl',
      1 => 1382848748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '882403226526c8f5e8f7d92-68972088',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526c8f5e989963_88017420',
  'variables' => 
  array (
    'user_info' => 0,
    'CONFIG_HOST' => 0,
    'username' => 0,
    'password' => 0,
    'name' => 0,
    'lang' => 0,
    'classes' => 0,
    'class_in_school' => 0,
    'page' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526c8f5e989963_88017420')) {function content_526c8f5e989963_88017420($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/srv/disk9/1373333/www/magicschool.g-georgiev.com/lib/smarty/plugins/function.html_options.php';
?><div class="well register">
	<h1><?php if ($_smarty_tpl->tpl_vars['user_info']->value['Access_level']==1){?>Добавяне на учител<?php }else{ ?>Регистрация<?php }?></h1>
	<form action="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
" method="post">
		<div class="form-group">
		<input class="form-control" type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" placeholder="Потребителско име"/>
		</div>
		<div class="form-group">
		<input class="form-control" type="password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" placeholder="Парола"/>
		</div>
		<input class="form-control" type="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" placeholder="Истинско име"/>

		<?php if (!$_smarty_tpl->tpl_vars['user_info']->value){?>
		<div class="form-group">
			<h4><span class="label label-default">Клас в училище</span></h4>
			<select name="class_in_school">
			 	<option value="0" selected="selected"><?php echo $_smarty_tpl->tpl_vars['lang']->value['select'];?>
</option>
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['classes']->value,'selected'=>$_smarty_tpl->tpl_vars['class_in_school']->value),$_smarty_tpl);?>
    
			</select>
		</div>
		<?php }?>
		<input class="form-control" type="hidden" name="page" value="<?php if ($_smarty_tpl->tpl_vars['page']->value=='index'){?>register<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
<?php }?>" />
        <?php if ($_smarty_tpl->tpl_vars['user_info']->value['Access_level']==1){?> <input type="hidden" name="access_level" value="2" /><?php }?>
		<input class="form-control" type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
		<input class="btn btn-success btn-lg btn-block" type="submit" name="register" value="Регистрирай  <?php if (!$_smarty_tpl->tpl_vars['user_info']->value){?>се<?php }?>" />
	</form>
</div>
<?php }} ?>