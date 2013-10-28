<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
			var CONFIG_HOST='{$CONFIG_HOST}';
			var uid='{$user_info.Id}';
			
		</script>
        
        
	</head>
	<body>
		<div id="container" class="container" >
        <div id="success-msg" class="success">
            {$result}
        </div>
        <div id="error-msg" class="error">
            {$error}
        </div>
		{literal}
        <script>
		$('#error-msg').hide();
		$('#success-msg').hide();
		</script>
        {/literal}
		{if $result}
            {literal}
            <script>
				$("#success-msg").show();;
                        setTimeout(function(){
                            $("#success-msg").hide();
                        },5000);
            </script>
            {/literal}
        {/if}
		{if $error}
            {literal}
            <script>
				$("#error-msg").show();;
                        setTimeout(function(){
                            $("#error-msg").hide();
                        },5000);
            </script>
            {/literal}
        {/if}
			<div id="menu">
				{if !$user_info}
    				{include file='pages/login.tpl'}
    				{include file='pages/register.tpl'}
				{/if}
            {if $user_info.Access_level eq '1'}
                <nav class="navbar navbar-inverse" role="navigation" style="width: 100%;">
                    <div class="navbar-header" style="width: 100%;">
                        <!--Admin's Menu-->
                        <ul ul class="nav navbar-nav" style="width: 98%;">
                            <li {if $action eq 'register'} class='active' {/if}>
                                <a href="{$CONFIG_HOST}/?page=admin&action=register">
                                    <span class="glyphicon glyphicon-user"></span>
                                    Добави нов учител
                                </a>
                            </li>
                            <li {if $action eq 'admin_class'} class='active' {/if}>
                                <a href="{$CONFIG_HOST}/?page=admin&action=admin_class">
                                    <span class="glyphicon glyphicon-list"></span>
                                    Добави нов клас
                                </a>
                            </li>
                            <li {if $action eq 'teachers_list'} class='active' {/if}>
                                <a href="{$CONFIG_HOST}/?page=admin&action=teachers_list">
                                    <span class="glyphicon glyphicon-briefcase"></span>
                                    Списък с учители
                                </a>
                            </li>
                            <li class="pull-right">
                                <a href="{$CONFIG_HOST}/index.php?page=logout">
                                    Изход
                                    <span class="glyphicon glyphicon-off"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
             {/if}
             {if $user_info.Access_level eq '2'} 
                <nav class="navbar navbar-inverse" role="navigation" style="width: 100%;">
                    <div class="navbar-header" style="width: 100%;">
                        <!--Teacher's Menu-->
                        <ul ul class="nav navbar-nav" style="width: 98%;">
                            <li {if $action eq 'code_list'} class='active' {/if}>
                                <a href="{$CONFIG_HOST}/?page=teacher&action=code_list">
                                    <span class="glyphicon glyphicon-barcode"></span>
                                    Генериране на кодове
                                </a>
                            </li>
                            <li {if $action eq 'get_users'} class='active' {/if}>
                                <a href="{$CONFIG_HOST}/?page=teacher&action=get_users">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                    Ученици
                                </a>
                            </li>
                            <li {if $action eq 'attach_to_class'} class='active' {/if}>
                                <a href="{$CONFIG_HOST}/?page=teacher&action=attach_to_class">
                                    <span class="glyphicon glyphicon-book"></span>
                                    Добави ме към клас
                                </a>
                            </li>
                            <li {if $action eq 'questions'} class='active' {/if}>
                                <a href="{$CONFIG_HOST}/?page=teacher&action=questions&flag=add">
                                    <span class="glyphicon glyphicon-question-sign"></span>
                                    Създаване на въпрос
                                </a>
                            </li>
                            <li class="pull-right">
                                <a href="{$CONFIG_HOST}/index.php?page=logout">
                                    Изход
                                    <span class="glyphicon glyphicon-off"></span>
                                </a>
                            </li>
                            </ul>
                    </div>
                </nav>       
            {/if}     
            {if $user_info.Access_level eq '3'} 
                <nav class="navbar navbar-inverse" role="navigation" style="width: 100%;">
                    <div class="navbar-header" style="width: 100%;">
                        <ul ul class="nav navbar-nav" style="width: 98%;">
                            <li class="pull-left">
                                <a href="{$CONFIG_HOST}">
                                    <span class="glyphicon glyphicon-user"></span>
                                    Профил
                                </a>
                            </li>
                            <li>
                                <a href="{$CONFIG_HOST}/?page=student_messages">
                                <span class="glyphicon glyphicon-envelope"></span>
                                    {if $new_messages}
                                        Нови Съобщения
                                        <span class="badge">{$new_messages}</span>
                                    {else}
                                        Съобщения
                                    {/if}
                                </a>
                            </li>
                            <li>
                                <a href="{$CONFIG_HOST}/?page=student_questions">
                                    <span class="glyphicon glyphicon-bell"></span>
                                    Въпроси 
                                    {if $new_questions}
                                        <span class="badge">{$new_questions}</span>
                                    {/if}
                                </a>
                            </li>
                            <li class="pull-right">
                                <a href="{$CONFIG_HOST}/index.php?page=logout">
                                    Изход
                                    <span class="glyphicon glyphicon-off"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>       
            {/if}     
            {if $page eq 'student'} {include file='templates/pages/student.tpl'}{/if}
			{if $page eq 'choose_hero'} {include file='templates/pages/choose_type.tpl'}{/if}
			{if $page eq 'teacher' and $user_info.Access_level ne '3' } {include file='templates/pages/teacher.tpl'}{/if}
			{if $page eq 'admin' and $user_info.Access_level eq '1'}{include file='templates/pages/admin.tpl'}{/if}
            {if $page eq 'student_questions'} {include file='templates/pages/student_questions.tpl'} {/if}
            {if $page eq 'student_messages'} {include file='templates/pages/student_messages.tpl'} {/if}
			</div>
		</div>
	</body>
</html>
