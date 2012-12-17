<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * @desc 权限悬赏控制类
 * @version 2011-08-25 13:27:34
 */
class service_permission_class extends keke_permission_class{
	
	public static function get_instance($model_id,$user_info=null,$op_code=null,$role=null) {
		static $obj = null;
		if ($obj == null) {
			$obj = new service_permission_class($model_id,$user_info,$op_code,$role);
		}
		return $obj;
	}
	
	public function __construct($model_id,$user_info=null,$op_code=null,$role=null){
		parent::__construct($model_id);
		$this->_uid       =  $user_info['uid'];
		$this->_user_info =  $user_info;
		$this->_op_code   =  $op_code;
		$this->_role      =  $role;
	}
	
	public function a(){
		
	}
}

?>