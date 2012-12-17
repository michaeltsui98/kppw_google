<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户认证信息
 * @author Michael
 * @version 2.2
   2012-10-12
 */

class Keke_user_auth {
	
	/**
	 * 获取用户认证记录
	 * @param $uid
	 */
	public static function get_auth_by_uid($uid) {
		return DB::select()->from('witkey_member_auth')->where("uid ='$uid'")->get_one()->execute();
		
	}
 
	/**
	 * 获取认证图片
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
	 * 用户认证记录验证
	 * @param  $auth_code sting or array()认证类型 获取单一或多类
	 * @param  $uid 用户名
	 * @return bool 如果查多个认证返回数组
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
	 * 更改认证记录状态
	 * @param  $auth_code 可为数组
	 * @param $uid 认证人id
	 * @param  $status
	 */
	public static function set_auth_status($uid,$auth_code,$status) {
		$where = "uid='$uid'";
		//更新记录状态
		DB::update('witkey_auth_'.$auth_code)->set(array('auth_status'))->value(array($status))->where($where)->execute();
		//如果是个企业认证改变用户角色
		if($auth_code==='enterperise'){
			$action = (bool)$status?'pass':'no_pass';
			self::set_user_role($uid,$action);
		}
		//判断是否有对应的记录
		if(DB::select('uid')->from('witkey_member_auth')->where($where)->get_count()->execute()){
			//is hava else update
		   return (bool)DB::update('witkey_member_auth')->set(array($auth_code))->value(array($status))->where($where)->execute();
		}else{
			//insert
		   return (bool)DB::insert('witkey_member_auth')->set(array('uid',$auth_code))->value(array($uid,$status))->execute();
		}
	}

	/**
	 *认证提示
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
	 * @通过认证审核
	 * @param string array $uid
	 * @param string $auth_code (realname,email,mobile...)
	 * @return bool
	 * @example 支付批量审核，与单条审核，更新认证记录的状态,
	 * 同时更新用户的auth表,以后查用户的认证状态，查member_auth 表就可以了
	 */
	public static function pass($uid,$auth_code){
		if(is_numeric($uid)){
			//单条更新
		  self::set_auth_status($uid, $auth_code, 1);
		}elseif(is_array($uid)){
			$size = sizeof($uid);
			//批量通过
			for($i=0;$i<$size;$i++){
				self::set_auth_status($uid[$i], $auth_code, 1);
			}
		}
		return TRUE;
	}
	/**
	 * @认证不通过
	 * @param string array $uid
	 * @return bool 
	 */
	public static function no_pass($uid,$auth_code){
		if(is_numeric($uid)){
			//单条更新
			self::set_auth_status($uid, $auth_code, 2);
		}elseif(is_array($uid)){
			$size = sizeof($uid);
			//批量通过
			for($i=0;$i<$size;$i++){
				self::set_auth_status($uid[$i], $auth_code, 2);
			}
		}
		return TRUE;
	}
	
	/**
	 * 删除指定的认证记录
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
	 * 企业认证时更新用户角色
	 * @param $action 动作  pass not_pass
	 * @param $uid  用户ID
	 * @example user_role 2为普通用户, 3为企业用户
	 */
	public static  function set_user_role($uid,$action='pass'){
		$action=='pass' and $user_role='3' or $user_role='2';
		Dbfactory::execute(sprintf(" update %switkey_space set group_id='%d' where uid='%d'",TABLEPRE,$user_role,$uid));
	}
}