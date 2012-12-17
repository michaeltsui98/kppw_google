<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * @desc 权限悬赏控制类
 * @version 2011-08-25 13:27:34
 */
class goods_priv_class extends keke_privission_class{
	
	public static function get_instance($model_id) {
		static $obj = null;
		if ($obj == null) {
			$obj = new goods_priv_class($model_id);
		}
		return $obj;
	}
	
	public function __construct($model_id){
		parent::__construct($model_id);		
	}
	
	public static function get_priv($mode_id,$user_info,$role='1') {
		return parent::get_priv($mode_id, $user_info,$role);
	}
}

?>