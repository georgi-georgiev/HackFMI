<?php
if (isset($_GET['lang'])) $user_lang = $_GET['lang'];
if (isset($user_lang)) {
	$_SESSION['language'] = $user_lang;
	if ($_SESSION["user_info"]["id"]) $db->execute("update lang='$user_lang' where id=".$_SESSION["user_info"]["id"]);}
if (empty($_SESSION['language'])) $_SESSION['language'] = 'bg';
if (file_exists('lib/lang/'.$_SESSION['language'].'.inc'))  require_once('lib/lang/'.$_SESSION['language'].'.inc'); else require_once('lib/lang/en.inc'); 
$smarty->assign('lang', $lang);


function get_param($ParamName) {
	$param = isset($_GET[$ParamName]) ? $_GET[$ParamName] : (isset($_POST[$ParamName]) ? $_POST[$ParamName] : false);
	return $param;}
function is_mail($email) {
  if (!ereg("[^@]{1,64}@[^@]{1,255}", $email)) {
    return false;
  }
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
     if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
      return false;
    }
  }  
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { 
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false;
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
        return false;
      }
    }
  }
  return true;}
function savetofile($filename, $mess) {
	$fp = fopen($filename, "a+");
  $write = fputs($fp, $mess);
  fclose($fp);}
function send_email($email,$subject,$body,$file="",$from="",$name="") {
	global $puuuuut;
	$mail = new PHPMailer();
    $mail->SetLanguage("en",  $puuuuut."/lib/phpmailer/language/");
	$mail->Mailer = "mail";
  	$mail->CharSet = "utf-8";
	$mail->IsHTML(true);
	$mail->AddAddress($email);
	if (!$from) $mail->From = $_SESSION['settings']['email']; else $mail->From = $from;
	if (!$from) $mail->Sender = $_SESSION['settings']['email']; else $mail->Sender = $from;
	if (!$name) $mail->FromName = $_SESSION['settings']['domain_name']; else $mail->FromName = $name;
	$mail->Subject = $subject;
	$mail->Body = $body;
	echo $file;
	if ($file) $mail->AddAttachment($file,$file); 
	if ($mail->Send()) return true; else die( $mail->ErrorInfo);// return false;
 }
?>