<?php	defined ( 'IN_KEKE' ) or exit('Access Denied');
/**
 * @copyright keke-tech
 * @author jie
 * @version v 2.0
 * 2010-6-5下午04:40:43
 */


class Control_ajax_upload extends Controller{
	/**
	 * 文件上传
	 * @example sys，表示系统文件，如 'ad','auth','mark','tools' 这几个
	 * 目录是对sys的扩展，ad 表示广告图片,auth 表示认证图片,mark 表示互评文件,tools 表示增值工具图片  这几个参数由
	 * task_id 为来表示
	 * @see keke_ajax_upload_class::file_info_init()
	 * 
	 */
	function action_index(){
		$upload_obj=keke_ajax_upload_class::get_instance($_SERVER['QUERY_STRING']);
		switch ($upload_obj->_file_type){
			case 'sys'://系统附件上传
			case 'editor'://编辑器
			case 'att'://上传附件
				$upload_obj->upload_file();
				break;
			case 'big'://上传大文件
				$upload_obj->upload_big_file();
				break;
			case 'service'://上传图片，会自动剪切成大中小
				$upload_obj -> upload_and_resize_pic();
				break;
		}
	}
	/**
	 * 删除指定的文件,必须要用fid,filepath,防止被注
	 */
	function action_del(){
		//文件的fid
		$_GET = Keke_tpl::chars($_GET);
		$fid = intval($_GET['fid']);
		//一般用在同一个图片有多种尺寸时，需要带上这个参数，属于可选参数
		$size = $_GET['size'];
		//文件路径 
		$filepath = $_GET['filepath'];
		//执行删除 
		$res = keke_file_class::del_att_file($fid,$filepath,$size);
		$res and Keke::echojson ( '', 1 ) or Keke::echojson ( '', '0' );
	}
}