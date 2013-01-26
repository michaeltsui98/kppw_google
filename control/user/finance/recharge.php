	<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź�����ҳ-�û���ֵ
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_finance_recharge extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'recharge';
	
	function action_index(){
		
		//�����������б�
		$online_bank = DB::select()->from('witkey_pay_api')
		->where("type='online' and status = 1")
		->order("pay_id asc")
		->execute();
		
		//�û���ֵ����С�������
		$recharge_min =  DB::select('v')->from('witkey_pay_config')->where("k='recharge_min'")->get_count()->execute(); 
		
		//����������Ϣ
		$bank_abb = Keke_global::get_bank_code();
		$charge_uri = URL::site('user/finance_recharge/charge');
		require Keke_tpl::template('user/finance/recharge');
	}
	
	function action_charge(){
		//�������
		$order_id = $_POST['hdn_order_id'];
		//������
		$pay_amount = abs((float)$_POST['amount']);
		//֧���ӿ�����
		$pay_name = $_POST['pay'];
		//ͨ��pay_name �õ�pay_id
		$pay_id = DB::select('pay_id')->from('witkey_pay_api')->where("payment='$pay_name'")->get_count()->execute();
		//���д���
		$bank_code = $_POST['bank_code'];
		 
		
		$title = $order_id?'������ֵ,�������:'.$order_id:'����ֵ';
		//��ֵ ����
		$subject = Keke::$_sys_config['website_name'].$title;
		
		$rid = $this->save_charge_recode($pay_id, $order_id, $pay_amount);
		//���ô��ɹ������תҳ��
		Cookie::set('last_page', 'user/finance_recharges');
		
		echo Sys_payment::factory($pay_name)->get_pay_html('post', $pay_amount, $subject, $order_id, $rid,$bank_code);
	}
	/**
	 * ���ɳ�ֵ��¼
	 */
	function save_charge_recode($pay_id,$order_id,$amount,$mem=NULL){
		$columns = array('pay_id','order_id','uid','username','pay_time','cash','status','mem');
		$values = array($pay_id,$order_id,$_SESSION['uid'],$_SESSION['username'],SYS_START_TIME,$amount,'wait',$mem);
		return (int)DB::insert('witkey_recharge')->set($columns)->value($values)->execute();
	}
	
	
	
}