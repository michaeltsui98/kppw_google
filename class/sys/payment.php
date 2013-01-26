<?php  defined('IN_KEKE') or die('access denied');
/**
 * ���߳�ֵ������
 * @author Michael
 * @version 3.0 2012-11-24
 *
 */
abstract class Sys_payment {

	protected static $_default = 'alipayjs';
	/**
	 * @var ֧������ 
	 */
	protected $_pay_config = array();
	
	public static $_instances = array();
	/**
	 * ����֧������
	 * @param string $name (alipayjs,chinabank,payapl,tenpay,yeepay)
	 * @return Alipayjs
	 */
	public static function factory($name=NULL){
		if($name===NULL){
			$name = self::$_default;
		}
		if(Keke_valid::not_empty(self::$_instances[$name])){
			return self::$_instances[$name];
		}
		
		include S_ROOT.'payment/'.$name.'/'.$name.'.php';
		$cname = ucfirst($name);
		$class = new  $cname($name);
		return self::$_instances[$name] = $class;
	}
	
	public function __construct($name){
	   $pay_arr = DB::select()->from('witkey_pay_api')->where("type='online'")->execute();
	   $payment_arr = Arr::get_arr_by_key($pay_arr,'payment');
	   $this->_pay_config = $payment_arr[$name];
	}
	/**
	 * ��ȡ�����html
	 * @param string $method (post,get)
	 * @param float $pay_amount ��ֵ���
	 * @param string $subject  ����
	 * @param int $order_id  ����ID
	 * @param int $rid ��ֵ��¼ID
	 * @return string (form,url)
	 */
	abstract public function get_pay_html($method,$pay_amount,$subject, $order_id,$rid,$bank_code=NULL);
	
	/**
	 * ��ֵ״̬,��Ҫ�������³�ֵ
	 */
	public static function recharge_status(){
	      return array('wait'=>'��ȷ��','ok'=>'��ֵ�ɹ�','fail'=>'��ֵʧ��');
	}
	/**
	 * �ı��ֵ��¼��״̬
	 * @param int $rid ��ֵID
	 * @param string $account ��ֵ�˺�
	 * @param float $cash ��ֵ���
	 * @param string $bank �������� 
	 * @return bool
	 */
	public static function set_recharge_status($uid,$rid,$account,$cash,$bank=NULL){
		$s = (bool)DB::update('witkey_recharge')
		->set(array('status','bank_info'))
		->value(array('ok',$account))
		->where("rid = '$rid' and cash = '$cash' and uid = '$uid'")
		->execute();
		if($s===FALSE){
			return $s;
		}
		//���ɲ����¼���û�����Ǯ
		Sys_finance::get_instance($uid)->set_action('recharge')
		->set_mem(array(':bank'=>$bank,':cash'=>$cash))
		->cash_in($cash,0,0,'recharge',$rid);
		//��Ϣ֪ͨ����û�
		register_shutdown_function(array('Sys_payment','send_msg'),$uid,$rid,$cash);
		return TRUE;
	}
	static function  send_msg($uid,$rid,$cash){
		Keke_msg::instance()->to_user($uid)
		->set_tpl('recharge_success')
		->set_var(array('{��ֵ����}'=>$rid,'{��ֵ���}'=>$cash))
		->send();
	}
	
	/**
	 * ��ȡ����ʵ�����õĽ��,����֧����������
	 *
	 * ������������վҪ�յ������Ѻ󣬴��֧�����Ľ��
	 *
	 * @param  $cash ----�û����ֽ��
	 * @return $real_cash  -----�û��ɻ�õ�ʵ�ʽ��
	 */
	public static function get_to_cash($cash){
		//��ȡ��վ����
	
		$config_info = Arr::get_arr_by_key(DB::select()->from('witkey_pay_config')
				->where("k in('per_charge','per_low','per_high')")->execute(),'k');
	
		$min_cash = $config_info['per_low']['v'];
		$middle_profit = $config_info['per_charge']['v'];
		$max_cash = $config_info['per_high']['v'];
		//����
		if($cash<1){
			return $cash;
		}
			
		if($cash<=200){
			$real_cash = abs($cash - $min_cash);
		}elseif($cash>200&&$cash<=5000){
			$real_cash = $cash - $cash*$middle_profit/100;
		}elseif($cash>5000){
			$real_cash = $cash - $max_cash;
		}
		return $real_cash;
	}
	function get_pay_config(){
		return $this->_pay_config;
	}
	
}

