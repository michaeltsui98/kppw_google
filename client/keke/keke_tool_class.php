<?php
/**
 * 
 * 客客推广联盟，工厂处理类
 * @author Administrator
 *
 */
class keke_tool_class {
	
	/**
	 * 客客联盟通讯链接快熟构造
	 * [所有业务的初始请求发起都可由此函数完成]
	 * @param array $param_data 外部传递的业务参数数组
	 * @param string $return_type 希望的返回类型  [url=>请求链接,form=>请求表单]
	 * @param string $method 可选，表单提交方式 post/get
	 * @return url/html_form 请求链接或表单
	 */
	public static function union_build($config, $service, $param_data = array(), $return_type = 'url', $method = 'post', $sign_type = 'MD5', $_input_charset = 'GBK') {
		$union_obj = new keke_service_class ( $config, $service, $sign_type, $_input_charset );
		$params = $union_obj->_params;
		$service = $union_obj->_service;
		$format_data = self::$service ($param_data,false); //参数处理
		$format_data and $params = array_merge ( $params, $format_data );
		$func_name = "build_" . $return_type;
		$url = $union_obj->$func_name ($params,$method);
		return $url;
	}
	/**
	 * 接口名称数组
	 * @param string $service 接口简写
	 */
	public static function keke_interface() {
		return $param_arr = array (
					"create_task" =>"keke.task.create",
					"get_task" => "keke.task.get",
				    'task_close'=>'keke.task.close',
					'keke_login'=>'keke.login',
					'verify'=>'keke.notify.verify'
		);
	}
	/**
	 * 任务创建
	 * @param array $data
	 * @return array $param_data
	 */
	public static function create_task($data = array()) {
		return $param_data = array (
					'outer_task_id'=>$data['outer_task_id'],
					'task_amount'=>$data['task_amount'],
					'task_title'=>$data['task_title'],
					'task_status'=>$data['task_status'],
					'task_desc'=>$data['task_desc'],
					'task_uid'=>$data['task_uid'],
					'task_owner'=>$data['task_owner'],
 					'cash_coveage'=>$data['cash_coveage'],
					'start_time'=>$data['start_time'],
					'sub_time'=>$data['sub_time']
		);
		
	}
	
	/**
	 * 任务关闭task.close
	 */
	public static function task_close($data=array()){
		return $param_data = array (
					'r_task_id'=>$data['r_task_id'],
					 'indetify'=>$data['indetify'],
					'bid_uid'=>$data['bid_uid']
		);
	}
	/**
	 * 获取任务
		[用户在本地录入获取任务时通知联盟]
	 * @param array $data
	 * @param $is_return 是否回调
	 * @return array $param_data
	 */
	public static function get_task($data = array(),$is_return=false) {
		switch ($is_return){
			case false:
				return $param_data = array (
						'log_details'=>$data['log_details']
				);
				break;
			case true://回调处理
// 				file_put_contents('hello.txt', $data);
				break;
		}

		
	}
	/**
	 * 用户登陆
	 * @param array $data
	 * @param $is_return 是否回调
	 * @return array $param_data
	 */
	public static function keke_login($data = array(),$is_return=false) {
		switch ($is_return){
			case false:
				return $param_data = array(
				'r_task_id'=>$data['r_task_id'],
				'from_uid'=>$data['from_uid'],
				'from_username'=>$data['from_username'],
				'to_uid'=>$data['to_uid'],
				'to_username'=>$data['to_username'],
				'releation_id'=>$data['releation_id']);
				break;
			case true://回调处理
				break;
		}
		
	}
	
	/**
	 * 响应函数
	 * @param unknown_type $url
	 * @param unknown_type $content
	 * @param unknown_type $type success /fail
	 */
	public static function notify($url,$content,$type='success'){
		global $_lang;
		header("Location:".$url);
		switch($type){
			case "success":
				header("Location:".$url);
				//kekezu::show_msg($_lang['operate_notice'],$url,3,$content,'success');
				break;
			case "error":
				kekezu::show_msg($_lang['operate_notice'],$url,3,$content,'warning');
				break;
		}
	}
	/**
	 * 错误掏出
	 */
	public static function output_error($error){
		global $_lang;
		$error_arr = array(
			'WITKEY_TASK_EXIST_ERROR'=>$_lang['witkey_task_exist_error'],
			'WITKEY_RECHARGE_EXIST_ERROR'=>$_lang['witkey_recharge_exist_error'],
			'RECHARGE_INFO_MODIFIED'=>$_lang['recharge_info_modified'],
			'PLATFORM_AUTHORITY_ILLEGAL'=>$_lang['platform_authority_illegal'],
			'WITKEY_RECHARGE_ID_EMPTY'=>$_lang['witkey_recharge_id_empty'],
			'WITKEY_RECHARGE_EMPTY'=>$_lang['witkey_recharge_empty'],
			'WITKEY_TASK_NOT_EXIST'=>$_lang['witkey_task_not_exist'],
			'WITKEY_TRANSFER_NOT_EXIST'=>$_lang['witkey_transfer_not_exist'],
			'WITKEY_TRANSFER_ALREADY_EXIST'=>$_lang['witkey_transfer_already_exist'],
			'WITKEY_AMOUNT_NOT_MATCH'=>$_lang['witkey_amount_not_match'],
			'WITKEY_TASK_LEF_AMOUNT_NOT_ENOUGH'=>$_lang['task_lef_amount_not_enough'],
			'WITKEY_COUNT_NOT_MATCH'=>$_lang['witkey_count_not_match'],
			'WITKEY_NOT_ALLOW'=>$_lang['witkey_not_allow'],
			'WITKEY_OUTER_TRANSFER_ALREADY_PAID'=>$_lang['witkey_outer_transfer_already_paid'],
			'WITKEY_OUTER_TRANSFER_REPEAT'=>$_lang['witkey_outer_transfer_repeat'],
			'WITKEY_DATA_NOT_MATCH'=>$_lang['witkey_data_not_match'],
			'WITKEY_DATA_VALIDATE_FAILURE'=>$_lang['witkey_data_validate_failure'],
			'BIDDER_EQUALS_TASK_CREATOR_ERROR'=>$_lang['bidder_equals_task_creator_error'],
			'ACCOUNT_QUERY_ERROR'=>$_lang['account_query_error'],
			'ACCOUNT_NOT_EXIST'=>$_lang['account_not_exist'],
			'ILLEGAL_ARGUMENT'=>$_lang['parameter_is_incorrect'],
			'ILLEGAL_SIGN'=>$_lang['digital_inspection_signed_fail'],
			'SYSTEM_ERROR'=>$_lang['system_error'],
			'SESSION_TIMEOUT'=>$_lang['connection_timed_out_error'],
			'ILLEGAL_PARTNER'=>$_lang['partner_error'],
			'HAS_NO_PRIVILEGE'=>$_lang['no_rights_access_interface'],
			'ILLEGAL_SERIVCE'=>$_lang['interface_info_not_exist']
		);
	}
}