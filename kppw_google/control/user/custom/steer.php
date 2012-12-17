<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-客服管理首页-用户建议
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_custom_steer extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'custom';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'steer';
	
	function action_index(){
		//要查询的字段
		$fields = " ``,``,``,``,``,``,``,`` ";
		//基本uri
		$base_uri = BASE_URL."/index.php/user/custon_steer";
		//记录数
		$count = $_GET['count'];
		//默认排序字段
		$this->_default_ord_field = "on_time";
		//获取分页条件
		extract($this->get_url($base_uri));
		$data_info = Model::factory('witkey_report')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		$open_url = BASE_URL.'/index.php/user/custom_steer/comment';
		require Keke_tpl::template('user/custom/steer');
	}
	function action_comment(){
	    
		if($_POST){
	    	var_dump($_POST); 
	    	$this->request->redirect('user/custom_steer');
	    }	
		require Keke_tpl::template('user/custom/comment');
	}
	
}