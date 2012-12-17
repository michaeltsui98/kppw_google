<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 单赏任务交易处理类
 * @author Michael
 * @version 2.2
   2012-10-19
 */

class Control_task_sreward_trade extends Sys_task_trade{
    
	/**
	 * @return 返回单人悬赏任务状态
	 */
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang ['task_no_pay'], "1" => $_lang ['task_wait_audit'], "2" => $_lang ['task_vote_choose'], "3" => $_lang ['task_choose_work'], "4" => $_lang ['task_vote'], "5" => $_lang ['task_gs'], "6" => "交付", "7" => $_lang ['freeze'], "8" => $_lang ['task_over'], "9" => $_lang ['fail'], "10" => $_lang ['task_audit_fail'], "11" => $_lang ['arbitrate'], '13' => $_lang ['agreement_frozen'] );
	}
	
	/**
	 * @return 返回单人悬赏稿件状态
	 */
	public static function get_work_status() {
		global $_lang;
		return array ('0' => $_lang ['wait_choose'], '4' => $_lang ['task_bid'], '5' => $_lang ['task_in'], '7' => $_lang ['task_out'], '8' => $_lang ['task_can_not_choose_bid'] );
	}
	/**
	 * @return 返回任务英文状态
	 */
	public static function get_task_union_status() {
		return array ('0' => "wait", '1' => "audit", '2' => "sub", '3' => "choose", '4' => "vote", '5' => "notice", '6' => 'deliver', '7' => "freeze", '8' => "end", '9' => "failure", '10' => "audit_fail", '11' => "arbitrate" );
	}
}