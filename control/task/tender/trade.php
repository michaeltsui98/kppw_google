<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��������ҵ������
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_tender_trade extends Sys_task_trade{
    
	/**
	 *
	 * @return ������ͨ�б�����״̬
	 */
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang['task_no_pay'], "1" => $_lang['task_wait_audit'], "2" => $_lang['tendering'], "3" => $_lang['choose_tendering'], "4" => $_lang['working'], "7" => $_lang['freeze'], "8" => $_lang['task_over'], "9" => $_lang['fail'], "10" => $_lang['task_audit_fail']);
	
	}
	
	/**
	 *
	 * @return ������ͨ�б���״̬
	 *
	 */
	public static function get_work_status() {
		global $_lang;
		return array ('4' => $_lang['task_bid'], '7' => $_lang['task_out'], '8' => $_lang['task_can_not_choose_bid'] );
	
	}
}