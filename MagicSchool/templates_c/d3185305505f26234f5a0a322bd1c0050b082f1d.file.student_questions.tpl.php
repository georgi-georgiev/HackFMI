<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 15:38:12
         compiled from "templates/pages/student_questions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1708562128526cf09b436a72-61405558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3185305505f26234f5a0a322bd1c0050b082f1d' => 
    array (
      0 => 'templates/pages/student_questions.tpl',
      1 => 1382888288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1708562128526cf09b436a72-61405558',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526cf09b4fb850_95509585',
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526cf09b4fb850_95509585')) {function content_526cf09b4fb850_95509585($_smarty_tpl) {?><div id="dialog">
</div>
<table class="table">
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
	<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['name'];?>
 ви изпрати въпрос</td><td><button onclick="showQuestion('<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['question'];?>
','<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['time'];?>
','<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['id'];?>
')" class="btn">Виж</button></td>
</tr>
<?php endfor; endif; ?>
</table>

<script>
	var interval;

	function sendAnswer(aid, qid){
		requester.getJSON("api.php/send_answer/"+aid+"/"+qid+"/"+uid).then(function(data){
			$("#dialog").dialog("close");
    		clearInterval(interval);
    		if(data.success){
    			$("#success-msg").text(data.status);
    			if(data.result){
    				$("#success-msg").text(data.status+data.result);
    			}
				$("#success-msg").show();;
                        setTimeout(function(){
                            $("#success-msg").hide();
                        },5000);
    		}
    		else
    		{
    			$("#error-msg").text(data.status);
				$("#error-msg").show();;
                        setTimeout(function(){
                            $("#error-msg").hide();
                        },5000);
    		}
		},function(error){

		}).then(function(){
			setInterval(function(){
				location.reload();
			}, 2000);
		});
	}
	
	function showQuestion(question, time, qid){
		$("#dialog").html("");
		clearInterval(interval);
		$("#dialog").append("<p>Въпрос: "+question+"</p>");
		$("#dialog").append("<p>Време за отговор: "+time+"</p>");
		requester.getJSON("api.php/get_answers/"+qid+"/"+uid).then(function(data){
			for(var i=0; i<data.length;i++){
				$("#dialog").append('<div class="question" onclick="sendAnswer('+data[i].id+', '+data[i].quest_id+');">'+data[i].answer+'</div>');
			}
			return data;
		},function(){
			console.log("error");
		}).then(function(data){
			$("#dialog").append('<div id="timer"></div>');
		    $("#dialog").dialog();
		    var count=0;
		    interval = setInterval(function(){
		    	if(count==time){
		    		$("#dialog").dialog("close");
		    		clearInterval(interval);
		    		return;
		    	}
		    	count++;
		    	$("#timer").text("Остават: "+(time-count));
		    }, 1000);
		});
	}
  </script>
<?php }} ?>