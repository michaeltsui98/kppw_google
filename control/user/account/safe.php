<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理-账号安全
 * @author Michael
 * @version 3.0
   2012-12-12
 */

class Control_user_account_safe extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'safe';
	/**
	 * 修改密码
	 */
	function action_index(){
		
		require Keke_tpl::template('user/account/pwd');
	}
	
	function action_update_pwd(){
		Keke::formcheck($_POST['formhash']);
		$old_pwd = $_POST['old_pwd'];
		$new_pwd = $_POST['new_pwd1'];
		if($old_pwd == $new_pwd){
			Keke::show_msg('新密码不能与原始密码一样!','user/account_safe','error');
		}
		if($this->check_pwd($old_pwd)===FALSE){
			Keke::show_msg('原始密码不正确','user/account_safe','error');
		}
		$this->update_pwd($new_pwd);
		Keke::show_msg('密码更新成功','user/account_safe');
	}
	/**
	 * 检查原始密码
	 * @param string $pwd
	 * @return boolean
	 */
	function check_pwd($pwd){
		return (bool)(md5($pwd) == DB::select('password')->from('witkey_member')->where("uid=$this->uid")->get_count()->execute());
	}
	/**
	 * 更新用户密码,找回密码可以用这个方法重置密码
	 * @param string $pwd
	 * @param int $uid
	 */
	function update_pwd($pwd,$uid=NULL){
		if($uid===NULL){
			$uid = $this->uid;
		}
		DB::update('witkey_member')->set(array('password'))->value(array(md5($pwd)))->where("uid=$uid")->execute();
	}
	/**
	 * 修改安全码
	 */
	function action_safe(){
		require Keke_tpl::template('user/account/safe');
	}
	
	function action_update_safe(){
		Keke::formcheck($_POST['formhash']);
		$old_pwd = $_POST['old_pwd'];
		$new_pwd = $_POST['new_pwd1'];
		if($old_pwd == $new_pwd){
			Keke::show_msg('新安全码不能与原始安全码一样!','user/account_safe/safe','error');
		}
		
		if(Keke_user::instance('keke')->check_safe($old_pwd) ===FALSE){
			Keke::show_msg('原始安全码不正确','user/account_safe/safe','error');
		}
		Keke_user::instance('keke')->update_safe($new_pwd);
		Keke::show_msg('安全码更新成功','user/account_safe/safe');
	}
 

}