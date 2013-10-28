
<form action="{$CONFIG_HOST}" method="post">
<table>
<tr>
	<td>
		<div class="input-group">	
			<span class="input-group-addon">Име на клас</span>		
			<input type="text" name="name" class="form-control" />
	    </div>
    </td>
    <td>
        <input type="hidden" name="page" value="{$page}" />
        <input type="hidden" name="action" value="{$action}" />
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
		{section loop=$list name=val}
		<tr>
			<td>{$smarty.section.val.index + 1}</td>
			<td>{$list[val].Name}</td>
			<td>
				<a href="{$CONFIG_HOST}/?page=teacher&action=get_users&flag={$list[val].Id}">Покажи списъкът от ученици</a>
			</td>
			<td><a href="{$CONFIG_HOST}/?page={$page}&action={$action}&flag=delete&id={$list[val].Id}">Изтрий</a></td>
		</tr>
	{/section}
	</td>
  </table>
</div>

