<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 *  后台用户添加
 * @author michael
 * @version 3.0 
 * 2012-11-01
 *
 */
class Control_admin_user_add extends Control_admin{
	function action_index(){

		$uid = $_GET['uid'];
		if ($uid){
			$where .= ' uid='.$uid;
			//获取用户信息
			$edit_arr = Keke_user::instance()->get_user_info($uid);
			//查询shop表的shop方便推荐
			$shop_open = DB::select('shop_id')->from('witkey_shop')->where($where)->get_count()->execute();
		}
		//查询group表用来选择用户组
		$member_arr = DB::select()->from('witkey_member_group')->execute();
		require Keke_tpl::template('control/admin/tpl/user/add');
	}
	/**
	 * 添加用户验证用户名
	 */
 	function action_checkusername(){
		$check_username = $_GET['check_username'];
		if (isset ( $check_username ) && ! empty ( $check_username )) {
			$res =  Keke_user_register::instance()->check_username ( $check_username );
			CHARSET == 'gbk' and $res = Keke::gbktoutf(Keke_user_register::$_status[$res]);
			echo  $res;

		}
	} 
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		//防止跨域提交
		Keke::formcheck($_POST['formhash']);

		//密码md5加密
		$password = md5($_POST['password']);
		//需要插入数据库的字段
		$member = array('username'=>$_POST[username],
				'password'=>$password,
				);
		$space = array('username'=>$_POST['username'],
				'email'=>$_POST['email'],
				'group_id'=>$_POST['group_id'],
		);
		//存在uid更新表数据，没有则插入数据
		if($_GET['hid_uid']){
			Model::factory('witkey_member')->setData($member)->update();
			Model::factory('witkey_space')->setData($space)->update();
			Keke::show_msg("提交成功","admin/user_add?uid=".$_GET['hid_uid'],"success");
		}else {
			$uid = Model::factory('witkey_member')->setData($member)->create();
			$space['uid'] = $uid;
			Model::factory('witkey_space')->setData($space)->create();
			Keke::show_msg("提交成功","admin/user_add".$_GET['hid_uid'],"success");
		}
	}
	function action_charge(){
		global $_K,$_lang;
		Keke::formcheck($_POST['formhash']);
		if($_POST['user']){
			//充值的金额和元宝都为0或者空的时候提醒
			if(!$_POST['cash'] AND !$_POST['credit']){
				Keke::show_msg("充值或者扣除金额不得为0或者空!!!","admin/user_add/charge","warning");
			}

			CHARSET=='gbk' and $user = Keke::utftogbk($_POST['user']);
			$type=$_POST['uid_type'];
			$info = $this->get_info($user,$type);
			//现金的充值和扣除
			if ($_POST['cash_type']==0 AND $_POST['cash']>$info['balance'] || 
				$_POST['credit_type']==0 AND $_POST['credit']>$info['credit']){
				Keke::show_msg("扣除的现金/代金券超出了可用余额!!!","admin/user_add/charge","warning");
			}

			$cash = (float)$_POST['cash'];

			$credit = (float)$_POST['credit'];

			if((int)$_POST['cash_type']==0){
				$cash = -$cash;
			}
			if((int)$_POST['credit_type']==0){
				$credit = -$credit;
			}
			Sys_finance::get_instance($info['uid'])->set_action('admin_charge')
			->set_mem(NULL)
			->cash_in($cash,$credit);
		}
		require Keke_tpl::template('control/admin/tpl/user/add_charge');
	}
	/**
	 * 用户充值，验证用户名 
	 */
	function action_check(){
		global $_K,$_lang;
		if($_GET['check_uid']){
			//对传过来的check_uid进行转码
			CHARSET=='gbk' and $check_uid = Keke::utftogbk($_GET['check_uid']);
			$user_type=$_GET['check_type'];
			$info = $this->get_info($check_uid,$user_type);
			$info and Keke::echojson('',1,$info) or Keke::echojson($_lang['none_exists_uid_or_username'],0);
			die();
		}
	}
	/**
	 * 获取用户信
	 * @param int $uid
	 * @return array
	 */
	function get_info($uid,$user_type){
		return Keke_user::instance()->get_user_info($uid,'balance,credit,uid,username',(int)$user_type);
	}
}