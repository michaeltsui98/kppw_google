<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_finance  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_finance' );
			self::$pk = 'fina_id';
		}
		 public function getFina_id(){
			return self::$_data ['fina_id'];
		}
		 public function getFina_type(){
			return self::$_data ['fina_type'];
		}
		 public function getFina_action(){
			return self::$_data ['fina_action'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getFina_cash(){
			return self::$_data ['fina_cash'];
		}
		 public function getUser_balance(){
			return self::$_data ['user_balance'];
		}
		 public function getFina_credit(){
			return self::$_data ['fina_credit'];
		}
		 public function getUser_credit(){
			return self::$_data ['user_credit'];
		}
		 public function getFina_source(){
			return self::$_data ['fina_source'];
		}
		 public function getFina_time(){
			return self::$_data ['fina_time'];
		}
		 public function getRecharge_cash(){
			return self::$_data ['recharge_cash'];
		}
		 public function getSite_profit(){
			return self::$_data ['site_profit'];
		}
		 public function getFina_mem(){
			return self::$_data ['fina_mem'];
		}
		public function setFina_id($value){
			return self::$_data ['fina_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setFina_type($value){
			return self::$_data ['fina_type'] = $value;
			$this;
		}
		public function setFina_action($value){
			return self::$_data ['fina_action'] = $value;
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
		public function setObj_type($value){
			return self::$_data ['obj_type'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setFina_cash($value){
			return self::$_data ['fina_cash'] = $value;
			$this;
		}
		public function setUser_balance($value){
			return self::$_data ['user_balance'] = $value;
			$this;
		}
		public function setFina_credit($value){
			return self::$_data ['fina_credit'] = $value;
			$this;
		}
		public function setUser_credit($value){
			return self::$_data ['user_credit'] = $value;
			$this;
		}
		public function setFina_source($value){
			return self::$_data ['fina_source'] = $value;
			$this;
		}
		public function setFina_time($value){
			return self::$_data ['fina_time'] = $value;
			$this;
		}
		public function setRecharge_cash($value){
			return self::$_data ['recharge_cash'] = $value;
			$this;
		}
		public function setSite_profit($value){
			return self::$_data ['site_profit'] = $value;
			$this;
		}
		public function setFina_mem($value){
			return self::$_data ['fina_mem'] = $value;
			$this;
		}
}