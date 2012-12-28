<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

Keke_lang::load_lang_class ( 'keke_order_class' );
/**
 * 订单处理
 */
class Sys_order {
	
	private static $instance;
	
	public static function getinstance(){
		if(Keke_valid::not_empty(self::$instance)){
			return self::$instance;
		}
		return self::$instance = new self();
	}
	/**
	 * 添加订单
	 * $order_status   wait,ok,fail,close 
	 * @param array $order  key(order_name,order_amount,order_body,order_status,seller_uid,seller_name)
	 * @param array $item  key(order_id,name,obj_type,obj_id,price,num,model_id)
	 */
	public function create_order($order,$item=NULL){
		
		$order['order_time'] = (int)SYS_START_TIME;
		$order['order_uid'] = $_SESSION['uid'];
		$order['order_username'] = $_SESSION['username'];
		$order['order_status'] = 'wait';

		$order_id = DB::insert('witkey_order')->set(array_keys($order))->value(array_values($order))->execute();
		
		if(Keke_valid::not_empty($item)){
			$item['order_id'] = $order_id;
			$this->add_itme($item);
		}
		return $order_id;	
	}
	/**
	 * 添加订单项
	 * @param array $item 
	 */
	public function add_itme($item){
		return DB::insert('witkey_order_detail')->set(array_keys($item))->value(array_values($item))->execute();	
	}
	
	/**
	 * 获取指定订单+详细信息
	 * @param int $order_id 订单编号
	 * @return array
	 */
	public static function get_order_info($order_id) {
		$sql = "select a.*,b.obj_type,b.obj_id from %switkey_order a left join
		%switkey_order_detail b on a.order_id=b.order_id where a.order_id='%d'";
		return Dbfactory::get_one ( sprintf ( $sql, TABLEPRE, TABLEPRE, $order_id ) );
	
	}
	/**
	 * 获取指定对象的订单编号
	 * @param $obj_type 对象类型
	 * @param int $obj_id 对象编号
	 * @return int
	 */
	public static function get_order_id($obj_type, $obj_id) {
		$sql = "select order_id from %switkey_order_detail where obj_type='%s' and obj_id='%d'";
		return Dbfactory::get_count ( sprintf ( $sql, TABLEPRE, $obj_type, $obj_id ) );
	}
	/**
	 * 获取订单的详细内容
	 * @param int $order_id
	 * @return 二维数组
	 */
	public static function get_order_detail($order_id) {
		$sql = "select * from %switkey_order_detail where order_id = '%d'";
		return Dbfactory::query ( sprintf ( $sql, TABLEPRE, $order_id ) );
	}
	/**
	 * 订单删除
	 */
	public static function del_order($order_id) {
		 $sql = "DELETE a.*,b.* FROM `:keke_witkey_order` a \n".
				"LEFT JOIN :keke_witkey_order_detail b \n".
				"on a.order_id = b.order_id \n".
				"where a.order_id = '$order_id' ";
		 return (bool)DB::query($sql,Database::DELETE)->tablepre(':keke_')->execute();
	}
	/**
	 * 更新订单状态
	 * @param int $order_id 订单ID
	 * @param string $to_status 变更状态
	 */
	public static function set_order_status($order_id, $to_status) {
		return Dbfactory::execute ( sprintf ( " update %switkey_order set order_status='%s' where order_id='%d'", TABLEPRE, $to_status, $order_id ) );
	}
	/**
	 * 交易终止返款
	 * @param $order_id 订单编号
	 */
	public static function order_cancel_return($order_id) {
		$fina_info = dbfactory::get_one ( sprintf ( " select uid,fina_cash,fina_credit from %switkey_finance where order_id ='%d'", TABLEPRE, $order_id ) );
		if ($fina_info) {
			//根据此条财务记录来进行返款
			return Sys_finance::cash_in ( $fina_info ['uid'], $fina_info ['fina_cash'], $fina_info ['fina_credit'], "order_cancel", '', 'order', $order_id );
		} else {
			return true;
		}
	}
	
	/**
	 * 任务订单状态
	 * 只针对任务的订单是否有附款
	 * 商品订单的状态定义不一样
	 * 
	 */
	public static function task_order_status() {
		global $_lang;
		return array ("wait" => $_lang['wait_confirm'], "ok" => $_lang['has_pay'], 'fail' => $_lang['pay_fail'], "close" => $_lang['trans_close'] );
	}
	
	public static function get_order_obj() {
		global $_lang;
		return array ("task" => $_lang['task_trans'], "payitem" => $_lang['payitem_service'], "service" => $_lang['goods_trans'], "hosted" => $_lang['bounty_hosting'] );
	}

}