<?php  defined ('IN_KEKE') or exit ('Access Denied');
/**
 * µØÍ¼µ¯³ö¿ò,µØÍ¼¼ÓÔØ
 * @author Michaeltsui98
 * @version 3.0
 * @example index.php/ajax/map?addr=Îäºº 
 *
 */
class Control_ajax_map extends Controller{
	
	function action_index(){
		$p = $_GET['p'];
		$addr = $_GET['addr'];
		
		Map::get_instance()->show($p,$addr);
	}
}
