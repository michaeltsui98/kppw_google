<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 后台广告位管理
 * 
 * @copyright keke-tech
 * @author 刀客
 * @version v 3.0
 *          @date 2012-12-24 下午09:58:43
 *          @encoding GBK
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
		
		$targets = DB::select('target_id,name')->from('witkey_ad_target')->cached(60000,'keke_adtarget_list')->execute();
		
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
		
		$_POST = Keke_tpl::chars ( $_POST );
		// 防止跨域提交，你懂的
		Keke::formcheck ( $_POST ['formhash'] );
		// var_dump($_POST);die;
		$type = $_POST ['type'];
		// 这里怎么说呢，定义生成sql 的字段=>值 的数组，你不懂，就是你太二了.
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
		//判断广告类型
		switch ($array['ad_type']){
			case 'code':
				$array['ad_content']=$_POST['code_ad_content'];
				break;
			case 'text':
				$array['ad_content']=$_POST['txt_ad_content'];
				break;
			case 'image':
				$array['ad_file']=$_POST['hdn_img_ad_file'];
				break;
			case 'flash':
				if ($_POST['flash_method']=='url'){
					$array['ad_file']=$_POST['flaurl_ad_fil'];
				}elseif ($_POST['flash_method']=='file'){
					$array['ad_file']=$_POST['flafil_ad_fil'];
				}
				break;
		}
		
		Cache::instance()->del('keke_adtarget_list');
		
 		//如果有广告ID值，就update数据表
		if ($_POST ['hdn_ad_id']) {
			$ad_id = $_POST ['hdn_ad_id'];
			Model::factory ( 'witkey_ad' )->setData ( $array )->setWhere ( "ad_id = '{$_POST['hdn_ad_id']}'" )->update ();
			// 执行完了，要给一个提示，这里没有对执行的结果做判断，是想偷下懒，如果执行失败的话，肯定给会报红的。亲!
			Keke::show_msg ( '提交成功', "admin/tool_ad/add?ad_id=$ad_id" );
		} else {
			// 这也当然就是添加(insert)到数据库中
			Model::factory ( 'witkey_ad' )->setData ( $array )->create ();
			$this->request->redirect ( 'admin/tool_ad' );
		}
	}
	/**
	 * 删除广告
	 */
	function action_del() {
		$page = $_GET [page];
		$page_size = $_GET [page_size];
		
		// 删除单条,这里的case_id 是在模板上的请求连接中有的
		if ($_GET ['ad_id']) {
			$where = 'ad_id = ' . $_GET ['ad_id'];
			// 删除多条,这里的条件统一为ids哟，亲
		} elseif ($_GET ['ids']) {
			$where = 'ad_id in (' . $_GET ['ids'] . ')';
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
				echo "<a href={$ad_info['ad_url']}>{$ad_info['ad_content']}</a>";
				break;
			case 'flash':
				echo keke_file_class::flash_codeout($ad_info['ad_file'],50,25);
				break;	
			case 'code':
				echo "$ad_info[ad_content]";
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
		keke_file_class::del_att_file($fid, $_GET['filepath']);
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
	