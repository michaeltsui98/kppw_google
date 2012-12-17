<?php	defined ( "IN_KEKE" ) or exit ( "Access Denied" );
/**
 * 互评规则配置
 * @copyright keke-tech
 * @author cc
 * @version v 2.2
 * 2010-08-29 14:37:34
 */
class Control_admin_user_marklog extends Control_admin{
	function action_index(){
		global $_K,$_lang;
		//要查询的字段
		$fields = '`mark_id`,`model_code`,`mark_type`,`by_username`,`username`,`mark_status`,`mark_value`,`mark_time`';
		//搜索使用到的字段
		$query_fields = array('mark_id'=>$_lang['id'],'username'=>$_lang['name'],'mark_time'=>$_lang['time']);
		//基本uri
		$base_uri=BASE_URL.'/index.php/admin/user_marklog';
		//删除uri
		$del_uri=$base_uri.'/del';
		//默认排序
		$this->_default_ord_field = 'mark_time';
		//统计总数
		$count = intval($_GET['count']);
		//获取uri，获取查询条件
		extract($this->get_url($base_uri));
		//查询数据
		$data_info = Model::factory('witkey_mark')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		//列表数据
		$list_arr = $data_info['data'];
		//分页数据
		$pages = $data_info['pages'];
		//获取model_code和model_name，组成的一个数组
		$model_type_arr = Keke_global::get_model_type ();
		//model表数据
		$model_list = keke::$_model_list;
		//通过model_code获取model_type的值
		$model_list2 = Keke::get_arr_by_key($model_list,'model_code');
		require keke_tpl::template('control/admin/tpl/user/mark_log');
	}
	/**
	 * 单条和多条删除记录
	 */
	function action_del(){
		if($_GET['mark_id']){
			$where .= 'mark_id = '.$_GET['mark_id'];
		}elseif($_GET['ids']){
			$where .= 'mark_id in'.'('.$_GET['ids'].')';
		}
		echo Model::factory('witkey_mark')->setWhere($where)->del();
	}
}
