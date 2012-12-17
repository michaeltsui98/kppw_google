<?php  defined ( 'IN_KEKE' ) or exit('Access Denied');
 /**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-08обнГ02:57:33
 */

class Control_ajax extends Controller{
	
	function action_index(){
		
	}
	function action_indus(){
		
	}
	function action_score(){
		
	}
	function action_code(){
		
	}
	function action_share(){
		
	}
	function action_menu(){
		
	}
	function action_msg(){
		
	}
	function action_file(){
		
	}
	function action_task(){
		
	}
	
}



$_K['is_rewrite'] = 0 ;

$views = array('ajax','upload','indus','score','code','share','menu','message','file','task');
 
in_array($view,$views) or $view ="ajax";

require 'ajax/ajax_'.$view.'.php';