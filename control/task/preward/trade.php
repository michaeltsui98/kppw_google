<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �Ƽ�����ҵ������
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_preward_trade extends Sys_task_trade{
    
	/**
	 * @return ���ؼƼ���������״̬
	 */
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang ['task_no_pay'], "1" => $_lang ['task_wait_audit'], "2" => $_lang ['task_vote_choose'], "3" => $_lang ['task_choose_work'], "7" => $_lang ['freeze'], "8" => $_lang ['task_over'], "9" => $_lang ['fail'], "10" => $_lang ['task_audit_fail']);
	}
	/**
	 * @return ���ؼƼ����͸��״̬
	 * 
	 */
	public static function get_work_status() {
		global $_lang;
		return array ('6' => $_lang ['hg'], '7' => $_lang ['not_recept'], '8' => $_lang ['task_can_not_choose_bid'] );
	}

}