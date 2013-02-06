<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�����-�˺Ź�����ҳ
 * @author Michael
 * @version 3.0
   2012-10-25
 */

class Control_user_account_index extends Control_user{
    
	/**
	 * @var һ���˵�ѡ����
	 */
	protected static $_default = 'account';
    /**
     * 
     * @var �����˵�ѡ����,��ֵ����ѡ��
     */
	protected static $_left = NULL;
	
	function action_index(){
		
		
		$uinfo = self::get_user_info();

		$user_title = Keke_user_mark::get_title(self::$uid);
	     
		require Keke_tpl::template('user/account/index');
	}
	/**
	 * �����û���֤״̬����֤��Ϣ
	 * @param int $uid
	 * @return array 
	 */
	function get_user_info($uid=NULL){
		if($uid===NULL){
			$uid = self::$uid;
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
	//�ʼ����
	function action_unemail(){
		DB::update('witkey_auth_email')->set(array('auth_status'))->value(array(0))->where("uid=".self::$uid)->execute();
		$this->request->redirect('user/account_index');
	}
	//�ֻ����
	function action_unmobile(){
		DB::update('witkey_auth_mobile')->set(array('auth_status'))->value(array(0))->where("uid=".self::$uid)->execute();
		$this->request->redirect('user/account_index');
	}
	
}