<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�ͷ�������ҳ --�ٱ�
 * @author Michael
 * @version 3.0
   2012-10-25
 */
class Control_user_custom_report extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'custom';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'report';
	/**
	 * �Ҿٱ���
	 * @param string $my
	 */
	function action_index($my = NULL){
		
		
		//��� 	���ٱ��� 	���� 	ԭ�� 	���� 	״̬ 	ʱ��
		$fields = "`report_id`,`to_username`,`report_type`,`report_desc`,`report_file`,`report_status`,`on_time`,`op_result`";
		//��ѯ�ֶ�
		$query_fields = array('report_id'=>'���','on_time'=>'ʱ��','report_desc'=>'ԭ��');
		//�ܼ�¼��
		$count = intval($_GET['count']);
		//��ǰҳ
		$page = intval($_GET['page']);
		//Ĭ�������ֶΣ����ﰴʱ�併��
		$this->_default_ord_field = 'on_time';
		$order = NULL;
		$base_uri = BASE_URL.'/index.php/user/custom_report/'.$my;
		
		extract($this->get_url($base_uri));
		
		if($my===NULL){
			//�Ҿٱ���
			$where .= " and uid = '{$_SESSION['uid']}'";
		}else{
			//�ٱ��ҵ�
			$where .= " and to_uid ='{$_SESSION['uid']}'";
		}
		//��ȡ��ҳ����
		
		$data_info = Model::factory('witkey_report')->get_grid($fields,$where,$base_uri,$order,$page,$count,$_GET['page_size']);
		
		$list_arr = $data_info['data'];
		
		$pages = $data_info['pages'];
		//��������
		$trans_status = $this->_trans_status;
		//�ٱ�����
		$rp_type =  Sys_report::get_report_type();
		require Keke_tpl::template('user/custom/report');
	}
	/**
	 * ���յ���
	 */
	function action_my(){
		$this->action_index('my');
	}
	
	
}