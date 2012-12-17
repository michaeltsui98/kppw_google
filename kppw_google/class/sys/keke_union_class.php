<?php
/**
 * @todo 联盟任务处理类
 * @author H.R.
 */
require_once S_ROOT . '/client/keke/keke_tool_class.php';
require_once S_ROOT . '/client/keke/keke_service_class.php';
require_once S_ROOT . '/client/keke/config.php';

class keke_union_class {
	private $_task_id; //任务id
	private $_model_id; //模型id
	private $_r_task_id; //联盟id
	private $_model_code; //模型code
	private $_config; //配置
	private  $_data; //回调响应数组
	

	function __construct($task_id, $data = array()) {
		global $config;
		if (! empty ( $task_id )) {
			$this->_config = $config;
			$this->_task_id = intval ( $task_id );
			$this->init_task ( $task_id ); //初始化联盟任务相关数据
		}
		$this->_data = $data;
	}
	private function init_task($task_id = '') {
		if (! $this->_task_id && $task_id) {
			$this->_task_id = $task_id;
		}
		$sql = "select `task_id`,`model_id`,`task_union`,`r_task_id` from `%switkey_task` where task_id=%d";
		$result = dbfactory::get_one ( sprintf ( $sql, TABLEPRE, $this->_task_id ) );
		if (! $result || ! $result ['task_union']) { //如果不是联盟任务,返回.
			return false;
		}
		$this->_model_id = $result ['model_id'];
		$this->_r_task_id = $result ['r_task_id'];
		$this->_model_code = $this->get_model_code ();
	
	}
	/**
	 * 联盟socket请求
	 * @param  $service 接口类型
	 * @param  $comm_data 传递参数
	 * @param  $return_type 返回类型 url/form
	 * @param  $method 提交方式post
	 * @param  $sign_type 签名类型
	 * @param  $_input_charset 字符编码
	 */
	public static function union_request($service,$comm_data= array(),$return_type = 'url', $method = 'post',$sign_type = 'MD5',$_input_charset = 'GBK'){
		global $config;
		$request = keke_tool_class::union_build($config, $service,$comm_data,$return_type,$method,$sign_type,$_input_charset);
		Keke::socket_request ( $request );
	}
	/**
	 * 创建联盟任务
	 * @param int $task_id 任务编号
	 * @param boolean $is_return 是否回调
	 * 
	 */
	 function create_task($task_id, $is_return = false) {
		global $_K;
		switch ($is_return) {
			case false :
				global $config, $kekezu, $_K;
				$sql = "select `task_id`,`model_id`,`task_cash_coverage`,`task_cash`,`task_title`,`task_status`,`username`,`start_time`,`end_time` from %switkey_task where task_id=%d and task_union=0";
				$task_info = dbfactory::get_one ( sprintf ( $sql, TABLEPRE, intval ( $task_id ) ) );
				if (! $task_info) {
					return false;
				}
				$model_code = Keke::$_model_list [$task_info ['model_id']] ['model_code'];
				$task_info ['task_cash_coverage'] and $task_info ['cash_coveage'] = self::get_cash_cove ( $task_info ['task_cash_coverage'] );
				$class_name = $model_code. '_task_class'; //对应的class name
				$task_status_arr = call_user_func ( array ($class_name, 'get_task_union_status' ) ); //对应的状态数组
				$task_info ['task_status'] = $task_status_arr [$task_info ['task_status']];
				$task_info ['task_owner']  = $task_info['username'];
				$task_info ['outer_task_id']= "{$model_code}-{$task_id}";
				$task_info ['task_amount']  = $task_info['task_cash'];
				$inter = 'create_task'; //对应接口
				$request = keke_tool_class::union_build ( $config, $inter, $task_info );
				return $request;
				break;
			case true:
				$data  = $this->_data;
				$response = array ();
				$url = $_K ['siteurl'] . "/index.php?do=task&task_id=" . $data['task_id'];
				$response ['url'] = $url;
				switch ($data['is_success']) {
					case "T" : //成功响应
						$sql = sprintf ( " update %switkey_task set r_task_id ='%d',task_union='1' where task_id='%d'", TABLEPRE, $data['r_task_id'], $data['task_id']);
						$res = dbfactory::execute ( $sql );
						$response ['type'] = "success";
						$response ['notice'] = "联盟任务发布成功";
						break;
					case "F" :
						$response ['type'] = "error";
						$response ['notice'] = "联盟任务发布失败";
						break;
				}
				return $response;
				break;
		}
	}
	/**
	 * 交稿接口
	 * @param int $wrok_id
	 * @param $is_return 是否回调
	 */
	public function work_hand($work_id, $is_return = false) {
		global $uid;
		switch ($is_return) {
			case false :
				if (! $work_id || ! $uid) {
					return false;
				}
				//查找对应的relation是否存在
				$sql = "select * from %switkey_task_relation where task_id=%d and uid=%d";
				$relation_arr = dbfactory::get_one ( sprintf ( $sql, TABLEPRE, $this->_task_id, $uid ) );
				if (! $relation_arr) {
					return false;
				}
				$inter = 'hand_work'; //对应接口
				$comm_data = array ('model_code' => $this->_model_code, 'task_id' => $this->_task_id, 'r_task_id' => $this->_r_task_id, 'source_app_id' => $relation_arr ['app_id'], 'work_id' => intval ( $work_id ) );
				$url = keke_tool_class::union_build ( $this->_config, $inter, $comm_data );
				Keke::socket_request ( $url, $this->_config ['_input_charset'] );
				break;
			case true :
				$response = array ();
				$url = '';
				$response ['url'] = $url;
				switch ($this->_data ['is_success']) {
					case "T" : //成功响应
						$response ['type'] = "success";
						$response ['notice'] = "成功";
						break;
					case "F" :
						$response ['type'] = "error";
						$response ['notice'] = "失败";
						break;
				}
				return $response;
				break;
		}
	}
	
	/**
	 * 稿件中标
	 * @param string $work_status 默认,不用写
	 */
	public function work_choose($work_id, $to_status = '4') {
		if (! $work_id) {
			return false;
		}
		$status_arr = call_user_func ( array ($this->_model_code . '_task_class', 'get_work_union_status'));
		$inter = 'change_status'; //对应接口
		$comm_data = array ('model_code' => $this->_model_code, 'task_id' => $this->_task_id, 'r_task_id' => $this->_r_task_id, 'work_id' => intval ( $work_id ), 'work_status' => $status_arr [$to_status] );
		$url = keke_tool_class::union_build ( $this->_config, $inter, $comm_data );
		Keke::socket_request ( $url, $this->_config ['_input_charset'] ); //更改状态，直接从server端获取。
	}
	
	/**
	 * 改变任务状态_通知服务端
	 * @param enum $status array('end','failure')
	 * @param boolean $is_return 是否回调
	 */
	public function change_status($status = 'end', $is_return = false) {
		switch ($is_return) {
			case false :
				if (! in_array ( $status, array ('end', 'failure' ) )) {
					return false;
				}
				$inter = 'change_status'; //对应接口
				$comm_data = array ('model_code' => $this->_model_code, 'task_id' => $this->_task_id, 'r_task_id' => $this->_r_task_id, 'task_status' => $status );
				$url = keke_tool_class::union_build ( $this->_config, $inter, $comm_data );
				Keke::socket_request ( $url, $this->_config ['_input_charset'] ); //更改状态，直接从server端获取。
				break;
			case true :
				$data = $this->_data;
				$response = array ();
				$url = '';
				$response ['url'] = $url;
				switch ($data['is_success']) {
					case "T" : //成功响应
						if ($data['task_status']) {
							$status_arr = call_user_func ( array ($data['model_code'] . '_task_class', 'get_task_union_status'));
							$status_arr = array_flip ( $status_arr );
							$task_status = $status_arr [$data['task_status']];
							$res = dbfactory::execute ( sprintf ( " update %switkey_task set task_status='%d' where r_task_id ='%d'", TABLEPRE, $task_status, $data['r_task_id']) );
						}
						$response ['type'] = "success";
						$response ['notice'] = "状态修改成功";
						break;
					case "F" :
						$response ['type'] = "error";
						$response ['notice'] = "失败";
						break;
				}
				return $response;
				break;
		}
	}
	/**
	 * union查看任务->跳转至对应的目标页面
	 * @param $r_task_id 对应的联盟任务id
	 */
	public function view_task() {
		$r_task_id = $this->_r_task_id;
		if (! $r_task_id) {
			return false;
		}
		$inter = 'save_relation';
		$comm_data = array ('r_task_id' => intval ( $r_task_id ) );
		$jump_url = keke_tool_class::union_build ( $this->_config, $inter, $comm_data );
		self::jump ( $jump_url );
	}
	
	/**
	 * 获取金额区间
	 */
	static function get_cash_cove($rule_id) {
		//$cove = dbfactory::get_one ( sprintf ( " select start_cove,end_cove from %switkey_task_cash_cove where cash_rule_id='%d'", TABLEPRE, $rule_id ) );
		global $kekezu;
		$cove_arr = $kekezu->get_cash_cove();
		$cove = $cove_arr[$rule_id];
		return $cove ['start_cove'] . '-' . $cove ['end_cove'];
	}
	/**
	 * 获取服务器上的 任务列表(帅选前)
	 */
	static function get_task_list() {
		global $config;
		$inter = 'get_task'; //对应接口
		$config ['return_url'] = str_replace ( '&', '|', 'http://' . $_SERVER [SERVER_NAME] . $_SERVER [REQUEST_URI] );
		$request = keke_tool_class::union_build ( $config, $inter );
		self::jump ( $request );
	}

	/**
	 * model_code
	 */
	private function get_model_code() {
		global $kekezu;
		$model_arr = Keke::$_model_list;
		return $model_arr [$this->_model_id] ['model_code'];
	}
	static function jump($url) {
		header ( 'Location:' . $url );
	}
}