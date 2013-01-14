<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_mark  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_mark' );
			self::$pk = 'mark_id';
		}
		 public function getMark_id(){
			return self::$_data ['mark_id'];
		}
		 public function getModel_code(){
			return self::$_data ['model_code'];
		}
		 public function getOrigin_id(){
			return self::$_data ['origin_id'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getObj_cash(){
			return self::$_data ['obj_cash'];
		}
		 public function getMark_status(){
			return self::$_data ['mark_status'];
		}
		 public function getMark_content(){
			return self::$_data ['mark_content'];
		}
		 public function getMark_time(){
			return self::$_data ['mark_time'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getMark_max_time(){
			return self::$_data ['mark_max_time'];
		}
		 public function getBy_uid(){
			return self::$_data ['by_uid'];
		}
		 public function getBy_username(){
			return self::$_data ['by_username'];
		}
		 public function getAid(){
			return self::$_data ['aid'];
		}
		 public function getAid_star(){
			return self::$_data ['aid_star'];
		}
		 public function getMark_value(){
			return self::$_data ['mark_value'];
		}
		 public function getMark_type(){
			return self::$_data ['mark_type'];
		}
		 public function getMark_count(){
			return self::$_data ['mark_count'];
		}
		public function setMark_id($value){
			return self::$_data ['mark_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setModel_code($value){
			return self::$_data ['model_code'] = $value;
			$this;
		}
		public function setOrigin_id($value){
			return self::$_data ['origin_id'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setObj_cash($value){
			return self::$_data ['obj_cash'] = $value;
			$this;
		}
		public function setMark_status($value){
			return self::$_data ['mark_status'] = $value;
			$this;
		}
		public function setMark_content($value){
			return self::$_data ['mark_content'] = $value;
			$this;
		}
		public function setMark_time($value){
			return self::$_data ['mark_time'] = $value;
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
		public function setMark_max_time($value){
			return self::$_data ['mark_max_time'] = $value;
			$this;
		}
		public function setBy_uid($value){
			return self::$_data ['by_uid'] = $value;
			$this;
		}
		public function setBy_username($value){
			return self::$_data ['by_username'] = $value;
			$this;
		}
		public function setAid($value){
			return self::$_data ['aid'] = $value;
			$this;
		}
		public function setAid_star($value){
			return self::$_data ['aid_star'] = $value;
			$this;
		}
		public function setMark_value($value){
			return self::$_data ['mark_value'] = $value;
			$this;
		}
		public function setMark_type($value){
			return self::$_data ['mark_type'] = $value;
			$this;
		}
		public function setMark_count($value){
			return self::$_data ['mark_count'] = $value;
			$this;
		}
}