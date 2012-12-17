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
		
		$fields = '`report_id`,`obj`,`username`,`on_time`,`op_uid`,`op_username`,`report_desc`,`report_status`,`op_result`';
		
		$query_fields = array('report_id'=>'编号','report_desc'=>'内容','op_result'=>'回复','on_time'=>$_lang['time']);
		$base_uri = BASE_URL.'/index.php/user/custom_steer';
		$del_uri = $base_uri.'/del';
		$count = intval($_GET['count']);
		$this->_default_ord_field = 'on_time';
		//获取分页条件
		extract($this->get_url($base_uri));
		
		$trans_status = $this->_trans_status;
		//条件
		$where .= " and obj = 'comment' and uid = '{$_SESSION['uid']}' ";

		$data_info = Model::factory('witkey_report')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		
		$data_list = $data_info['data'];
		//显示分页的页数
		$pages = $data_info['pages'];
		$open_url = BASE_URL.'/index.php/user/custom_steer/comment';
		require Keke_tpl::template('user/custom/steer');
	}
	/**
	 * 
	 */
	function action_comment(){
		
			require Keke_tpl::template('user/custom/comment');
	}
	/**
	 * 提交建议
	 */
	function action_sbt_comment(){
		Keke::formcheck($_POST['formhash']);//跨域提交
		$_POST = Keke_tpl::chars($_POST);//防sql注入
		$array = array(
				'obj' => 'comment',
				'report_desc' => $_POST['txt_comment'],
				'on_time' => time(),
				'report_status' => 1,
				'username'=>$_SESSION['username'],
				'uid'=>$_SESSION['uid'],
		);
		Model::factory('witkey_report')->setData($array)->create();
		$this->request->redirect('user/custom_steer');
	}
	/**
	 * 删除单条信息
	 */
	function action_del(){
		$report_id = $_GET['report_id'];
		if ($report_id){
			$where .=' report_id ='.$report_id;
		}
		Model::factory('witkey_report')->setWhere($where)->del();
	}
}