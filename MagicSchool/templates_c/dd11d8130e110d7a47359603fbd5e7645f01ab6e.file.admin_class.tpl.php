<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 10:42:51
         compiled from "templates/pages/admin_class.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1724951406526c201ca9b6e7-07066050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd11d8130e110d7a47359603fbd5e7645f01ab6e' => 
    array (
      0 => 'templates/pages/admin_class.tpl',
      1 => 1382870569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1724951406526c201ca9b6e7-07066050',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526c201cc370d7_00203221',
  'variables' => 
  array (
    'CONFIG_HOST' => 0,
    'page' => 0,
    'action' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526c201cc370d7_00203221')) {function content_526c201cc370d7_00203221($_smarty_tpl) {?>
<form action="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
" method="post">
<table>
<tr>
	<td>
		<div class="input-group">	
			<span class="input-group-addon">Име на клас</span>		
			<input type="text" name="name" class="form-control" />
	    </div>
    </td>
    <td>
        <input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" />
        <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
        <input class="btn btn-primary btn" type="submit" name="save" style="margin-top:0 !important" value="Добави класа" />
    </td>
    </tr>
</table>
<br />
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Списък от всички класове</div>
  <table class="table">
  	<td>
		<tr>
			<th>#</th>
			<th>Име</th>
			<th>Списък с учениците</th>
			<th>Изтриване на клас</th>
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
/?page=teacher&action=get_users&flag=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Id'];?>
">Покажи списъкът от ученици</a>
			</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&flag=delete&id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Id'];?>
">Изтрий</a></td>
		</tr>
	<?php endfor; endif; ?>
	</td>
  </table>
</div>

<?php }} ?>