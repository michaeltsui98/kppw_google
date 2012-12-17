<?php	defined ( "IN_KEKE" ) or exit ( "Access Denied" );
/**
 * 互评规则配置
 * @copyright keke-tech
 * @author michael
 * @version v 2.2
 * 2012-11-01 14:37:34
 */
class Control_admin_user_mark extends Control_admin{
	
	function action_index(){
		global $_K,$_lang;
		$mark_rule = Db::select()->from('witkey_mark_rule')->execute();
		require Keke_tpl::template('control/admin/tpl/user/mark');
	}
	/**
	 * 添加页面初始化
	 * 如果存在mark_rule_id则为编辑
	 */
	function action_add(){
		global $_K,$_lang;
		$mark_rule_id = $_GET['mark_rule_id'];
		if ($mark_rule_id){
			$where .= 'mark_rule_id='.$mark_rule_id;
			$mark_rule_arr = Db::select()->from('witkey_mark_rule')->where($where)->get_One()->execute();
			$g_fid = keke_file_class::get_fid($mark_rule_arr['g_ico']);
			$m_fid = keke_file_class::get_fid($mark_rule_arr['m_ico']);
		}
		
		require Keke_tpl::template('control/admin/tpl/user/mark_add');
	}
	/**
	 * 保存添加或者编辑后的数据
	 */
	function action_save(){
		$_POST = Keke_tpl::chars($_POST);
		Keke::formcheck($_POST['formhash']);
		$rid = $_POST['hdn_mark_rule_id'];
		$array = array('g_value'=>$_POST['txt_g_value'],
				'm_value'=>$_POST['txt_m_value'],
				'g_title'=>$_POST['txt_g_title'],
				'm_title'=>$_POST['txt_m_title'],
				'g_ico'=>$_POST['hdn_g_ico'],
				'm_ico'=>$_POST['hdn_m_ico'],
				);
		
		if ($rid){
			Model::factory('witkey_mark_rule')->setData($array)->setWhere('mark_rule_id='.$rid)->update();
			Keke::show_msg("编辑成功","admin/user_mark/add?mark_rule_id=".$rid,"success");
		}else{
			Model::factory('witkey_mark_rule')->setData($array)->create();
			Keke::show_msg("添加成功","admin/user_mark/add","success");
		}
	}
	/**
	 * 删除上传后的图片
	 */
	static function action_del_img(){
		
		//没有fid就查下fid,没有fid不能删除文件,出于安全考量
		if(!intval($_GET['fid'])){
			$fid = Dbfactory::get_count(" select file_id from ".TABLEPRE."witkey_file where save_name = '.{$_GET['filepath']}.'");
		}else{
			$fid = $_GET['fid'];
		}
		
		//删除文件
		keke_file_class::del_att_file($fid, $_GET['filepath']);
		Keke::echojson ( '', '1' );
	}
	/**
	 * 单条删除信誉规则
	 */
	function action_del(){
		$mark_rule_id = $_GET['mark_rule_id'];
		$where .='mark_rule_id='.$mark_rule_id;
		echo Model::factory('witkey_mark_rule')->setWhere($where)->del();
	}
}