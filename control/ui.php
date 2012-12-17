<?php
class Control_ui extends Controller {

	
	function action_index(){
		global $_K,$_lang;
		
		require Keke_tpl::template('ui/html');
	}
	
	function action_box(){
		global $_K,$_lang;
		
		require Keke_tpl::template('ui/box');
	}
	function action_ui(){
		global $_K,$_lang;
		
		require Keke_tpl::template('ui/ui');
	}
}
