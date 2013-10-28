<br />
{literal}
<script>
function Get_users() {
	var id=$('#class_id').val();
	window.location=CONFIG_HOST+'/?page=teacher&action=get_users&flag='+id;
	
}
</script>
{/literal}
<div class="input-group input-group-lg">	
	<span class="input-group-addon fixed-width">Моля изберете клас</span>		
    <select onchange="Get_users();" id="class_id" class="form-control class-select">
    <option value="0" selected="selected">{$lang.select}</option>
        {html_options options=$classes selected=$flag}    
    </select>
</div>
        <div id="description" style="position: fixed; z-index: 1; background: #000; opacity: 0.8; color: white; padding: 6px 8px; width: 200px; display: none;"></div>

<div class="row">
	<div class="span4 offset4">
		{if $list}<table class="students">
		<thead>
			<tr>
				<th class="name">Име</th>
				<th class="character-info">Информация</th>
				<th class="spells">Умения</th>
				<th class="appoints">Точки действие</th>
			</tr>
		</thead>
		{section loop=$list name=val}
		<tr class="{cycle values="odd,even"}">
			<td>{$list[val].Name}</td>
			<td>{$list[val].character_name}<br /> <span class="span_level">Ниво : {$list[val].level}</span>
			</td>
			<td class="td">
			{section loop=$list[val].skills name=val1}
				<div onmouseover="showDescription('{$list[val].skills[val1].Name}','{$list[val].skills[val1].Description}','{$list[val].skills[val1].Ap}')" onmouseout="removeDescription()" style="margin:2px;">
					<img skillid="{$list[val].skills[val1].Id}" class="skillicon"src="{$CONFIG_HOST}/{$list[val].skills[val1].src}" onclick="onSkillClick('{$list[val].Id}','{$list[val].skills[val1].Id}','{$list[val].skills[val1].Name}','{$user_info.Id}')"/>
				</div>
			{/section}
			</td>
			<td >
				<div id="{$list[val].Id}">
					{$list[val].Ap} ap
				</div>
			</td>
		</tr>	
		{/section}
		</table>
		{/if}
	<div>
</div>
{literal}
<script>
            function removeDescription()
            {
                $("#description").hide();
            }

            function showDescription(name,desc, ap)
            {

				var height = $(window).height();

				var X=event.clientX;
				var Y=event.clientY;
                var description = "<h3>"+name+"</h3><p>"+desc+"</p><p style='float:right'>"+ap+" ap</p>";
				$("#description").html(description);
				var desc_height=$("#description").height();
				if(Y+desc_height>height)Y=Y-desc_height;
				
				$("#description").css('left',X+10);
				$("#description").css('top',Y-10);
                $("#description").show();
            }

	function onSkillClick(uid,sid,name, tid){
		if (confirm('Сигурни ли сте че искате да изпълните '+name+'?')){
		requester.getJSON("api.php/use_skill/"+uid+"/"+sid+"/"+tid).then(function(data){
			console.log(data)
			if(data.success=="1"){
			$('#'+data.uid).html(data.Ap+" ap");
			$("#success-msg").html(data.status);	
			$("#success-msg").show();
             setTimeout(function(){
                 $("#success-msg").hide();
                 },5000);
			}else{
			$("#error-msg").html(data.status);	
			$("#error-msg").show();
             setTimeout(function(){
                 $("#error-msg").hide();
                 },5000);			}
		});
		}
	};
	
</script>
{/literal}




