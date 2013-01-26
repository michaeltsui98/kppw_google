<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź�����ҳ-�û���ֵ��¼
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_finance_recharges extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'recharges';
	
	function action_index(){
		//���		��� 	�˻� 	״̬ 	ʱ��
		$query_fields = array('a.status'=>'״̬','a.pay_name'=>'ʱ��');
		
		$sql = sprintf("select a.*,
				b.pay_id pid,b.payment bpayment,b.type btype,b.pay_user bpay_user,
				b.pay_account bpay_account,b.pay_name bpay_name,b.status bstatus 
				from %switkey_recharge a 
				left join %switkey_pay_api b 
				on a.pay_id= b.pay_id ",TABLEPRE,TABLEPRE);
		
		//��ֵ״̬
		$status_arr = Sys_payment::recharge_status();
		//��ѯ״̬ת��
		$_GET['txt_condition'] =  $status_arr[$_GET['txt_condition']];
		
	 
		$this->_default_ord_field = 'pay_time';
		
		$base_uri = BASE_URL.'/index.php/user/finance_recharges	';
		
		extract($this->get_url($base_uri));
		
		//�ռ�	����
		$where .= ' and a.uid = '.$_SESSION['uid'];
		
		$data_info = Model::sql_grid($sql,$where,$uri,$order,$group_by);
		
		$data_list = $data_info['data'];
		//��ʾ��ҳ��ҳ��
		$pages = $data_info['pages'];
		
		$bank_names = Keke_global::get_bank();
		 
		
		require Keke_tpl::template('user/finance/recharges');
	}
	 
  
}