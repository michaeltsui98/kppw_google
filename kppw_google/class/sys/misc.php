<?php   defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

/**
 * 系统杂项
 * 
 * @author Michael
 *
 */
class Sys_misc {
	
	/**
	 * 招标区间,默认只取普通招标，
	 * $all == true 取全部的招标区间 
	 * @param string  $model_code
	 * @param bool $all
	 */
	public static function get_cash_cove($model_code = 'tender', $all = false) {
		$w = '';
		if ($all === false) {
			$w = " model_code ='$model_code'";
		}
		return Keke::get_table_data ( '*', "witkey_task_cash_cove", $w, "start_cove", '', '', 'cash_rule_id', null );
	}
}
