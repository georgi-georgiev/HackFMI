<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 05:21:12
         compiled from "templates/pages/teachers_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:763047558526ca104aacc91-91942955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7580ab0cd00804f2c6754834b30122533409bc97' => 
    array (
      0 => 'templates/pages/teachers_list.tpl',
      1 => 1382851269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '763047558526ca104aacc91-91942955',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526ca104bd77c9_12172582',
  'variables' => 
  array (
    'list' => 0,
    'CONFIG_HOST' => 0,
    'page' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526ca104bd77c9_12172582')) {function content_526ca104bd77c9_12172582($_smarty_tpl) {?><div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Списък от класовете, които администрирам</div>
  <table class="table">
  	<td>
		<tr>
			<th>#</th>
			<th>Име</th>
			<th>Списък с класовете, на които води</th>
			<th>Изтриване на учител</th>
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
			<td><?php if (!$_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['classes']){?>Този учител не води на никой клас<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['val1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['classes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['name'] = 'val1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total']);
?>
               <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['classes'][$_smarty_tpl->getVariable('smarty')->value['section']['val1']['index']]['Name'];?>
<?php ob_start();?><?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['val1']['last']){?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
,<?php }?>
               <?php endfor; endif; ?>
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