<?php
class Control_ui extends Controller {

	
	function action_index(){
		global $_K,$_lang;
		
		require Keke_tpl::template('ui/ui');
	}
	
	
}
