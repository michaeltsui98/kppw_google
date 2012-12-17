<?php
Keke_lang::load_lang_class ( 'service_shop_class' );
class service_shop_class {
	/**
	 * 
	 * 该函数用于批量删除
	 * @param  $service_ids 操作的ids
	 */
	function service_del($service_ids) {
		is_array ( $service_ids ) and $ids = implode ( ",", $service_ids ) or $ids = $service_ids;
		self::set_on_sale_num($ids,-1);
		return db_factory::execute ( sprintf ( "delete from %switkey_service where service_id in(%s)", TABLEPRE, $ids ) );
	}
	
	/**
	 * 
	 * 该函数用于服务下架操作..
	 * @param  $service_ids 操作的ids
	 */
	function service_down($service_ids) {
		is_array ( $service_ids ) and $ids = implode ( ",", $service_ids ) or $ids = $service_ids;
		self::set_on_sale_num($ids,3);
		return db_factory::execute ( sprintf ( "update %switkey_service set service_status='%d'  where service_id in(%s)", TABLEPRE, 3, $ids ) );
	}
	/**
	 * 
	 * 该函数用于服务上架操作..
	 * @param  $service_ids 操作的ids
	 */
	function service_pass($service_ids) {
		is_array ( $service_ids ) and $ids = implode ( ",", $service_ids ) or $ids = $service_ids;
		self::set_on_sale_num($ids,2);
		return db_factory::execute ( sprintf ( "update %switkey_service set service_status='%d'  where service_id in(%s)", TABLEPRE, 2, $ids ) );
	}
	/**
	 *更改上架。数量 
	 */
	public static function set_on_sale_num($service_ids, $status = 2) {
		$service_ids = ( array ) $service_ids;
		$service_ids = implode ( ',', $service_ids );
		if ($service_ids) {
			$shop_ids = db_factory::query ( ' select shop_id,service_status ss from ' . TABLEPRE . 'witkey_service where service_id in ('.$service_ids. ')' );
			if ($shop_ids) {
				foreach ( $shop_ids as $v ) {
					$ss = intval ( $v ['ss'] );
					if ($ss != $status) {
						if ($status == 3 || ($ss == 2 && $status = - 1)) {
							$plus = - 1;
						} else {
							$plus = 1;
						}
						$ids .=$v['shop_id'].',';
					}
				}
				$ids = rtrim($ids,',');
				db_factory::execute ( ' update ' . TABLEPRE . 'witkey_shop set on_sale=on_sale+' . $plus . ' where shop_id in ('.$ids. ')' );
			}
		}
	}
	/**
	 * 
	 * 该函数用于威客服务订单批量删除
	 * @param  $order_ids 操作的ids
	 */
	function order_del($order_ids) {
		is_array ( $order_ids ) and $ids = implode ( ",", $order_ids ) or $ids = $order_ids;
		return db_factory::execute ( sprintf ( "delete from %switkey_order where order_id in(%s)", TABLEPRE, $ids ) );
	}
	
	/**
	 *控制订单流程
	 *@param int $order_id 订单编号
	 *@param string $action 当前操作动作
	 */
	public function dispose_order($order_id, $action) {
		global $uid, $username, $_K, $kekezu, $_lang;
		
		$order_info = keke_order_class::get_order_info ( $order_id ); //获取订单
		if ($order_info) {
			$s_order_link = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=user&view=witkey&op=shop&model_id=".$order_info['model_id']."&order_id=" . $order_id . "\">" . $order_info ['order_name'] . "</a>";
			$b_order_link = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=user&view=employer&op=shop&model_id=".$order_info['model_id']."&order_id=" . $order_id . "\">" . $order_info ['order_name'] . "</a>";
			if ($uid == $order_info ['order_uid'] || $uid == $order_info ['seller_uid']) {
				$service_info = keke_shop_class::get_service_info ( $order_info ['obj_id'] ); //服务信息
				if ($service_info ['service_status'] == '2') { //还是上架的
					if ($action == 'delete') { //删除订单
						keke_order_class::del_order ( $order_id, '', 'json' );
					} else {
						switch ($action) {
							case "ok" : //变更为付款状态
								$data = array (':service_id' => $service_info ['service_id'], ':title' => $service_info ['title'] );
								keke_finance_class::init_mem ( 'buy_service', $data );
								$suc = keke_finance_class::cash_out ( $order_info ['order_uid'], $order_info ['order_amount'], 'buy_service', '', 'service', $order_info ['obj_id'] );
								if ($suc) {
									keke_order_class::set_order_status ( $order_id, $action ); //状态变更
									/** 通知卖家*/
									$v_arr = array ($_lang ['user_msg'] => $order_info ['order_username'], $_lang ['action'] => $_lang ['haved_confim_pay'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
									keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['goods_order_confirm_pay'], $v_arr );
									kekezu::keke_show_msg ( '', $_lang ['order_complete_and_comfirm_pay'], '', 'json' );
								} else {
									kekezu::keke_show_msg ( '', $_lang ['order_pay_fail_for_cash_little'] . '<br>' . $_lang ['click'] . '<a href="' . $_K ['siteurl'] . '/index.php?do=pay&order_id=' . $order_id . '" target="_blank">' . $_lang ['go_recharge'] . '</a>', 'error', 'json' );
								}
								break;
							case "close" : //变更为关闭状态close(买家关闭订单)
								$res = keke_order_class::order_cancel_return ( $order_id ); //返款
								if ($res) {
									keke_order_class::set_order_status ( $order_id, $action ); //状态变更
									

									/** 通知卖家*/
									$v_arr = array ($_lang ['user_msg'] => $order_info ['order_username'], $_lang ['action'] => $_lang ['close_order_have'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
									keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['goods_order_close'], $v_arr );
									
									kekezu::keke_show_msg ( '', $_lang ['order_deal_complete_and_close'], '', 'json' );
								} else {
									kekezu::keke_show_msg ( '', $_lang ['order_deal_fail_and_link_kf'], 'error', 'json' );
								}
								break;
							case "accept" : //变更为接受(卖家确认接收订单)
								$res = keke_order_class::set_order_status ( $order_id, $action ); //状态变更
								if ($res) {
									/** 买家上线推广产生*/
									$kekezu->init_prom ();
									if ($kekezu->_prom_obj->is_meet_requirement ( "service", $order_info [obj_id] )) {
										$kekezu->_prom_obj->create_prom_event ( "service", $order_info ['order_uid'], $order_info ['obj_id'], $order_info ['order_amount'] );
									}
									/** 通知买家*/
									$v_arr = array ($_lang ['user_msg'] => $order_info ['seller_username'], $_lang ['action'] => $_lang ['recept_your_order'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
									keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['goods_order_recept'], $v_arr );
									kekezu::keke_show_msg ( '', $_lang ['order_deal_complete_and_order_recept'], '', 'json' );
								} else {
									kekezu::keke_show_msg ( '', $_lang ['order_deal_fail_and_link_kf'], 'error', 'json' );
								}
								break;
							case "send" : //变更为已服务状态(卖家确认服务完成)
								$res = keke_order_class::set_order_status ( $order_id, $action ); //状态变更
								if ($res) {
									/** 通知买家*/
									$v_arr = array ($_lang ['user_msg'] => $order_info ['seller_username'], $_lang ['action'] => $_lang ['confirm_service_complete'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
									keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['service_order_confirm_complete'], $v_arr );
									kekezu::keke_show_msg ( '', $_lang ['order_deal_complete_and_order_comfirm'], '', 'json' );
								} else {
									kekezu::keke_show_msg ( '', $_lang ['order_deal_fail_and_link_kf'], 'error', 'json' );
								}
								break;
							case "confirm" : //变更为完成状态(买家确认服务完成)
								$res = keke_order_class::set_order_status ( $order_id, $action ); //状态变更
								if ($res) {
									$model_info = $kekezu->_model_list [$order_info ['model_id']]; //模型信息
									$profit = $service_info ['profit_rate'] * $order_info ['order_amount'] / 100; //网站利润
									///卖家获得款项
									$data = array (':service_id' => $service_info ['service_id'], ':title' => $service_info ['title'] );
									keke_finance_class::init_mem ( 'sale_service', $data );
									keke_finance_class::cash_in ( $order_info ['seller_uid'], $order_info ['order_amount'] - $profit, '0', 'sale_service', '', 'service', $order_info ['obj_id'], $profit );
									/** 更新商品售出记录**/
									keke_shop_class::plus_sale_num ( $order_info ['obj_id'], $order_info ['order_amount'] );
									/** 双方产生互评**/
									
									keke_user_mark_class::create_mark_log ( $model_info ['model_code'], 2, $order_info ['order_uid'], $order_info ['seller_uid'], $order_id, $order_info ['order_amount'] - $profit, $order_info ['obj_id'], $order_info ['order_username'], $order_info ['seller_username'] );
									keke_user_mark_class::create_mark_log ( $model_info ['model_code'], 1, $order_info ['seller_uid'], $order_info ['order_uid'], $order_id, $order_info ['order_amount'], $order_info ['obj_id'], $order_info ['seller_username'], $order_info ['order_username'] );
									/** mark_num+2**/
									keke_shop_class::plus_mark_num ( $order_info ['obj_id'] );
									/** 买家上线推广结算*/
									$kekezu->init_prom ();
									$kekezu->_prom_obj->dispose_prom_event ( "service", $order_info ['order_uid'], $order_info ['obj_id'] );
									
									/** 通知卖家*/
									$v_arr = array ($_lang ['user_msg'] => $order_info ['order_username'], $_lang ['action'] => $_lang ['confirm_service_complete'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
									keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['service_order_confirm_complete'], $v_arr );
									kekezu::keke_show_msg ( '', $_lang ['order_deal_complete_the_order_complete'], '', 'json' );
								} else {
									kekezu::keke_show_msg ( '', $_lang ['order_deal_fail_and_link_kf'], 'error', 'json' );
								}
								break;
							case "arbitral" : //订单仲裁
								$res = keke_order_class::set_order_status ( $order_id, $action ); //状态变更
								if ($res) {
									if ($uid == $order_info ['order_uid']) {
										/** 通知对方*/
										$v_arr = array ($_lang ['user_msg'] => $order_info ['order_username'], $_lang ['action'] => $_lang ['buyer_start_arbitrate'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
										keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['sevice_order_arbitrate_submit'], $v_arr );
									
									} else {
										/** 通知对方*/
										$v_arr = array ($_lang ['user_msg'] => $order_info ['seller_username'], $_lang ['action'] => $_lang ['seller_start_arbitrate'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
										keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['sevice_order_arbitrate_submit'], $v_arr );
									
									}
									kekezu::keke_show_msg ( '', $_lang ['order_deal_complete_and_order_in_arbitrate'], '', 'json' );
								} else {
									kekezu::keke_show_msg ( '', $_lang ['order_deal_fail_and_link_kf'], 'error', 'json' );
								}
								break;
						}
					}
				} else { //系统关闭订单
					$res = keke_order_class::set_order_status ( $order_id, 'close' ); //订单关闭
					keke_order_class::order_cancel_return ( $order_id ); //返款
					/** 通知买家*/
					$v_arr = array ($_lang ['user_msg'] => $_lang ['system'], $_lang ['action'] => $_lang ['stop_your_order_and_your_cash_return'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $b_order_link );
					keke_shop_class::notify_user ( $order_info ['order_uid'], $order_info ['order_username'], "order_change", $_lang ['goods_order_close'], $v_arr );
					/** 通知卖家*/
					$v_arr = array ($_lang ['user_msg'] => $_lang ['system'], $_lang ['action'] => $_lang ['stop_your_order_and_your_cash_return'], $_lang ['order_id'] => $order_id, $_lang ['order_link'] => $s_order_link );
					keke_shop_class::notify_user ( $order_info ['seller_uid'], $order_info ['seller_username'], "order_change", $_lang ['goods_order_close'], $v_arr );
					kekezu::keke_show_msg ( '', $_lang ['goods_down_shelf_and_trade_close'], 'error', 'json' );
				}
			} else {
				kekezu::keke_show_msg ( '', $_lang ['error_order_num_notice'], 'error', 'json' );
			}
		} else {
			kekezu::keke_show_msg ( '', $_lang ['no_exist_goods_order'], 'error', 'json' );
		}
	}
	/**
	 * 根据订单状态来来获取当前操作按钮
	 * @param int $role 角色  1=>接受者,2=>下单者
	 * @return $process_arr[角色]=array(
	 * trans=>array()交易操作
	 * after=>售后操作
	 * other=>其他操作
	 * )
	 */
	public static function process_action($role = '1', $order_status) {
		global $_lang;
		$process_arr = array ();
		switch ($order_status) {
			case "wait" : //待付款
				/** 下单者**/
				$process_arr ['2'] ['trans'] ['ok'] = $_lang ['confirm_pay']; //付款
				$process_arr ['2'] ['trans'] ['close'] = $_lang ['cancel_order']; //关闭
				/** 接受者**/
				$process_arr ['1'] ['trans'] [''] = $_lang ['wait_pay']; //等待付款
				break;
			case "ok" : //付款
				/** 下单者**/
				$process_arr ['2'] ['trans'] [''] = $_lang ['wait_seller_confirm_order']; //等待确认
				/** 接受者**/
				$process_arr ['1'] ['trans'] ['accept'] = $_lang ['recept_order']; //接受
				break;
			case "accept" : //接受
				/** 下单者**/
				$process_arr ['2'] ['after'] ['arbitral'] = $_lang ['trate_rights']; //仲裁
				$process_arr ['2'] ['trans'] [''] = $_lang ['wait_seller_confirm_service']; //等待确认服务
				/** 接受者**/
				$process_arr ['1'] ['trans'] ['send'] = $_lang ['confirm_service']; //确认服务
				$process_arr ['1'] ['after'] ['arbitral'] = $_lang ['trate_rights']; //仲裁
				break;
			case "send" :
				/** 下单者**/
				$process_arr ['2'] ['trans'] ['confirm'] = $_lang ['confirm_service']; //确认服务
				$process_arr ['2'] ['after'] ['arbitral'] = $_lang ['trate_rights']; //仲裁
				/** 接受者**/
				$process_arr ['1'] ['after'] ['arbitral'] = $_lang ['trate_rights']; //仲裁
				$process_arr ['1'] ['trans'] [''] = $_lang ['wait_buyer_confirm_service']; //等待确认
				break;
			case "confirm" :
				/** 下单者**/
				//$process_arr ['2'] ['trans'] ['mark'] = $_lang['each_mark']; //互评
				/** 接受者**/
				//$process_arr ['1'] ['trans'] ['mark'] = $_lang['each_mark']; //互评
				break;
			case "close" :
				/** 下单者**/
				$process_arr ['2'] ['other'] ['delete'] = $_lang ['delete_order']; //删除订单
				/** 接受者**/
				$process_arr ['1'] ['other'] ['delete'] = $_lang ['delete_order']; //删除订单
				break;
			case "arbitral" :
				/** 下单者**/
				$process_arr ['2'] ['after'] [''] = $_lang ['wait_kf_deal']; //仲裁
				/** 接受者**/
				$process_arr ['1'] ['after'] [''] = $_lang ['wait_kf_deal']; //仲裁
				break;
		}
		return $process_arr [$role];
	}
	/**
	 * 威客服务状态
	 * 上架和下架状态是对发布者而言，禁用和启用是针对管理员而言
	 */
	public static function get_service_status() {
		global $_lang;
		return array ("1" => $_lang ['wait_audit'], "2" => $_lang ['on_shelf'], "3" => $_lang ['down_shelf'] );
	}
	/**
	 * 返回服务订单状态
	 */
	public static function get_order_status() {
		global $_lang;
		return array ('wait' => $_lang ['wait_buyer_pay'], 'ok' => $_lang ['buyer_haved_pay'], 'accept' => $_lang ['seller_haved_recept'], 'send' => $_lang ['seller_haved_service'], 'confirm' => $_lang ['trade_complete'], 'close' => $_lang ['trade_close'], 'arbitral' => $_lang ['order_arbitrate'], 'arb_confirm' => $_lang ['trade_complete'] );
	}

}

?>