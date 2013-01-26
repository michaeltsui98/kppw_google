<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ����ʵ����֤�б�ҳ
 * @author Michael
 * @version 3.0
   2012-10-11
 */
class Control_auth_realname_admin_list extends Controller {
	protected  $_page;
	protected  $_uri ;
	function before(){
		$this->_page = $_GET['page'];
		$this->_uri = 'auth/realname_admin_list?page='.$this->_page;
	}
	/**
	 * ��ʼ����̨�б�ҳ
	 * ��ʾ���е���֤��¼������˵ļ�¼����ǰ��
	 */
	function action_index(){
	   global $_K,$_lang;
 
	   $fields = '`uid`,`username`,`realname`,`id_code`,`id_pic`,`pic`,`cash`,`start_time`,`auth_status`,`end_time`,`mem`';
	   //Ҫ��ѯ���ֶ�,��ģ������ʾ�õ�
	   $query_fields = array('uid'=>$_lang['id'],'realname'=>$_lang['name'],'start_time'=>$_lang['time']);
	   //�ܼ�¼��,��ҳ�õģ��㲻���壬���ݿ���Ƕ��һ�εġ�Ϊ���ٸ�Sql��䣬�����Ҫд�ģ���!
	   $count = intval($_GET['count']);
	   //����uri,��ǰ�����uri ,��������ͨ��Rotu����Եó����uri,Ϊ�˳������㣬�Լ���д����
	   $base_uri = BASE_URL."/index.php/auth/realname_admin_list";
	   //��ӱ༭��uri,add���action �ǹ̶���
	   $add_uri =  $base_uri.'/add';
	   //ɾ��uri,delҲ��һ���̶��ģ�д�������ģ���������
	   $del_uri = $base_uri.'/del';
	   //Ĭ�������ֶΣ����ﰴʱ�併��
	   $this->_default_ord_field = 'start_time';
	   //����Ҫ��ˮһ�£�get_url���Ǵ����ѯ������
	   extract($this->get_url($base_uri));
	 
	   //��ȡ�б��ҳ���������,����$where,$uri,$order,$page������get_url����
	   $data_info = Model::factory('witkey_auth_realname')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
	   //�б�����
	   $list_arr = $data_info['data'];
	   //��ҳ����
	   $pages = $data_info['pages'];
	   require Keke_tpl::template ( 'control/auth/realname/tpl/admin_list' );
	}
	/**
	 * ��ʼ����֤��Ϣҳ��
	 */
	function action_add(){
		global $_K,$_lang;
		
		require Keke_tpl::template ( 'control/auth/realname/tpl/admin_info' );
	}
	/**
	 * ��֤ͨ��
	 */
	function action_pass(){
		 global $_lang;
		 $auth_code = 'realname';
         // ������֤����֤��¼���û���
		 $sql = "update  `:keke_witkey_auth_realname` as a \n".
				"left join :keke_witkey_space as b\n".
				"on a.uid = b.uid\n".
				"left join :keke_witkey_member_auth as c \n".
				"on a.uid = c.uid\n".
				"set a.auth_status =1 ,\n".
				"b.truename = a.realname,\n".
				"c.realname = 1, \n".
				"b.group_id = 2\n";
		 
		 if($_GET['u_id']){
		 	$uid = $_GET['u_id'];
		 	$sql .= "where a.uid = $uid";
		 }else{
		 	$uid = $_POST['ckb'];
		 	$sql .= "where a.uid in ($uid)";
		 }
		 
		 DB::query($sql,Database::UPDATE)->tablepre(':keke_')->execute();
	}
	
	/**
	 * ��֤��ͨ��
	 */
	function action_no_pass(){
		global $_lang;
		$auth_code = 'realname';
		if($_GET['u_id']){
			$uid = $_GET['u_id'];
		}
		
		if (CHARSET == 'gbk') {
			$_POST ['data'] = Keke::utftogbk ( $_POST ['data'] );
		}
		
		$sql = "update  `keke_witkey_auth_realname` as a \n".
				"left join keke_witkey_member_auth as c \n".
				"on a.uid = c.uid\n".
				"set a.auth_status =2 ,\n".
				"c.realname = 0,\n".
				"a.mem = :mem \n".
				"where a.uid = $uid";
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->param(':mem', $_POST['data'])->execute();
	}
	/**
	 * ����ɾ�������ɾ�� 
	 */
	function action_del(){
		global $_lang;
		$auth_code = 'realname';
		if($_GET['u_id']){
			$uid = $_GET['u_id'];
		}else{
			$uid = explode(',', $_GET['ids']);
		}
		echo Keke_user_auth::del($uid, $auth_code);
	}
} 