<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.2
 * 2012-10-9 下午17：30
 */
class Control_admin_user_trans extends Control_admin{
	 
	private $_trans_status;
	private $_trans_object;
	
	function __construct($request, $response){
		parent::__construct($request, $response);
		//状态
		$this->_trans_status =  keke_report_class::get_transrights_status();
		//对象
		$this->_trans_object = keke_report_class::get_transrights_obj();
	}
	
	function action_index($type='work'){
		global $_K,$_lang;
		//需要在列表中显示的字段
		$fields = '`report_id`,`origin_id`,`obj`,`username`,`to_username`,`report_file`,`on_time`,`report_status`,`report_type`,`op_uid`,`op_username`,`report_desc`';
		//搜索中查询的字段
		$query_fields = array('report_id'=>$_lang['id'],'report_status'=>'当前状态','on_time'=>$_lang['time']);
		
		//基本uri
		$base_uri = BASE_URL.'/index.php/admin/user_trans';
		$del_uri = $base_uri.'/del';
		//统计的总数，这里写出避免再查询一次
		$count = intval($_GET['count']);
		//默认排序字段
		$this->_default_ord_field = 'on_time';
		//获取分页条件
		extract($this->get_url($base_uri));
		//处理的情况
		$trans_status = $this->_trans_status;  
		 
		$rp_type =  keke_report_class::get_report_type();
		
		$where .= " and  obj = '$type' ";
		
		//查询各种类型下的数据
		$data_info = Model::factory('witkey_report')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//查询出来的数据
		$report_list = $data_info['data'];
		//显示分页的页数
		$pages = $data_info['pages'];
		//所属的类别，商品，任务，稿件，订单
		$trans_object = $this->_trans_object;

		require keke_tpl::template('control/admin/tpl/user/trans');
	}
 	/**
	 * 用户建议，客服可以回复
	 */
	function action_complaint(){
		global $_K,$_lang;
		
		$fields = '`report_id`,`obj`,`username`,`on_time`,`op_uid`,`op_username`,`report_desc`,`report_status`,`op_result`';
		
		$query_fields = array('report_id'=>$_lang['id'],'report_status'=>'当前状态','on_time'=>$_lang['time']);
		
		$base_uri = BASE_URL.'/index.php/admin/user_trans';
		$del_uri = $base_uri.'/comment_del';
		//统计的总数，这里写出避免再查询一次
		$count = intval($_GET['count']);
		//默认排序字段
		$this->_default_ord_field = 'on_time';
		//获取分页条件
		extract($this->get_url($base_uri.'/complaint'));
		$where .= " and obj = 'comment'";
		$trans_status = $this->_trans_status;
		//查询各种类型下的数据
		$data_info = Model::factory('witkey_report')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		
		$data_list = $data_info['data'];
		//显示分页的页数
		$pages = $data_info['pages'];
		 
		require keke_tpl::template('control/admin/tpl/user/steer');
	}
	
	/**
	 * 商品举报 
	 */
	function  action_product(){
		 $this->action_index('product');
	}
	
	/**
	 * 店铺举报
	 */
	function action_shop(){
		 $this->action_index('shop');
	}
	/**
	 * 客服回复用建议
	 */
	function action_reply(){
		$columns = array('report_status','op_result','op_time','op_uid');
		if(CHARSET == 'gbk'){
			$_POST['data'] = Keke::utftogbk($_POST['data']);
		}
		$values = array(4,$_POST['data'],time(),$_SESSION['admin_uid']);
		$where = "report_id = '{$_GET['report_id']}'";
		DB::update('witkey_report')->set($columns)->value($values)->where($where)->execute();
	} 
	/**
	 * 处理举报和查看处理方案
	 */
	function action_process(){
		global $_K,$_lang;
		//获取穿过来的type,用户返回对应的类型列表，如举报列表
		$type = $_GET['type'];
	 
		//获取传递过来的额report_id，用来查询对应的report表的信息
		$report_id = $_GET['report_id'];
		//对应的信息
		$report_info = keke_report_class::get_report_info ( $report_id );
		//举报方信息
		$user_info = Keke_user::instance()->get_user_info ( $report_info ['uid'] ); 
		//对方信息
		$to_userinfo = Keke_user::instance()->get_user_info ( $report_info ['to_uid'] );
		//获取process页面的信息
		$obj_info = keke_report_class::obj_info_init ( $report_info,$user_info);
		//所属的类别，商品，任务，稿件，订单
		$trans_object = $this->_trans_object; 
		//处理的情况
		$trans_status = $this->_trans_status;
		$rp_type =  keke_report_class::get_report_type();
		require keke_tpl::template('control/admin/tpl/user/trans_process');
	}
	/**
	 * 处理举报
	 */
	function action_save(){
		global $_lang;
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);
		if(isset($_POST['btn_report'])){
			$status = 4;
		}else{
			$status = 3;
		}
		$columns = array('report_status','op_result','op_time','op_uid');
		$values = array($status,$_POST['op_result'],time(),$_SESSION['admin_uid']);
		$where = "report_id = '{$_POST['report_id']}'";
		DB::update('witkey_report')->set($columns)->value($values)->where($where)->execute();
		
		Keke::show_msg($_lang['submit_success'],$this->request->referrer());
		 
	}
	/**
	 * 删除单条举报信息
	 */
	function action_del(){
		$report_id = $_GET['report_id'];
		if ($report_id){
			$where .=' report_id ='.$report_id;
		}
		echo Model::factory('witkey_report')->setWhere($where)->del();
	}
}

