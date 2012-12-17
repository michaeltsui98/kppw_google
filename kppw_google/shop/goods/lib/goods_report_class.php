<?php
Keke_lang::load_lang_class('goods_report_class');
class goods_report_class extends keke_report_class {
	
	public static function get_instance($report_id, $report_info = null, $obj_info = null,$user_info=null,$to_userinfo=null) {
		static $obj = null;
		if ($obj == null) {
			$obj = new goods_report_class ( $report_id, $report_info, $obj_info,$user_info,$to_userinfo);
		}
		return $obj;
	}
	public function __construct($report_id, $report_info, $obj_info,$user_info,$to_userinfo) {
		parent::__construct ( $report_id, $report_info, $obj_info,$user_info,$to_userinfo );
	}
	
	/**
	 * 维权处理
	 * @see keke_report_class::sub_process_rights()
	 */
	public function process_rights($op_result, $type) {
		global $_lang;
		$trans_name = $this->get_transrights_name ( $this->_report_type );
		$op_result = $this->op_result_format ( $op_result ); //格式化处理结果
		$g_info = $this->user_role ( 'gz' ); //雇主信息
		$w_info = $this->user_role ( 'wk' ); //威客信息
		switch ($op_result ['action']) {
			case "pass" :
				if ($this->_process_can ['sharing']) { //可以分配
					$total_cash = floatval ( $this->_obj_info ['cash'] ); //总的佣金
					$gz_get = floatval ( $op_result ['gz_get'] ); //雇主分得佣金
					$wk_get = floatval ( $op_result ['wk_get'] ); //威客分得佣金
					if ($total_cash != $gz_get + $wk_get) {
						kekezu::admin_show_msg ( $_lang['wain_you_give_cash_error_notice'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3", "", "warning" );
					} else {
						$res = keke_finance_class::cash_in ( $g_info ['uid'], $gz_get, '0', 'rights_return' ); //给雇主返钱
						$res .= keke_finance_class::cash_in ( $w_info ['uid'], $wk_get, '0', 'rights_return' ); //给威客返钱
						if ($res) {
							$this->process_unfreeze ('pass', $op_result ['process_result'] ); //解冻。通知用户
							$this->change_status ( $this->_report_id, '4',$op_result, $op_result ['process_result'] ); //更新状态为处理完成
						}
					}
					$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=rights&type=$type", "3",'','success' ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
				} else {
					kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail_now_forbit_deal_cash'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
				}
				break;
			case "nopass" :
				$this->process_unfreeze ('nopass', $op_result ['reply'] ); //解冻。并通知用户
				$res=$this->change_status ( $this->_report_id, '3', $op_result, $op_result ['reply'] ); //更新状态为未成立
				$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=rights&type=$type", "3",'','success' ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
				break;
		}
	}
	/**
	 * 举报处理
	 * @see keke_report_class::sub_process_report()
	 */
	public function process_report($op_result, $type) {
		$trans_name = $this->get_transrights_name ( $this->_report_type );
		$op_result = $this->op_result_format ( $op_result ); //格式化处理结果
		switch ($op_result ['action']) {
			case "pass" :
				if ($op_result ['freeze_user'] && $op_result ['freeze_day'] && $this->_process_can ['freeze_user']) { //冻结用户、加入黑名单
					$res.=$this->to_black ( $op_result ['freeze_day'] );
				}
				if ($op_result ['deduct_credit'] && $op_result [$this->_credit_info ['name']] && $this->_process_can ['deduct']) { //扣信誉(能力)
					$res.=db_factory::execute ( sprintf ( " update %switkey_space set %s=%s-%d where uid='%d'", TABLEPRE, $this->_credit_info ['name'], $this->_credit_info ['name'], intval($op_result [$this->_credit_info ['name']]), $this->_to_user_info ['uid'] ) );
				}
				if ($op_result ['product_remove']&& $this->_process_can ['product_remove']) { //商品下架成立
					$res.=db_factory::execute(sprintf(" update %switkey_service set service_status='3' where service_id='%d'",TABLEPRE,$this->_obj_info['origin_id']));	
				}
				if($res){
					$this->process_notify('pass',$this->_report_info, $this->_user_info, $this->_to_userinfo,$op_result ['process_result']);//通知用户
					$this->change_status ( $this->_report_id, '4', $op_result,$op_result ['process_result'] ); //更新状态为处理完成
					$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=report&type=$type", "3",'','success' ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
				}
				break;
			case "nopass" :
				$this->process_notify('nopass',$this->_report_info, $this->_user_info, $this->_to_userinfo,$op_result ['process_result']);//通知用户
				$res=$this->change_status ( $this->_report_id, '3', $op_result,$op_result, $op_result ['reply'] ); //更新状态为未成立
				$res and kekezu::admin_show_msg ( $trans_name . $_lang['deal_success'], "index.php?do=trans&view=rights&type=$type", "3",'','success' ) or kekezu::admin_show_msg ( $trans_name . $_lang['deal_fail'], "index.php?do=trans&view=process&type=$type&report_id=" . $this->_report_id, "3",'','warning' );
				break;
		}
	}
}