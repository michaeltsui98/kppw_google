<?php defined ( 'IN_KEKE' ) or exit('Access Denied');

class Control_test extends Controller{

	function action_index(){
		 global $_K,$_lang;
          $test = 'вс╠Да©';  	 
          var_dump($_SESSION);
		 require Keke_tpl::template('test/link');
	}
 
}
