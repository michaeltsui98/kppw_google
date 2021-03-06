<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 充值审核
 * 
 * @copyright keke-tech
 * @author fu
 * @version v 22
 *          2012-10-9 15:18:30
 */
class Control_admin_finance_recharge extends Control_admin {
	function action_index() {
		// 定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K, $_lang;
		// 要显示的字段,即SQl中SELECT要用到的字段
		
		
		$sql = sprintf("select a.*,
				b.pay_id pid,b.payment bpayment,b.type btype,b.pay_user bpay_user,b.pay_account bpay_account,b.pay_name bpay_name,b.status bstatus
				from %switkey_recharge a
				left join %switkey_pay_api b
				on a.pay_id= b.pay_id ",TABLEPRE,TABLEPRE);
		
		//$fields = ' `rid`,`pay_id`,`recharge_pic`,`username`,`cash`,`pay_time`,`status`,`mem` ';
		// 要查询的字段,在模板中显示用的
		
		$query_fields = array ('rid' => $_lang ['id'], 'username' => $_lang ['username'], 'bank' => '银行' );
		
		// finance本来是一个目录，由于没有定义tool为目录的路由,所以这个控制层的文件来finance_recharge
		// So这里不能写为finance/recharge
		$base_uri = BASE_URL . "/index.php/admin/finance_recharge";
		
		$del_uri = $base_uri . '/del';
		// 默认排序字段，这里按时间降序
		$this->_default_ord_field = 'pay_time';
		// 这里要口水一下，get_url就是处理查询的条件
		extract ( $this->get_url ( $base_uri ) );
		// 获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::sql_grid($sql,$where,$uri,$order,$group_by);
		//$data_info = Model::factory ( 'witkey_recharge' )->get_grid ( $fields, $where, $uri, $order, $page, $count, $_GET ['page_size'] );
		// 列表数据
		$list_arr = $data_info ['data'];
		//var_dump($list_arr);
		// 分页数据
		$pages = $data_info ['pages'];
		// 用户组
		$group_arr = Keke_admin::get_user_group ();
		
		// 充值订单类型
		$charge_type_arr = Keke_global::get_charge_type ();
		
		// 充值类型
		$bank_arr = Keke_global::get_bank ();
// 		var_dump($list_arr);
		// 充值订单状态
		
		$status_arr = Sys_payment::recharge_status();
		
		// 线下支付方式
		$offline_pay = DB::select ()->from ( 'witkey_pay_api' )->where ( "type='offline'" )->execute ();
		$offline_pay = Keke::get_arr_by_key ( $offline_pay, 'payment' );
		
		require Keke_tpl::template ( 'control/admin/tpl/finance/recharge' );
	}
	/**
	 * 订单记录的删除,支持单与多删除
	 */
	function action_del() {
		// 删除单条,这里的file_id 是在模板上的请求连接中有的
		if ($_GET ['rid']) {
			$where = 'rid = ' . $_GET ['rid'];
		}
		echo Model::factory ( 'witkey_recharge' )->setWhere ( $where )->del ();
	}
	
	/**
	 * 审核充值订单
	 */
	function action_update() {
		global $_lang;
		if (($rid = $_GET ['rid']) == NULL) {
			return FALSE;
		}
		//银行名称
		$bank_arr = Keke_global::get_bank ();
		
		 $charge_info = DB::select ()->from ( 'witkey_recharge' )->where ( "rid=:rid" )
		->param ( ":rid", $rid )->get_one ()->execute ();
		
		Sys_payment::set_recharge_status($charge_info['uid'], $rid, $_GET['bank'], $charge_info['cash'],$_GET['bank']);
		
		// 充值日志
		Keke::admin_system_log ( $_lang ['confirm_payment_recharge'] . $rid );
	}
	function action_nopass(){
		if (($rid = $_GET ['rid']) == NULL) {
			return false;
		}
		if (CHARSET == 'gbk') {
			$_POST ['data'] = Keke::utftogbk ( $_POST ['data'] );
		}
		
		$data = $_POST ['data'];
		$columns = array ('status', 'mem' );
		$values = array ('fail', $data );
		$where = "rid = '$rid'";
		DB::update ( 'witkey_recharge' )->set ( $columns )->value ( $values )->where ( $where )->execute ();
		 
	}
}
