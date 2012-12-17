<?php

/**
 * @copyright keke-tech
 * @author lj
 * @version v 2.0
 * 2012-1-15上午11:52:51
 */
class Sys_comment {
	
	protected $_comment_obj;
	protected $_comment_type;
	
	public static function get_instance($comment_type) {
		return new keke_comment_class ( $comment_type );
	}
	
	function __construct($comment_type) {
		 
		$this->_comment_type = $comment_type;
	} 
	/**
	 * 
	 * 获取留言信息
	 * @param int $comment_id
	 */
	static public function get_comment_info($comment_id){ 
		$comment_info = DB::select()->from('witkey_comment')->where("comment_id='$comment_id'")->get_one()->execute();
		return $comment_info;
	}
	 
	/**
	 * 
	 * 获取评论列表
	 * @param int $obj_id
	 */
	function get_reply_info($obj_id){
		$reply_arr = Keke::get_table_data("*","witkey_comment","obj_type='".$this->_comment_type."' and obj_id='$obj_id' and p_id>0"," on_time desc");
		return $reply_arr; 
	}
	/**
	 * 
	 * 写入留言和回复留言
	 * @param array $comment_arr   ---留言信息的键值对数组
	 * @param int $is_reply		---- 为true代表添加新留言，false代表留言回复
	 *
	 */
	function save_comment($comment_arr,$obj_id,$is_reply=false){
		 
		strtolower ( CHARSET ) == 'gbk' and $comment_arr ['content'] = Keke::utftogbk ( Keke::escape($comment_arr ['content']) );
		if(Keke::k_match(array(Keke::$_sys_config['ban_content']),$comment_arr['content'])){
			return 3;
			die();
		}
		$comment_id = $this->_comment_obj->save($comment_arr);
		if(!$is_reply){
		
			if($this->_comment_type=='task'){
				$res = Dbfactory::execute(sprintf(" update %switkey_task set leave_num =ifnull(leave_num,0)+1 where task_id='%d'",TABLEPRE,$obj_id));
			}elseif($this->_comment_type=='service'){
				$res = Dbfactory::execute(sprintf(" update %switkey_service set leave_num =ifnull(leave_num,0)+1 where service_id='%d'",TABLEPRE,$obj_id));
			}
	
		}
		return $comment_id;
			
	} 
	/**
	 * 
	 * 留言删除
	 * @param unknown_type $comment_id
	 */
	function del_comment($comment_id,$obj_id,$is_reply=false){
		$res =  Dbfactory::execute(sprintf("delete from %switkey_comment where comment_id='%d' or p_id='%d'",TABLEPRE,$comment_id,$comment_id));
		if(!$is_reply){
			if($this->_comment_type=='task'){
			$res and 	$res = Dbfactory::execute(sprintf(" update %switkey_task set leave_num =ifnull(leave_num,0)-1 where task_id='%d'",TABLEPRE,$obj_id));
			}elseif($this->_comment_type=='service'){
			$res and $res = Dbfactory::execute(sprintf(" update %switkey_service set leave_num =ifnull(leave_num,0)-1 where service_id='%d'",TABLEPRE,$obj_id));
			}
			
		}
		return $res;
	}
	
	
	

}