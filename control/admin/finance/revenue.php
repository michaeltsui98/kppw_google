<?php

defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * @all ���ߣ�dengkang
 * 
 * @version v 2.2
 *          @date 2012-10-7
 */
class Control_admin_finance_revenue extends Control_admin {
	
	/**
	 * ��ˮͳ��
	 */
	function action_index() {
		// ����ȫ�ֱ��������԰���ֻҪ����ģ�壬����Ǳ���Ҫ����.��
		global $_K, $_lang;
		
		// ��ѯʱ��
		if ($_POST ['sbt_search']) {
			$st = $_POST ['st'];
			$ed = $_POST ['ed'];
		}
		// ������ύ�Ͳ�ѯ����
		$today = date ( 'Y-m-d', time () );
		$st or $st = $today;
		$ed or $ed = $today;
		if ($st == $ed && $st == $today) {
			$desc = "����";
		} elseif ($st == $ed && $ed != $today) {
			$desc = $st;
		} else {
			$desc = $st . '~' . $ed;
		}
		
		// �����ʱ������
		$f_sql = sprintf ( ' and  fina_time between %s and %s', strtotime ( $st ), strtotime ( $ed ) + 24 * 3600 );
		// ��ѯͳ�ƽ��
		$sql = ' select sum(fina_cash) cash,sum(fina_credit) credit,count(fina_id) count ';
		$t_sql = sprintf ( ' ,model_id from %switkey_finance a 
					   left join %switkey_task b on a.obj_id=b.task_id where  fina_action="pub_task"  
					    and model_id>0 ', TABLEPRE, TABLEPRE );
		// �ͽ��й�
		$task = Dbfactory::query ( $sql . $t_sql . $f_sql . ' group by model_id', 1, 3600 );
		$s_sql = sprintf ( ' ,model_id from %switkey_finance a 
					   left join %switkey_service b on a.obj_id=b.sid where obj_type="service" and fina_type = "in" 
					    and model_id>0 ', TABLEPRE, TABLEPRE );
		// ��������
		$service = Dbfactory::query ( $sql . $s_sql . $f_sql . ' group by model_id', 1, 3600 );
		// ��ֵ����
		$payitem = Dbfactory::get_one ( $sql . sprintf ( ' from %switkey_finance where fina_type="out"
						 and obj_type="payitem" ', TABLEPRE ) . $f_sql, 1, 3600 );
		// ʱ������
		$desc = '<font color="red">' . $desc . '</font>';
		// ��ַ
		$base_uri = BASE_URL . "/index.php/admin/finance_revenue";
		// ģ��
		require Keke_tpl::template ( 'control/admin/tpl/finance/re_all' );
	}
	
	/**
	 * ��ֵͳ��
	 */
	function action_charge() {
		// ʼʼ��ȫ�ֱ��������԰�����
		global $_K, $_lang;
		
		// ��ѯʱ��
		if ($_POST ['sbt_search']) {
			$st = $_POST ['st'];
			$ed = $_POST ['ed'];
		}
		// ������ύ�Ͳ�ѯ����
		$today = date ( 'Y-m-d', time () );
		$st or $st = $today;
		$ed or $ed = $today;
		if ($st == $ed && $st == $today) {
			$desc = "����";
		} elseif ($st == $ed && $ed != $today) {
			$desc = $st;
		} else {
			$desc = $st . '~' . $ed;
		}
		$desc = '<font color="red">' . $desc . '</font>';
		
		// �����ʱ������
		$f_sql = sprintf ( ' and  fina_time between %s and %s', strtotime ( $st ), strtotime ( $ed ) + 24 * 3600 );
		$sql = ' select sum(fina_cash) cash,sum(fina_credit) credit,count(fina_id) count ';
		$r_sql = sprintf ( ' ,obj_type from %switkey_finance
						 where INSTR(obj_type,"_charge")>0  and fina_type = "in"', TABLEPRE );
		$charge = Dbfactory::query ( $sql . $r_sql . $f_sql . ' group by obj_type ', 1, 3600 );
		// �û���ֵ
		$charge = Keke::get_arr_by_key ( $charge, 'obj_type' );
		$fina_type = Keke_global::get_fina_charge_type ();
		
		// ����ģ�壬���е��J8��,�����˶�����
		require Keke_tpl::template ( 'control/admin/tpl/finance/re_charge' );
	}
	
	/**
	 * ����ͳ��
	 */
	function action_withdraw() {
		// ʼʼ��ȫ�ֱ��������԰�����
		global $_K, $_lang;
		
		// ��ѯʱ��
		if ($_POST ['sbt_search']) {
			$st = $_POST ['st'];
			$ed = $_POST ['ed'];
		}
		// ������ύ�Ͳ�ѯ����
		$today = date ( 'Y-m-d', time () );
		$st or $st = $today;
		$ed or $ed = $today;
		if ($st == $ed && $st == $today) {
			$desc = "����";
		} elseif ($st == $ed && $ed != $today) {
			$desc = $st;
		} else {
			$desc = $st . '~' . $ed;
		}
		$desc = '<font color="red">' . $desc . '</font>';
		
		// ���ֱ�ʱ������
		$w_sql = sprintf ( ' and  on_time between %s and %s', strtotime ( $st ), strtotime ( $ed ) + 24 * 3600 );
		// �û�����
		$list = Dbfactory::query ( sprintf ( ' select sum(cash) cash, 
					count(wid) count,type from %switkey_withdraw where 1 = 1 ', TABLEPRE ) . $w_sql . ' group by type', 1, 3600 );
		$list && $list = Keke::get_arr_by_key ( $list, 'type' );
// 		 var_dump($list);
		$bank_arr = Keke_global::get_bank ();
		//$pay_online = Keke_global::get_payment_config ( '', 'online' );
		$pay_online = DB::select()->from('witkey_pay_api')->where("type='online'")->execute();
// 		var_dump($pay_online);
		// ����ģ�壬���е��J8��,�����˶�����
		require Keke_tpl::template ( 'control/admin/tpl/finance/re_withdraw' );
	}
	/**
	 * ��վ����ͳ��
	 */
	function action_profit() {
		// ʼʼ��ȫ�ֱ��������԰�����
		global $_K, $_lang;
		
		// ��ѯʱ��
		if ($_POST ['sbt_search']) {
			$st = $_POST ['st'];
			$ed = $_POST ['ed'];
		}
		// ������ύ�Ͳ�ѯ����
		$today = date ( 'Y-m-d', time () );
		$st or $st = $today;
		$ed or $ed = $today;
		if ($st == $ed && $st == $today) {
			$desc = "����";
		} elseif ($st == $ed && $ed != $today) {
			$desc = $st;
		} else {
			$desc = $st . '~' . $ed;
		}
		$desc = '<font color="red">' . $desc . '</font>';
		
		// ʱ������
		$f_sql = sprintf ( ' and  fina_time between %s and %s', strtotime ( $st ), strtotime ( $ed ) + 24 * 3600 );
		// ��ӯ����
		$sql = sprintf ( ' select sum(site_profit) c from %switkey_finance where site_profit>0 ', TABLEPRE );
		// �������ӯ��
		$task = Dbfactory::get_count ( $sql . ' and obj_type="task" ' . $f_sql, 0, 'c', 3600 );
		// �������
		$service = Dbfactory::get_count ( $sql . ' and obj_type="service" ' . $f_sql, 0, 'c', 3600 );
		// ��ֵ����
		$payitem = Dbfactory::get_count ( $sql . ' and obj_type="payitem" ' . $f_sql, 0, 'c', 3600 );
		// ��֤����
		$auth = Dbfactory::get_count ( $sql . ' and INSTR(obj_type,"_auth")>0 ' . $f_sql, 0, 'c', 3600 );
		// �û�����
		$withdraw = Dbfactory::get_count ( sprintf ( ' select sum(cash) c from %switkey_withdraw 
					where status=2 ', TABLEPRE ) , 0, 'c', 3600 );
		// ����
		$p_all = floatval ( $task + $service + $payitem + $auth + $withdraw );
		
		// ����ģ�壬���е��J8��,�����˶�����
		require Keke_tpl::template ( 'control/admin/tpl/finance/re_profit' );
	}
}
