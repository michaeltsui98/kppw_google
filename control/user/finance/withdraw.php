<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź�����ҳ-�û����� 
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_finance_withdraw extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'withdraw';
	
	function action_index(){
		
		
		$res = DB::select('k,v')->from('witkey_pay_config')->execute();
		/* ���ֹ���
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
	 * ����������
	 * @param float $cash ���ֽ��
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
	 * ���ֱ���
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
		 
		 Sys_finance::get_instance($fds['uid'])->set_action('withdraw')->set_mem('����')
		 ->cash_out($fds['cash'],$fds['fee'],'withdraw',$wid);
		 $this->request->redirect('user/finance_withdraw');		 
	}
	
	static function action_check_code(){
		$res = Keke_user::instance('keke')->check_safe($_GET['code']);
		if($res === FALSE){
			echo '��ȫ�����';
		}else{
			echo $res;
		}
	}
	
	
}