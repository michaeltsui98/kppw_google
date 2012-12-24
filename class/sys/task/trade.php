<?php
/**
 * 任务交易基类
 * @author Michael 
 * @version 3.0 2012-12-20
 */
abstract class Sys_task_trade {
	
	private  static $_instance = array();
	
	private  static $_default = 'sreward';
	
	private $_task_info = array();

	/**
	 * 
	 * @param string $name 任务名称
	 * @return Control_task_sreward_trade
	 */
	public  static function instance($name=NUll){
		 
		if ($name === NULL) {
			$name =  self::$_default;
		}
		if(isset(self::$_instance[$name])){
			return self::$_instance[$name];
		}
		$class = 'Control_task_'.$name.'_trade';
		self::$_instance[$name] = new $class;
		return self::$_instance[$name];
	}
 	/**
 	 * 发布任务
 	 */
	abstract public function task_pub();
	/**
	 * 设置任务信息
	 * @param array $arr
	 */
	public function set_task_info($arr){
		$this->_task_info = $arr;
	}
	
}
