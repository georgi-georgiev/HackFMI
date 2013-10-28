<form action="{$CONFIRM_HOST}" method="get" id="character_type">
<input type="hidden" name="type" id="type"/>
</form>


<div id="container">
    <div id="wrapper-character">
        <div class="content">
            <h1>Здравейте, {$user_info.Name}!</h1>
            <span>
                За да започнеш приключението си в нашата платформа, първо трябва да избереш типа на своя герой. Всеки герой има уникални специални умения.
            </span>
        </div>
        <div class="characters">
            <a id="spellcaster" href="javascript:void(0)" onclick="Send_form('1')">
                <img src="{$CONFIG_HOST}/img/characters/spellcaster-small.jpg">
            </a>
            <a id="warrior" href="javascript:void(0)" onclick="Send_form('2')">
                <img src="{$CONFIG_HOST}/img/characters/warrior-small.jpg">
            </a>
            <a id="ranger" href="javascript:void(0)" onclick="Send_form('3')">
                <img src="{$CONFIG_HOST}/img/characters/ranger-small.jpg">
            </a>
        </div>
    </div>
</div>



{literal}
<script>
function Send_form(type) {
	$('#type').val(type);
	$('#character_type').submit();
	
}
</script>
{/literal}