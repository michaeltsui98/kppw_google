<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_report  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_report' );
			self::$pk = 'report_id';
		}
		 public function getReport_id(){
			return self::$_data ['report_id'];
		}
		 public function getObj(){
			return self::$_data ['obj'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getOrigin_id(){
			return self::$_data ['origin_id'];
		}
		 public function getFront_status(){
			return self::$_data ['front_status'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getUser_type(){
			return self::$_data ['user_type'];
		}
		 public function getTo_uid(){
			return self::$_data ['to_uid'];
		}
		 public function getTo_username(){
			return self::$_data ['to_username'];
		}
		 public function getIs_hide(){
			return self::$_data ['is_hide'];
		}
		 public function getReport_desc(){
			return self::$_data ['report_desc'];
		}
		 public function getReport_file(){
			return self::$_data ['report_file'];
		}
		 public function getReport_status(){
			return self::$_data ['report_status'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getReport_type(){
			return self::$_data ['report_type'];
		}
		 public function getOp_uid(){
			return self::$_data ['op_uid'];
		}
		 public function getOp_username(){
			return self::$_data ['op_username'];
		}
		 public function getOp_result(){
			return self::$_data ['op_result'];
		}
		 public function getOp_time(){
			return self::$_data ['op_time'];
		}
		 public function getPhone(){
			return self::$_data ['phone'];
		}
		 public function getQq(){
			return self::$_data ['qq'];
		}
		public function setReport_id($value){
			return self::$_data ['report_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setObj($value){
			return self::$_data ['obj'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setOrigin_id($value){
			return self::$_data ['origin_id'] = $value;
			$this;
		}
		public function setFront_status($value){
			return self::$_data ['front_status'] = $value;
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
		public function setUser_type($value){
			return self::$_data ['user_type'] = $value;
			$this;
		}
		public function setTo_uid($value){
			return self::$_data ['to_uid'] = $value;
			$this;
		}
		public function setTo_username($value){
			return self::$_data ['to_username'] = $value;
			$this;
		}
		public function setIs_hide($value){
			return self::$_data ['is_hide'] = $value;
			$this;
		}
		public function setReport_desc($value){
			return self::$_data ['report_desc'] = $value;
			$this;
		}
		public function setReport_file($value){
			return self::$_data ['report_file'] = $value;
			$this;
		}
		public function setReport_status($value){
			return self::$_data ['report_status'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setReport_type($value){
			return self::$_data ['report_type'] = $value;
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
		public function setOp_result($value){
			return self::$_data ['op_result'] = $value;
			$this;
		}
		public function setOp_time($value){
			return self::$_data ['op_time'] = $value;
			$this;
		}
		public function setPhone($value){
			return self::$_data ['phone'] = $value;
			$this;
		}
		public function setQq($value){
			return self::$_data ['qq'] = $value;
			$this;
		}
}