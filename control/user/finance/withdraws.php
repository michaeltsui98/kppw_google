<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理首页-用户提现记录
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_finance_withdraws extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'withdraws';
	
	function action_index(){
		
		$fields = "`cash`,`bank_account`,`bank_username`,`bank_name`,`status`,`on_time`";
		$query_fields = array('status'=>'状态','on_time'=>'时间');
	
		$count = intval($_GET['count']);
		$this->_default_ord_field = 'on_time';
		$base_uri = BASE_URL.'/index.php/user/finance_withdraws	';
		extract($this->get_url($base_uri));
		
		$where .= ' and uid = '.$_SESSION['uid'];
		
		$data_info = Model::factory('witkey_withdraw')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		
		$data_list = $data_info['data'];
		//显示分页的页数
		$pages = $data_info['pages'];
		//提现状态
		$status_arr = Keke_global::withdraw_status ();
		
		require Keke_tpl::template('user/finance/withdraws');
	}
}