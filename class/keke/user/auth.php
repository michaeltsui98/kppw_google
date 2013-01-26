<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û���֤��Ϣ
 * @author Michael
 * @version 3.0
   2012-10-12
 */

class Keke_user_auth {
	
	/**
	 * ��ȡ�û���֤��¼
	 * @param $uid
	 */
	public static function get_auth_by_uid($uid) {
		return DB::select()->from('witkey_member_auth')->where("uid ='$uid'")->get_one()->execute();
		
	}
 
	/**
	 * ��ȡ��֤ͼƬ
	 * @param $auth_code
	 * @param $uid user id
	 * @return   $img_list
	 */
	public static function get_auth_imghtm($auth_code, $uid) {
		global $_lang;
		$auth_list = self::get_auth_by_uid ( $uid );
		$config_list = self::get_auth_item_list();
		$img_list = '';
		foreach ( $config_list as $c ) {
			if (! $c ['auth_open'])
				continue;
			$str = '';
			$str .= '<img src="';
			$str .= 'data/uploads/' . 'ico/';
			$str .= $auth_list [$c ['auth_code']] ['auth_status'] ? $c ['auth_small_ico'] : $c ['auth_small_n_ico'];
			$str .= '" align="absmiddle" title="' . $c ['auth_title'];
			$str .= $auth_list [$c ['auth_code']] ['auth_status'] ? $_lang['has_pass'] : $_lang['not_pass'];
			$str .= '" width="15">&nbsp;';
			$img_list .= $str;
		}
		return $img_list;
	
	}

	/**
	 * �û���֤��¼��֤
	 * @param  $auth_code sting or array()��֤���� ��ȡ��һ�����
	 * @param  $uid �û���
	 * @return bool ���������֤��������
	 */
	public static function check_auth($auth_code,$uid){
		if(is_string($auth_code)){
			return (bool)DB::select($auth_code)->from('witkey_member_auth')->where("uid = '$uid'")->get_count()->execute();
		}elseif(is_array($auth_code)){
			$c = implode(',', $auth_code);
			return DB::select($c)->from('witkey_member_auth')->where("uid='$uid'")->get_one()->execute();
		}
	}
	/**
	 * ������֤��¼״̬
	 * @param  $auth_code ��Ϊ����
	 * @param $uid ��֤��id
	 * @param  $status
	 */
	public static function set_auth_status($uid,$auth_code,$status) {
		$where = "uid='$uid'";
		//���¼�¼״̬
		DB::update('witkey_auth_'.$auth_code)->set(array('auth_status'))->value(array($status))->where($where)->execute();
		//����Ǹ���ҵ��֤�ı��û���ɫ
		if($auth_code==='enterperise'){
			$action = (bool)$status?'pass':'no_pass';
			self::set_user_role($uid,$action);
		}
		//�ж��Ƿ��ж�Ӧ�ļ�¼
		if(DB::select('uid')->from('witkey_member_auth')->where($where)->get_count()->execute()){
			//is hava else update
		   return (bool)DB::update('witkey_member_auth')->set(array($auth_code))->value(array($status))->where($where)->execute();
		}else{
			//insert
		   return (bool)DB::insert('witkey_member_auth')->set(array('uid',$auth_code))->value(array($uid,$status))->execute();
		}
	}

	/**
	 *��֤��ʾ
	 */
	public function auth_lang(){
		global $_lang;
		$lang=array("realname"=>$_lang['realname_auth'],
				"bank"=>$_lang['bank_auth'],
				"email"=>$_lang['email_auth'],
				"enterprise"=>$_lang['enterprise_auth'],
				"mobile"=>$_lang['mobile_auth'],
				"weibo"=>$_lang['weibo_auth']);
		return $lang[$this->_auth_code];
	}
	/**
	 * @ͨ����֤���
	 * @param string array $uid
	 * @param string $auth_code (realname,email,mobile...)
	 * @return bool
	 * @example ֧��������ˣ��뵥����ˣ�������֤��¼��״̬,
	 * ͬʱ�����û���auth��,�Ժ���û�����֤״̬����member_auth ��Ϳ�����
	 */
	public static function pass($uid,$auth_code){
		if(is_numeric($uid)){
			//��������
		  self::set_auth_status($uid, $auth_code, 1);
		}elseif(is_array($uid)){
			$size = sizeof($uid);
			//����ͨ��
			for($i=0;$i<$size;$i++){
				self::set_auth_status($uid[$i], $auth_code, 1);
			}
		}
		return TRUE;
	}
	/**
	 * @��֤��ͨ��
	 * @param string array $uid
	 * @return bool 
	 */
	public static function no_pass($uid,$auth_code){
		if(is_numeric($uid)){
			//��������
			self::set_auth_status($uid, $auth_code, 2);
		}elseif(is_array($uid)){
			$size = sizeof($uid);
			//����ͨ��
			for($i=0;$i<$size;$i++){
				self::set_auth_status($uid[$i], $auth_code, 2);
			}
		}
		return TRUE;
	}
	
	/**
	 * ɾ��ָ������֤��¼
	 * @param  int array  $uid
	 * @param string $auth_code
	 */
	public static function del($uid,$auth_code){
		if(is_numeric($uid)){
			$res= DB::delete('witkey_auth_'.$auth_code)->where("uid='$uid' ")->execute();
			DB::update('witkey_auth_'.$auth_code)->set(array($auth_code))->value(array(0))->where("uid=$uid")->execute();
		}elseif(is_array($uid)){
			$size = sizeof($uid);
			for($i=0;$i<$size;$i++){
				$res += DB::delete('witkey_auth_'.$auth_code)->where("uid='$uid[$i]'")->execute();
				DB::update('witkey_auth_'.$auth_code)->set(array($auth_code))->value(array(0))->where("uid=$uid")->execute();
			}
		}
		return (bool)$res;
	}
	/**
	 * ��ҵ��֤ʱ�����û���ɫ
	 * @param $action ����  pass not_pass
	 * @param $uid  �û�ID
	 * @example user_role 2Ϊ��ͨ�û�, 3Ϊ��ҵ�û�
	 */
	public static  function set_user_role($uid,$action='pass'){
		$action=='pass' and $user_role='3' or $user_role='2';
		Dbfactory::execute(sprintf(" update %switkey_space set group_id='%d' where uid='%d'",TABLEPRE,$user_role,$uid));
	}
}