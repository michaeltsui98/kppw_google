<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 后台广告位管理
 * 
 * @copyright keke-tech
 * @author 刀客
 * @version 3.0

 */
class Control_admin_tool_ad extends Control_admin {
	/**
	 * 广告列表
	 */
	function action_index() { 
		$fields = '`ad_id`,`target_id`,`ad_type`,`ad_name`,`ad_file`,`ad_content`,`ad_url`,`end_time`,`listorder`,`width`,`height`';		
		$query_fields = array (	'ad_id' => '广告ID',	'ad_name' => '广告名称'); 
 	
		$base_uri = BASE_URL . "/index.php/admin/tool_ad";
		// 删除uri，del是固定的
		$del_uri = $base_uri . "/del";
		$add_uri = $base_uri . "/add";
		// 修改广告位状态的URI
		$change_uri = $base_uri . "/changestates";
		// 不需要分页，page_size设置大
		$page_size = $_GET ['page_size'];
		
		$targets = DB::select('target_id,name')->from('witkey_ad_target')->execute();
		
		$targets = Arr::get_arr_by_key($targets, 'target_id');
		 
		$this->_default_ord_field = 'ad_id';
		
		extract ( $this->get_url ( $base_uri ) );
		
	    //如果用户是从广告位页面跳转过来的，则指定查询条件
		if(isset($_GET['target_id'])){
			$target_id = $_GET['target_id'];
			$where .= " and target_id = {$_GET['target_id']}";
		}
		$data_info = Model::factory ( 'witkey_ad' )->get_grid ( $fields, $where, $uri, $order, $page, $count, $_GET ['page_size'] );
		// 列表数据
		$ad_list = $data_info ['data'];
		
		// 分页数据
		$pages = $data_info ['pages'];
		
		require Keke_tpl::template ( 'control/admin/tpl/tool/ad_list' );
	}
	/**
	*添加、修改广告
	*/
	function action_add() {
		$targets = DB::select('target_id,name')->from('witkey_ad_target')->execute();
		$target_id=$_GET['target_id'];
		$targets = Arr::get_arr_by_key($targets, 'target_id');
		$type = $_GET ['type'];
		$ad_id = $_GET ['ad_id'];
		// 如果有值，就进入编辑状态
		$ad_info = DB::select ()->from ( 'witkey_ad' )->where ( "ad_id = '$ad_id'" )->get_one ()->execute ();
		
		require Keke_tpl::template ( 'control/admin/tpl/tool/ad_add' );
	}
 
	/**
	 * 保存广告信息
	 */
	function action_save() {
		Keke::formcheck ( $_POST ['formhash'] );
		$_POST = Keke_tpl::chars ( $_POST );
		 
		$type = $_POST ['type'];
		
		$array = array (
				'ad_type' => $_POST ['rad_ad_type'],
				'ad_name' => $_POST ['txt_ad_name'],
				'ad_url' => $_POST ['txt_ad_url'],
				'end_time' => strtotime($_POST ['txt_ad_end_time']),
				'listorder' => $_POST ['txt_ad_listorder'],
				'width' => $_POST ['txt_ad_width'],
				'height' => $_POST ['txt_ad_width'],
				'target_id' => $_POST['sel_target_id'],
				'ad_file'=>"",
				'ad_content'=>""
		);
		
		switch ($array['ad_type']){
			case 'code':
			case 'text':
				$array['ad_content']=htmlspecialchars_decode($_POST['txt_ad_content'],3);
				break;
			case 'image':
				$array['ad_file']=$_POST['hdn_img_ad_file'];
				break;
			case 'flash':
				if ($_POST['flash_method']=='url'){
					$array['ad_file']=$_POST['flash_url'];
				}elseif ($_POST['flash_method']=='file'){
					$array['ad_file']=File::upload_file('flash_file','swf|flv');
				}
				break;
		}
		if ($_POST ['hdn_ad_id']) {
			$ad_id = $_POST ['hdn_ad_id'];
			Model::factory ( 'witkey_ad' )->setData ( $array )->setWhere ( "ad_id = '{$_POST['hdn_ad_id']}'" )->update ();
			$this->request->redirect ( "admin/tool_ad/add?ad_id=$ad_id" );
		} else {
			Model::factory ( 'witkey_ad' )->setData ( $array )->create ();
			$this->request->redirect ( 'admin/tool_ad' );
		}
	}
	/**
	 * 删除广告
	 */
	function action_del() {
		
		
		if ($_GET ['ad_id']) {
			$where = 'ad_id = ' . $_GET ['ad_id'];
		}
		$ad_file =S_ROOT.DB::select('ad_file')->from('witkey_ad')->where($where)->get_count()->execute();
	    if(is_file($ad_file)){
	    	unlink($ad_file);
	    }
		
		echo Model::factory ( 'witkey_ad' )->setWhere ( $where )->del ();
	}
	/**
	 * 根据广告类型在前台显示相应的广告类容
	 */
	function out($ad_info){
		switch ($ad_info['ad_type']){
			case'image':
				echo "<img width='50' height='25' src=".BASE_URL.'/'.$ad_info['ad_file'].">";
				break;
			case 'text':
				echo "<a href={$ad_info['ad_url']}>txt_code</a>";
				break;
			case 'flash':
				echo File::flash_codeout(BASE_URL.'/'.$ad_info['ad_file'],50,25);
				break;	
			case 'code':
				echo 'script code';
				break;	
		}
	}
	/**
	 * ajax删除AD图片
	 */
	static function action_del_img(){
		//如果pk有值，则删除文件表中的art_pic
		if($_GET['pk']){
			Dbfactory::execute(" update ".TABLEPRE."witkey_ad set ad_file ='' where ad_id = ".intval($_GET['pk']));
		}
		//没有fid就查下fid,没有fid不能删除文件,出于安全考量
		if(!intval($_GET['fid'])){
			$fid = Dbfactory::get_count(" select file_id from ".TABLEPRE."witkey_file where save_name = '.{$_GET['filepath']}.'");
		}else{
			$fid = $_GET['fid'];
		}
		//删除文件
		File::del_att_file($fid, $_GET['filepath']);
		Keke::echojson ( '', '1' );
	}
	/**
	 * 查询广告位剩余广告数
	 */
	function action_get_targetnum(){
		$target_id = intval($_GET['target_id']);
		$adtarget_info= DB::select ()->from ( 'witkey_ad_target' )->where ( "target_id = $target_id" )->get_one()->execute ();
		$ad_info=Dbfactory::query("select count(*) from ".TABLEPRE."witkey_ad where target_id = $target_id");
		$adtarget_num=$adtarget_info['ad_num']-$ad_info[0]['count(*)'];
		echo "$adtarget_num";
	}
}
	