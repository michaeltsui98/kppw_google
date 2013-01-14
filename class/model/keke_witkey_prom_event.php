<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_prom_event  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_prom_event' );
			self::$pk = 'event_id';
		}
		 public function getEvent_id(){
			return self::$_data ['event_id'];
		}
		 public function getEvent_desc(){
			return self::$_data ['event_desc'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getParent_uid(){
			return self::$_data ['parent_uid'];
		}
		 public function getParent_username(){
			return self::$_data ['parent_username'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getRake_cash(){
			return self::$_data ['rake_cash'];
		}
		 public function getRake_credit(){
			return self::$_data ['rake_credit'];
		}
		 public function getEvent_status(){
			return self::$_data ['event_status'];
		}
		 public function getEvent_time(){
			return self::$_data ['event_time'];
		}
		 public function getAction(){
			return self::$_data ['action'];
		}
		public function setEvent_id($value){
			return self::$_data ['event_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setEvent_desc($value){
			return self::$_data ['event_desc'] = $value;
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
		public function setParent_uid($value){
			return self::$_data ['parent_uid'] = $value;
			$this;
		}
		public function setParent_username($value){
			return self::$_data ['parent_username'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setRake_cash($value){
			return self::$_data ['rake_cash'] = $value;
			$this;
		}
		public function setRake_credit($value){
			return self::$_data ['rake_credit'] = $value;
			$this;
		}
		public function setEvent_status($value){
			return self::$_data ['event_status'] = $value;
			$this;
		}
		public function setEvent_time($value){
			return self::$_data ['event_time'] = $value;
			$this;
		}
		public function setAction($value){
			return self::$_data ['action'] = $value;
			$this;
		}
}