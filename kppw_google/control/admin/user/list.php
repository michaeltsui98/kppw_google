<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 *  后台用户列表
 * @author michael
 * @version 2.2 
 * 2012-11-01
 *
 */
class Control_admin_user_list extends Control_admin{
	function action_index(){
		global $_K,$_lang;
		//需要在显示的字段
		$fields = '`uid`,`username`,`group_id`,`user_type`,`status`,`reg_time`,`reg_ip`,`credit`,`balance`,`recommend` ';
		//搜索用用到的字段
		$query_fields = array('uid'=>$_lang['id'],'username'=>$_lang['name'],'reg_time'=>$_lang['time']);
		//基本uti
		$base_uri = BASE_URL.'/index.php/admin/user_list';
		//统计查询出来的总数
		$count = intval($_GET['count']);
		//删除url
		$del_uri = $base_uri.'/del';
		//默认查询字段
		$this->_default_ord_field = 'reg_time';
		//获取查询条件uri
		extract($this->get_url($base_uri));
		//分页查询的数据
		$data_info = Model::factory('witkey_space')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$list_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];
		//验证用户有没有开店铺，推荐与否
		$shop_open = DB::select('shop_id,uid')->from('witkey_shop')->execute();
		$shop_open = Keke::get_arr_by_key($shop_open,'uid'); 
		
		require keke_tpl::template('control/admin/tpl/user/list');
	}
	/**
	 * 推荐用户
	 */
	function action_recommend(){
		$uid = $_GET['uid'];
		$where .= ' uid='.$uid;
		$page = $_GET['page'];
		Dbfactory::update('update keke_witkey_space set recommend=1 where '.$where); 
		keke::show_msg("推荐成功","admin/user_list?page=$page","success");
	}
	/**
	 * 取消推荐 用户
	 */
	function action_moverecommend(){
		$uid = $_GET['uid'];
		$where .= ' uid='.$uid;
		$page = $_GET['page'];
		Dbfactory::update('update keke_witkey_space set recommend=0 where '.$where);
		keke::show_msg("取消推荐成功","admin/user_list?page=$page","success");
	}
	/**
	 * 禁用用户
	 */
	function action_disable(){
		$uid = $_GET['uid'];
		$where .= ' uid='.$uid;
		$page = $_GET['page'];
		Dbfactory::update('update keke_witkey_space set status=2 where '.$where);
		keke::show_msg("禁用成功","admin/user_list?page=$page","success");
	}
	/**
	 * 启用用户
	 */
	function action_able(){
		$uid = $_GET['uid'];
		$where .= ' uid='.$uid;
		$page = $_GET['page'];
		Dbfactory::update('update keke_witkey_space set status=1 where '.$where);
		keke::show_msg("启用成功","admin/user_list?page=$page","success");
	}
	/**
	 * 单个和批量删除用户
	 */
	function action_del(){
		$uid = $_GET['uid'];
		if ($uid){
		$where .= ' uid='.$uid;
		}elseif($_GET['ids']) {
			$where .= 'uid in'.'('.$_GET['ids'].')' ;
			$ids = explode(',', $_GET['ids']);
			foreach ((array)$ids as $v){
				Keke_user::instance()->del_user($v);
			}
			exit('1');
		}
		
		echo Model::factory('witkey_space')->setWhere($where)->del();
	}
}