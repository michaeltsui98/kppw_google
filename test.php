<?php define ( "IN_KEKE", TRUE );

include 'app_boot.php';
$dir = 'C:\DrvS3';

function get_dir($dir,$ext){
	//is_dir($dir) or die('not dirctory');
	$files = glob($dir,$ext);
	$f = array();
	foreach ($files as $k=>$v){
		if(is_dir($v)){
			get_dir($v, $ext);
		}else{
			 $f[] = $v;
		}
	}
	
}
//$files = glob($dir,'\*.*');
$files = get_dir($dir, '\*.*');
var_dump($files);

include Keke_tpl::template('test');
