<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_pay_api  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_pay_api' );
			self::$pk = 'pay_id';
		}
		 public function getPay_id(){
			return self::$_data ['pay_id'];
		}
		 public function getPayment(){
			return self::$_data ['payment'];
		}
		 public function getType(){
			return self::$_data ['type'];
		}
		 public function getPay_name(){
			return self::$_data ['pay_name'];
		}
		 public function getStatus(){
			return self::$_data ['status'];
		}
		 public function getPay_user(){
			return self::$_data ['pay_user'];
		}
		 public function getPay_account(){
			return self::$_data ['pay_account'];
		}
		 public function getPay_tel(){
			return self::$_data ['pay_tel'];
		}
		 public function getPid(){
			return self::$_data ['pid'];
		}
		 public function getKey(){
			return self::$_data ['key'];
		}
		 public function getMem(){
			return self::$_data ['mem'];
		}
		public function setPay_id($value){
			return self::$_data ['pay_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setPayment($value){
			return self::$_data ['payment'] = $value;
			$this;
		}
		public function setType($value){
			return self::$_data ['type'] = $value;
			$this;
		}
		public function setPay_name($value){
			return self::$_data ['pay_name'] = $value;
			$this;
		}
		public function setStatus($value){
			return self::$_data ['status'] = $value;
			$this;
		}
		public function setPay_user($value){
			return self::$_data ['pay_user'] = $value;
			$this;
		}
		public function setPay_account($value){
			return self::$_data ['pay_account'] = $value;
			$this;
		}
		public function setPay_tel($value){
			return self::$_data ['pay_tel'] = $value;
			$this;
		}
		public function setPid($value){
			return self::$_data ['pid'] = $value;
			$this;
		}
		public function setKey($value){
			return self::$_data ['key'] = $value;
			$this;
		}
		public function setMem($value){
			return self::$_data ['mem'] = $value;
			$this;
		}
}