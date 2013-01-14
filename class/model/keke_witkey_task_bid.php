<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_bid  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_bid' );
			self::$pk = 'bid_id';
		}
		 public function getBid_id(){
			return self::$_data ['bid_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getQuote(){
			return self::$_data ['quote'];
		}
		 public function getCycle(){
			return self::$_data ['cycle'];
		}
		 public function getArea(){
			return self::$_data ['area'];
		}
		 public function getMessage(){
			return self::$_data ['message'];
		}
		 public function getBid_status(){
			return self::$_data ['bid_status'];
		}
		 public function getBid_time(){
			return self::$_data ['bid_time'];
		}
		 public function getHidden_status(){
			return self::$_data ['hidden_status'];
		}
		 public function getExt_status(){
			return self::$_data ['ext_status'];
		}
		 public function getComment_num(){
			return self::$_data ['comment_num'];
		}
		 public function getIs_view(){
			return self::$_data ['is_view'];
		}
		public function setBid_id($value){
			return self::$_data ['bid_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
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
		public function setQuote($value){
			return self::$_data ['quote'] = $value;
			$this;
		}
		public function setCycle($value){
			return self::$_data ['cycle'] = $value;
			$this;
		}
		public function setArea($value){
			return self::$_data ['area'] = $value;
			$this;
		}
		public function setMessage($value){
			return self::$_data ['message'] = $value;
			$this;
		}
		public function setBid_status($value){
			return self::$_data ['bid_status'] = $value;
			$this;
		}
		public function setBid_time($value){
			return self::$_data ['bid_time'] = $value;
			$this;
		}
		public function setHidden_status($value){
			return self::$_data ['hidden_status'] = $value;
			$this;
		}
		public function setExt_status($value){
			return self::$_data ['ext_status'] = $value;
			$this;
		}
		public function setComment_num($value){
			return self::$_data ['comment_num'] = $value;
			$this;
		}
		public function setIs_view($value){
			return self::$_data ['is_view'] = $value;
			$this;
		}
}