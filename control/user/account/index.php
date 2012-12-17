<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-账号管理首页
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_account_index extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = NULL;
	
	function action_index(){
		
		
		$uinfo = self::get_user_info();

		$user_title = Keke_user_mark::get_title($this->uid);
	     
		require Keke_tpl::template('user/account/index');
	}
	/**
	 * 返回用户认证状态及认证信息
	 * @param int $uid
	 * @return array 
	 */
	function get_user_info($uid=NULL){
		if($uid===NULL){
			$uid = $this->uid;
		}
		$sql = "select a.uid,a.group_id,a.credit,a.balance,
                a.truename,a.residency,a.sex,a.birthday,a.qq,a.phone,
				a.summary,a.indus_id,a.indus_pid,
				e.legal,e.company,e.url,
				b.auth_status email_status,b.email,\n".
				"c.auth_status mobile_status,c.mobile,\n".
				"d.auth_status realname_status,\n".
				"e.auth_status enter_status\n".
				"from :keke_witkey_space a\n".
				"left join :keke_witkey_auth_email b \n".
				"on a.uid = b.uid\n".
				"LEFT JOIN :keke_witkey_auth_mobile c\n".
				"on a.uid = c.uid\n".
				"left join :keke_witkey_auth_realname d\n".
				"on a.uid = d.uid\n".
				"left join :keke_witkey_auth_enterprise e \n".
				"on a.uid = e.uid where a.uid = :uid";
		return DB::query($sql)->tablepre(':keke_')->param(':uid', $uid)->get_one()->execute();
	}
	//邮件解绑
	function action_unemail(){
		DB::update('witkey_auth_email')->set(array('auth_status'))->value(array(0))->where("uid=$this->uid")->execute();
		$this->request->redirect('user/account_index');
	}
	//手机解绑
	function action_unmobile(){
		DB::update('witkey_auth_mobile')->set(array('auth_status'))->value(array(0))->where("uid=$this->uid")->execute();
		$this->request->redirect('user/account_index');
	}
	
}