<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 普招任务业务处理类
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_task_tender_task extends Control_task_task{
    
	/**
	 *
	 * @return 返回普通招标任务状态
	 */
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang['task_no_pay'], "1" => $_lang['task_wait_audit'], "2" => $_lang['tendering'], "3" => $_lang['choose_tendering'], "4" => $_lang['working'], "7" => $_lang['freeze'], "8" => $_lang['task_over'], "9" => $_lang['fail'], "10" => $_lang['task_audit_fail']);
	
	}
	
	/**
	 *
	 * @return 返回普通招标稿件状态
	 *
	 */
	public static function get_work_status() {
		global $_lang;
		return array ('4' => $_lang['task_bid'], '7' => $_lang['task_out'], '8' => $_lang['task_can_not_choose_bid'] );
	
	}
}