<?php

defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * @all 作者：dengkang
 * 
 * @version v 2.2
 *          @date 2012-10-7
 */
class Control_admin_finance_revenue extends Control_admin {
	
	/**
	 * 流水统计
	 */
	function action_index() {
		// 定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K, $_lang;
		
		// 查询时间
		if ($_POST ['sbt_search']) {
			$st = $_POST ['st'];
			$ed = $_POST ['ed'];
		}
		// 如果不提交就查询今天
		$today = date ( 'Y-m-d', time () );
		$st or $st = $today;
		$ed or $ed = $today;
		if ($st == $ed && $st == $today) {
			$desc = "今天";
		} elseif ($st == $ed && $ed != $today) {
			$desc = $st;
		} else {
			$desc = $st . '~' . $ed;
		}
		
		// 财务表时间区间
		$f_sql = sprintf ( ' and  fina_time between %s and %s', strtotime ( $st ), strtotime ( $ed ) + 24 * 3600 );
		// 查询统计金额
		$sql = ' select sum(fina_cash) cash,sum(fina_credit) credit,count(fina_id) count ';
		$t_sql = sprintf ( ' ,model_id from %switkey_finance a 
					   left join %switkey_task b on a.obj_id=b.task_id where  fina_action="pub_task"  
					    and model_id>0 ', TABLEPRE, TABLEPRE );
		// 赏金托管
		$task = Dbfactory::query ( $sql . $t_sql . $f_sql . ' group by model_id', 1, 3600 );
		$s_sql = sprintf ( ' ,model_id from %switkey_finance a 
					   left join %switkey_service b on a.obj_id=b.sid where obj_type="service" and fina_type = "in" 
					    and model_id>0 ', TABLEPRE, TABLEPRE );
		// 服务销售
		$service = Dbfactory::query ( $sql . $s_sql . $f_sql . ' group by model_id', 1, 3600 );
		// 增值购买
		$payitem = Dbfactory::get_one ( $sql . sprintf ( ' from %switkey_finance where fina_type="out"
						 and obj_type="payitem" ', TABLEPRE ) . $f_sql, 1, 3600 );
		// 时间描述
		$desc = '<font color="red">' . $desc . '</font>';
		// 地址
		$base_uri = BASE_URL . "/index.php/admin/finance_revenue";
		// 模板
		require Keke_tpl::template ( 'control/admin/tpl/finance/re_all' );
	}
	
	/**
	 * 充值统计
	 */
	function action_charge() {
		// 始始化全局变量，语言包变量
		global $_K, $_lang;
		
		// 查询时间
		if ($_POST ['sbt_search']) {
			$st = $_POST ['st'];
			$ed = $_POST ['ed'];
		}
		// 如果不提交就查询今天
		$today = date ( 'Y-m-d', time () );
		$st or $st = $today;
		$ed or $ed = $today;
		if ($st == $ed && $st == $today) {
			$desc = "今天";
		} elseif ($st == $ed && $ed != $today) {
			$desc = $st;
		} else {
			$desc = $st . '~' . $ed;
		}
		$desc = '<font color="red">' . $desc . '</font>';
		
		// 财务表时间区间
		$f_sql = sprintf ( ' and  fina_time between %s and %s', strtotime ( $st ), strtotime ( $ed ) + 24 * 3600 );
		$sql = ' select sum(fina_cash) cash,sum(fina_credit) credit,count(fina_id) count ';
		$r_sql = sprintf ( ' ,obj_type from %switkey_finance
						 where INSTR(obj_type,"_charge")>0  and fina_type = "in"', TABLEPRE );
		$charge = Dbfactory::query ( $sql . $r_sql . $f_sql . ' group by obj_type ', 1, 3600 );
		// 用户充值
		$charge = Keke::get_arr_by_key ( $charge, 'obj_type' );
		$fina_type = Keke_global::get_fina_charge_type ();
		
		// 加载模板，这有点费J8话,地球人都懂的
		require Keke_tpl::template ( 'control/admin/tpl/finance/re_charge' );
	}
	
	/**
	 * 提现统计
	 */
	function action_withdraw() {
		// 始始化全局变量，语言包变量
		global $_K, $_lang;
		
		// 查询时间
		if ($_POST ['sbt_search']) {
			$st = $_POST ['st'];
			$ed = $_POST ['ed'];
		}
		// 如果不提交就查询今天
		$today = date ( 'Y-m-d', time () );
		$st or $st = $today;
		$ed or $ed = $today;
		if ($st == $ed && $st == $today) {
			$desc = "今天";
		} elseif ($st == $ed && $ed != $today) {
			$desc = $st;
		} else {
			$desc = $st . '~' . $ed;
		}
		$desc = '<font color="red">' . $desc . '</font>';
		
		// 提现表时间区间
		$w_sql = sprintf ( ' and  on_time between %s and %s', strtotime ( $st ), strtotime ( $ed ) + 24 * 3600 );
		// 用户提现
		$list = Dbfactory::query ( sprintf ( ' select sum(cash) cash, 
					count(wid) count,type from %switkey_withdraw where 1 = 1 ', TABLEPRE ) . $w_sql . ' group by type', 1, 3600 );
		$list && $list = Keke::get_arr_by_key ( $list, 'type' );
		// var_dump($list);
		$bank_arr = Keke_global::get_bank ();
		$pay_online = Keke_global::get_payment_config ( '', 'online' );
		
		// 加载模板，这有点费J8话,地球人都懂的
		require Keke_tpl::template ( 'control/admin/tpl/finance/re_withdraw' );
	}
	/**
	 * 网站利润统计
	 */
	function action_profit() {
		// 始始化全局变量，语言包变量
		global $_K, $_lang;
		
		// 查询时间
		if ($_POST ['sbt_search']) {
			$st = $_POST ['st'];
			$ed = $_POST ['ed'];
		}
		// 如果不提交就查询今天
		$today = date ( 'Y-m-d', time () );
		$st or $st = $today;
		$ed or $ed = $today;
		if ($st == $ed && $st == $today) {
			$desc = "今天";
		} elseif ($st == $ed && $ed != $today) {
			$desc = $st;
		} else {
			$desc = $st . '~' . $ed;
		}
		$desc = '<font color="red">' . $desc . '</font>';
		
		// 时间区间
		$f_sql = sprintf ( ' and  fina_time between %s and %s', strtotime ( $st ), strtotime ( $ed ) + 24 * 3600 );
		// 总盈利额
		$sql = sprintf ( ' select sum(site_profit) c from %switkey_finance where site_profit>0 ', TABLEPRE );
		// 任务分类盈利
		$task = Dbfactory::get_count ( $sql . ' and obj_type="task" ' . $f_sql, 0, 'c', 3600 );
		// 服务分类
		$service = Dbfactory::get_count ( $sql . ' and obj_type="service" ' . $f_sql, 0, 'c', 3600 );
		// 增值服务
		$payitem = Dbfactory::get_count ( $sql . ' and obj_type="payitem" ' . $f_sql, 0, 'c', 3600 );
		// 认证服务
		$auth = Dbfactory::get_count ( $sql . ' and INSTR(obj_type,"_auth")>0 ' . $f_sql, 0, 'c', 3600 );
		// 用户提现
		$withdraw = Dbfactory::get_count ( sprintf ( ' select sum(cash) c from %switkey_withdraw 
					where status=2 ', TABLEPRE ) , 0, 'c', 3600 );
		// 所有
		$p_all = floatval ( $task + $service + $payitem + $auth + $withdraw );
		
		// 加载模板，这有点费J8话,地球人都懂的
		require Keke_tpl::template ( 'control/admin/tpl/finance/re_profit' );
	}
}
