<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 后台广告位管理
 * @copyright keke-tech
 * @author hr
 * @version v 2.1
 * @date 2011-12-21 下午05:58:43
 * @encoding GBK
 */

class Control_admin_tool_ad extends Control_admin{
	/**
	 * 广告位列表
	 */
	function action_index(){
		//加载全局变量，语言包
		global $_K,$_lang;
		//要显示的字段，即sql中要查询的字段
		$fields ='`target_id`,`name`,`ad_num`,`code`,`sample_pic`';
		//页面的uri
		$base_uri = BASE_URL."/index.php/admin/tool_ad";
		//删除uri，del是固定的
		$del_uri = $base_uri."/del";
		//不需要分页，page_size设置大
		$page_size = 100;
		//获取witkey_ad_target表的信息
		$data_info = Model::factory('witkey_ad_target')->get_grid($fields,$where,$uri,$order,$page,$count,$page_size);
		//列表数据
		$list_arr = $data_info['data'];
		//var_dump(Database::instance()->get_query_list());
		//获取target_id和已经在广告中占有的条数
		$target_ad_num = Keke::get_table_data('target_id, count(*) as num', 'witkey_ad', 'target_id is not null', '', 'target_id', '', 'target_id', null);
		while ((list($key, $value) = each($list_arr))!=null){
			$target_ad_arr[$key] = $target_ad_num[$key]['num'] ? $target_ad_num[$key]['num'] : '0';
		}
		require Keke_tpl::template('control/admin/tpl/tool/ad');
	}
	/**
	 * 广告列表
	 */
	function action_adlist() {
		// 定义全局变量，加载模板和语言包
		global $_K, $_lang;
		// 需要查询的字段
		$fields = '`ad_id`,`ad_name`,`target_id`,`ad_type`,`start_time`,`end_time`,`on_time`,`is_allow`';
		// 在搜索中要显示的字段
		$query_fields = array (
				'ad_name' => $_lang ['name'],
				'on_time' => $_lang ['time']
		);
		// 页面uri
		$base_uri = BASE_URL . '/index.php/admin/tool_ad/adlist';
		// 添加uri
		$add_uri = $base_uri . '/add';
		// 总记录数,分页用的，你不定义，数据库就是多查一次的。为了少个Sql语句，你必须要写的，亲!
		$count = intval ( $_GET ['count'] );
		// 默认按照'on_time'排序
		$this->_default_ord_field = 'on_time';
		// get_url就是处理查询的条件
		extract ( $this->get_url ( $base_uri ) );
		$target_id = $_GET ['target_id'];
		if ($target_id) {
			$where .= "and target_id =$target_id";
		}
		// 获取列表分页的相关数据,参数$where,$uri,$order,$page来自于get_url方法
		$data_info = Model::factory ( 'witkey_ad' )->get_grid ( $fields, $where, $uri, $order, $page, $count, $_GET ['page_size'] );
		// 列表数据
		$list_arr = $data_info ['data'];
		// 分页数据
		$pages = $data_info ['pages'];
		// 获取ad_target表中name
		//$targets_arr = Keke::get_table_data ( '*', 'witkey_ad_target', '', '', '', '', 'target_id' );
		$targets_arr =  DB::select()->from('witkey_ad_target')->execute();
		
		$targets_arr = Keke::get_arr_by_key($targets_arr,'target_id');
		require Keke_tpl::template ( 'control/admin/tpl/tool/ad_list' );
	}
	/**
	 * 广告添加
	 */
	function action_add() {
		// 始始化全局变量，语言包变量
		global $_K, $_lang;
		// 获取ad_id,编辑状态下会有值
		$ad_id = $_GET ['ad_id'];
		// 获取广告位ID，用来半段广告位的广告数
		$target_id = $_GET ['target_id'];
		// 将广告位表ad_target表的数据读出来
		$target_arr = DB::select ()->from ( 'witkey_ad_target' )->where ( 'target_id=' . intval ( $target_id ) )->execute ();
		// 将ad_target表对应的target_id对应的信息读出来
		$target_arr = $target_arr ['0'];
		// 允许广告数
		$ad_num = $target_arr ['ad_num'];
		// 现在广告位已经有了的广告数
		$have_ad_num = Dbfactory::get_count ( sprintf ( "select count(*) count from %switkey_ad where target_id = %d", TABLEPRE, $target_id ) );
		// 进行广告总数和已有广告的判断，添加需要判断，编辑不需要判断
		if ($have_ad_num >= $ad_num and ! $ad_id) {
			Keke::show_msg ( $_lang ['ads_num_over'], 'admin/tool_ad/adlist', 'warning' );
		}
		// 如果存在获取的ad_id，则为编辑方式
		if ($ad_id) {
			// 显示的标题为编辑，更改的语言包
			$page_tips = $_lang ['edit'];
			// 通过ad_id将ad表中的数据读出来
			$ad_data = DB::select ()->from ( 'witkey_ad' )->where ( 'ad_id=' . $ad_id )->get_one ()->execute ();
		} else {
			// 显示的是添加，
			$page_tips = $_lang ['add'];
		}
	
		require Keke_tpl::template ( 'control/admin/tpl/tool/ad_add' );
	}
	/**
	 * 保存模板上提交到的数据到数据库中
	 * 这个acton 是通用的，不要随便定义这个名称
	 */
	function action_save() {
		$_POST = Keke_tpl::chars ( $_POST );
		// 防止跨域提交，你懂的
		Keke::formcheck ( $_POST ['formhash'] );
		// 类型flash/text/imag/code
		$type = 'ad_type_' . $_POST ['ad_type'];
		// 确认广告的模式是什么，file/code/image/flash
		switch ($_POST ['ad_type']) {
			case "image" :
				if ($_FILES ['ad_type_image_file'] ['name']) {
					$file_path = keke_file_class::upload_file ( 'ad_type_image_file', '', 1, 'ad/' ); // 上传文件
				} else {
					$file_path = $_POST ['ad_type_image_path'];
				}
				break;
			case "file" :
				if ($_FILES ['ad_type_flash_file'] ['name']) {
					if ($_POST ['flash_method'] == 'url') {
						$file_path = $_POST ['ad_type_flash_url'];
					}
					if ($_POST ['flash_method'] == 'file') {
						$file_path = keke_file_class::upload_file ( 'ad_type_flash_file', '', 1, 'ad/' ); // 上传文件
					}
				}
				break;
		}
		// 要填入数据的信息，在数组中有解释
		$width = $_POST [$type . '_width'];
		$height = $_POST [$type . '_height'];
		$url = $_POST [$type . '_url'];
		$content = $_POST [$type . '_content'];
		// 插入数据库的字段
		$array = array (
				// 广告的名称
				'ad_name' => $_POST ['ad_name'],
				// 开始和结束时间
				'start_time' => strtotime ( $_POST ['start_time'] ),
				'end_time' => strtotime ( $_POST ['end_time'] ),
				// 文件的路径，添加image和flash中存在
				'ad_file' => $file_path,
				// 广告类型
				'ad_type' => $_POST ['ad_type'],
				// 在添加image时的图片的高和宽
				'width' => $width,
				'height' => $height,
				// 添加image时图片映射的地址
				'ad_url' => $url,
				// 添加file和code时文本的内容
				'ad_content' => $content,
				// 排序
				'listorder' => $_POST ['listorder'],
				// 是否可用
				'is_allow' => $_POST ['rdn_is_allow'],
				// 广告添加或者编辑之后的时间
				'on_time' => time ()
		);
		// 判断传过来的值有没有ad_id(主键)的值，有为编辑模式，没有为添加，值都会保存，
		if ($_POST ['hdn_ad_id']) {
			Model::factory ( 'witkey_ad' )->setData ( $array )->setWhere ( "ad_id = '{$_POST['hdn_ad_id']}'" )->update ();
			// 编辑完了之后跳转到编辑页面，通过ad_id来判断，传递的参数会在下次判断为编辑模式
			Keke::show_msg ( '提交成功', 'admin/tool_ad/add?ad_id=' . $_POST ['hdn_ad_id'], 'success' );
		} else {
			// 这也当然就是添加(insert)到数据库中
			Model::factory ( 'witkey_ad' )->setData ( $array )->create ();
			// 系统提示添加之后页面跳转到添加页面，可以继续添加
			Keke::show_msg ( '提交成功', 'admin/tool_ad/add', 'success' );
		}
	}
	
	
	
}
 