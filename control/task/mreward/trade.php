<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��������ҵ������
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_mreward_trade extends Sys_task_trade{
	/**
	 * @return ���ض�����������״̬
	 */
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang ['task_no_pay'], "1" => $_lang ['task_wait_audit'], "2" => $_lang ['task_vote_choose'], "3" => $_lang ['task_choose_work'], "5" => $_lang ['task_gs'], "7" => $_lang ['freeze'], "8" => $_lang ['task_over'], "9" => $_lang ['fail'], "10" => $_lang ['task_audit_fail']);
	}
	
	/**
	 * @return ���ض������͸��״̬
	 *
	 */
	public static function get_work_status() {
		global $_lang;
		return array ('1' => $_lang ['prize_1'], '2' => $_lang ['prize_2'], "3" => $_lang ['prize_3'], '8' => $_lang ['task_can_not_choose_bid'] );
	}
}