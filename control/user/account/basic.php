<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理-基本资料
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_account_basic extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'basic';
	
	function action_index(){
		
		$uindex = new Control_user_account_index($this->request,$this->response);
		
		$uinfo = $uindex->get_user_info();
// 		var_dump($uinfo);die;
		
		//地区
		$residency = explode('|', $uinfo['residency']);
		//行业
		$indus_arr = Sys_indus::get_indus_tree($uinfo['indus_id']);
		require Keke_tpl::template('user/account/basic');
	}
	
	/**
	 * 更新用户头象
	 */
	function action_avatar(){
		$flash_html = Keke_user::instance()->avatar_flash($_SESSION['uid']);
		require Keke_tpl::template('user/account/avatar');
	}

	/**
	 * 发送手机认证码
	 */
	function action_send_sms(){
		$mobile = $this->request->param('id');
		if(Keke_valid::phone($mobile,11)===FALSE){
			return FALSE;
		}
		if($this->check_moblie($mobile)===TRUE){
			echo 0;
			return FALSE;
		}
		$rand_code = Keke::randomkeys(6);
		$sql ="replace into `keke_witkey_auth_mobile`\n".
			  "(uid,username,mobile,valid_code,auth_status,auth_time) \n".
			  "values (:uid,:username,'$mobile','$rand_code',0,:time)";
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')
		->param(':uid', $this->uid)->param(':username', $this->username)
		->param(':time', SYS_START_TIME)->execute();
		Keke_msg::instance()->send_sms($mobile,'手机验证码:'.$rand_code);
		echo 1;
	}
	/**
	 * 验证手机验证码，并认证手机
	 * @return boolean
	 */
	function action_valid_code(){
		$code = $this->request->param('id');
		$code = trim($code);
		$rows =(int)DB::update('witkey_auth_mobile')->set(array('auth_status'))->value(array(1))
		->where("uid=$this->uid and valid_code='$code'")->execute();
		//$list = Database::instance()->get_query_list();
		if($rows==0){
			return FALSE;
		}
		$sql = "update  :keke_witkey_space as a \n".
				"LEFT JOIN :keke_witkey_auth_mobile as b \n".
				"on a.uid = b.uid left join :keke_witkey_member_auth c on a.uid = c.uid \n".
				"set a.mobile = b.mobile ,c.mobile=1\n".
				"where b.uid = :uid";
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->param(':uid', $this->uid)->execute(); 
		
		Keke::show_msg('手机绑定成功','user/account_basic');
	}
	/**
	 * 手机号是否被认证过了
	 * @param string $mobile
	 * @return boolean
	 */
	function check_moblie($mobile){
		$res = (bool)DB::select('count(*)')->from('witkey_auth_mobile')
		->where("mobile='$mobile' and auth_status =1")
		->get_count()->execute();
		return $res;		 
	}
	function check_email($email){
		return (bool)DB::select('count(*)')->from('witkey_auth_email')->where("email='$email' and auth_status =1 ")
		->get_count()->execute();
	}
	/**
	 * 邮件发送，绑定邮箱
	 */
	function action_send_mail(){
		global $_K;
		$email = $_GET['mail'];
		if(Keke_valid::email($email)==FALSE){
			Keke::show_msg('邮箱格式不正确','user/account_basic','error');
		}
		if($this->check_email($email)===TRUE){
			Keke::show_msg('这个邮箱已经被绑定过了','user/account_basic','error');
		}
		$sql = "replace into `:keke_witkey_auth_email`\n".
				"(uid,username,email,auth_time,auth_status,end_time)\n".
				"values\n".
				"(:uid,:username,:email,:auth_time,:auth_status,:end_time)";
		//生成认证记录
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->param(':uid', $this->uid)
		->param(':username', $this->username)
		->parameters(array(':email'=>$email,
							':auth_time'=>SYS_START_TIME,
							':auth_status'=>0,
							':end_time'=>SYS_START_TIME+(3600*24)
		))->execute();
		
		//Keke::$_log->add(Log::DEBUG, '发送前的数据:'.$this->uid.$email.(int)SYS_START_TIME)->write();
		//生成认证码
		$valid_code = hash_hmac('md5', $this->uid.$email.(int)SYS_START_TIME, $this->uid);
		//生成激活连接
		$action_url = $_K['website_url'].'/index.php/user/account_basic/active_mail/'.$valid_code;
		
		$body = "邮箱绑定认证地址：<a href='$action_url'>点击绑定</a>,此连接24小时内有效,".$_K['website_name'];
		
		$title = '邮箱绑定激活邮件';
		
		$mail = explode('@', $email);
		$mail_url = 'http://mail.'.$mail[1];
		 
		register_shutdown_function(array(Keke_msg::instance(),'send_mail'),$email,$title,$body);
		
		$this->request->redirect($mail_url);
	}
	
	function action_active_mail(){
		$code = $this->request->param('id');
		$info = DB::select('email,auth_time,end_time')->from('witkey_auth_email')
		->where("uid = $this->uid")->get_one()->execute();
		
		//Keke::$_log->add(Log::DEBUG, '接收后的数据:'.$this->uid.$info['email'].$info['auth_time'])->write();
		
		if(hash_hmac('md5', $this->uid.$info['email'].$info['auth_time'], $this->uid) != trim($code)){
			Keke::show_msg('激活地址不合法','user/account_basic','error');
		}
		if((int)SYS_START_TIME > $info['end_time']){
			Keke::show_msg('激活地址过期失效，请重新绑定','user/account_basic','error');
		}
		//更新绑定信息
		$sql = "UPDATE :keke_witkey_auth_email a LEFT JOIN :keke_witkey_space b\n".
				"on a.uid = b.uid left join :keke_witkey_member_auth c\n".
				"on a.uid = c.uid \n".
				"set a.auth_status=1 , b.email=:email,c.email = 1\n".
				"where a.uid = :uid";
		
		$params = array(':email'=>$info['email'],':uid'=>$this->uid);
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->parameters($params)->execute();
		Keke::show_msg('邮件绑定成功','user/account_basic');
	}
	/**
	 * 保存用户 信息
	 */
	function action_save(){
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);
		
		$residency = $_POST['province'].'|'.$_POST['city'].'|'.$_POST['area'];
		
		$columns = array('group_id','sex','indus_id','residency','summary');
		$values = array($_POST['usertype'],$_POST['sex'],$_POST['indus'],$residency,$_POST['summary']);
		$where = "uid = $this->uid";
		DB::update('witkey_space')->set($columns)->value($values)->where($where)->execute();
		Keke::show_msg('提交成功','user/account_basic');
	}
}