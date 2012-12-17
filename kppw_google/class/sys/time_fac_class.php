<?php

class time_fac_class {
	protected $_basic_config;
	
	function __construct() {
		global $kekezu;
		$this->_basic_config = Keke::$_sys_config;
	}
	function run() {
		global $model_list;
		$model_list = $model_list ? $model_list : Keke::get_table_data ( 'witkey_model', 'model_status=1', '', null, 'model_id' );
		foreach ( $model_list as $model_info ) {
			$model_dir = $model_info ['model_dir'];
			if (file_exists ( S_ROOT . "./task/$model_dir" ))
				$m = strtolower ( $model_dir ) . "_time_class";
			if (class_exists ( $m )) {
				$time_obj = new $m ();
				$time_obj->validtaskstatus ();
			}
		}
		keke_task_class::hp_timeout(7);
	}

}

?>