<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_work  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_work' );
			self::$pk = 'work_id';
		}
		 public function getWork_id(){
			return self::$_data ['work_id'];
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
		 public function getWork_title(){
			return self::$_data ['work_title'];
		}
		 public function getWork_price(){
			return self::$_data ['work_price'];
		}
		 public function getWork_desc(){
			return self::$_data ['work_desc'];
		}
		 public function getWork_file(){
			return self::$_data ['work_file'];
		}
		 public function getWork_pic(){
			return self::$_data ['work_pic'];
		}
		 public function getWork_time(){
			return self::$_data ['work_time'];
		}
		 public function getHide_work(){
			return self::$_data ['hide_work'];
		}
		 public function getVote_num(){
			return self::$_data ['vote_num'];
		}
		 public function getComment_num(){
			return self::$_data ['comment_num'];
		}
		 public function getWork_status(){
			return self::$_data ['work_status'];
		}
		 public function getIs_view(){
			return self::$_data ['is_view'];
		}
		public function setWork_id($value){
			return self::$_data ['work_id'] = $value;
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
		public function setWork_title($value){
			return self::$_data ['work_title'] = $value;
			$this;
		}
		public function setWork_price($value){
			return self::$_data ['work_price'] = $value;
			$this;
		}
		public function setWork_desc($value){
			return self::$_data ['work_desc'] = $value;
			$this;
		}
		public function setWork_file($value){
			return self::$_data ['work_file'] = $value;
			$this;
		}
		public function setWork_pic($value){
			return self::$_data ['work_pic'] = $value;
			$this;
		}
		public function setWork_time($value){
			return self::$_data ['work_time'] = $value;
			$this;
		}
		public function setHide_work($value){
			return self::$_data ['hide_work'] = $value;
			$this;
		}
		public function setVote_num($value){
			return self::$_data ['vote_num'] = $value;
			$this;
		}
		public function setComment_num($value){
			return self::$_data ['comment_num'] = $value;
			$this;
		}
		public function setWork_status($value){
			return self::$_data ['work_status'] = $value;
			$this;
		}
		public function setIs_view($value){
			return self::$_data ['is_view'] = $value;
			$this;
		}
}