<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_recharge  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_recharge' );
			self::$pk = 'rid';
		}
		 public function getRid(){
			return self::$_data ['rid'];
		}
		 public function getPay_id(){
			return self::$_data ['pay_id'];
		}
		 public function getOrder_id(){
			return self::$_data ['order_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getPay_time(){
			return self::$_data ['pay_time'];
		}
		 public function getCash(){
			return self::$_data ['cash'];
		}
		 public function getStatus(){
			return self::$_data ['status'];
		}
		 public function getBank_info(){
			return self::$_data ['bank_info'];
		}
		 public function getMem(){
			return self::$_data ['mem'];
		}
		 public function getRecharge_pic(){
			return self::$_data ['recharge_pic'];
		}
		public function setRid($value){
			return self::$_data ['rid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setPay_id($value){
			return self::$_data ['pay_id'] = $value;
			$this;
		}
		public function setOrder_id($value){
			return self::$_data ['order_id'] = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setUsername($value){
			return self::$_data ['username'] = $value;
			$this;
		}
		public function setPay_time($value){
			return self::$_data ['pay_time'] = $value;
			$this;
		}
		public function setCash($value){
			return self::$_data ['cash'] = $value;
			$this;
		}
		public function setStatus($value){
			return self::$_data ['status'] = $value;
			$this;
		}
		public function setBank_info($value){
			return self::$_data ['bank_info'] = $value;
			$this;
		}
		public function setMem($value){
			return self::$_data ['mem'] = $value;
			$this;
		}
		public function setRecharge_pic($value){
			return self::$_data ['recharge_pic'] = $value;
			$this;
		}
}