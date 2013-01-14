<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_wbdj_views  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_wbdj_views' );
			self::$pk = 'view_id';
		}
		 public function getView_id(){
			return self::$_data ['view_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getWork_id(){
			return self::$_data ['work_id'];
		}
		 public function getDjwk_id(){
			return self::$_data ['djwk_id'];
		}
		 public function getRefre_url(){
			return self::$_data ['refre_url'];
		}
		 public function getUser_ip(){
			return self::$_data ['user_ip'];
		}
		 public function getUser_agent(){
			return self::$_data ['user_agent'];
		}
		 public function getClick_time(){
			return self::$_data ['click_time'];
		}
		public function setView_id($value){
			return self::$_data ['view_id'] = $value;
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
		public function setDjwk_id($value){
			return self::$_data ['djwk_id'] = $value;
			$this;
		}
		public function setRefre_url($value){
			return self::$_data ['refre_url'] = $value;
			$this;
		}
		public function setUser_ip($value){
			return self::$_data ['user_ip'] = $value;
			$this;
		}
		public function setUser_agent($value){
			return self::$_data ['user_agent'] = $value;
			$this;
		}
		public function setClick_time($value){
			return self::$_data ['click_time'] = $value;
			$this;
		}
}