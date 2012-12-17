<?php
/**
 *
 * @author Chen
 * 任务交付控制基类
 *
 * 获取交付协议
 * 获取雇主信息
 * 获取威客信息
 *
 */
Keke_lang::load_lang_class('keke_task_agreement');
abstract class keke_task_agreement {
	public $_agree_id; //协议编号
	public $_agree_status; //协议状态
	public $_agree_info; //协议信息
	public $_agree_url; //交付链接
	

	public $_task_id; //任务编号
	public $_model_code; //模型code
	public $_trust_info; //担保信息
	

	public $_buyer_uid; //买家(雇主)编号
	public $_buyer_username; //买家(雇主)姓名
	public $_buyer_status; //买家(雇主)状态
	public $_buyer_contact; //买家(雇主)联系信息
	

	public $_seller_uid; //卖家(威客)编号
	public $_seller_username; //卖家(威客)姓名
	public $_seller_status; //卖家(威客)状态
	public $_seller_contact; //卖家(威客)联系信息
	

	public $_user_role; //用户角色
	

	protected $_inited = false;
	
	public function __construct($agree_id) {
		$this->_agree_id = $agree_id;
		$this->get_agreement_info ();
		$this->init ();
	}
	
	public function init() {
		if (! $this->_inited) {
			$this->buyer_contact_init ();
			$this->seller_contact_init ();
		}
		$this->_inited = true;
	}
	/**
	 * 交付协议产生
	 * @param string $agree_title  协议标题
	 * @param int $mode_id 模型编号
	 * @param int $task_id 任务id
	 * @param int $work_id 中标稿件编号
	 * @param int $buyer_uid 买家uid
	 * @param int $seller_uid 卖家uid、
	 * @return Ambigous <number, boolean>
	 */
	public static function create_agreement($agree_title, $mode_id, $task_id, $work_id, $buyer_uid, $seller_uid) {
		$agree_obj = new Keke_witkey_agreement_class ();
		
		$agree_obj->_agree_id = null;
		$agree_obj->setAgree_title ( $agree_title );
		$agree_obj->setTask_id ( $task_id );
		$agree_obj->setModel_id ( $mode_id );
		$agree_obj->setWork_id ( $work_id );
		$agree_obj->setBuyer_uid ( $buyer_uid );
		$agree_obj->setBuyer_status ( 1 );
		$agree_obj->setSeller_uid ( $seller_uid );
		$agree_obj->setSeller_status ( '1' );
		$agree_obj->setAgree_status ( '1' );
		$agree_obj->setOn_time ( time () );
		return $agree_obj->create_keke_witkey_agreement ();
	}
	/**
	 * 交付协议信息获取
	 */
	public function get_agreement_info() {
		global $_K, $uid, $kekezu;
		$agree_info = dbfactory::get_one ( sprintf ( " select * from %switkey_agreement where agree_id = '%d'", TABLEPRE, $this->_agree_id ) );
		$this->_agree_info = $agree_info;
		$uid == $agree_info ['buyer_uid'] and $this->_user_role = '2' or $this->_user_role = '1';
		$this->_agree_status = $agree_info ['agree_status'];
		$this->_task_id = $agree_info ['task_id'];
		$this->_trust_info = dbfactory::get_one ( sprintf ( " select is_trust,trust_type,is_auto_bid,task_status from %switkey_task where task_id='%d'", TABLEPRE, $this->_task_id ) ); //是否担保
		
		$this->_model_code = Keke::$_model_list [$agree_info ['model_id']] ['model_code']; //模型code
		$this->_buyer_uid = $agree_info ['buyer_uid'];
		$this->_buyer_status = $agree_info ['buyer_status'];
		$this->_seller_uid = $agree_info ['seller_uid'];
		$this->_seller_status = $agree_info ['seller_status'];
		$this->_agree_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=agreement" . "&agree_id=" . $this->_agree_id . "\">" . $this->_agree_info ['agree_title'] . "</a>";
	
	}
	/**
	 * 获取买家相关联系信息
	 */
	public function buyer_contact_init() {
		$info = dbfactory::get_one ( sprintf ( " select a.contact,a.username,b.truename,b.phone from %switkey_task a left join %switkey_space b on a.uid=b.uid where a.task_id='%d'", TABLEPRE, TABLEPRE, $this->_task_id ) );
		$this->_buyer_username = $info ['username'];
		$contact = unserialize ( $info ['contact'] );
		$this->_buyer_contact = array_merge ( $info, $contact );
	}
	/**
	 * 获取卖家相关联系信息
	 */
	public function seller_contact_init() {
		$info = dbfactory::get_one ( sprintf ( " select truename,username,qq,mobile,email,msn,phone from %switkey_space where uid='%d'", TABLEPRE, $this->_seller_uid ) );
		$this->_seller_username = $info ['username'];
		$this->_seller_contact = $info;
	}
	/**
	 * 交付协议第一阶段
	 * 同意协议。公有
	 * @param string $user_type 用户角色
	 * @param string $url    操作提示链接  具体参见 Keke::keke_show_msg
	 * @param string $output 消息输出方式 具体参见 Keke::keke_show_msg
	 */
	public function agreement_stage_one($user_type, $url = '', $output = 'normal') {
		global $_lang;
		$buyer_status = intval ( $this->_buyer_status ); //买家签署状态
		$seller_sattus = intval ( $this->_seller_status ); //卖家签署状态
		$agree_status = intval ( $this->_agree_status ); //协议当前状态
		

		if ($agree_status == '1') { //未确认才可签署
			switch ($user_type) {
				case "1" : //威客(卖家)
					if ($seller_sattus == '2') { //签署过协议
						$notice = $_lang['you_has_agree_agreement_notice'];
					} else { //未签署过
						$res = $this->set_agreement_status ( 'seller_status', '2' ); //更改状态
						if ($res) {
							/** 更新签署时间 */
							dbfactory::execute ( sprintf ( " update %switkey_agreement set seller_accepttime='%s' where seller_uid='%d' and agree_id ='%d'", TABLEPRE, time (), $this->_seller_uid, $this->_agree_id ) );
							/** 买家(雇主)签署状态判断**/
							switch ($buyer_status) {
								case "1" :
									$notice = $_lang['agreement_signed_complete_wait_you'];
									break;
								case "2" :
									$notice = $_lang['agreement_signed_complete_to_deliver'];
									$this->set_agreement_status ( 'agree_status', "2" ); //协议进入交付阶段
									break;
							}
						} else {
							$notice = $_lang['agreement_signed_fail'];
							$type = 'error';
						}
					}
					break;
				case "2" : //买家(雇主)
					if ($buyer_status == '2') { //签署过协议
						$notice = $_lang['you_has_agree_not_sign'];
					} else { //未签署过
						$res = $this->set_agreement_status ( 'buyer_status', '2' ); //更改状态
						if ($res) {
							/** 更新签署时间 */
							dbfactory::execute ( sprintf ( " update %switkey_agreement set buyer_accepttime='%s' where buyer_uid ='%d' and agree_id='%d'", TABLEPRE, time (), $this->_buyer_uid, $this->_agree_id) );
							/** 威客(卖家)签署状态判断**/
							switch ($seller_sattus) {
								case "1" :
									$notice = $_lang['agreement_signed_complete_wait_witkey'];
									break;
								case "2" :
									$notice = $_lang['agreement_signed_complete_to_deliver'];
									$this->set_agreement_status ( 'agree_status', "2" ); //协议进入交付阶段
									break;
							}
						} else {
							$notice = $_lang['agreement_signed_fail'];
							$type = 'error';
						}
					}
					break;
			}
			$msg_obj = new keke_msg_class (); //消息类
			$s_arr = array ($_lang['agreement_link'] => $this->_agree_url, $_lang['agreement_status'] => $notice );
			$b_arr = array ($_lang['agreement_link']  => $this->_agree_url, $_lang['agreement_status'] => $notice );
			$msg_obj->send_message ( $this->_seller_uid, $this->_seller_username, "agreement", $_lang['deliver_agreement_sign'], $s_arr, $this->_seller_contact ['email'], $this->_seller_contact ['mobile'] ); //通知威客
			$msg_obj->send_message ( $this->_buyer_uid, $this->_buyer_username, "agreement",  $_lang['deliver_agreement_sign'], $s_arr, $this->_buyer_contact ['email'], $this->_buyer_contact ['mobile'] ); ////通知雇主
		} else {
			$notice = $_lang['agreement_complete_no_confirm_again'];
			$type = 'error';
		}
		Keke::keke_show_msg ( $url, $notice, $type, $output ); //消息返回
	}
	/**
	 * 源文件上传提交
	 * @param string $file_ids
	 */
	public function upfile_confirm($file_ids, $url = '', $output = 'normal') {
		global $uid;
		global $_lang;
		$uid != $this->_seller_uid and Keke::keke_show_msg ( $url, $_lang['warning_you_no_rights_submit'], "error", $output );
		$file_ids = implode ( ",", array_filter ( explode ( ",", $file_ids ) ) );
		$res = dbfactory::execute ( sprintf ( " update %switkey_agreement set seller_confirmtime = UNIX_TIMESTAMP(),file_ids = '%s' where agree_id='%d'", TABLEPRE, $file_ids, $this->_agree_id ) );
		$res *= $this->set_agreement_status ( 'seller_status', '3' ); //变更卖家为等待接收状态
		$res *= $this->set_agreement_status ( 'buyer_status', '3' ); //变更买家为确认接收状态
		

		$notice = $_lang['seller_has_submit_wait_buyrer'];
		$msg_obj = new keke_msg_class (); //消息类
		$v_arr = array ($_lang['the_initiator'] => $this->_seller_username, $_lang['agreement_link'] => $this->_agree_url, $_lang['action'] => $_lang['has_submit_source_files'], $_lang['agreement_status'] => $notice );
		$msg_obj->send_message ( $this->_buyer_uid, $this->_buyer_username, "agreement_file", $_lang['agreement_files_submit'], $v_arr, $this->_buyer_contact ['email'], $this->_buyer_contact ['mobile'] ); //通知威客
		$res and Keke::keke_show_msg ( $url, $_lang['source_file_success'], "success", $output ) or Keke::keke_show_msg ( $url, $_lang['source_file_fail'], 'error', $output );
	}
	/**
	 * 源文件确认提交
	 * @param $Url 跳转url
	 * @parama $output 跳转模式
	 * @param $trust_response 担保回调响应
	 */
	public function accept_confirm($url = '', $output = 'normal', $trust_response = false) {
		global $uid;
		global $_lang;
		$agree_info = $this->_agree_info; //协议信息
		$uid != $this->_buyer_uid and Keke::keke_show_msg ( $url, $_lang['warning_you_no_rights_confirm'], "error", $output );
		$trust_info = $this->_trust_info;
		if ($this->_agree_status == 2 && $this->_seller_status == 3 && $this->_buyer_status == 3) {
				$res = dbfactory::execute ( sprintf ( " update %switkey_agreement set buyer_confirmtime = UNIX_TIMESTAMP() where agree_id ='%d'", TABLEPRE, $this->_agree_id ) );
				dbfactory::execute ( sprintf ( " update %switkey_task set task_status = '8' where task_id ='%d'", TABLEPRE, $this->_task_id ) );
				$res *= $this->set_agreement_status ( 'seller_status', '4' ); //进入互评阶段
				$res *= $this->set_agreement_status ( 'buyer_status', '4' ); //进入互评阶段
				$res *= $this->set_agreement_status ( 'agree_status', '3' ); //交付完成
				$this->dispose_task (); //任务结算
				$notice = $_lang['buyer_has_confirm_deliver_complete'];
				$msg_obj = new keke_msg_class (); //消息类
				$v_arr = array ($_lang['the_initiator'] => $this->_buyer_username, $_lang['agreement_link'] => $this->_agree_url, $_lang['action'] => $_lang['confirm_has_received_file'], $_lang['agreement_status'] => $notice );
				$msg_obj->send_message ( $this->_seller_uid, $this->_seller_username, "agreement_file", $_lang['agreement_file_recevie'], $v_arr, $this->_seller_contact ['email'], $this->_seller_contact ['mobile'] ); //通知威客
				$res and Keke::keke_show_msg ( $url,$_lang['source_file_confirm_deliver_success'], "success", $output ) or Keke::keke_show_msg ( '', $_lang['file_confirm_fail_deliver_fail'], 'error', $output );
		} else {
			Keke::keke_show_msg ( $url, $_lang['current_status_can_not_confirm'], "error", $output );
		}
	}
	/**
	 * 交付完成任务结算
	 */
	abstract function dispose_task();
	
	/**
	 * 任务评价数更新 每次+2
	 */
	public function plus_mark_num() {
		return dbfactory::execute ( sprintf ( "update %switkey_task set mark_num=ifnull(mark_num,0)+2 where task_id ='%d'", TABLEPRE, $this->_task_id ) );
	}
	/**
	 * 任务(稿件)维权(仲裁)
	 * @param string $obj 仲裁对象
	 * @param $obj_id 对象编号
	 * @param $report_type 举报类型
	 * @param $to_uid 被仲裁人
	 * @param $to_username 被仲裁人姓名
	 * @param $file_name 上传文件路径
	 * @return json
	 */
	public function set_report($obj, $obj_id, $to_uid, $to_username, $report_type, $file_name, $desc) {
		$res = keke_report_class::add_report ( $obj, $obj_id, $to_uid, $to_username, $desc, $report_type, '6', $this->_task_id, $this->_user_role, $file_name );
		$res&&$this->set_agreement_status($type = 'agree_status',4);
	}
	/**
	 * 阶段操作权限初始化
	 */
	abstract function process_can();
	/**
	 * 协议阶段进入权限判断
	 */
	abstract function stage_access_check();
	/**
	 * 交付阶段2时的状态列表
	 * 当前用户能进入step2 说明他绝对签署了协议。所以只需判断对方状态
	 * @param int $user_type 用户类型  1=>威客(卖家),2=>雇主(买家)
	 */
	abstract function agreement_stage_list($user_type = '1');
	/**
	 * 获取买家交付状态
	 */
	abstract function get_buyer_status();
	/**
	 * 获取卖家交付状态
	 */
	abstract function get_seller_status();
	/**
	 * 获取交付附件
	 */
	public function get_file_list() {
		if ($this->_agree_info ['file_ids']) {
			return dbfactory::query ( sprintf ( " select file_id,file_name,save_name from %switkey_file where obj_type='agreement' and obj_id='%d'", TABLEPRE, $this->_agree_id ) );
		}
	}
	/**
	 * 删除上传附件
	 * @param int $file_id
	 */
	public function del_file($file_id) {
		$res = keke_file_class::del_att_file ( $file_id );
		$res and Keke::echojson ( '', '1' ) or Keke::echojson ( '', '0' );
		die ();
	}
	/**
	 * 更改协议相关状态
	 * @param string $type 要更改状态的字段名 默认协议状态  可填buyer_status seller_status
	 */
	public function set_agreement_status($type = 'agree_status', $to_status) {
		return dbfactory::execute ( sprintf ( " update %switkey_agreement set %s = '%d' where agree_id = '%d'", TABLEPRE, $type, $to_status, $this->_agree_id ) );
	}
	/**
	 * 获取交付状态信息
	 * @return array
	 */
	public static function get_agreement_status() {
		global $_lang;
		return array ("1" => $_lang['wait_sign'], "2" => $_lang['agreement_sign_complete'], "3" => $_lang['task_order_complete'] );
	}

}