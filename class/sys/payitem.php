<?php
/**
 * 增值服务处理类
 * 1.增值服务配置信息获取
 * 2.增值服务购买、使用记录获取   可根据服务类型、使用类型、对象类型、用户编号 来组合获取
 * 3.增值服务安装、卸载
 * 4.增值服务配置编辑
 * 5.增值服务购买、使用
 * @author Administrator
 *
 */
Keke_lang::load_lang_class('keke_payitem_class');
class Sys_payitem {
	
	public static function get_table_obj($table = 'witkey_payitem') {
		return Model::factory( $table );
	}
	
	/**
	 * 获取增值项配置 
	 * @param string $user_type 用户类型 employer雇主，witkey威客
	 * @param string $model_code 模型code
	 * @param string $item_code 增值项类型
	 */
	public static function get_payitem_config($user_type = null, $model_code = null, $item_code = null,$pk=null,$is_open=1) {
		global $kekezu;
		$is_open==1 and $where = " and is_open=$is_open";
		$pk         or $pk = "item_code";
		$payitem_list = Keke::get_table_data ( "*", "witkey_payitem", "1=1 $where ", "", "", "", $pk,0 );
		if ($user_type) {
			foreach ( $payitem_list as $k => $v ) {
				if ($v ['user_type'] != $user_type)
					unset ( $payitem_list [$k] );
			}
		}
		if ($model_code) {
			foreach ( $payitem_list as $k => $v ) {
				if (strpos ( $v ['model_code'], $model_code ) === FALSE) {
					unset ( $payitem_list [$k] );
				}
			}
		}
		
		if ($item_code) { 
			 $payitem_list [$item_code];
		 
			return $payitem_list [$item_code];
			
		} else { 
			
			return $payitem_list;
		}
	}
	/**
	 * 获取增值服务记录
	 * @param array $w 传入的搜索条件数组
	 * ['item_code'=>
	 * 'use_type'=>
	 * 'uid'=>    
	 * 'record_id'=>
	 * 'order'=>  ]
	 * @param array $p 外部传入的分页初始信息
	 * @return array ['page'=>,'list'=>]
	 */
	public static function get_payitem_record($w = array(), $order = null, $p = array()) {
		global $kekezu;
		$record_obj = new Keke_witkey_payitem_record ();
		$record_arr = array ();
		$where = " 1 = 1 ";
		
		if (! empty ( $w )) {
			$w ['item_code'] and $where .= " and item_code = '" . $w ['item_code'] . "'";
			$w ['use_type'] and $where .= " and use_type = '" . $w ['use_type'] . "' ";
			$w ['uid'] and $where .= " and uid = '" . $w ['uid'] . "' ";
		}
		$order and $where .= "  order by $order " or $where .= "  order by record_id desc  ";
	
		if (! empty ( $p )) { //需要执行分页
			$page_obj = Keke::$_page_obj;
			intval ( $p ['page'] ) and $page = intval ( $p ['page'] ) or $page = '1';
			intval ( $p ['page_size'] ) and $page_size = intval ( $p ['page_size'] ) or $page_size = "10";
			$p ['url'] and $url = $p ['url'] or $url = $_SERVER ['HTTP_REFERER'];
			$p ['anchor'] and $anchor = $p ['anchor'];
			$record_obj->setWhere ( $where );
			$count = intval ( $record_obj->count () );
			$pages = $page_obj->getPages ( $count, $page_size, $page, $url, "#" . $anchor );
			$where .= $pages ['where'];
		}
		$record_obj->setWhere ( $where );
		$record_list = $record_obj->query ();
		
		$record_arr ['page'] = $pages ['page'];
		$record_arr ['list'] = $record_list;
		return $record_arr;
	}
	/**
	 * 增值项安装
	 * @param string $item_code 增值项类型
	 * @return boolen
	 */
	public static function payitem_install($item_code) {
	    global $_lang;
		$obj = self::get_table_obj ();
		$where  = "item_code = '$item_code'";
		$info = $obj->setWhere($where)->query();
		$info = $info[0];
		if ($info) { //此服务已存在
			return false;
		} else { //添加服务
			if(file_exists(S_ROOT . "./control/payitem/$item_code/control/init_config.php")){
				require S_ROOT . "./control/payitem/$item_code/control/init_config.php";
				return  $obj->setData($init_info)->setWhere($where)->create();
			}else{
				return false;
			}
		}
	}
	/**
	 * 增值项编辑
	 * @param int   $item_id   增值项编号
	 * @param array $item_info 编辑内容
	 */
	public static function payitem_edit($item_id, $item_info = array()) {
		$obj = self::get_table_obj ();
		return $obj->setData($item_info)->setWhere("item_id = '$item_id'")->update();
		 
	}
	/**
	 * 增值项卸载
	 * @param int $item_id  增值项编号 
	 */
	public static function payitem_uninstall($item_id) {
		$obj = self::get_table_obj ();
		return $obj->setWhere("item_id='$item_id'")->del ();
	}
	/**
	 * 增值服务花费、购买记录产生
	 * @param string $item_code 增值服务类型 workhide
	 * @param string $use_type	使用类型  buy/spend
	 * @param string $obj_type  对象类型 task/work。。。
	 * @param string $use_num   使用、购买量
	 * @param int    $obj_id    对象编号
	 * @param int    $origin_id 源编号
	 */
	public static function payitem_cost($item_code, $use_num = '1', $obj_type = false, $use_type = 'buy', $obj_id = null, $origin_id = null) {
		global $uid, $username;
		global $_lang;
		//使用花费直接根据购买量有配置算出
		

		$payitem_config = self::get_payitem_config ( null, null, $item_code ,'item_code');

		$use_cash = $payitem_config ['item_cash'] * $use_num;
	 
		if($use_type == 'buy'&&$use_cash){  
		 
			$fid_cash = keke_finance_class::cash_out ( $uid, $use_cash, 'payitem',$use_cash);
			 
			$fid_cash or Keke::show_msg($_lang['friendly_notice'],'index.php?do=user&view=finance&op=recharge',3,$_lang['your_balance_not_enough']);
		}
		$record_obj = new Keke_witkey_payitem_record();
		$record_obj->setItem_code ( $item_code );
		$record_obj->setUid ( $uid );
		$record_obj->setUsername ( $username );
		$record_obj->setUse_type ( $use_type );
		$record_obj->setUse_cash ( $use_cash );
		$record_obj->setUse_num ( intval ( $use_num ) );
		$record_obj->setObj_type ( $obj_type );
		$record_obj->setObj_id ( $obj_id );
		$record_obj->setOrigin_id ( $origin_id );
		$record_obj->setOn_time ( time () );
		$record_id = $record_obj->create();
		return $record_id;
	}
	/**
	 * 增值服务记录删除
	 * @param int $record_id
	 */
	public static function payitem_del($record_id) {
		return Dbfactory::execute ( sprintf ( " delete frm %switkey_payitem_record where record_id='%d'", TABLEPRE, $record_id ) );
	}
	/**
	 * 收费标准
	 */
	public static function payitem_standard() {
		global $_lang;
		return array ("times" => $_lang['times'],"day"=>$_lang['day'], "month" => $_lang['month'], "year" => $_lang['year'] );
	}
	/**
	 * 获取用户增值项是否剩余
	 * @param  使用者 $uid
	 * @param 增值服务类型  $item_code
	 * @param 增值服务对象  $obj_type
	 */
	public static function payitem_exists($uid, $item_code=false, $obj_type=false,$payitem_arr=false) {
		
		if($payitem_arr){ 
			
			foreach ($payitem_arr as $k=>$v) { 
				$buy_count = Dbfactory::get_count ( sprintf ( " select sum(use_num) from %switkey_payitem_record where uid = '%d'  and item_code = '%s' and use_type = 'buy'", TABLEPRE, $uid,  $v[item_code] ) );
				$use_count = Dbfactory::get_count ( sprintf ( " select sum(use_num) from %switkey_payitem_record where uid = '%d'  and item_code = '%s' and use_type = 'spend'", TABLEPRE, $uid,  $v[item_code] ) );
				$payitem_info [$v[item_code]]  = intval($buy_count - $use_count); 
	
			} 
			
		}else{ 
		$buy_count = Dbfactory::get_count ( sprintf ( " select sum(use_num) from %switkey_payitem_record where uid = '%d' and item_code = '%s' and use_type = 'buy'", TABLEPRE, $uid, $item_code ) );
		$use_count = Dbfactory::get_count ( sprintf ( " select sum(use_num) from %switkey_payitem_record where uid = '%d'  and item_code = '%s' and use_type = 'spend'", TABLEPRE, $uid, $item_code ) );

		$payitem_info = intval($buy_count - $use_count);
		} 
		return $payitem_info;		
	}
	/**
	 * 获取用户的相关增值服务使用信息
	 * @param int $uid
	 * @param string $use_type  使用类型    为空所有/buy 购买/spend 花费
	 * @param string $obj_type  对象类型
	 * @param int $obj_id		对象编号	
	 */
	public static function get_user_payitem($uid, $use_type = null, $obj_type = null, $obj_id = null) {
		$sql = " select a.use_cash,a.item_code,b.item_name,b.small_pic,b.item_desc from " . TABLEPRE . "witkey_payitem_record a left join " . TABLEPRE . "witkey_payitem b
			 on a.item_code = b.item_code where a.uid = '$uid' ";
		$use_type and $sql .= " and a.use_type = '$use_type' ";
		$obj_type and $sql .= " and a.obj_type = '$obj_type' ";
		$obj_id and $sql .= " and a.obj_id = '$obj_id' ";
		
		return Dbfactory::query ( $sql );
	}

	
	/**
	 * 
	 * 获取某个对象的增值服务项
	 * @param string $model_code
	 */ 
	public static function get_payitem_info($user_type,$model_code){
		$where = sprintf(" user_type='%s' and is_open = 1 and find_in_set('%s',model_code)",$user_type,$model_code); 
		$payitem_arr = Keke::get_table_data("*","witkey_payitem","$where","","","","item_id"); 
		return $payitem_arr;
	}
	
	
	
	/**
	 * 
	 * 更新服务的增值服务时间
	 */
	public static function update_service_payitem_time($payitem_time,$add_time,$service_id){
			$service_payitem_arr = unserialize($payitem_time);	//改变增值服务的时间 
			$service_payitem_arr['top'] = $add_time+$service_payitem_arr['top'];
			$new_payitem_time = serialize($service_payitem_arr);
			$res = Dbfactory::execute(sprintf("update %switkey_service set payitem_time='%s' where service_id=%d",TABLEPRE,$new_payitem_time,$service_id)); 
			return $res;
	}
	
	
	/**
	 * 
	 * 设置增值服务结束时间
	 * @param array $payitem_arr
	 * @param int $obj_id
	 * @param string $obj_type
	 */
	public static function set_payitem_time($payitem_arr,$obj_id,$obj_type){
		$payitem_end_time = serialize($payitem_arr); 
		switch ($obj_type){//便于以后的扩展，所以这个地方用的switch
			case "task":
				$sql = sprintf("update %switkey_task set payitem_time='%s' where task_id=%d",TABLEPRE,$payitem_end_time,$obj_id);
				break;
			case "service":
				$sql = sprintf("update %switkey_service set payitem_time='%s' where service_id=%d",TABLEPRE,$payitem_end_time,$obj_id);
				break; 
		}   
		$res = Dbfactory::execute($sql); 
		return $res;
	}
	
	/*==================分隔线========================*/
	/**
	 * 获取任务的增值服务表列
	 * @param int $task_id
	 * @return array
	 */
	public static function get_task_payitem($task_id){
		$sql = "SELECT a.use_cash,a.use_num,a.obj_id,b.item_name,b.small_pic,b.big_pic from ".TABLEPRE."witkey_payitem_record as a ".
				"left join ".TABLEPRE."witkey_payitem as b ".
				"on a.item_code = b.item_code ".
				"where  a.obj_type='task' and a.use_type='spend' ".
				"and a.obj_id = '$task_id'";
		return DB::query($sql)->execute();
	}
	/**
	 * 获取服务的值值服务表列
	 * @param int $sid
	 */
	public static function get_service_payitem($sid){
		$sql = "SELECT a.use_cash,a.use_num,a.obj_id,b.item_name,b.small_pic,b.big_pic from ".TABLEPRE."witkey_payitem_record as a ".
				"left join ".TABLEPRE."witkey_payitem as b ".
				"on a.item_code = b.item_code ".
				"where  a.obj_type='service' and a.use_type='spend' ".
				"and a.obj_id = '$sid'";
		return DB::query($sql)->execute();
		
	}
	
	
}