<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź�����ҳ-�û����ּ�¼
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_finance_withdraws extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'finance';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'withdraws';
	
	function action_index(){
		
		$fields = "`cash`,`bank_account`,`bank_username`,`bank_name`,`status`,`on_time`";
		$query_fields = array('status'=>'״̬','on_time'=>'ʱ��');
	
		$count = intval($_GET['count']);
		$this->_default_ord_field = 'on_time';
		$base_uri = BASE_URL.'/index.php/user/finance_withdraws	';
		extract($this->get_url($base_uri));
		
		$where .= ' and uid = '.$_SESSION['uid'];
		
		$data_info = Model::factory('witkey_withdraw')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		
		$data_list = $data_info['data'];
		//��ʾ��ҳ��ҳ��
		$pages = $data_info['pages'];
		//����״̬
		$status_arr = Keke_global::withdraw_status ();
		
		require Keke_tpl::template('user/finance/withdraws');
	}
}