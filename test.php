<?php define ( "IN_KEKE", TRUE );

include 'app_boot.php';
$dir = 'C:\\DrvS3\\';

function get_dir($dir,$ext){
	//is_dir($dir) or die('not dirctory');
	$files = glob($dir.$ext);
	$f = array();
	foreach ($files as $k=>$v){
		if(is_dir($v)){
			echo $v.'(is dir)'.PHP_EOL; 
			get_dir($v.'\\', $ext);
			 
		}else{
			echo $v.PHP_EOL;
		}
	}
	
}

Sys_cron_task::factory('preward')->batch_run();




//$files = glob($dir,'\*.*');
//get_dir($dir, '*');
 
//var_dump($files);

//include Keke_tpl::template('test');
