<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź���-��������
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_account_bind extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'bind';
	
	function action_index(){
		global $_K;
		$api_open = unserialize($_K['oauth_api_open']);
		
		$api_name = Keke_global::get_open_api();

		$bind_info = DB::select()->from('witkey_member_oauth')->where("uid = ".self::$uid)->execute();
		$bind_info = Arr::get_arr_by_key($bind_info, 'type');
		
		require Keke_tpl::template('user/account/bind');
	}
	/**
	 * ���û�
	 */
	function action_bind(){
		global $_K,$ouri,$code;
		$type = $_GET['type'];
		//���access_token ��ֵ,���ص�index
		if($_SESSION[$type.'_token']['access_token']){
			$this->request->redirect('user/account_bind');
		}
		
		//�ص�ҳ��
		$ouri = $_K['website_url'].'/index.php/user/account_bind/call/'.$type;
		//url ��ַ����
		$ouri = urlencode($ouri);
		 
		if($_GET['back']){
			Keke_oauth_login::instance($type)->get_access_token();
			$u = Keke_oauth_login::instance($type)->get_login_info();
			$this->save_bind($type, $u['username']);
			$this->request->redirect('user/account_bind');
		}else{
			//oauth ��¼��֤�ĵ�ַ
			$to_url =  Keke_oauth_login::instance($type)->get_auth_url($ouri);
			$to_url = urldecode($to_url);
		 	//ob_start();
// 			var_dump(ob_get_status());die;			 
// 			header("Location:".$to_url);
			$this->request->redirect($to_url);
		}
	}
	
	function action_call(){
		global $_K;
		$type = $this->request->param('id');
		if($_GET){
			//����Ѷ��΢����������һ����չ����,ҲҪ�õ�
			$ext = http_build_query($_GET);
		}
		$uri = $_K['website_url'].'/index.php/user/account_bind/bind?back=1&type='.$type.'&'.$ext;
		$this->request->redirect($uri);
	}
	/**
	 * ����󶨹�ϵ
	 * @param string $type
	 * @param string $account
	 */
	function save_bind($type,$account){
		DB::insert('witkey_member_oauth')
		->set(array('uid','username','type','account'))
		->value(array(self::$uid,$this->username,$type,$account))
		->execute();
	}
	/**
	 * ȡ����
	 */
	function action_unbind(){
		$account = $_GET['account'];
		$type = $_GET['type'];
		$where = " uid = ".self::$uid." and type='$type'";
		DB::delete('witkey_member_oauth')->where($where)->execute();
		$this->request->redirect('user/account_bind');
	}

}