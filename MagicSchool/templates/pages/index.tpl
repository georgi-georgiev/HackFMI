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
        <script>
			var CONFIG_HOST='{$CONFIG_HOST}';
			var uid='{$user_info.Id}';
		</script>
	</head>
	<body>
		<div id="container" class="container" >
		{$result}
			<div id="menu">
				{if !$user_info}
				{include file='pages/login.tpl'}
				{include file='pages/register.tpl'}
				{else}
				{if $user_info.access_level eq '1'}
				<a href="{$CONFIG_HOST}/index.php?page=register">register</a>
				{/if}
				{/if}
			</div>
			{if $page eq 'student'} {include file='templates/pages/student.tpl'}{/if}
			{if $page eq 'choose_hero'} {include file='templates/pages/choose_type.tpl'}{/if}
			{if $page eq 'teacher' and $user_info.Access_level eq '2'} {include file='templates/pages/teacher.tpl'}{/if}
			{if $page eq 'admin_class' and $user_info.Access_level eq '1'}{include file='templates/pages/admin_class.tpl'}{/if}
		</div>
	</body>
</html>
