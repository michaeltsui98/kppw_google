<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-客服管理首页 --举报
 * @author Michael
 * @version 2.2
   2012-10-25
 */
class Control_user_custom_report extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'custom';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'report';
	/**
	 * 我举报的
	 * @param string $my
	 */
	function action_index($my = NULL){
		
		
		//编号 	被举报人 	类型 	原因 	附件 	状态 	时间
		$fields = "`report_id`,`to_username`,`report_type`,`report_desc`,`report_file`,`report_status`,`on_time`,`op_result`";
		//查询字段
		$query_fields = array('report_id'=>'编号','on_time'=>'时间','report_desc'=>'原因');
		//总记录数
		$count = intval($_GET['count']);
		//当前页
		$page = intval($_GET['page']);
		//默认排序字段，这里按时间降序
		$this->_default_ord_field = 'on_time';
		$order = NULL;
		$base_uri = BASE_URL.'/index.php/user/custom_report/'.$my;
		
		extract($this->get_url($base_uri));
		
		if($my===NULL){
			//我举报的
			$where .= " and uid = '{$_SESSION['uid']}'";
		}else{
			//举报我的
			$where .= " and to_uid ='{$_SESSION['uid']}'";
		}
		//获取分页条件
		
		$data_info = Model::factory('witkey_report')->get_grid($fields,$where,$base_uri,$order,$page,$count,$_GET['page_size']);
		
		$list_arr = $data_info['data'];
		
		$pages = $data_info['pages'];
		//处理的情况
		$trans_status = $this->_trans_status;
		//举报类型
		$rp_type =  Sys_report::get_report_type();
		require Keke_tpl::template('user/custom/report');
	}
	/**
	 * 我收到的
	 */
	function action_my(){
		$this->action_index('my');
	}
	
	
}