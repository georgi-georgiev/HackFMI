<?php

require_once('lib/adodb/adodb.inc.php');
require_once('lib/smarty/Smarty.class.php');

define('CONFIG_DB_SERVER', 'pdb3.awardspace.net'); // DB SERVER
define("CONFIG_DB_USER",'1373333_hack'); // DB USERNAME
define('CONFIG_DB_PASSWORD', '12345678A'); // DB PASSWORD
define('CONFIG_DB_NAME', '1373333_hack'); // DB NAME

define('CONFIG_HOST', 'http://magicschool.g-georgiev.com/'); 
define('SITE_NAME', 'magicschool'); 

$smarty = new Smarty;
$smarty->addPluginsDir( '/inc/my_smarty');
$smarty->debugging = false;
//$smarty->template_dir = CONFIG_SMARTY_TEMPLATE_DIR;
//$smarty->compile_dir  = CONFIG_SMARTY_C_TEMPLATE_DIR;

$db = ADONewConnection('mysql');
$db->debug = false;
$db->Connect(CONFIG_DB_SERVER, CONFIG_DB_USER, CONFIG_DB_PASSWORD, CONFIG_DB_NAME);
$ADODB_FETCH_MODE  = ADODB_FETCH_ASSOC;
$ADODB_FORCE_TYPE = ADODB_FORCE_EMPTY;
$db->Execute("set names 'utf8'");
$smarty->assign('CONFIG_HOST', CONFIG_HOST);
$smarty->assign('DOMAIN_NAME', SITE_NAME);

?>
