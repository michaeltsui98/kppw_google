<?php
/**
 * 描述这个类的功能的与作用:
 * 支付回调抽象类
 * @类别：公共
 * @作者：shangk
 * @版本号  更新时间2010-08-10，更新时间2010-08-10
 * 
 */
abstract  class pay_return_base_class {
	var $_model_id;
	var $_uid;
	var $_username;
	var $_charge_type;
	var $_order_id;
	var $_total_fee;
	var $_obj_id;
	var $_userinfo;
	function __construct($charge_type, $model_id = '', $uid = '', $obj_id = '', $order_id = '', $total_fee = '') {
		$this->_userinfo = Keke::get_user_info ( $uid );
		$this->_model_id = intval ( $model_id );
		$this->_uid = intval ( $uid );
		$this->_username = $this->_userinfo ['username'];
		$this->_charge_type = $charge_type;
		$this->_order_id = intval ( $order_id );
		$this->_total_fee = $total_fee;
		$this->_obj_id = intval ( $obj_id );
	}
	public function __set($property_name, $value) {
		$this->$property_name = $value;
	}
	
	public function __get($property_name) {
		if (isset ( $this->$property_name )) {
			return $this->$property_name;
		} else {
			return null;
		}
	}
	
	
	abstract function order_charge();

 
}
