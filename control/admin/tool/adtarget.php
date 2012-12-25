<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 后台广告位管理
 * @copyright keke-tech
 * @author 刀客
 * @version v 3.0
 * @date 2012-12-21 下午05:58:43
 * @encoding GBK
 */

class Control_admin_tool_adtarget extends Control_admin{
	/**
	 * 广告位列表
	 */
	function action_index(){
		//要显示的字段，即sql中要查询的字段
		$fields ='`target_id`,`name`,`description`,`ad_num`,`is_allow`,`tag_code`';
		
		$query_fields = array('a.target_id'=>'广告位ID','a.name'=>'广告位名称');
		//页面的uri
		$base_uri = BASE_URL."/index.php/admin/tool_adtarget";
		//删除uri，del是固定的
		$del_uri = $base_uri."/del";
		$add_uri = $base_uri."/add";
		//修改广告位状态的URI
		$change_uri=$base_uri."/changestatus";
		//不需要分页，page_size设置大
		$page_size = $_GET['page_size'];
		
		$this->_default_ord_field = 'a.target_id';		
		
		extract($this->get_url($base_uri));

		$sql = "SELECT a.target_id  ,a.name ,a.description,a.ad_num,a.is_allow,count(b.ad_id)as ad_count \n".
				"FROM `:keke_witkey_ad_target` a \n".
				"left join :keke_witkey_ad b\n".
				"on a.target_id = b.target_id\n";
		$sql = DB::query($sql)->tablepre(':keke_')->compile(Database::instance());

		$group_by = 'group by a.target_id';
		
		$data_info = Model::sql_grid($sql,$where,$uri,$order,$group_by,$page,$page_size);
		
		//列表数据
		$adtarget_list= $data_info['data'];
		 
		$pages = $data_info['pages'];

		require Keke_tpl::template('control/admin/tpl/tool/adtarget_list');
	}
	/**
	 * 修改广告位状态（启用、禁用）
	 */
	function action_changestatus(){
		$target_id = $_GET['target_id'];
		$is_allow = $_GET['status'];
		DB::update('witkey_ad_target')->set(array('is_allow'))->value(array($is_allow))->where("target_id = $target_id")->execute();
	}
	/**
	 * 添加、编辑广告位
	 */
	function action_add(){
		$type = $_GET['type'];
		$target_id = $_GET['target_id'];
		//如果有值，就进入编辑状态
		$ad_target_info = DB::select()->from('witkey_ad_target')->where("target_id = '$target_id'")->get_one()->execute();
		//加载模板
		require Keke_tpl::template('control/admin/tpl/tool/adtarget_add');
	}

	/**
	 * 保存广告位信息
	 */
	function action_save(){
		Keke::formcheck($_POST['formhash']);
		$_POST = Keke_tpl::chars($_POST);
		$type = $_POST['type'];
		$array = array('name'=>$_POST['txt_ad_name'],
				'description'=>$_POST['txt_ad_description'],
				'ad_num'=>$_POST['txt_ad_num']
		);
		$array['is_allow'] = intval((bool)$_POST['ckb_ad_is_allow']);
		
		if((bool)$_POST['ckb_tag_code']===TRUE){
			$array['tag_code']=htmlspecialchars_decode($_POST['txa_ad_tag_code'],3);
		}else{
			$array['tag_code']=NULL;
		} 
		 
		if($_POST['hdn_target_id']){
			$target_id=$_POST['hdn_target_id'];
			Model::factory('witkey_ad_target')->setData($array)->setWhere("target_id = '{$_POST['hdn_target_id']}'")->update();
			$this->request->redirect("admin/tool_adtarget/add?target_id=$target_id");
		}else{
			//这也当然就是添加(insert)到数据库中
			Model::factory('witkey_ad_target')->setData($array)->create();
			$this->request->redirect('admin/tool_adtarget');
		}
	}
	/**
	 * 删除广告位
	 */
	function action_del(){
		
		$sql = "DELETE a.*,b.* FROM `:keke_witkey_ad_target` a \n".
			   "join :keke_witkey_ad b on  a.target_id  = b.target_id where a.target_id = ".(int)$_GET['target_id'];
		echo DB::query($sql,Database::DELETE)->tablepre(':keke_')->execute();
	}
	
	function get_tag($name){
		return "{ad_tag($name)}";
	}
}
	