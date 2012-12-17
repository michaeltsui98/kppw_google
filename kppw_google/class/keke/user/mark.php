<?php
/**
 * 用户互评类
 * @author michael
 * 2012-10-24
 *
 */
class Keke_user_mark {
    /**
     * 互评状态
     * @return array  
     */
	public static $_mark_status= array('1'=>'好评','2'=>'中评','3'=>'差评');
	
	/**
	 * 互评项的键值对
	 * @return array et 
	 */
	public static function get_aid_name($aid){
		$aids = DB::select()->from('witkey_mark_aid')->cached()->execute();
		$aids = Keke::get_arr_by_key($aids,'aid');
		$aid_arr = explode(',', $aid);
		$t = array();
		foreach($aid_arr as $v){
		 	$t[] = $aids[$v]['aid_name'];
		}
		return $t;
	}
	/**
	 * 将空值变为0
	 * @param float $e
	 * @return number
	 */
	public static function tozero(&$e){
		if(!$e){
			$e=0;
		}
		return $e;
	}
	
}
