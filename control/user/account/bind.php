<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理-基本资料
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_account_bind extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'bind';
	
	function action_index(){
		global $_K;
		$api_open = unserialize($_K['oauth_api_open']);
		
		$api_name = Keke_global::get_open_api();

		$bind_info = DB::select()->from('witkey_member_oauth')->where("uid = $this->uid")->execute();
		$bind_info = Arr::get_arr_by_key($bind_info, 'type');
		
		require Keke_tpl::template('user/account/bind');
	}
	/**
	 * 绑定用户
	 */
	function action_bind(){
		global $_K,$ouri,$code;
		$type = $_GET['type'];
		//如果access_token 有值,返回到index
		if($_SESSION[$type.'_token']['access_token']){
			$this->request->redirect('user/account_bind');
		}
		
		//回调页面
		$ouri = $_K['website_url'].'/index.php/user/account_bind/call/'.$type;
		//url 地址编码
		$ouri = urlencode($ouri);
		 
		if($_GET['back']){
			Keke_oauth_login::instance($type)->get_access_token();
			$u = Keke_oauth_login::instance($type)->get_login_info();
			$this->save_bind($type, $u['username']);
			$this->request->redirect('user/account_bind');
		}else{
			//oauth 登录认证的地址
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
			//如腾讯等微博，附加了一个扩展数据,也要用到
			$ext = http_build_query($_GET);
		}
		$uri = $_K['website_url'].'/index.php/user/account_bind/bind?back=1&type='.$type.'&'.$ext;
		$this->request->redirect($uri);
	}
	/**
	 * 保存绑定关系
	 * @param string $type
	 * @param string $account
	 */
	function save_bind($type,$account){
		DB::insert('witkey_member_oauth')
		->set(array('uid','username','type','account'))
		->value(array($this->uid,$this->username,$type,$account))
		->execute();
	}
	/**
	 * 取消绑定
	 */
	function action_unbind(){
		$account = $_GET['account'];
		$type = $_GET['type'];
		$where = " uid = $this->uid and type='$type'";
		DB::delete('witkey_member_oauth')->where($where)->execute();
		$this->request->redirect('user/account_bind');
	}

}