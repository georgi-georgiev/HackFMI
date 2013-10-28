<div class="well" style="width: 50%;margin-left: 25%">
	<form class="form-signin" action="{$CONFIG_HOST}" method="post">
		<div class="form-group input-group input-group-lg">
			<span class="input-group-addon fixed-width">Точки опит (XP Points)</span>
			<input class="form-control" type="text" name="xp" value="{$xp}" autofocus/>
		</div>
		<div class="form-group input-group input-group-lg">
			<span class="input-group-addon fixed-width">Точки за умения (AP Points)</span>
			<input class="form-control" type="text" name="ap" value="{$ap}" />
		</div>
		<div class="input-group input-group-lg">	
			<span class="input-group-addon fixed-width">Брой кодове за генериране</span>
			<input class="form-control" type="text" name="count" value="{$count}" />
		</div>

		<input type="hidden" name="page" value="{$page}" />
		<input type="hidden" name="action" value="{$action}" />
		<input class="btn btn-primary btn-block btn-lg" type="submit" name="generate" value="Генерирай" />
	</form>
	<a class="btn btn-success btn-lg btn-block" id="download" href="javascript:void(0);">Сваляне на последно създадени кодове</a> 
</div>
  <br />
  <br />
{if $list}
<div class="panel panel-default" style="width: 20%;margin-left: 40%;">
  <!-- Default panel contents -->
  <div class="panel-heading">Генерирани Кодове</div>
  <table class="table">
  	<td>
		<tr>
			<th>#</th>
			<th>Код</th>
		</tr>
		{section loop=$list name=val}
		<tr>
			<td>{$smarty.section.val.index + 1}</td>
			<td>{$list[val]}</td>
		</tr>
	{/section}
	</td>
  </table>
</div>
{/if}
{literal}
<script>
$('#download').attr({target: '_blank', 
                    href  : CONFIG_HOST+'/uploads/generated_codes/codes_'+uid+'.txt'});
</script>
{/literal}