<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
/**
 * 文件下载控制器
 * @author Michaeltsui98
 * @version 3.0
 * @example index.php/down?file_name=sss.txt&file_path=data/upload/sss.txt
 *
 */
class Control_down extends Controller{
	
	function action_index(){
		$file_name=$_GET['file_name'];
		$file_path=$_GET['file_path'];
		File::file_down($file_name, $file_path);
	}
	 
}

