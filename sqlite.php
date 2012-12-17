<?php
define('IN_KEKE', TRUE);
include 'app_boot.php';


$sqlite = cache::instance('file');
if(!$res=$sqlite->get('test')){
	var_dump('no_cache');
	$sqlite->set('test', 'ÖĞÎÄ¼ş²âÊÔ',20);
}
var_dump($res);
var_dump(Keke::execute_time());
echo time();


 



