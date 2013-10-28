<div id="dialog">
</div>
<table class="table">
{section loop=$list name=val}
<tr>
	<td>{$list[val].name} ви изпрати въпрос</td><td><button onclick="showQuestion('{$list[val].question}','{$list[val].time}','{$list[val].id}')" class="btn">Виж</button></td>
</tr>
{/section}
</table>
{literal}
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
{/literal}