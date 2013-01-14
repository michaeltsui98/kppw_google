<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_order  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_order' );
			self::$pk = 'order_id';
		}
		 public function getOrder_id(){
			return self::$_data ['order_id'];
		}
		 public function getOrder_name(){
			return self::$_data ['order_name'];
		}
		 public function getOrder_time(){
			return self::$_data ['order_time'];
		}
		 public function getOrder_amount(){
			return self::$_data ['order_amount'];
		}
		 public function getOrder_status(){
			return self::$_data ['order_status'];
		}
		 public function getOrder_body(){
			return self::$_data ['order_body'];
		}
		 public function getOrder_uid(){
			return self::$_data ['order_uid'];
		}
		 public function getOrder_username(){
			return self::$_data ['order_username'];
		}
		 public function getSeller_uid(){
			return self::$_data ['seller_uid'];
		}
		 public function getSeller_username(){
			return self::$_data ['seller_username'];
		}
		public function setOrder_id($value){
			return self::$_data ['order_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setOrder_name($value){
			return self::$_data ['order_name'] = $value;
			$this;
		}
		public function setOrder_time($value){
			return self::$_data ['order_time'] = $value;
			$this;
		}
		public function setOrder_amount($value){
			return self::$_data ['order_amount'] = $value;
			$this;
		}
		public function setOrder_status($value){
			return self::$_data ['order_status'] = $value;
			$this;
		}
		public function setOrder_body($value){
			return self::$_data ['order_body'] = $value;
			$this;
		}
		public function setOrder_uid($value){
			return self::$_data ['order_uid'] = $value;
			$this;
		}
		public function setOrder_username($value){
			return self::$_data ['order_username'] = $value;
			$this;
		}
		public function setSeller_uid($value){
			return self::$_data ['seller_uid'] = $value;
			$this;
		}
		public function setSeller_username($value){
			return self::$_data ['seller_username'] = $value;
			$this;
		}
}