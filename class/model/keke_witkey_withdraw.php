<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_withdraw  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_withdraw' );
			self::$pk = 'wid';
		}
		 public function getWid(){
			return self::$_data ['wid'];
		}
		 public function getCash(){
			return self::$_data ['cash'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getBank_username(){
			return self::$_data ['bank_username'];
		}
		 public function getBank_name(){
			return self::$_data ['bank_name'];
		}
		 public function getBank_account(){
			return self::$_data ['bank_account'];
		}
		 public function getStatus(){
			return self::$_data ['status'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getOp_uid(){
			return self::$_data ['op_uid'];
		}
		 public function getOp_username(){
			return self::$_data ['op_username'];
		}
		 public function getOp_time(){
			return self::$_data ['op_time'];
		}
		 public function getType(){
			return self::$_data ['type'];
		}
		 public function getMem(){
			return self::$_data ['mem'];
		}
		 public function getFee(){
			return self::$_data ['fee'];
		}
		public function setWid($value){
			return self::$_data ['wid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setCash($value){
			return self::$_data ['cash'] = $value;
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
		public function setBank_username($value){
			return self::$_data ['bank_username'] = $value;
			$this;
		}
		public function setBank_name($value){
			return self::$_data ['bank_name'] = $value;
			$this;
		}
		public function setBank_account($value){
			return self::$_data ['bank_account'] = $value;
			$this;
		}
		public function setStatus($value){
			return self::$_data ['status'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setOp_uid($value){
			return self::$_data ['op_uid'] = $value;
			$this;
		}
		public function setOp_username($value){
			return self::$_data ['op_username'] = $value;
			$this;
		}
		public function setOp_time($value){
			return self::$_data ['op_time'] = $value;
			$this;
		}
		public function setType($value){
			return self::$_data ['type'] = $value;
			$this;
		}
		public function setMem($value){
			return self::$_data ['mem'] = $value;
			$this;
		}
		public function setFee($value){
			return self::$_data ['fee'] = $value;
			$this;
		}
}