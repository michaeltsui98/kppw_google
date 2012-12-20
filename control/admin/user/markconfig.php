<?php	defined ( "IN_KEKE" ) or exit ( "Access Denied" );
/**
 * 互评配置
 * this not free,powered by keke-tech
 * @author jiujiang
 * @charset:GBK  last-modify 2011-10-22-下午04:10:03
 * @version V2.0
 */
class Control_admin_user_markconfig extends Control_admin{
	function action_index(){
		
		$sql = "SELECT a.*,b.model_name FROM `:keke_witkey_mark_config` a left join :keke_witkey_model b\n".
				"on a.obj = b.model_code order by a.mark_config_id asc";
		$list_arr = DB::query($sql)->tablepre(':keke_')->execute();
		
		require keke_tpl::template('control/admin/tpl/user/mark_config');
	}
	function action_edit(){
		
		$mark_config_id = $_GET['mark_config_id'];
		
		$where = ' a.mark_config_id='.$mark_config_id;
		
		$sql = "SELECT a.*,b.model_name FROM `:keke_witkey_mark_config` a left join :keke_witkey_model b\n".
				"on a.obj = b.model_code where  :where order by a.mark_config_id asc";
		
		$list_arr = DB::query($sql)->tablepre(':keke_')->tablepre(':where',$where)->get_one()->execute();
		
		require keke_tpl::template('control/admin/tpl/user/mark_config_edit');
	}
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		Keke::formcheck($_POST['formhash']);
		//需要更新的数据
		$array = array('good'=>$_POST['good'],
				'normal'=>$_POST['normal'],
				'bad'=>$_POST['bad'],
				);
		//更新mark_config表的数据
		$where = "mark_config_id ='{$_POST['hdn_mark_config_id']}'";
		Model::factory('witkey_mark_config')->setData($array)->setWhere($where)->update();
		Keke::show_msg("提交成功","admin/user_markconfig","success");
	}
	function action_del(){
		$mark_config_id = $_GET['mark_config_id'];
		$where .='mark_config_id='.$mark_config_id;
		echo Model::factory('witkey_mark_config')->setWhere($where)->del();
	}	
}
