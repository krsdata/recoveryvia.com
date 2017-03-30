<?php
ob_start(); 
error_reporting(E_ERROR | E_PARSE);
session_start();
//$_SESSION['userLanguage'] = 'indian';	
	/*==============LOCAL START========================*/
	define('HOST_NAME','localhost');
	define('USER_NAME','heavenre_user');
	define('PASSWORD','user@123!');
	define('DATABASE_NAME','heavenre_db'); 
	
	define('ABS_ROOT_PATH','/home/heavenresearch/public_html/hrs/');
	define('SITE_NAME','Heaven Research Security');
	define('SITE_URL','http://heavenresearchsecurity.com/hrs/');
	define('REQUEST_URL',$_SERVER['PHP_SELF'].'?repp='.$_GET['repp'].'&page='.$_GET['page'].'&search='.$_GET['search']);
 define('DEF_QRY_STR','?repp='.$_GET['repp'].'&page='.$_GET['page'].'&search='.$_GET['search']);
	
	/*==============LOCAL END========================*/
	
	
	/*==============LIVE START========================*/
	
	
	/*==============LIVE END========================*/
	
	require_once(ABS_ROOT_PATH.'config/dbConn.php');
	require_once(ABS_ROOT_PATH.'config/dataTable.php');
	require_once(ABS_ROOT_PATH."classes/function.php");
	$obj = new myFunction();
?>