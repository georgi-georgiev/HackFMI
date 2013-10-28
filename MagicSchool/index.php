<?php
//error_reporting(E_STRICT | E_ALL | E_DEPRECATED);
ini_set("display_errors", 1);

session_start();
include ("inc/config.php");
include ("inc/common.php");
$page=get_param("page");
$result='';
$error='';
$action=get_param("action");
if($page=='logout')Load_Logout();
if(get_param("login"))Load_Login();
if(!$page and !$_SESSION['user_info']) { $page='index';Load_Register();}
if(!$page and $_SESSION['user_info']['Access_level']=='3') $page='student';
if(!$page and $_SESSION['user_info']['Access_level']=='2') $page='teacher';
if(!$page and $_SESSION['user_info']['Access_level']=='1') $page='admin';
if($_SESSION['user_info']){
	$_SESSION['user_info']=$db->getrow("Select * from users where Id=".$_SESSION['user_info']['Id']);
	$_SESSION['new_questions']=$db->getone("Select count(*) from question,send_question_to_user where send_question_to_user.question_id=question.id and send_question_to_user.seen=0 and send_question_to_user.user_id=".$_SESSION['user_info']['Id']);
	$_SESSION['new_messages']=$db->getone("Select COUNT(*) from messages  where IsRead=0 and User_Id=".$_SESSION['user_info']['Id']);
	$smarty->assign("new_questions",$_SESSION['new_questions']);
	$smarty->assign("new_messages",$_SESSION['new_messages']);
}
$lg=$_SESSION['language'];
if($page=='register' or $action=='register') Load_Register();
if($page=='active_code') Load_Active_code();
if($action=='admin_class') Load_Admin_class();
if($page=='teacher') Load_Teacher();
if($page=='student') Load_Student();
if($page=='student_messages') Load_Student_messages();
if($page=='student_questions') Load_Student_questions();
if($action=='teachers_list') Load_Teachers_list();

$smarty->assign('page', $page);
$smarty->assign('action', $action);
$smarty->assign('error', $error); 
$smarty->assign('result', $result); 
$smarty->assign('user_info', $_SESSION['user_info']); 
$smarty->display('templates/index.tpl');	

function Load_Register(){
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	$smarty->assign("classes",$db->Getassoc("Select Id,Name from classes"));
	$smarty->assign("access_levels",$db->Getassoc("Select Id,Name from accesslevels"));
	$smarty->assign("character_types",$db->Getassoc("Select Id,Name from characters"));
	$save=get_param("register");
	if ($save) {
		$username=get_param("username"); $smarty->Assign('username', $username);
		$password=md5(get_param("password"));
		$access_level=get_param("access_level"); $smarty->Assign('access_level', $access_level); 
		if(!$access_level)$access_level=3;
		$class_in_school=get_param("class_in_school"); $smarty->Assign('class_in_school', $class_in_school); 
		if($access_level!='3' and $_SESSION['user_info']['Access_level']!='1') {
			$error='Нямате права, за да създадете този потребител';
		}
		$name=get_param("name"); $smarty->Assign('name', $name);
		if($db->Getrow("select * from users where lcase(Username)=lcase('$username')")) $error="Потребителското име е заето";
		
		if (!$username or !$password or !$name or !$access_level or ($access_level=='3' and !$class_in_school)) $error="Моля попълнете всички полета";
		echo $error;
		if(!$error){
			$db->Execute("insert into users (Id) values (NULL)");
			$id=$db->insert_id("users","Id");
			$db->Execute("update users set
					Username='$username',
					Password='$password',
					Name='$name',
					Access_level=$access_level,
					Class_in_school='$class_in_school',
					level=1
					where Id=$id");
			if (!$_SESSION['user_info']){
				$_SESSION['user_info']=$db->getrow("Select * from users where Id=$id");
				$page='student';
			}
			$result="Регистрацията приключи успешно";
			}
		}
}
function Load_Teacher() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	if($action=='code_list') Load_Code_list();
	if($action=='questions') Load_Questions();
	if($action=='get_users') Load_Get_Users();
	if($action=='attach_to_class') Load_Attach_to_class();
	
}
function Load_Questions() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	

	$flag=get_param('flag');
	if($flag=='add') {
	$classes=$db->getall("Select classes.Id,classes.Name from users_has_classes,classes where users_has_classes.Classes_Id=classes.Id and Users_Id=".$_SESSION['user_info']['Id']);
	
	$smarty->assign("classes",$classes);
	$save=get_param("save");
	if($save) {
		$quest=get_param('quest');
		$answers=get_param('answers');
		$right_answer=get_param('right_answer');
		$time=get_param('time');
		$classes=get_param('classes');
		$xp=get_param('xp');
		$ap=get_param('ap');
		
		$db->Execute("insert into question (id) values (NULL)");
		$id=$db->insert_id("question","id");
		$db->Execute("update question set
					question='$quest',
					time='$time',
					ap='$ap',
					xp=$xp,
					user_id=".$_SESSION['user_info']['Id']."
					where id=$id");
		for($i=0;$answers[$i];$i++) {
			$db->execute("Insert into answers (quest_id,answer) values ($id,'".$answers[$i]."')");
			if($i==$right_answer) { 
			$right_answer_id=$db->insert_id("answers","id");
			$db->execute("Update question set answer_id=$right_answer_id where id=$id");
			}
		}
		$all_classes='';
		for($i=0;$classes[$i];$i++) {
			$all_users=$db->getall("Select * from users where Class_in_school=".$classes[$i]);
			$all_classes.=$db->getone("Select Name from classes where Id=".$classes[$i]);
			if($classes[$i+1])$all_classes.=',';
			for($j=0;$all_users[$j];$j++) {
				$db->execute("Insert into send_question_to_user (question_id,user_id) values ($id,".$all_users[$j]['Id'].")");
		}
		$db->Execute("update question set classes_id='$all_classes' where id=$id");
		
	}
	$flag='';
	}
	}
	if(!$flag) {
		$list=$db->getall("Select * from question where user_id=".$_SESSION['user_info']['Id']);
		$smarty->assign("list",$list);
		
		
		
	}
	$smarty->assign("flag",$flag);
}
function Load_Student_messages() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	

	$uid=$_SESSION['user_info']['Id'];
	$list=$db->getall("Select * from messages where User_Id=".$uid." and IsRead=0");
	$db->execute('Update messages set IsRead=1 where User_Id='.$uid);
	$smarty->assign("list",$list);	
}
function Load_Teachers_list() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	

	$flag=get_param("flag");
	if($flag=='delete') {
		$id=get_param("id");
		$db->execute("Delete from users where id=$id");
		$db->execute("Delete from users_has_classes where Users_Id=$id");
		$result="Успешно изтрихте потребителя";
		$flag='';
	}
	if(!$flag) {
		$list=$db->getall("Select * from users where Access_level=2");
		for($i=0;$list[$i];$i++) {
			$list[$i]['classes']=$db->getall("Select classes.Name from classes,users_has_classes where classes.Id=users_has_classes.Classes_Id and users_has_classes.Users_Id=".$list[$i]['Id']);	
		}
		$smarty->assign("list",$list);
		
	}
	
}
function Load_Login($email=false, $password=false, $login=false) {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;
	global $id;
	if (!$login) $login=get_param ("login");
	if ($login) {		
		if (!$username) $username=get_param("username");	
		if (!$password) $password=md5(get_param("password"));
		if (!$username) $error=$lang["incorect_login_data"];
		if (!$password) $error=$lang["incorect_login_data"];
		if ($error) return false;
		
		$rs=$db->getrow("select * from users where lcase(Username)=lcase('$username')");
		if (!$rs) $error=$lang["incorect_login_data"];
		if ($rs["Password"] != $password) $error=$lang["incorect_login_data"];
		if ($error) return false;
		$rs2=$db->getrow("select * from users where lcase(Username)=lcase('$username') and Password='$password' and id=".$rs["Id"]);
		if (!$rs2) $error=1;
		if ($rs2["Password"] != $password)$error=$lang["incorect_login_data"];
		if ($rs2["Id"] != $rs["Id"]) $error=$lang["incorect_login_data"];
		if ($rs2["Username"] != $rs["Username"]) $error=$lang["incorect_login_data"];
		if ($rs2["Password"] != $rs["Password"])$error=$lang["incorect_login_data"];  
		if ($error) return false;
		
		if (!$error) {
			$_SESSION['user_info']=$rs2;
			return true;
			
		}
	}}
function Load_Logout() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	$_SESSION['user_info']='';
	$page='';
	
}
function Load_Code_list(){
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	if($_SESSION['user_info']['Access_level']=='3') {
		$page='';
		exit();
	}
	$generate=get_param("generate");
	
	
	if($generate) {
		$count=get_param("count");
		$smarty->assign("count",$count);
		$xp=get_param("xp");
		$smarty->assign("xp",$xp);
		$ap=get_param("ap");
		$smarty->assign("ap",$ap);
		$file = "uploads/generated_codes/codes_".$_SESSION['user_info']['Id'].".txt";
		if(file_exists($file)) unlink($file);
		for($i=0;$i<$count;$i++) {
			$rand_string[$i]=rand_string(8);
			$db->Execute("insert into codes (Id) values (NULL)");
			$id=$db->insert_id("codes","Id");
			$db->execute("Update codes set
								UniqueName='".$rand_string[$i].$id."',
								Xp='$xp',
								Ap='$ap'
								where Id=$id");
			$rand_string[$i].=$id." ";
			savetofile($file,$rand_string[$i]);
		}
		
		$smarty->assign("list",$rand_string);

	}
	

	
	
}

function Load_Active_code() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	

	$activate=get_param("activate");
	if ($activate) {
		$code=get_param("code");
		$info=$db->getrow("Select * from codes where UniqueName='$code'");
		$_SESSION['user_info']['Xp']+=$info['Xp'];
		$_SESSION['user_info']['Ap']+=$info['Ap'];
		$next_level_xp=(100*$_SESSION['user_info']['level'])+(50*($_SESSION['user_info']['level']-1));
		if($_SESSION['user_info']['Xp']>=$next_level_xp) {
			$db->execute("Update users set level=".++$_SESSION['user_info']['level'].", sp=".++$_SESSION['user_info']["Sp"]." where id=".$_SESSION['user_info']['Id']);
			$_SESSION['user_info']['Xp']-=$next_level_xp;
			$result='Поздравления вдигнахте ниво. Имате '.$_SESSION['user_info']["Sp"].' точки за умения';
		}
		$db->execute("Update users set Xp=".$_SESSION['user_info']['Xp'].",Ap=".$_SESSION['user_info']['Ap']." where id=".$_SESSION['user_info']['Id']);
		$db->execute("Delete from codes where Id=".$info['Id']);				
	}
	
}
function  Load_Get_Users() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	$flag=get_param("flag");
		if($_SESSION['user_info']['Access_level']==2)$classes=$db->getassoc("Select classes.Id,classes.Name from users_has_classes,classes where users_has_classes.Classes_Id=classes.Id and Users_Id=".$_SESSION['user_info']['Id']);
		if($_SESSION['user_info']['Access_level']==1)$classes=$db->getassoc("Select classes.Id,classes.Name from classes ");
		$smarty->assign("classes",$classes);	
		
	
	if($flag) {
	$list=$db->getall("Select users.*,characters.Name as character_name from users,characters where users.Character_type=characters.Id and Class_in_school=$flag");
	for($i=0;$list[$i];$i++) { 
		$list[$i]['skills']=$db->getall("Select * from users_has_skills, skills where skills.Id=users_has_skills.Skills_Id and skills.passive=0 and Users_Id=".$list[$i]['Id']);
	}
	$smarty->assign("list",$list);
	}
	$smarty->assign("flag",$flag);

	
}
function Load_Admin_class() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	$flag=get_param("flag");
	if($flag=='delete') {
		$id=get_param("id");
		$db->execute("Delete from classes where Id=$id");
		$result='Успешно изтрихте клас';
		$flag='';	
		
	}
	if(!$flag) {
		$save=get_param("save");
		if($save) {
			$name=get_param("name");
			$db->execute("Insert into classes (Name) values ('$name')");
			$result='Успешно добавихте клас';
		}		
		$list=$db->getall("Select * from classes order by id desc");
		$smarty->assign("list",$list);
		
	}
	$smarty->assign("flag",$flag);
	
}
function Load_Attach_to_class() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	$flag=get_param("flag");

	if($flag=='delete') {

		$id=get_param("id");
		$db->execute("Delete from users_has_classes where Classes_Id=$id and Users_Id=".$_SESSION['user_info']['Id']);
		$flag='';	
		
	}
	if(!$flag) {
		$save=get_param("save");
		$list=$db->getassoc("Select Id,Name from classes");
		$smarty->assign("classes",$list);
		if($save) {
			$class=get_param("classes");
			$db->execute("Insert into users_has_classes (Users_Id,Classes_Id) values (".$_SESSION['user_info']['Id'].",$class)");
		}
		$list=$db->getall("Select * from classes,users_has_classes where users_has_classes.Classes_Id=classes.Id");
		$smarty->assign("list",$list);	
		
	}
	$smarty->assign("flag",$flag);
	
}
function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}
	

function Load_Student() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
	$type=get_param("type");
	if($type) {
		$db->execute("Update users set Character_type=$type where Id=".$_SESSION['user_info']['Id']);
		$_SESSION['user_info']['Character_type']=$type;
	}

	
	if (!$_SESSION['user_info']['Character_type']) {
		$page='choose_hero';
		return;
	}
	$info=$db->getrow("Select * from users where Id=".$_SESSION['user_info']['id']);
	$info['skills']=$db->getall("Select * from users_has_skills where Users_Id=".$info['Id']);
	$smarty->assign("info",$info);
	
}
function Load_Student_questions() {
	global $db, $smarty, $lang;
	global $result, $error;
	global $page, $action;	
	
		$list=$db->getall("Select question.question,question.time,question.id,users.name from question,users, send_question_to_user where  send_question_to_user.seen=0 
							and  send_question_to_user.question_id=question.id and question.user_id=users.Id and send_question_to_user.user_id=".$_SESSION['user_info']['Id']);
		
		for($i=0;$list[$i];$i++) {
			$list[$i]['answers']=$db->getall("Select * from answers where quest_id=".$list[$i]['id']);
		}
		$smarty->assign("list",$list);	
		

	
}
	
	
	
	
	
	
	
	
	
	
	
?>