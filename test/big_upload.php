<?php define ( 'IN_KEKE', TRUE );

include '../app_boot.php';
error_reporting(E_ALL);

if($_POST){	
	$ajax = new Sys_upload($_POST);
	
	$ajax->upload_file();
	die;
} 

$swf_upload=true;
require Keke_tpl::template('en');

?>




