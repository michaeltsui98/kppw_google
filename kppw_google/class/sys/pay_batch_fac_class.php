<?php
/**
 * 提现批量打款(支持单人)、业务处理类
 * @author Administrator
 *
 */
Keke_lang::load_lang_class('pay_batch_fac_class');
class pay_batch_fac_class {
	private $_pay_mode;
	private $_pay_config;
	
	public static function get_instance($pay_mode) {
		static $obj = null;
		if ($obj == null) {
			$obj = new pay_batch_fac_class ( $pay_mode );
		}
		return $obj;
	}
	public function __construct($pay_mode) {
		$this->_pay_mode = $pay_mode;
		$this->_pay_config = Keke::get_payment_config ( $pay_mode );
	}
	/**      ***********************基本业务函数定义**************************     */
	/**
	 * 计算打款金额
	 * @param 金额 $fee
	 */
	public function format_money($fee) {
		$func_name = $this->_pay_mode . "_format_money";
		return $this->$func_name ( $fee );
	}
	/**
	 * 批量数据连接
	 * @param array $detail_data
	 * $v数组格式[uid,account,username,fee,withdraw_id]
	 */
	public function stack_batch($detail_data) {
		$func_name = $this->_pay_mode . "_stack_batch";
		return $this->$func_name ( $detail_data );
	}
	/**
	 * 打款成功业务处理
	 * @param $success_str 打款成功详细串接信息
	 * @param $fail_str    打款失败详细串接信息
	 */
	public function success_notify($success_str, $fail_str) {
		$func_name = $this->_pay_mode . "_success_notify";
		$detail_arr = $this->unpack_detail_data ( $success_str, $fail_str );
		return $this->$func_name ( $detail_arr );
	}
	/**
	 * 解压打款明细数据
	 * @param $success_str 打款成功详细串接信息
	 * @param $fail_str    打款失败详细串接信息
	 */
	public function unpack_detail_data($success_str, $fail_str) {
		$func_name = $this->_pay_mode . "_unpack_detail";
		return $this->$func_name ( $success_str, $fail_str );
	}

	
	
	
	/**
	 * 支付宝打款金额格式处理
	 */
 	public function alipayjs_format_money($fee) {
		return keke_finance_class::get_to_cash($fee);
	}
	
	/**
	 * 支付宝解压打款详细数据
	 * @param $success_str 打款成功详细串接信息
	 * @param $fail_str    打款失败详细串接信息
	 */
	public function alipayjs_unpack_detail($success_str, $fail_str) {
		$detail_arr = array ();
		$detail_str = $success_str . $fail_str;
		if ($detail_str) {
			$arr1 = array_filter ( explode ( "|", $detail_str ) );
			foreach ( $arr1 as $vs ) {
				$v = explode ( "^", $vs );
				if (! empty ( $v )) {
					$detail_arr [$v [0]] = array ("withdraw_id" => $v [0], "fee" => $v [3], "status" => $v [4], "desc" => $v [5], "time" => $v [7] );
				}
			}
		}
		return array_filter ( $detail_arr );
	}
	/**
	 * 支付宝打款成功业务处理
	 * @param $detail_arr 打款详细信息数组
	 * @param $status 响应状态
	 */
	public function alipayjs_success_notify($detail_arr, $status = true) {
		global $_lang;
		$ids = implode ( ",", array_keys ( $detail_arr ) );
		$info = Keke::get_table_data ( "withdraw_id,uid,username,withdraw_status", "witkey_withdraw", " withdraw_id in ($ids)", "", "", "", "withdraw_id" );
		foreach ( $detail_arr as $k => $v ) {
			if ($info [$k] ['withdraw_status'] == 1) {
				switch ($v ['status']) {
					case "S" :
						/** 提现成功*/
						$res = dbfactory::execute ( sprintf ( " update %switkey_withdraw set withdraw_status='2' where withdraw_id ='%d'", TABLEPRE, $k ) );
						/** 用户消息提示*/
						Keke::notify_user ( $_lang['tx_pay_success_notice'], $_lang['your_alipay_tx_apply_notice'] . $v [fee] . $_lang['yusn_check_your_accout'], $info [$k] ['uid'], $info [$k] ['username'] );
						break;
					case "F" :
						/** 提现失败*/
						$res = dbfactory::execute ( sprintf ( " update %switkey_withdraw set withdraw_status='3' where withdraw_id ='%d'", TABLEPRE, $k ) );
						Keke::notify_user ( $_lang['tx_pay_fail_notice'], $_lang['tx_pay_fail_case_is'] . $v ['desc'], $info [$k] ['uid'], $info [$k] ['username'] );
						break;
				}
			}
		}
	}
	
	/**
	 * 批量数据连接
	 * @param array $detail_data
	 * $v数组格式[uid,account,username,fee,withdraw_id]
	 */
	public function alipayjs_stack_batch($detail_data) {
		$detail_arr = array ();
		$detail_str = '';
		$batch_fee = 0;
		if (is_array ( $detail_data )) {
			foreach ( $detail_data as $v ) {
				$v ['fee'] = $this->format_money ( $v ['fee'] );
				$detail_str .= "|" . implode ( "^", $v );
				$batch_fee += floatval ( $v ['fee'] );
			}
			$detail_str = substr ( $detail_str, 1 );
		}
		$detail_arr ['batch_fee'] = $batch_fee;
		$detail_arr ['detail_data'] = $detail_str;
		$detail_arr ['batch_num'] = count ( $detail_data );
		return $detail_arr;
	}
	/**      ***********************网银在线业务函数**************************     */
	
	/**
	 * 网银打款金额格式处理
	 */
	public function chinabank_format_money($fee) {
	
	}
	/**
	 * 网银解压打款详细数据
	 * @param $success_str 打款成功详细串接信息
	 * @param $fail_str    打款失败详细串接信息
	 */
	public function chinabank_unpack_detail($success_str, $fail_str) {
		$detail_arr = array ();
		/** 网银处理步骤...*/
		/** 网银处理步骤...*/
		return $detail_arr;
	}
	/**
	 * 网银打款成功业务处理
	 * @param $detail_arr 打款详细信息数组
	 * @param $status 响应状态
	 */
	public function chinabank_success_notify($detail_arr, $status = true) {
	
	}
	
	/**
	 * 批量数据连接
	 * @param array $detail_data
	 * $v数组格式[uid,account,username,fee,withdraw_id]
	 */
	public function chinabank_stack_batch($detail_data) {
		$detail_arr = array ();
		return $detail_arr;
	}
	/**      ***********************财付通业务函数**************************     */
	
	/**
	 * 财付通打款金额格式处理
	 */
	public function tenpay_format_money($fee) {
	
	}
	
	/**
	 * 财付通解压打款详细数据
	 * @param $success_str 打款成功详细串接信息
	 * @param $fail_str    打款失败详细串接信息
	 */
	public function tenpay_unpack_detail($success_str, $fail_str) {
		$detail_arr = array ();
		/** 财付通处理步骤...*/
		/** 财付通处理步骤...*/
		return $detail_arr;
	}
	/**
	 * 财付通打款成功业务处理
	 * @param $detail_arr 打款详细信息数组
	 * @param $status 响应状态
	 */
	public function tenpay_success_notify($detail_arr, $status = true) {
	
	}
	
	/**
	 * 批量数据连接
	 * @param array $detail_data
	 * $v数组格式[uid,account,username,fee,withdraw_id]
	 */
	public function tenpay_stack_batch($detail_data) {
		$detail_arr = array ();
		return $detail_arr;
	}
	/**      ***********************贝宝业务函数**************************     */
	
	/**
	 * 贝宝打款金额格式处理
	 */
	public function paypal_format_money($fee) {
	
	}
	/**
	 * 贝宝解压打款详细数据
	 * @param $success_str 打款成功详细串接信息
	 * @param $fail_str    打款失败详细串接信息
	 */
	public function paypal_unpack_detail($success_str, $fail_str) {
		$detail_arr = array ();
		/** 贝宝处理步骤...*/
		/** 贝宝处理步骤...*/
		return $detail_arr;
	}
	/**
	 * 贝宝打款成功业务处理
	 * @param $detail_arr 打款详细信息数组
	 * @param $status 响应状态
	 */
	public function paypal_success_notify($detail_arr, $status = true) {
	
	}
	
	/**
	 * 批量数据连接
	 * @param array $detail_data
	 * $v数组格式[uid,account,username,fee,withdraw_id]
	 */
	public function paypal_stack_batch($detail_data) {
		$detail_arr = array ();
		return $detail_arr;
	}
}