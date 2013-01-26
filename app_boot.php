<?php  defined ( 'IN_KEKE' ) or exit('Access Denied');
/**
 * this not free,powered by keke-tech
 * @version 3.0
 * @auther �Ž�
 * 
 */

error_reporting(E_ALL|E_STRICT);
date_default_timezone_set ( 'PRC' );
define ( "S_ROOT", dirname ( __FILE__ ).DIRECTORY_SEPARATOR);
ini_set('unserialize_callback_func', 'spl_autoload_call');

require (S_ROOT . 'class/keke/core.php');

Keke::init(array('index_file'=>''));

isset($_GET['inajax']) and $_K['inajax']= $_GET['inajax'];
isset($_GET['ajaxmenu']) and $_K['ajaxmenu'] = $_GET['ajaxmenu'];
 

Route::set('task', '(<controller>(/<id>(/<v>)))',
array(
'controller'=>'(task|service|article)',
'id' => '\d+',
'v'=>'\w+'
))
->defaults(array(
'controller'=>'index',
'action' => 'index'
));



//js ,css ѹ��
Route::set('minify', 'min')
->defaults(array(
'directory' => 'minify',
'controller' => 'index',
'action' => 'minify'
));

//֧����Ŀ¼��·��
Route::set('sections', '<directory>(/<controller>(/<action>(/<id>(/<ids>))))',
array(
'directory' => '(admin|ajax|auth|payitem|space|user|task|shop)',
'ids'=>'.*'
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

Route::cache(TRUE);
   

 
//�����б�
//$_K['f_c_list'] = Curren::get_curr_list('code,title');


//uir·�ɲ���
/* $uri = "user/msg/test";
 foreach (Route::all() as $r){
	 var_dump($r->matches($uri));
} 
 die(); */ 