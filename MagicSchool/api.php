<?php
require 'lib/Slim/Slim.php';
include ("inc/config.php");
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
//$app->add(new \Slim\Middleware\ContentTypes());
$app->contentType('application/json');

$app->get(
    '/user_info/:id',
    function ($id) {
	   global $db;
	   $info=array();
       $info=$db->getrow("Select users.*,characters.Name as character_name,characters.src from users,characters where users.Character_type=characters.Id and users.Id=$id");
	   $info['skills']=$db->getall("Select * from users_has_skills where Users_Id=".$info['Id']);
	   echo json_encode($info);
	   exit;
	   
    }
);

$app->get(
	'/character_skills/:id',
	function ($id) {
	   global $db;
	   $info=array();
	   $cid=$db->getone("Select Character_type from users where id=$id");
	   $info=$db->getall("Select * from characters_has_skills,skills where skills.Id=characters_has_skills.Skills_Id and Characters_Id=$cid order by skills.Id desc");
	   for($i=0;$info[$i];$i++) {
			$info[$i]['parent']=$db->getall("select skills.* from skillsparents,skills where skillsparents.skillid=".$info[$i]['Id']." and skillsparents.ParentId=skills.Id");   
		   
	   }
	   echo json_encode($info);
	   exit;
	}
	);

$app->get(
	'/get_skill/:uid/:sid',
	function ($uid,$sid) {
		global $db;
		$user_info=$db->getrow("Select * from users where id=$uid");
		$data=array();
		if($db->getrow("Select * from users_has_skills where Users_Id=$uid and Skills_Id = $sid")) {
			$data['status']='Вече сте вдигнали това умение';
			$data['success']=0;

		}
		if($user_info["Sp"]<=0) {
			$data['status']='Нямате достатъчно точки за умения';
			$data['success']=0;

		}
		$parrents_id=$db->getall("Select * from skillsparents where SkillId=$sid");
		for($i=0;$parrents_id[$i];$i++) { if(!$db->getrow("Select * from users_has_skills where Skills_Id=".$parrents_id[$i]['ParentId']." and Users_Id=$uid")) {
			$data['status']='Моля вдигнете всички умения които се изискват за даденото';
			$data['success']=0;

		}
		}
		if(!$db->getrow("Select * from users_has_skills where Users_Id=$uid and Skills_Id = $sid") and !$data) {
			$db->execute("Insert into  users_has_skills (Users_Id,Skills_Id) values ($uid,$sid)");
			$db->execute("Update users set Sp=".--$user_info["Sp"]." where Id=".$uid);
			$data['status']='Успешно вдигнахте ново умение';
			$data['success']=1;
		}

		echo json_encode($data);
		exit;
	}
	);
	
$app->get(
	'/activate_code/:uid/:code',
	function ($uid,$code) {
		global $db;
		$info=$db->getrow("Select * from codes where UniqueName='$code'");
		if(!$info) {
			$data['success']=0;
			$data['status']="Кодът, който сте въвели не е активен";
		}
		else {
			$user_info=$db->getrow("Select * from users where Id=$uid");
			$passive_skills=$db->getall("Select passive_skills.* from users_has_skills,skills,passive_skills where
										passive_skills.skill_id=skills.Id and skills.passive=1 and skills.id=users_has_skills.Skills_Id and users_has_skills.Users_Id=$uid");
			for($i=0;$passive_skills[$i];$i++) {
				$bonus=explode('%',$passive_skills[$i]["bonus"]);
				if($passive_skills[$i]["bonus_field"]=='xp') {
					if($bonus[1]) {
						$info['Xp']+=$info['Xp']*$bonus[0]/100;
					}
					else $info['Xp']+=$bonus[0];
				}
				else {
					if($bonus[1]) {
						$info['Ap']+=$info['Ap']*$bonus[0]/100;
					}
					else $info['Ap']+=$bonus[0];
				}
				
			}
			$user_info['Xp']+=$info['Xp'];
			$user_info['Ap']+=$info['Ap'];
			$next_level_xp=(100*$user_info['level'])+(50*($user_info['level']-1));
			while($user_info['Xp']>=$next_level_xp) {
				$db->execute("Update users set level=".++$user_info['level'].", sp=".++$user_info["Sp"]." where id=".$user_info['Id']);
				$user_info['Xp']-=$next_level_xp;
				$data['result']='Поздравления вдигнахте ниво. Имате '.$user_info["Sp"].' точки за умения';
				$next_level_xp=(100*$user_info['level'])+(50*($user_info['level']-1));
			}
			$db->execute("Update users set Xp=".$user_info['Xp'].",Ap=".$user_info['Ap']." where id=".$user_info['Id']);
			$db->execute("Delete from codes where Id=".$info['Id']);
			$data['success']=1;
			$data['status']='Успешно въведохте код';
			$data['user_info']=$user_info;
		}
		echo json_encode($data);
		exit;
		
	}
	);
$app->get(
	'/use_skill/:uid/:sid/:tid',
	function ($uid,$sid,$tid) {
	global $db;
	$data=array();
	$skill_info=$db->getrow("Select * from skills where Id=$sid");
	$user_info=$db->getrow("Select * from users where Id=$uid");
	if($user_info["Ap"]>=$skill_info["Ap"] and $user_info and $skill_info) {
		$db->execute("Update users set Ap=".($user_info["Ap"]-$skill_info["Ap"])." where Id=$uid");
		$data['uid']=$uid;
		$data['Ap']=$user_info["Ap"]-$skill_info["Ap"];
		$data['status']='Използването на '.$skill_info["Name"].' се изпълни успешно';	
		$data['success']=1;
		if($data){
			$teacher_info = $db->getone("Select Name from users where Id=$tid");
			$message = $skill_info['Name']." беше използван от ".$teacher_info;
			$db->execute("Insert INTO messages (User_Id, Teacher_Id, Text) VALUES ($uid,$tid,'".$message."')");
		}
	}
	else {
		$data['status']='Недостигат кредити за това умение';	
		$data['success']=0;
	}
	echo json_encode($data);
	exit;
	}
);

$app->get(
	'/get_answers/:id/:uid',
	function ($id,$uid) {
		global $db;
		$data=$db->getall("Select * from answers where quest_id=$id");
		$db->execute("Update send_question_to_user set seen=1 where user_id=$uid and question_id=$id");
		echo json_encode($data);
	exit;
	}
);

$app->get(
	'/send_answer/:aid/:qid/:uid',
	function ($aid,$qid,$uid) {
		
		global $db;
		$user_info=$db->getrow("Select * from users where Id=$uid");
		$info=$db->getrow("Select * from question where id=$qid");
		if($info['answer_id']==$aid) {
			$passive_skills=$db->getall("Select passive_skills.* from users_has_skills,skills,passive_skills where
										passive_skills.skill_id=skills.Id and skills.passive=1 and skills.id=users_has_skills.Skills_Id and users_has_skills.Users_Id=$uid");
			for($i=0;$passive_skills[$i];$i++) {
				$bonus=explode('%',$passive_skills[$i]["bonus"]);
				if($passive_skills[$i]["bonus_field"]=='xp') {
					if($bonus[1]) {
						$info['xp']+=$info['xp']*$bonus[0]/100;
					}
					else $info['xp']+=$bonus[0];
				}
				else {
					if($bonus[1]) {
						$info['ap']+=$info['ap']*$bonus[0]/100;
					}
					else $info['ap']+=$bonus[0];
				}
				
			}
			$user_info['Xp']+=$info['xp'];
			$user_info['Ap']+=$info['ap'];
			$next_level_xp=(100*$user_info['level'])+(50*($user_info['level']-1));
			while($user_info['Xp']>=$next_level_xp) {
				$db->execute("Update users set level=".++$user_info['level'].", sp=".++$user_info["Sp"]." where id=".$user_info['Id']);
				$user_info['Xp']-=$next_level_xp;
				$data['result']='Поздравления вдигнахте ниво. Имате '.$user_info["Sp"].' точки за умения';
				$next_level_xp=(100*$user_info['level'])+(50*($user_info['level']-1));
			}
			$db->execute("Update users set Xp=".$user_info['Xp'].",Ap=".$user_info['Ap']." where id=".$user_info['Id']);
			$data['success']=1;
			$data['status']='Вашият отговор беше правилен';
			$data['user_info']=$user_info;
		}
		else {
			$data['success']=0;
			$data['status']='Вашият отговор не беше правилен';
		}
	echo json_encode($data);
	exit;
	}
	);
		
		
$app->run();


?>
