<div class="panel panel-default">
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
		{section loop=$list name=val}
		<tr>
			<td>{$smarty.section.val.index + 1}</td>
			<td>{$list[val].Name}</td>
			<td>{if !$list[val].classes}Този учител не води на никой клас{/if}
				{section loop=$list[val].classes name=val1}
               {$list[val].classes[val1].Name}{{if !$smarty.section.val1.last}},{/if}
               {/section}
			</td>
			<td><a href="{$CONFIG_HOST}/?page={$page}&action={$action}&flag=delete&id={$list[val].Id}">Изтрий</a></td>
		</tr>
	{/section}
	</td>
  </table>
</div>
