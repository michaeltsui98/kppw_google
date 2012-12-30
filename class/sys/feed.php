<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
class Sys_feed {
	
	

	static function set_feed() {
		$title = serialize ( $feed_arr );
		$sql = " insert into %switkey_feed (icon,feed_time,feedtype,obj_link,obj_id,title,uid,username)
				values('%s','%s','%s','%s','%d','%s','%d','%s')";
		return Dbfactory::execute ( sprintf ( $sql, TABLEPRE, $icon, time (), $feedtype, $obj_link, $obj_id, $title, $uid, $username ) );
	}
	
	
	
	static function get_feed($where_arr, $order, $limit) {
		$feed_arr = Keke::get_table_data ( "*", "witkey_feed", $where_arr, $order, "", $limit, "feed_id" );
		$feed_new_arr = array ();
		foreach ( $feed_arr as $k => $v ) {
			$title_arr = unserialize ( $v ['title'] );
			if (is_array ( $title_arr )) {
				foreach ( $title_arr as $k1 => $v1 ) {
					$v [$k1] = $v1;
				}
			}
			$feed_new_arr [] = $v;
		}
		return $feed_new_arr;
	}
	
	/**
	 *
	 *
	 * 生成feed 的时间描述
	 *
	 * @param int $feed_time
	 * -------- 时间戳
	 */
	static function feed_time($feed_time) {
		global $_lang;
		$time = time () - $feed_time;
		$time_desc = Keke::time2Units ( $time, 'hour' );
		if ($time_desc) {
			return $_lang ['in'] . $time_desc . $_lang ['before'];
		} else {
			return $_lang ['just'];
		}
	}
	
	protected static $feed_type = array(
			'pub_task'=>'发布任务',
			'user_register'=>'新加入',
			'pub_service'=>'发布商品',
			'work_bid'=>'中标'
	);
	
	
}//end