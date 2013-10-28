<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 14:31:55
         compiled from "templates/pages/questions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1044272278526cdd32d1b774-42790525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb78940c375e71e66a60ffe390e1b2474f1976ed' => 
    array (
      0 => 'templates/pages/questions.tpl',
      1 => 1382882985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1044272278526cdd32d1b774-42790525',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526cdd32d4adf3_91807585',
  'variables' => 
  array (
    'flag' => 0,
    'CONFIG_HOST' => 0,
    'classes' => 0,
    'page' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526cdd32d4adf3_91807585')) {function content_526cdd32d4adf3_91807585($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['flag']->value=='add'){?>
<div class="well register">
	<div class="centered">
	<form class="form-signin" method="post" action="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
">
		<div class="input-group-lg">
		<input class="form-control" type="text" name="quest" placeholder="Въпрос" autofocus><br />
	</div>
		<div class="input-group">
			<div class="input-group-addon">Верен?</div>
			<span class="form-control">Отговор</span>
		</div>
		<div class="input-group">
			<div class="input-group-addon"><input type="radio" name="right_answer" value="0"></div>
			<input class="form-control" type="text" name="answers[]" placeholder="Отговор 1">
		</div>

		<div class="input-group">
			<div class="input-group-addon"><input type="radio" name="right_answer" value="1"></div>
			<input class="form-control" type="text" name="answers[]" placeholder="Отговор 2">
		</div>

		<div class="input-group">
			<div class="input-group-addon"><input type="radio" name="right_answer" value="2"></div>
			<input class="form-control" type="text" name="answers[]" placeholder="Отговор 3">
		</div>

		<div class="input-group">
			<div class="input-group-addon"><input type="radio" name="right_answer" value="3"></div>
			<input class="form-control" type="text" name="answers[]" placeholder="Отговор 4">
		</div>

		<br />
		<input class="form-control" placeholder="Време" type="text" name="time">
		<br />
		<input class="form-control" placeholder="Точки опит (XP)" type="text" name="xp">
		<br />
		<input class="form-control" placeholder="Точки за умения (AP)" type="text" name="ap">
		<br />
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['val'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['val']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['classes']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['name'] = 'val';
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total']);
?>
					<li><a href="#">
						<label><input type="checkbox" name="classes[]" value="<?php echo $_smarty_tpl->tpl_vars['classes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['classes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Name'];?>
</label>
					</a></li>
				<?php endfor; endif; ?>
				</ul>
			</div>
		</nav>
		<input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
		<input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
		<input type="hidden" name="flag" value="<?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
"><br />
		<input class= "btn btn-primary btn-block" type="submit" name="save" value="Публикувай Въпрос">
	</form>
	</div>
</div>
<?php }?>
<br />

<?php }} ?>