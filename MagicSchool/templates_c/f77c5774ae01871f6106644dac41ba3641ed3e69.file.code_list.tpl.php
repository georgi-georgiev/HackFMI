<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 18:14:33
         compiled from "templates/pages/code_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:617641583526bb0ef2dba62-95849026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f77c5774ae01871f6106644dac41ba3641ed3e69' => 
    array (
      0 => 'templates/pages/code_list.tpl',
      1 => 1382897671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '617641583526bb0ef2dba62-95849026',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526bb0ef3c1710_00102459',
  'variables' => 
  array (
    'CONFIG_HOST' => 0,
    'xp' => 0,
    'ap' => 0,
    'count' => 0,
    'page' => 0,
    'action' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526bb0ef3c1710_00102459')) {function content_526bb0ef3c1710_00102459($_smarty_tpl) {?>﻿<div class="well" style="width: 50%;margin-left: 25%">
	<form class="form-signin" action="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
" method="post">
		<div class="form-group input-group input-group-lg">
			<span class="input-group-addon fixed-width">Точки опит (XP Points)</span>
			<input class="form-control" type="text" name="xp" value="<?php echo $_smarty_tpl->tpl_vars['xp']->value;?>
" autofocus/>
		</div>
		<div class="form-group input-group input-group-lg">
			<span class="input-group-addon fixed-width">Точки за умения (AP Points)</span>
			<input class="form-control" type="text" name="ap" value="<?php echo $_smarty_tpl->tpl_vars['ap']->value;?>
" />
		</div>
		<div class="input-group input-group-lg">	
			<span class="input-group-addon fixed-width">Брой кодове за генериране</span>
			<input class="form-control" type="text" name="count" value="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" />
		</div>

		<input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" />
		<input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
		<input class="btn btn-primary btn-block btn-lg" type="submit" name="generate" value="Генерирай" />
	</form>
	<a class="btn btn-success btn-lg btn-block" id="download" href="javascript:void(0);">Сваляне на последно създадени кодове</a> 
</div>
  <br />
  <br />
<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="panel panel-default" style="width: 20%;margin-left: 40%;">
  <!-- Default panel contents -->
  <div class="panel-heading">Генерирани Кодове</div>
  <table class="table">
  	<td>
		<tr>
			<th>#</th>
			<th>Код</th>
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
			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']];?>
</td>
		</tr>
	<?php endfor; endif; ?>
	</td>
  </table>
</div>
<?php }?>

<script>
$('#download').attr({target: '_blank', 
                    href  : CONFIG_HOST+'/uploads/generated_codes/codes_'+uid+'.txt'});
</script>
<?php }} ?>