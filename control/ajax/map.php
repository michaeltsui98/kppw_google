<?php  defined ('IN_KEKE') or exit ('Access Denied');
/**
 * ��ͼ������,��ͼ����
 * @author Michaeltsui98
 * @version 3.0
 * @example index.php/ajax/map?addr=�人 
 *
 */
class Control_ajax_map extends Controller{
	
	function action_index(){
		$p = $_GET['p'];
		$addr = $_GET['addr'];
		
		Map::get_instance()->show($p,$addr);
	}
}
