<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 使用例子
 * Sys_feed::get_instance()->set_user($task_info['uid'], $task_info['username'])
		->set_action('发布了任务')
		->set_obj('task', $this->_task_id, $task_info['task_title'])
		->to_feed();
 * @author Michael
 * @version  3.0 2012-12-31
 *
 */
class Sys_feed {
	
	protected  $_uid;
	protected  $_username;
	//protected static $_space_url = ':php_url/space/:uid';
	protected $_action;
	protected $_obj_id;
	protected $_obj_title;
	protected $_obj_type;
	protected $_obj_cash;
	
	private static $_instance ;
	
	public static  function get_instance(){
		if(self::$_instance){
			return self::$_instance;
		}
		return self::$_instance = new self();
	}
	
	function set_user($uid,$username){
		$this->_uid = $uid;
		$this->_username = $username;
		return $this;
	}
	function set_action($action){
		$this->_action = $action;
		return $this;
	}
	function set_obj($obj_type,$obj_id,$obj_title,$obj_cash=NULL){
		$this->_obj_id = $obj_id;
		$this->_obj_title = $obj_title;
		$this->_obj_type = $obj_type;
		$this->_obj_cash = (float)$obj_cash;
		return $this;
	}
	function to_feed(){
		$arr = array('uid'=>$this->_uid,'username'=>$this->_username,
				'action'=>$this->_action,
				'obj_id'=>$this->_obj_id,
				'obj_title'=>$this->_obj_title,
				'obj_type'=>$this->_obj_type,
				'obj_cash'=>$this->_obj_cash,
				'feed_time'=>(int)SYS_START_TIME
		);
		return (int)DB::insert('witkey_feed')->set(array_keys($arr))->value(array_values($arr))->execute();
	}	
	/**
	 * 生成feed 的时间描述
	 * @param int $feed_time   -------- 时间戳
	 * @return string 一天前
	 */
	static function feed_time($feed_time) {
		global $_lang;
		$time = time () - $feed_time;
		$time_desc = Keke::time2Units ( $time, 'hour' );
		if ($time_desc) {
			return $_lang ['in'] . $time_desc . $_lang ['before'];
		} else {
			return $_lang ['just'];
		}
	}
	
}//end