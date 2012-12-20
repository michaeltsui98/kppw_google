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
		//$fields = '`mark_id`,`model_code`,`origin_id`,`mark_type`,`by_username`,`username`,`mark_status`,`mark_value`,`mark_time`';
		//搜索使用到的字段
		$query_fields = array('a.mark_id'=>$_lang['id'],'a.username'=>$_lang['name'],'a.mark_time'=>$_lang['time']);
		//基本uri
		$base_uri=BASE_URL.'/index.php/admin/user_marklog';
		//删除uri
		$del_uri=$base_uri.'/del';
		//默认排序
		$this->_default_ord_field = 'a.mark_time';
		//统计总数
		$count = intval($_GET['count']);
		//获取uri，获取查询条件
		extract($this->get_url($base_uri));
		
		$sql = "SELECT a.mark_id,a.mark_status,a.mark_time,a.by_uid,a.by_username,a.mark_content,a.username,\n".
				"if(e.model_type='task',c.task_title,d.title) as obj_title,a.origin_id,\n".
				"e.model_type as obj_type , e.model_name,a.mark_value,a.mark_type,\n".
				"group_concat(b.aid_name) ,a.aid_star \n".
				"FROM `keke_witkey_mark` a left join keke_witkey_mark_aid b \n".
				"on FIND_IN_SET(b.aid,a.aid) \n".
				"LEFT JOIN keke_witkey_model e \n".
				"on a.model_code = e.model_code \n".
				"left join keke_witkey_task c\n".
				"on a.origin_id = c.task_id and e.model_type = 'task'\n".
				"LEFT JOIN keke_witkey_service d\n".
				"on a.origin_id =  d.sid and e.model_type = 'service'\n";
				$group = " group by  a.mark_id ";
				 
		$data_info = Model::sql_grid($sql,$where,$uri,$order,$group);
		 
		//$data_info = Model::factory('witkey_mark')->get_grid($fields,$where,$uri,$order,$page,$count,$_GET['page_size']);
		 
		$list_arr = $data_info['data'];
		 
		//var_dump($list_arr);die;
		$pages = $data_info['pages'];
	 
		 
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
