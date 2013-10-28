<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 12:05:42
         compiled from "templates/pages/atach_to_class.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1872324022526bb0f45e6420-39395487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eacdc7091562fb132943616877c4f508a81d4947' => 
    array (
      0 => 'templates/pages/atach_to_class.tpl',
      1 => 1382875538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1872324022526bb0f45e6420-39395487',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526bb0f46c6f06_31928885',
  'variables' => 
  array (
    'CONFIG_HOST' => 0,
    'classes' => 0,
    'page' => 0,
    'action' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526bb0f46c6f06_31928885')) {function content_526bb0f46c6f06_31928885($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/srv/disk9/1373333/www/magicschool.g-georgiev.com/lib/smarty/plugins/function.html_options.php';
?><br />
<form action="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
" method="post">
<table>
<tr>
<td>
	<div class="input-group input-group-lg">	
		<span class="input-group-addon fixed-width">Моля изберете клас</span>		
		<select name="classes" class="form-control class-select">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['classes']->value),$_smarty_tpl);?>

		</select>
    </div>
    </td>
    <td>
        <input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" />
        <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
        <input class="btn btn-primary btn-lg" type="submit" name="save" style="margin-top:0 !important" value="Добави ме в този клас" />
        </td>
        </tr>
        </table>
</form>

<br />
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Списък от класовете, които администрирам</div>
  <table class="table">
  	<td>
		<tr>
			<th>#</th>
			<th>Име</th>
			<th>Списък с учениците</th>
			<th>Изключване от клас</th>
		</tr>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['val'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['val']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<tr>
			<td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['val']['index']+1;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Name'];?>
</td>
			<td>
				<a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&action=get_users&flag=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Id'];?>
">Покажи списъкът от ученици</a>
			</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&flag=delete&id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Id'];?>
">Изключи ме!</a></td>
		</tr>
	<?php endfor; endif; ?>
	</td>
  </table>
</div>

<?php }} ?>