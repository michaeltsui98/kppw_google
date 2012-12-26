<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 用户中心-服务商-店铺管理
 * @author Michael
 * @version 2.2
   2012-10-25
 */

class Control_user_seller_shop extends Control_user{
    
	/**
	 * @var 一级菜单选中项
	 */
	protected static $_default = 'seller';
    /**
     * 
     * @var 二级菜单选中项,空值不做选择
     */
	protected static $_left = 'shop';
	
	/**
	 * 店铺开通，店铺设置
	 */
	function action_index(){
		global $_K,$_lang;
		//是否认证
		$is_auth = $this->get_is_auth();
		$data_arr = DB::select()->from('witkey_shop')->where('uid = '.$_SESSION['uid'])->get_one()->execute();
		
		require Keke_tpl::template('user/seller/shop');
	}
	/**
	 * 案例列表
	 */
	function action_case(){
	
	
	
		require Keke_tpl::template('user/seller/shop_case');
	}
	/**
	 * 案例编辑，添加
	 */
	function action_case_add(){
		require Keke_tpl::template('user/seller/shop_case_add');
	}
	/**
	 * 案例数据保存
	 */
	function action_case_save(){
		
	}
	/**
	 * 成员列表
	 */
	function action_member(){
	
	
		require Keke_tpl::template('user/seller/shop_member');
	}
	/**
	 * 成员编辑添加
	 */
	function action_member_add(){
		
		require Keke_tpl::template('user/seller/shop_member_add');
	}
	/**
	 * 成员数据保存
	 */
	function action_member_save(){
		
	}
	
	/**
	 *  店铺数据保存 
	 */
	function action_save(){
		
	}
	/**
	 *  判断用户类型
	 * @return 
	 */
	function get_user_type(){
		return DB::select('user_type')->from('witkey_space')->where("uid = ".$_SESSION['uid'])->get_count()->execute();
	}
	/**
	 * 判断是否通过认证
	 * @return 
	 */
	function get_is_auth(){
		if($this->get_user_type() == 1){
			$auth_type = 'realname';
		}else {
			$auth_type = 'enterprise';
		}
		return DB::select($auth_type)->from('witkey_member_auth')->where("uid = ".$_SESSION['uid'])->get_count()->execute();
	}
}