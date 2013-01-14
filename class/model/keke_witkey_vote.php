<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_vote  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_vote' );
			self::$pk = 'vote_id';
		}
		 public function getVote_id(){
			return self::$_data ['vote_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getWork_id(){
			return self::$_data ['work_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getVote_ip(){
			return self::$_data ['vote_ip'];
		}
		 public function getVote_time(){
			return self::$_data ['vote_time'];
		}
		public function setVote_id($value){
			return self::$_data ['vote_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setWork_id($value){
			return self::$_data ['work_id'] = $value;
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
		public function setVote_ip($value){
			return self::$_data ['vote_ip'] = $value;
			$this;
		}
		public function setVote_time($value){
			return self::$_data ['vote_time'] = $value;
			$this;
		}
}