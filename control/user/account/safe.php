<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź���-�˺Ű�ȫ
 * @author Michael
 * @version 3.0
   2012-12-12
 */

class Control_user_account_safe extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = 'safe';
	/**
	 * �޸�����
	 */
	function action_index(){
		
		require Keke_tpl::template('user/account/pwd');
	}
	
	function action_update_pwd(){
		Keke::formcheck($_POST['formhash']);
		$old_pwd = $_POST['old_pwd'];
		$new_pwd = $_POST['new_pwd1'];
		if($old_pwd == $new_pwd){
			Keke::show_msg('�����벻����ԭʼ����һ��!','user/account_safe','error');
		}
		if($this->check_pwd($old_pwd)===FALSE){
			Keke::show_msg('ԭʼ���벻��ȷ','user/account_safe','error');
		}
		$this->update_pwd($new_pwd);
		Keke::show_msg('������³ɹ�','user/account_safe');
	}
	/**
	 * ���ԭʼ����
	 * @param string $pwd
	 * @return boolean
	 */
	function check_pwd($pwd){
		return (bool)(md5($pwd) == DB::select('password')->from('witkey_member')->where("uid=".self::$uid)->get_count()->execute());
	}
	/**
	 * �����û�����,�һ�������������������������
	 * @param string $pwd
	 * @param int $uid
	 */
	function update_pwd($pwd,$uid=NULL){
		if($uid===NULL){
			$uid = self::$uid;
		}
		DB::update('witkey_member')->set(array('password'))->value(array(md5($pwd)))->where("uid=$uid")->execute();
	}
	/**
	 * �޸İ�ȫ��
	 */
	function action_safe(){
		require Keke_tpl::template('user/account/safe');
	}
	
	function action_update_safe(){
		Keke::formcheck($_POST['formhash']);
		$old_pwd = $_POST['old_pwd'];
		$new_pwd = $_POST['new_pwd1'];
		if($old_pwd == $new_pwd){
			Keke::show_msg('�°�ȫ�벻����ԭʼ��ȫ��һ��!','user/account_safe/safe','error');
		}
		
		if(Keke_user::instance('keke')->check_safe($old_pwd) ===FALSE){
			Keke::show_msg('ԭʼ��ȫ�벻��ȷ','user/account_safe/safe','error');
		}
		Keke_user::instance('keke')->update_safe($new_pwd);
		Keke::show_msg('��ȫ����³ɹ�','user/account_safe/safe');
	}
 

}