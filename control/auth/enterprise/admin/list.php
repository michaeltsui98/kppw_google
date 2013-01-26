<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ����ʵ����֤�б�ҳ
 * @author Michael
 * @version 3.0
   2012-10-11
 */
class Control_auth_enterprise_admin_list extends Controller {
	protected  $_page;
	protected  $_uri ;
	function before(){
		$this->_page = $_GET['page'];
		$this->_uri = 'auth/enterprise_admin_list?page='.$this->_page;
	}
	/**
	 * ��ʼ����̨�б�ҳ
	 * ��ʾ���е���֤��¼������˵ļ�¼����ǰ��
	 */
	function action_index(){
	   global $_K,$_lang;
 
	   $fields = ' `uid`,`username`,`legal`,`id_pic`,`pic`,`company`,`licen_num`,`licen_pic`,`run_years`,`mem`,`start_time`,`auth_status`,`end_time`';
	   //Ҫ��ѯ���ֶ�,��ģ������ʾ�õ�
	   $query_fields = array('uid'=>$_lang['id'],'company'=>$_lang['name'],'start_time'=>$_lang['time']);
	   //�ܼ�¼��,��ҳ�õģ��㲻���壬���ݿ���Ƕ��һ�εġ�Ϊ���ٸ�Sql��䣬�����Ҫд�ģ���!
	   $count = intval($_GET['count']);
	   //����uri,��ǰ�����uri ,��������ͨ��Rotu����Եó����uri,Ϊ�˳������㣬�Լ���д����
	   $base_uri = BASE_URL."/index.php/auth/enterprise_admin_list";
	   //��ӱ༭��uri,add���action �ǹ̶���
	   $add_uri =  $base_uri.'/add';
	   //ɾ��uri,delҲ��һ���̶��ģ�д�������ģ���������
	   $del_uri = $base_uri.'/del';
	   //Ĭ�������ֶΣ����ﰴʱ�併��
	   $this->_default_ord_field = 'start_time';
	   //����Ҫ��ˮһ�£�get_url���Ǵ����ѯ������
	   extract($this->get_url($base_uri));
	 
	   //��ȡ�б��ҳ���������,����$where,$uri,$order,$page������get_url����
	   $data_info = Model::factory('witkey_auth_enterprise')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
	   //�б�����
	   $list_arr = $data_info['data'];
	   //��ҳ����
	   $pages = $data_info['pages'];
	   
	   require Keke_tpl::template ( 'control/auth/enterprise/tpl/admin_list' );
	}
 	/**
	 * ��֤ͨ��
	 */
	function action_pass(){
		 global $_lang;
		 $auth_code = 'enterprise';
		 if($_GET['u_id']){
		 	$uid = $_GET['u_id'];
		 }else{
		 	$uid = $_POST['ckb'];
		 }
		 
		 $sql = "update `:keke_witkey_auth_enterprise` as a \n".
				"left join :keke_witkey_space as b\n".
				"on a.uid = b.uid\n".
				"left join :keke_witkey_member_auth as c\n".
				"on a.uid = c.uid\n".
				"set a.auth_status = 1,\n".
				"b.group_id = 3,\n".
				"b.truename = a.legal,\n".
				"c.enterprise = 1 where a.uid = :uid";
		 DB::query($sql,Database::UPDATE)->tablepre(':keke_')->param(':uid', $uid)->execute();
		 
		 //Keke_user_auth::pass($uid, $auth_code);
		 
		 //Keke::show_msg($_lang['submit_success'],$this->_uri,'success');
	}
	/**
	 * ��֤��ͨ��
	 */
	function action_no_pass(){
		global $_lang;
		$auth_code = 'enterprise';
		if($_GET['u_id']){
			$uid = $_GET['u_id'];
		} 
		if (CHARSET == 'gbk') {
			$mem = Keke::utftogbk ( $_POST ['data'] );
		}		
		$sql = "update `:keke_witkey_auth_enterprise` as a \n".
				"left join :keke_witkey_member_auth as c\n".
				"on a.uid = c.uid\n".
				"set a.auth_status = 2,\n".
				"a.mem='$mem', \n". 
				"c.enterprise = 0 where a.uid = :uid";
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->param(':uid', $uid)->execute();
	}
	/**
	 * ����ɾ�������ɾ�� 
	 */
	function action_del(){
		global $_lang;
		$auth_code = 'enterprise';
		if($_GET['u_id']){
			$uid = $_GET['u_id'];
		}else{
			$uid = explode(',', $_GET['ids']);
		}
		
		echo Keke_user_auth::del($uid, $auth_code);
		
	}
}

