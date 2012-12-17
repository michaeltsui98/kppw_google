<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理首页-用户提现 
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_finance_withdraw extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'withdraw';
	
	function action_index(){
		
		
		$res = DB::select('k,v')->from('witkey_pay_config')->execute();
		/* 提现规则
		withdraw_min
		withdraw_max
		per_charge
		per_low
		per_high 
		*/
		$pay_config = Arr::get_arr_by_key($res,'k');
		$user = Keke_user::instance('keke')->get_user_info($_SESSION['uid'],'balance');
		 
		require Keke_tpl::template('user/finance/withdraw');
	}
	/**
	 * 提现手续费
	 * @param float $cash 提现金额
	 */
	function get_withdraw_fee($cash){
		$cash = (float)$cash;
		$res = DB::select('k,v')->from('witkey_pay_config')->execute();
		$pay_config = Arr::get_arr_by_key($res,'k');
		$fee = 0;
		if($cash<=200){
			$fee = (float)$pay_config['per_low']['v'];
		}elseif($cash>=5000){
			$fee = (float)$pay_config['per_high']['v'];
		}else{
			$fee = (float)$pay_config['pre_chareg']['v'] * $cash;
		}
		
		return $fee;
	}
	/**
	 * 提现保存
	 */
	function action_save(){
		 Keke::formcheck($_POST['formhash']);
		 $_POST = Keke_tpl::chars($_POST);
		 $fds = $_POST['fds'];
		 $fds['on_time'] = SYS_START_TIME;
		 $fds['fee'] = $this->get_withdraw_fee($fds['cash']);
		 $fds['uid']= $_SESSION['uid'];
		 $fds['username'] = $_SESSION['username'];
		 $fds['status'] = 0;
		 $wid =  Model::factory('witkey_withdraw')->setData($fds)->create();
		 
		 Sys_finance::get_instance($fds['uid'])->set_action('withdraw')->set_mem('提现')
		 ->cash_out($fds['cash'],$fds['fee'],'withdraw',$wid);
		 $this->request->redirect('user/finance_withdraw');		 
	}
	
	static function action_check_code(){
		$res = Keke_user::instance('keke')->check_safe($_GET['code']);
		if($res === FALSE){
			echo '安全码错误';
		}else{
			echo $res;
		}
	}
	
	
}