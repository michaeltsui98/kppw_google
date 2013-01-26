<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��������ҵ������
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_task_dtender_trade extends Sys_task_trade{
    
	/**
	 * @return ���ض����б�����״̬
	 */
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang ['task_no_pay'], "1" => $_lang ['task_wait_audit'], "2" => $_lang ['tendering'], "3" => $_lang ['choosing_tender'], "4" => $_lang ['wait_trust'], "6" => $_lang ['jfing'], "7" => $_lang ['freezing'], "8" => $_lang ['task_over'], "9" => $_lang ['haved_fail'], "10" => $_lang ['task_audit_fail'], "11" => $_lang ['arbitrating'] );
	}
	
	/**
	 * @return ���ض����б�Ͷ��״̬
	 * 
	 */
	public static function get_work_status() {
		global $_lang;
		return array ('4' => $_lang ['task_bid'], '7' => $_lang ['not_eligibility'], '8' => $_lang ['task_can_not_choose_bid'] );
	}
	
	/**
	 * @return���ؼƻ�״̬
	 * @see keke_task_class::work_hand()
	 */
	public static function get_plan_status() {
		global $_lang;
		return array ('0' => $_lang ['wait_complete'], '1' => $_lang ['wait_pay'], '2' => $_lang ['plan_complete'] );
	}
	public function work_hand($work_desc, $file_ids, $hidework = '2', $url = '', $output = 'normal') {
	}
	
}