<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ����ʵ����֤�б�ҳ
 * @author Michael
 * @version 3.0
   2012-10-11
 */
class Control_auth_bank_admin_list extends Controller {
	protected  $_page;
	protected  $_uri ;
	
	function before(){
		if($_GET['page']){
			$this->_page = $_GET['page'];
		}elseif($_POST['page']){
			$this->_page = $_POST['page'];
		}
		$this->_uri = 'auth/bank_admin_list?page='.$this->_page;
	}
	/**
	 * ��ʼ����̨�б�ҳ
	 * ��ʾ���е���֤��¼������˵ļ�¼����ǰ��
	 */
	function action_index(){
	   global $_K,$_lang;
	   
 	   $fields = ' `r_id`,`uid`,`username`,`bank_account`,`bank_name`,`bank_id`,`pay_to_user_cash`,`cash`,`start_time`,`auth_status`,`end_time`,`bank_sname`';
	   
 	   $bank_name = Keke_global::get_bank();
 	   
 	   //Ҫ��ѯ���ֶ�,��ģ������ʾ�õ�
	   $query_fields = array('r_id'=>$_lang['id'],'bank'=>$_lang['name'],'start_time'=>$_lang['time']);
	   //�ܼ�¼��,��ҳ�õģ��㲻���壬���ݿ���Ƕ��һ�εġ�Ϊ���ٸ�Sql��䣬�����Ҫд�ģ���!
	   $count = intval($_GET['count']);
	   //����uri,��ǰ�����uri ,��������ͨ��Rotu����Եó����uri,Ϊ�˳������㣬�Լ���д����
	   $base_uri = BASE_URL."/index.php/auth/bank_admin_list";
	   //��ӱ༭��uri,add���action �ǹ̶���
	   $add_uri =  $base_uri.'/add';
	   //ɾ��uri,delҲ��һ���̶��ģ�д�������ģ���������
	   $del_uri = $base_uri.'/del';
	   //Ĭ�������ֶΣ����ﰴʱ�併��
	   $this->_default_ord_field = 'start_time';
	   //����Ҫ��ˮһ�£�get_url���Ǵ����ѯ������
	   extract($this->get_url($base_uri));
	 
	   //��ȡ�б��ҳ���������,����$where,$uri,$order,$page������get_url����
	   $data_info = Model::factory('witkey_auth_bank')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
	   //�б�����
	   $list_arr = $data_info['data'];
	   //��ҳ����
	   $pages = $data_info['pages'];
	   
	  
	   require Keke_tpl::template ( 'control/auth/bank/tpl/admin_list' );
	}
	/**
	 * ��ʼ����֤��Ϣҳ��
	 */
	function action_add(){
		global $_K,$_lang;
		$uid = $_GET['u_id'];
		$page = $this->_page;
		require Keke_tpl::template ( 'control/auth/bank/tpl/admin_info' );
	}
	function action_save(){
		$uid = $_POST['u_id'];
		$cash = floatval($_POST['txt_cash']);
		$where = "uid = '$uid'";
		DB::update('witkey_auth_bank')->set(array('pay_to_user_cash'))->value(array($cash))->where($where)->execute();
		//header("location:".BASE_URL.'/'.$this->_uri);
		$this->request->redirect('auth/bank_admin_list?page='.$this->_page);
	}
	/**
	 * ��֤ͨ��
	 */
	function action_pass(){
		 global $_lang;
		 $auth_code = 'bank';
		 if($_GET['u_id']){
		 	$uid = $_GET['u_id'];
		 }else{
		 	$uid = $_POST['ckb'];
		 }
		 Keke_user_auth::pass($uid, $auth_code);
		 Keke::show_msg($_lang['submit_success'],$this->_uri,'success');
	}
	/**
	 * ��֤��ͨ��
	 */
	function action_no_pass(){
		global $_lang;
		$auth_code = 'bank';
		if($_GET['u_id']){
			$uid = $_GET['u_id'];
		}else{
			$uid = $_POST['ckb'];
		}
		Keke_user_auth::no_pass($uid, $auth_code);
		Keke::show_msg($_lang['submit_success'],$this->_uri,'success');
	}
	/**
	 * ����ɾ�������ɾ�� 
	 */
	function action_del(){
		global $_lang;
		$auth_code = 'bank';
		if($_GET['u_id']){
			$uid = $_GET['u_id'];
		}else{
			$uid = explode(',', $_GET['ids']);
		}
		
		echo Keke_user_auth::del($uid, $auth_code);
		 
	}
}

 