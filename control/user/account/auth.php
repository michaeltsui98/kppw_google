<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理-账号安全
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_account_auth extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'auth';
	/**
	 * 实名认证
	 */
	function action_index(){
		
		$auth_info = DB::select()->from('witkey_auth_realname')->where("uid= $this->uid")->get_one()->execute();
		
		
		$gid = DB::select('group_id')->from('witkey_space')->where("uid= $this->uid")->get_count()->execute();
		if($gid==2){
			require Keke_tpl::template('user/account/auth_realname');
		}else{
			$this->action_enter();
		}
	}
	function action_real_save(){
		
		Keke::formcheck($_POST['formhash']);
		
		$realname = $_POST['realname'];
		
		$id_code = $_POST['id_code'];
		if($this->check_realname($id_code)===TRUE){
			Keke::show_msg('这个身份证已经认证过了','user/account_auth','error');
		}
		//正面图片
		$id_pic = keke_file_class::upload_file('id_pic');
		 
		//反面图片
		$pic = keke_file_class::upload_file('pic');
		
		$sql = "replace into `:keke_witkey_auth_realname`\n".
				"(uid,username,realname,id_code,pic,id_pic,start_time,auth_status) \n".
				"values (:uid,:username,:realname,:id_code,:pic,:id_pic,:start_time,:auth_status)";
		$params = array(':uid'=>$this->uid,':username'=>$this->username,':realname'=>$realname,
				      ':id_code'=>$id_code,':pic'=>$pic,':id_pic'=>$id_pic,
					  ':start_time'=>SYS_START_TIME,':auth_status'=>0);
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->parameters($params)->execute();
		
		Keke::show_msg('提交成功','user/account_auth');
	}
	/**
	 * 判断身份证号码是用过了
	 * @param string $code
	 * @return bool
	 */
    function check_realname($code){
    	return (bool)DB::select('count(*)')->from('witkey_auth_realname')
    	->where("id_code='$code' and auth_status =0")->get_count()->execute();
    	
    }
	/**
	 * 企业认证
	 */
	function action_enter(){
		
		$auth_info = DB::select()->from('witkey_auth_enterprise')->where("uid=$this->uid")->get_one()->execute();
	     
		require Keke_tpl::template('user/account/auth_enter');
	}
	/**
	 * 企业认证提交
	 */
	function action_enter_save(){
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);
		$licen_num = $_POST['licen_num'];
		if($this->check_enter($licen_num)===TRUE){
			Keke::show_msg('护照号已经认证过了','user/account_auth/enter','error');
		}
		$licen_num = $_POST['licen_num'];
		$company = $_POST['company'];
		$licen_pic = keke_file_class::upload_file('licen_pic');
		$start_time = SYS_START_TIME;
		$legal = $_POST['legal'];
		$url = $_POST['url'];
		$id_code = $_POST['id_code'];
		$id_pic = keke_file_class::upload_file('id_pic');
		$pic = keke_file_class::upload_file('pic');

		$sql ="replace into  `:keke_witkey_auth_enterprise` \n".
				"(uid,username,company,licen_num,licen_pic,start_time,auth_status,legal,url,id_code,id_pic,pic)\n".
				"VALUES\n".
				"('$this->uid','$this->username','$company','$licen_num','$licen_pic','$start_time',0,'$legal','$url','$id_code','$id_pic','$pic')";
		
		
		
		
		DB::query($sql,Database::UPDATE)->tablepre(':keke_')->execute();
		Keke::show_msg('提交成功','user/account_auth/enter');
	}
	/**
	 * 检查这个企业是否认证过了
	 * @param string $code
	 * @return boolean
	 */
	function check_enter($code){
		return(bool)DB::select('count(*)')->from("witkey_auth_enterprise")
		->where("licen_num='$code' and auth_status =0")->get_count()->execute();
	}

}