<?php

/** 
 * @author michael
 * @property 服务发布类 
 */
class service_release_class extends keke_shop_release_class {
	public static function get_instance($model_id) {
		static $obj = null;
		if ($obj == null) {
			$obj = new service_release_class ( $model_id );
		}
		return $obj;
	}
	function __construct($model_id) {
		parent::__construct ( $model_id );
		$this->get_service_config ();
		//$this->priv_init();待定
	}
	/**
	 * 初始化服务配置
	 * @return   void
	 */
	public function get_service_config() {
		global $model_list;
		$model_list [$this->_model_id] ['config'] and $this->_service_config = unserialize ( $model_list [$this->_model_id] ['config'] ) or $this->_service_config = array ();
	}
	
	/**
	 * 服务发布
	 * 		此方法只是用来产生服务记录
	 * @param $obj_name session存储对象名
	 */
	public function pub_service() {
		$service_obj = $this->_service_obj;
		$std_obj = $this->_std_obj;
		//发布信息公共处理部
		$this->public_pubservice();
		//根据服务总花费来确顶服务发布状态
		$service_cash = $this->_std_obj->_release_info['txt_price'];//服务金额
		$this->set_service_status($service_cash);
		//服务发布
		$service_id = $service_obj->create_keke_witkey_service();
		return $service_id;
	}
	
}