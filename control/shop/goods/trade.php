<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ��Ʒҵ������
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_shop_goods_trade extends Control_shop_base{
    
	/**
	 * ��Ʒ״̬
	 * �ϼܺ��¼�״̬�ǶԷ����߶��ԣ����ú���������Թ���Ա����
	 */
	public static function get_goods_status() {
		
		global $_lang;
		return array ("2" => $_lang ['on_shelf'], "3" => $_lang ['down_shelf']);
	}
	
	/**
	 * ������Ʒ����״̬
	 */
	public static function get_order_status() {
		
		$info=DB::select('sid,status')->from('witkey_status')->where("stype='service' and model_code='goods'")->execute();
		
		foreach ($info as $k=>$v){
			$status[$k]=$v['status'];
		}
		return $status;
		
	}
	/**
	 * ��Ҹ���
	 * @param int $uid
	 * @param array $order_info
	 */
	public static function pay($order_info){
		//�۳���ҽ��
		$cash=(float)$order_info['price']*(int)$order_info['num'];
		Sys_finance::get_instance($order_info['order_uid'])->set_action('buy_service')
		->set_mem(array(':task_id'=>$order_info['obj_id'],':task_title'=>$order_info['name']))
		->set_obj('buy_service', $order_info['obj_id'])
		->cash_out($cash);
		//�ı䶩��״̬
		DB::update('witkey_order')
		->set(array('order_status'))->value(array('1'))
		->where("order_id = $order_info[order_id]")
		->execute();
 
	}
	/**
	 * ���ҷ���
	 * @param int $order_id
	 */
	public static function send($order_id){
		//�ı䶩��״̬
		DB::update('witkey_order')
		->set(array('order_status'))->value(array('2'))
		->where("order_id = $order_id")
		->execute();
	}
	/**
	 * ���ȷ��
	 * @param int $uid
	 * @param array $order_info
	 */
	public static function confirm($order_info){
		//�������ҽ��
		$cash=(float)$order_info['price']*(int)$order_info['num'];
		Sys_finance::get_instance($order_info['seller_uid'])->set_action('sale_service')
		->set_mem(array(':task_id'=>$order_info['obj_id'],':task_title'=>$order_info['name']))
		->set_obj('sale_service', $order_info['obj_id'])
		->cash_in($cash);
		//��ӻ�������
		$array=array(
				'model_code'=>$order_info['model_code'],
				'origin_id'=>$order_info['order_id'],
				'obj_id'=>$order_info['obj_id'],
				'obj_cash'=>$cash,
				'uid'=>$order_info['order_uid'],
				'username'=>$order_info['order_username'],
				'by_uid'=>$order_info['seller_uid'],
				'by_username'=>$order_info['seller_username'],
				'mark_type'=>'seller'
				);
		Model::factory('witkey_mark')->setData($array)->create();
			$array['uid']=$order_info['seller_uid'];
			$array['username']=$order_info['seller_username'];
			$array['by_uid']=$order_info['order_uid'];
			$array['by_username']=$order_info['order_username'];
			$array['mark_type']='buyer';
		Model::factory('witkey_mark')->setData($array)->create();
		
		//�ı䶩��״̬
		DB::update('witkey_order')
		->set(array('order_status'))->value(array('3'))
		->where("order_id = $order_info[order_id]")
		->execute();
	}
	/**
	 * ����
	 * @param int $uid
	 * @param array $order_info
	 */
	public static function mark($mark_id,$origin_id,$mark_type){
		
		$array['mark_status']=1;
		
		$where="mark_id = $mark_id";
		
		$mark_type=="buyer" and $mark_type="seller" or $mark_type="buyer";
		
		Model::factory('witkey_mark')->setData($array)->setWhere($where)->update();
		
		$mark_info=DB::select('mark_status')->from('witkey_mark')
		->where("origin_id=$origin_id and mark_type='$mark_type'")
		->get_one()->execute();
		 
		if((int)$mark_info['mark_status']>'0'){
			DB::update('witkey_order')
			->set(array('order_status'))
			->value(array('4'))
			->where("order_id = $origin_id")
			->execute();
		} 
		  
	}
	/**
	 * ��Ʒ���¼�
	 * @param int $sid
	 * @param int $status (1:�ϼܣ�0:�¼�)
	 */
	public static function up_down($sid,$status =1){
		DB::update('witkey_service')->set(array('status'))->value(array($status))->where("sid='$sid'")->execute();
	}
 
}