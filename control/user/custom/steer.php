<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�ͷ�������ҳ-�û�����
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_custom_steer extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'custom';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'steer';
	
	function action_index(){
		
		$fields = '`report_id`,`obj`,`username`,`on_time`,`op_uid`,`op_username`,`report_desc`,`report_status`,`op_result`';
		
		$query_fields = array('report_id'=>'���','report_desc'=>'����','op_result'=>'�ظ�','on_time'=>$_lang['time']);
		$base_uri = BASE_URL.'/index.php/user/custom_steer';
		$del_uri = $base_uri.'/del';
		$count = intval($_GET['count']);
		$this->_default_ord_field = 'on_time';
		//��ȡ��ҳ����
		extract($this->get_url($base_uri));
		
		$trans_status = $this->_trans_status;
		//����
		$where .= " and obj = 'comment' and uid = '{$_SESSION['uid']}' ";

		$data_info = Model::factory('witkey_report')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		
		$data_list = $data_info['data'];
		//��ʾ��ҳ��ҳ��
		$pages = $data_info['pages'];
		$open_url = BASE_URL.'/index.php/user/custom_steer/comment';
		require Keke_tpl::template('user/custom/steer');
	}
	/**
	 * 
	 */
	function action_comment(){
		
			require Keke_tpl::template('user/custom/comment');
	}
	/**
	 * �ύ����
	 */
	function action_sbt_comment(){
		Keke::formcheck($_POST['formhash']);//�����ύ
		$_POST = Keke_tpl::chars($_POST);//��sqlע��
		$array = array(
				'obj' => 'comment',
				'report_desc' => $_POST['txt_comment'],
				'on_time' => time(),
				'report_status' => 1,
				'username'=>$_SESSION['username'],
				'uid'=>$_SESSION['uid'],
		);
		Model::factory('witkey_report')->setData($array)->create();
		$this->request->redirect('user/custom_steer');
	}
	/**
	 * ɾ��������Ϣ
	 */
	function action_del(){
		$report_id = $_GET['report_id'];
		if ($report_id){
			$where .=' report_id ='.$report_id;
		}
		Model::factory('witkey_report')->setWhere($where)->del();
	}
}