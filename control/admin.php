<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 后台admin 控制器
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-08-30 09:51:34
 */
abstract  class Control_admin extends Controller{
	 //操作权限判断
	 
	/**
	 * 通过control+action 得到后台资源ID
	 * 通过资源ID ，与当前用户级id，判断用户组是否有操作权限
	 * 
	 */
	function before(){
		 $this->check_roles();
	}
	
	/**
	 * 检查是否登录
	 */
	function check_roles(){
		global $_K;
		$this->check_login();
		if($_K ['control']=='index' or $_K ['control']=='main'){
			return TRUE;
		}
		$res = DB::select()->from('witkey_resource')->cached(60000,'keke_admin_resource')->execute();
		$res = Keke::get_arr_by_key($res,'resource_url');
		 
		$access_uri = 'index.php/'.$_K ['directory'].'/'.$_K ['control'];
		 
		$rid = $res[$access_uri]['resource_id'];
		
		$sql = 'SELECT group_id FROM `:Pwitkey_member_group` 
				where FIND_IN_SET(:rid,group_roles) and group_id = :gid';
		$res = (bool)DB::query($sql)->tablepre(':P')->param(':rid', $rid)->param(':gid', $_SESSION['admin_gid'])->get_count()->execute();
		if($res !== TRUE){
			exit('您无权访问此页面');
		}
	}
	function check_login(){
		$jump_url = "<script>window.parent.location.href='".BASE_URL."/index.php/admin/login';</script>";
		if(!$_SESSION['admin_uid']){
			echo $jump_url;
		}
	}
	
}
