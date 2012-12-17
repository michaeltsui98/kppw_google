<?php defined ( 'IN_KEKE' ) or exit('Access Denied');

class Control_en extends Controller{
	
	function action_index(){
		global $_K,$_lang;
		
		require Keke_tpl::template('en');
	}
	function action_add(){
		global $_K;
		$p = Keke_validation::factory($_POST)->rule('email', 'Keke_valid::email',array(':value',$_POST['email']));
		if(!$p->check()){
			$e = $p->errors();
			Keke::show_msg('系统提示!','index.php/en',$e);
		}
		$this->action_index();
	}
	 
	function action_ajax(){
		global $_K,$_lang;
		$title = "登录测试";
		require Keke_tpl::template('ajax/ajax_test');
	}
	
	
 
}

