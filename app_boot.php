<?php  defined ( 'IN_KEKE' ) or exit('Access Denied');
/**
 * this not free,powered by keke-tech
 * @version kppw 2.0
 * @auther 九江
 * 
 */

error_reporting(E_ALL|E_STRICT);
date_default_timezone_set ( 'PRC' );
define ( "S_ROOT", dirname ( __FILE__ ).DIRECTORY_SEPARATOR);
ini_set('unserialize_callback_func', 'spl_autoload_call');
require (S_ROOT . 'class/keke/core.php');


/* $basic_config  = keke::$_sys_config;
$exec_time_traver = Keke::exec_js('get');
(!isset($exec_time_traver)||$exec_time_traver<time()) and $exec_time_traver = true or $exec_time_traver = false; */

isset($_GET['inajax']) and $_K['inajax']= $_GET['inajax'];
isset($_GET['ajaxmenu']) and $_K['ajaxmenu'] = $_GET['ajaxmenu'];
 
unset ( $uid, $username);


//支持子目录的路由
Route::set('sections', '<directory>(/<controller>(/<action>(/<id>)))',
array(
'directory' => '(admin|ajax|auth|payitem|space|user|task|shop)'
		))
		->defaults(array(
		'controller' => 'index',
		'action'     => 'index',
		));


 Route::set('default', '(<controller>(/<action>(/<id>(/<ids>))))',array
('ids'=>'.*'))
->defaults(array(
'controller' => 'index',
'action'     => 'index',
)); 
if(!Route::cache()){
	Route::cache(TRUE);
}   

 
//货币列表
//$_K['f_c_list'] = Curren::get_curr_list('code,title');


//uir路由测试
/* $uri = "user/msg/test";
 foreach (Route::all() as $r){
	 var_dump($r->matches($uri));
} 
 die(); */ 