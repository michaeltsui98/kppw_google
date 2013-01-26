<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 *  ��̨�û��б�
 * @author michael
 * @version 3.0 
 * 2012-11-01
 *
 */
class Control_admin_user_list extends Control_admin{
	function action_index(){
		global $_K,$_lang;
		//��Ҫ����ʾ���ֶ�
		$fields = '`uid`,`username`,`group_id`,`user_type`,`status`,`reg_time`,`reg_ip`,`credit`,`balance`,`recommend` ';
		//�������õ����ֶ�
		$query_fields = array('uid'=>$_lang['id'],'username'=>$_lang['name'],'reg_time'=>$_lang['time']);
		//����uti
		$base_uri = BASE_URL.'/index.php/admin/user_list';
		//ͳ�Ʋ�ѯ����������
		$count = intval($_GET['count']);
		//ɾ��url
		$del_uri = $base_uri.'/del';
		//Ĭ�ϲ�ѯ�ֶ�
		$this->_default_ord_field = 'reg_time';
		//��ȡ��ѯ����uri
		extract($this->get_url($base_uri));
		//��ҳ��ѯ������
		$data_info = Model::factory('witkey_space')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//�б�����
		$list_arr = $data_info['data'];
		//��ҳ����
		$pages = $data_info['pages'];
		//��֤�û���û�п����̣��Ƽ����
		$shop_open = DB::select('shop_id,uid')->from('witkey_shop')->execute();
		$shop_open = Keke::get_arr_by_key($shop_open,'uid'); 
		
		require keke_tpl::template('control/admin/tpl/user/list');
	}
	/**
	 * �Ƽ��û�
	 */
	function action_recommend(){
		$uid = $_GET['uid'];
		$where .= ' uid='.$uid;
		$page = $_GET['page'];
		Dbfactory::update('update keke_witkey_space set recommend=1 where '.$where); 
		keke::show_msg("�Ƽ��ɹ�","admin/user_list?page=$page","success");
	}
	/**
	 * ȡ���Ƽ� �û�
	 */
	function action_moverecommend(){
		$uid = $_GET['uid'];
		$where .= ' uid='.$uid;
		$page = $_GET['page'];
		Dbfactory::update('update keke_witkey_space set recommend=0 where '.$where);
		keke::show_msg("ȡ���Ƽ��ɹ�","admin/user_list?page=$page","success");
	}
	/**
	 * �����û�
	 */
	function action_disable(){
		$uid = $_GET['uid'];
		$where .= ' uid='.$uid;
		$page = $_GET['page'];
		Dbfactory::update('update keke_witkey_space set status=2 where '.$where);
		keke::show_msg("���óɹ�","admin/user_list?page=$page","success");
	}
	/**
	 * �����û�
	 */
	function action_able(){
		$uid = $_GET['uid'];
		$where .= ' uid='.$uid;
		$page = $_GET['page'];
		Dbfactory::update('update keke_witkey_space set status=1 where '.$where);
		keke::show_msg("���óɹ�","admin/user_list?page=$page","success");
	}
	/**
	 * ����������ɾ���û�
	 */
	function action_del(){
		$uid = $_GET['uid'];
		if ($uid){
		$where .= ' uid='.$uid;
		}elseif($_GET['ids']) {
			$where .= 'uid in'.'('.$_GET['ids'].')' ;
			$ids = explode(',', $_GET['ids']);
			foreach ((array)$ids as $v){
				Keke_user::instance()->del_user($v);
			}
			exit('1');
		}
		
		echo Model::factory('witkey_space')->setWhere($where)->del();
	}
}