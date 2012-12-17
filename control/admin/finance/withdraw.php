<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 财务--提现审核
 *
 * @copyright keke-tech
 * @author fu
 * @version v 22
 *          2012-10-9 15:18:30
 */
class Control_admin_finance_withdraw extends Control_admin {
	function action_index() {
		// 定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K, $_lang;
		
		// 要显示的字段,即SQl中SELECT要用到的字段
		$fields = ' `wid`,`bank_username`,`bank_name`,`username`,`bank_account`,`type`,`cash`,`status` ';
		// 要查询的字段,在模板中显示用的
		$query_fields = array ('wid' => $_lang ['financial_id'], 'username' => $_lang ['username'], 'bank_username' => '收款人' );
		// 总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval ( $_GET ['count'] );
		// tool本来是一个目录，由于没有定义tool为目录的路由,所以这个控制层的文件来too_file So这里不能写为tool/file
		$base_uri = BASE_URL . "/index.php/admin/finance_withdraw";
		
		$del_uri = $base_uri . '/del';
		// 默认排序字段，这里按时间降序
		$this->_default_ord_field = 'wid';
		// 这里要口水一下，get_url就是处理查询的条件
		extract ( $this->get_url ( $base_uri ) );
		// 获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory ( 'witkey_withdraw' )->get_grid ( $fields, $where, $uri, $order, $page, $count, $_GET ['page_size'] );
		// 列表数据
		$list_arr = $data_info ['data'];
		// 分页数据
		$pages = $data_info ['pages'];
		
		// 银行
		$bank_arr = keke_global_class::get_bank ();
		
		// 提现状态 0待审核,1提现成功,2提现失败
		$status_arr = keke_global_class::withdraw_status ();
		
		require Keke_tpl::template ( 'control/admin/tpl/finance/withdraw' );
	}
	// 提现审核通过
	function action_pass() {
		if (($wid = $_GET ['wid']) == NULL) {
			return false;
		}
		$where = "wid='$wid'";
		// 更新状态
		DB::update ( 'witkey_withdraw' )->set ( array ('status' ) )->value ( array ('1' ) )->where ( $where )->execute ();
		// 提现信息
		$winfo = DB::select ()->from ( 'witey_withdraw' )->where ( $where )->get_one ()->execute ();
		// 生成out 财务记录,不能用cash_out;
		$columns = array ('fina_type', 'fina_action', 'uid', 'username', 'fina_cash', 'fina_time', 'obj_type', 'obj_id' );
		$values = array ('out', 'withdraw', $winfo ['uid'], $winfo ['username'], $winfo ['cash'], time (), 'withdraw', $wid );
		DB::insert ( 'witkey_finance' )->set ( $columns )->value ( $values )->execute ();
	}
	
	// 不通过审核
	function action_nopass() {
		// 不通审核，改变状态，加不上通过的理由
		if (($wid = $_GET ['wid']) == NULL) {
			return false;
		}
		if (CHARSET == 'gbk') {
			$_POST ['data'] = Keke::utftogbk ( $_POST ['data'] );
		}
		$data = $_POST ['data'];
		$columns = array ('status', 'mem' );
		$values = array ('2', $data );
		$where = "wid = '$wid'";
		DB::update ( 'witkey_withdraw' )->set ( $columns )->value ( $values )->where ( $where )->execute ();
		// 提现失败，退款给提现的人
		$winfo = DB::select ()->from ( 'witkey_withdraw' )->where ( $where )->get_one ()->execute ();
		Sys_finance::cash_out ( $winfo ['uid'], $winfo ['cash'], 'withdraw_fail' );
	}
}