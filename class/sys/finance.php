<?php

/**
 * @example 财务结算
 * @access class
 * @author shangk
 *
 *
 */
Keke_lang::load_lang_class ( 'sys_finance' );
class Sys_finance {
	public static $_basic_config;
	// 金额
	public static $_cash;
	/**
	 * 方向: in ,out
	 */
	public static $_type;
	// 动作
	public static $_action;
	// task,service,null
	public static $_obj_type;
	public static $_obj_id;
	/**
	 * 理由 ,静态变量
	 */
	public static $_mem;
	public static function init($uid = null) {
		global $_lang;
		global $user_info;
	
		if ($user_info ['uid'] != $uid) {
			$user_info = Keke_user::instance()->get_user_info ( $uid );
		}
		if ($user_info) {
			try {
				// 静态会造成数据不更新
				return $user_info;
			} catch ( Exception $e ) {
				Keke_exception::handler ( $e );
			}
		} else {
			
			throw new Keke_exception ( $_lang ['uid_parameter_no_value'] );
		}
	}
	/**
	 *
	 *
	 * 威客用户支出的计算处理
	 * 
	 * @param int $uid        	
	 * @param float $cash        	
	 * @param string $action
	 *        	realname_auth=>实名认证(out)
	 *        	bank_auth=>银行认证(out)
	 *        	company_auth=>公司认证(out)
	 *        	email_auth=>电子邮箱认证(out)
	 *        	mobile_auth=>手机认证(out)
	 *        	buy_vip=>购买vip 身份(out)
	 *        	buy_service=>购买服务(out)
	 *        	prom_task=>推广任务(out)
	 *        	hide_task=>隐藏任务(out)
	 *        	hide_work=>隐藏搞件(out)
	 *        	tj_task=>推荐任务(out)
	 *        	pub_task=>发布任务(out)
	 *        	withdraw=>提现(out)
	 *        	task_ext=>任务延期(out)
	 *        	report=>仲裁处理(out)
	 *        	pay_item=>增值服务(out)
	 * @param float $profit
	 *        	- 站长收入
	 * @param string $obj_type
	 *        	-task,service,order
	 * @param id $obj_id        	
	 * @return boolen true or false 成功 or 失败
	 */
	public static function cash_out($uid, $cash, $action, $profit = 0, $obj_type = null, $obj_id = null) {
		$user_info = self::init ( $uid );
		$res = false;
		$sys_config = Keke::$_sys_config;
		$fo = new Keke_witkey_finance ();
		$fo->setFina_action ( $action );
		$fo->setFina_type ( "out" );
		$fo->setObj_type ( $obj_type );
		$fo->setObj_id ( $obj_id );
		$fo->setSite_profit ( $profit );
		$fo->setUid ( $user_info ['uid'] );
		$fo->setUsername ( $user_info ['username'] );
		if (empty ( self::$_mem )) { 
			// 如果没有初始化事由或者初始化失败,就调用默认简单的行为描述
			$action_arr = keke_global_class::get_finance_action ( $action );
			self::$_mem = $action_arr [$action];
		}
		$fo->setFina_mem ( self::$_mem );
		$user_balance = $user_info ['balance'];
		$user_credit = $user_info ['credit'];
		$credit_allow = intval ( $sys_config ['credit_is_allow'] ) + 0;
		if ($cash && $action) {
			try {
				// 判断积分是否开启
				$credit_allow == 2 and $user_credit = 0;
				// 是否有钱付款
				if ($user_balance + $user_credit < $cash) {
					return false;
				}
				// 提现判断,代金券不能用提现
				if ($action == 'withdraw') {
					// 扣除人个帐户
					Dbfactory::execute ( "update " . TABLEPRE . "witkey_space set balance = balance-" . abs ( floatval ( $cash ) ) . " where uid ='{$user_info['uid']}'" );
					$fo->setFina_cash ( $cash );
					$fo->setFina_credit ( 0 );
					$fo->setUser_balance ( $user_balance - abs ( $cash ) );
				} else {
					// 计算剩余积分，先扣代金券
					$sy_credit = $user_credit - $cash;
					if ($sy_credit > 0) {
						// 更新用户积分
						Dbfactory::execute ( "update " . TABLEPRE . "witkey_space set credit = credit-{$cash} where uid ='{$user_info['uid']}'" );
						$fo->setFina_credit ( $cash );
						$fo->setFina_cash ( 0 );
						$fo->setUser_balance ( $user_balance );
						$fo->setUser_credit ( $user_credit - $cash );
					} else {
						// 更新余额与积分
						Dbfactory::execute ( "update " . TABLEPRE . "witkey_space set credit = credit-{$user_credit},balance = balance-" . abs ( $sy_credit ) . " where uid ='{$user_info['uid']}'" );
						$fo->setFina_credit ( $user_credit );
						$fo->setFina_cash ( abs ( $sy_credit ) );
						$fo->setUser_balance ( $user_balance - abs ( $sy_credit ) );
						$fo->setUser_credit ( 0 );
					}
				}
				$fo->setFina_time ( time () );
				$res = $fo->create ();
			} catch ( Exception $e ) {
				keke_exception::handler ( $e );
			}
		}
		return $res;
	}
	/**
	 * 威客用户收入计算处理
	 * 
	 * @param int $uid        	
	 * @param float $cash
	 *        	-现金
	 * @param float $credit
	 *        	- 积分
	 * @param string $action
	 *        	- 动作
	 *        	online_recharge=>再线充值(in)
	 *        	offline_recharge=>下线充值(in)
	 *        	task_bid=>任务中标(in)
	 *        	task_fail=>任务失败退款(in)
	 *        	task_prom=>任务推广成功的佣金(in)
	 *        	task_prom_fail=>任务推广失败退款(in)
	 *        	rights_return=>维权返款(in)
	 *        	sale_service=>卖服务费用(in)
	 *        	admin_recharge=>管理员充值(in)
	 *        	withdraw_fail=>提现失败(in)
	 *        	ucenter_change=>ucenter 兑换(in)
	 * @param string $source
	 *        	- zfb,cft,line,paypal,admin
	 * @param string $obj_type
	 *        	- task,service,order,vip
	 * @param id $obj_id        	
	 * @param float $profit
	 *        	- 利润
	 * @return boolen true or false
	 */
	public static function cash_in($uid, $cash, $credit = 0, $action, $source = null, $obj_type = null, $obj_id = null, $profit = 0, $charge = null) {
		// 用户收入 来源 冲值 任务中标,任务失败退款，推广失败退款,卖出服务(作品),卖服务失败退款,提现失败退款
		
		$user_info = self::init ( $uid );
		$sys_config = self::$_basic_config;
		$fo = new Keke_witkey_finance ();
		$fo->setFina_action ( $action );
		$fo->setFina_type ( "in" );
		$fo->setObj_type ( $obj_type );
		$fo->setObj_id ( $obj_id );
		$fo->setFina_credit ( $credit );
		$fo->setFina_cash ( $cash );
		if (empty ( self::$_mem )) { // 如果没有初始化事由或者初始化失败,就调用默认简单的行为描述
			$action_arr = keke_global_class::get_finance_action ( $action );
			self::$_mem = $action_arr [$action];
		}
		$fo->setFina_mem ( self::$_mem );
		$fo->setUser_balance ( $user_info ['balance'] + $cash );
		$fo->setUser_credit ( $user_info ['credit'] + $credit );
		$fo->setUid ( $user_info ['uid'] );
		$fo->setUsername ( $user_info ['username'] );
		$fo->setFina_source ( $source );
		$fo->setSite_profit ( $profit );
		$fo->setFina_mem ( self::$_mem );
		$fo->setRecharge_cash ( $charge !== null ? floatval ( $charge ) : null );
		$sql = "update " . TABLEPRE . "witkey_space set credit = credit+{$credit},balance = balance+" . $cash . " where uid ='{$user_info['uid']}'";
		$res = Dbfactory::execute ( $sql );
		if ($res) {
			$fo->setFina_time ( time () );
			$row = $fo->create ();
			return $row;
		} else {
			return false;
		}
	}
	
	/**
	 * 获取威客实际所得的金额
	 * 
	 * @param $cash ----用户提现金额        	
	 * @return $real_cash -----用户可获得的实际金额
	 */
	public static function get_to_cash($cash) {
		// 获取网站配置
		$config_info = Keke::get_table_data ( "*", "witkey_pay_config", " k in('per_charge','per_low','per_high')", '', '', '', 'k' );
		$min_cash = $config_info ['per_low'] ['v'];
		$middle_profit = $config_info ['per_charge'] ['v'];
		$max_cash = $config_info ['per_high'] ['v'];
		// 调试
		if ($cash < 1) {
			return $cash;
		}
		
		if ($cash <= 200) {
			$real_cash = abs ( $cash - $min_cash );
		} elseif ($cash > 200 && $cash <= 5000) {
			$real_cash = $cash - $cash * $middle_profit / 100;
		} elseif ($cash > 5000) {
			$real_cash = $cash - $max_cash;
		}
		return $real_cash;
	}
	
	/**
	 * 后台站长支付宝打款
	 */
	public static function alipayjs_format_moneys($cash) {
		$website_cash = keke_finance_class::get_to_cash ( $cash );
		$alipay_per_charge = 0.5;
		$alipay_per_low = 1;
		$alipay_per_high = 25;
		
		// 调试
		if ($website_cash <= 1) {
			return $website_cash;
		}
		if ($website_cash <= 200) {
			$real_website_cash = $website_cash + $alipay_per_low;
		} elseif ($website_cash > 200 && $website_cash <= 5000) {
			$real_website_cash = $website_cash + $website_cash * $alipay_per_charge / 100;
		} elseif ($website_cash > 5000) {
			$real_website_cash = $website_cash + $alipay_per_high;
		}
		return $real_website_cash;
	}
	/**
	 * 初始化财务进出事由
	 * 
	 * @param string $action
	 *        	- 动作
	 * @param
	 *        	array or string $data -对应动作模板替换所需的变量数组\r\n
	 *        	详见该类的成员变量$_action_arr的定义
	 * @return boolen true or false
	 */
	public static function init_mem($action, array $data) {
		$action_arr = self::get_action_lang ();
		$action_str = $action_arr [$action];
		if (! $action_str)
			return false;
		if (is_array ( $data )) { // 默认模板替换
			self::$_mem = strtr ( $action_str, $data );
		} else { // 直接使用字符串拼接事由
			self::$_mem = $data;
		}
	}
	/**
	 * 所有财务出入行为对应的事件描述，即财务事由
	 * 
	 * @var array $_action_arr	-所有事由定义
	 *      key代表行为(action),value代表事由描述,%%代表要替换的变量
	 */
	public static function get_action_lang() {
		global $_lang;
		return array ('pub_task' => $_lang ['release'] . ':model_name' . $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>', 'task_delay' => $_lang ['extension_task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>', 'buy_service' => $_lang ['purchase_service_goods'] . '<a href="index.php?do=service&sid=:service_id">:title</a>', 'payitem' => $_lang ['purchase'] . ':item_name' . $_lang ['value_add_services'], 'hosted_reward' => $_lang ['managed'] . ':model_name' . $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>' . $_lang ['bounty'], 'task_fail' => ':model_name' . $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>' . $_lang ['failure_refund'], 'host_deposit' => $_lang ['managed'] . ':model_name' . $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>' . $_lang ['earnest_money'], 'task_bid' => $_lang ['involved_task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>，' . $_lang ['manuscript_selected_success'], 'task_auto_return' => ':model_name' . $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>' . $_lang ['automate_return_remain'], 'sale_service' => $_lang ['sell_services_goods'] . '<a href="index.php?do=service&sid=:service_id">:title</a>' . $_lang ['income'], 'task_remain_return' => ':model_name' . $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>' . $_lang ['settlement_balance_return'], 'task_hosted_return' => ':model_name' . $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>' . $_lang ['managed_balance_return'], 'order_cancel' => $_lang ['order'] . ':order_id' . $_lang ['terminate_rebate'], 'host_return' => $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>' . $_lang ['managed_commission_refund'], 'host_split' => $_lang ['task'] . '<a href="index.php?do=task&task_id=:task_id">:task_title</a>' . $_lang ['managed_commission_allocate'], 'withdraw' => ':pay_way' . $_lang ['account'] . ':pay_account' . $_lang ['user'] . ':pay_name' . $_lang ['to_cash'], 'withdraw_fail' => ':pay_way' . $_lang ['account'] . ':pay_account' . $_lang ['user'] . ':pay_name' . $_lang ['cash_failed_return_refund'], 'recharge' => ":bank 充值 :cash" );
	}
}
