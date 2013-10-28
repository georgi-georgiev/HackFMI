<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 14:56:44
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133259156526bb03abb44e4-82704651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1382885800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133259156526bb03abb44e4-82704651',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526bb03ac5c495_47326667',
  'variables' => 
  array (
    'CONFIG_HOST' => 0,
    'user_info' => 0,
    'result' => 0,
    'error' => 0,
    'action' => 0,
    'new_messages' => 0,
    'new_questions' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526bb03ac5c495_47326667')) {function content_526bb03ac5c495_47326667($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Magic School</title>
		<script src="../scripts/jquery-2.0.3.js"></script>
		<script src="../scripts/rsvp.min.js"></script>
		<script src="../scripts/httpRequester.js"></script>
		<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../styles/index.css" />
		<link rel="stylesheet" type="text/css" href="../styles/overridebootstrap.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css" />
        <script>
			var CONFIG_HOST='<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
';
			var uid='<?php echo $_smarty_tpl->tpl_vars['user_info']->value['Id'];?>
';
			
		</script>
        
        
	</head>
	<body>
		<div id="container" class="container" >
        <div id="success-msg" class="success">
            <?php echo $_smarty_tpl->tpl_vars['result']->value;?>

        </div>
        <div id="error-msg" class="error">
            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

        </div>
		
        <script>
		$('#error-msg').hide();
		$('#success-msg').hide();
		</script>
        
		<?php if ($_smarty_tpl->tpl_vars['result']->value){?>
            
            <script>
				$("#success-msg").show();;
                        setTimeout(function(){
                            $("#success-msg").hide();
                        },5000);
            </script>
            
        <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['error']->value){?>
            
            <script>
				$("#error-msg").show();;
                        setTimeout(function(){
                            $("#error-msg").hide();
                        },5000);
            </script>
            
        <?php }?>
			<div id="menu">
				<?php if (!$_smarty_tpl->tpl_vars['user_info']->value){?>
    				<?php echo $_smarty_tpl->getSubTemplate ('pages/login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    				<?php echo $_smarty_tpl->getSubTemplate ('pages/register.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['user_info']->value['Access_level']=='1'){?>
                <nav class="navbar navbar-inverse" role="navigation" style="width: 100%;">
                    <div class="navbar-header" style="width: 100%;">
                        <!--Admin's Menu-->
                        <ul ul class="nav navbar-nav" style="width: 98%;">
                            <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='register'){?> class='active' <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=admin&action=register">
                                    <span class="glyphicon glyphicon-user"></span>
                                    Добави нов учител
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='admin_class'){?> class='active' <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=admin&action=admin_class">
                                    <span class="glyphicon glyphicon-list"></span>
                                    Добави нов клас
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='teachers_list'){?> class='active' <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=admin&action=teachers_list">
                                    <span class="glyphicon glyphicon-briefcase"></span>
                                    Списък с учители
                                </a>
                            </li>
                            <li class="pull-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/index.php?page=logout">
                                    Изход
                                    <span class="glyphicon glyphicon-off"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
             <?php }?>
             <?php if ($_smarty_tpl->tpl_vars['user_info']->value['Access_level']=='2'){?> 
                <nav class="navbar navbar-inverse" role="navigation" style="width: 100%;">
                    <div class="navbar-header" style="width: 100%;">
                        <!--Teacher's Menu-->
                        <ul ul class="nav navbar-nav" style="width: 98%;">
                            <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='code_list'){?> class='active' <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=teacher&action=code_list">
                                    <span class="glyphicon glyphicon-barcode"></span>
                                    Генериране на кодове
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='get_users'){?> class='active' <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=teacher&action=get_users">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                    Ученици
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='attach_to_class'){?> class='active' <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=teacher&action=attach_to_class">
                                    <span class="glyphicon glyphicon-book"></span>
                                    Добави ме към клас
                                </a>
                            </li>
                            <li <?php if ($_smarty_tpl->tpl_vars['action']->value=='questions'){?> class='active' <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=teacher&action=questions&flag=add">
                                    <span class="glyphicon glyphicon-question-sign"></span>
                                    Създаване на въпрос
                                </a>
                            </li>
                            <li class="pull-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/index.php?page=logout">
                                    Изход
                                    <span class="glyphicon glyphicon-off"></span>
                                </a>
                            </li>
                            </ul>
                    </div>
                </nav>       
            <?php }?>     
            <?php if ($_smarty_tpl->tpl_vars['user_info']->value['Access_level']=='3'){?> 
                <nav class="navbar navbar-inverse" role="navigation" style="width: 100%;">
                    <div class="navbar-header" style="width: 100%;">
                        <ul ul class="nav navbar-nav" style="width: 98%;">
                            <li class="pull-left">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
">
                                    <span class="glyphicon glyphicon-user"></span>
                                    Профил
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=student_messages">
                                <span class="glyphicon glyphicon-envelope"></span>
                                    <?php if ($_smarty_tpl->tpl_vars['new_messages']->value){?>
                                        Нови Съобщения
                                        <span class="badge"><?php echo $_smarty_tpl->tpl_vars['new_messages']->value;?>
</span>
                                    <?php }else{ ?>
                                        Съобщения
                                    <?php }?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/?page=student_questions">
                                    <span class="glyphicon glyphicon-bell"></span>
                                    Въпроси 
                                    <?php if ($_smarty_tpl->tpl_vars['new_questions']->value){?>
                                        <span class="badge"><?php echo $_smarty_tpl->tpl_vars['new_questions']->value;?>
</span>
                                    <?php }?>
                                </a>
                            </li>
                            <li class="pull-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/index.php?page=logout">
                                    Изход
                                    <span class="glyphicon glyphicon-off"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>       
            <?php }?>     
            <?php if ($_smarty_tpl->tpl_vars['page']->value=='student'){?> <?php echo $_smarty_tpl->getSubTemplate ('templates/pages/student.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value=='choose_hero'){?> <?php echo $_smarty_tpl->getSubTemplate ('templates/pages/choose_type.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value=='teacher'&&$_smarty_tpl->tpl_vars['user_info']->value['Access_level']!='3'){?> <?php echo $_smarty_tpl->getSubTemplate ('templates/pages/teacher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value=='admin'&&$_smarty_tpl->tpl_vars['user_info']->value['Access_level']=='1'){?><?php echo $_smarty_tpl->getSubTemplate ('templates/pages/admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['page']->value=='student_questions'){?> <?php echo $_smarty_tpl->getSubTemplate ('templates/pages/student_questions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['page']->value=='student_messages'){?> <?php echo $_smarty_tpl->getSubTemplate ('templates/pages/student_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }?>
			</div>
		</div>
	</body>
</html>
<?php }} ?>