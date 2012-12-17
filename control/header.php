<?php
class Control_header extends Controller {

	function action_index(){
		global $_K,$_lang;
		Keke_lang::package_init("index");
		Keke_lang::loadlang($do);
		$page_keyword = Keke::$_sys_config['seo_keyword'];
		$page_description = Keke::$_sys_config ['seo_desc'];
		
		$uid = Keke::$_uid;
		$username = Keke::$_username;
		$messagecount = Keke::$_messagecount;
		$user_info = Keke::$_userinfo;
 
		$model_list = Keke::$_model_list;
		$nav_arr = Keke::$_nav_list;
		$lang_list = Keke::$_lang_list;
		$language      = Keke::$_lang;
		$api_open   = Keke::$_api_open;
		$weibo_list = Keke::$_weibo_list;
		$attent_api_open = Keke::$_attent_api_open;
		$attent_list = Keke::$_weibo_attent;
		//$style_path = Keke::$_style_path;
		$style_path=SKIN_PATH;
	    
		require Keke_tpl::template('header');
	}
}
//end