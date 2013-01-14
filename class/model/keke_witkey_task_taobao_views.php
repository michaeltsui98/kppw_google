<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_taobao_views  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_taobao_views' );
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
		 public function getTbwk_id(){
			return self::$_data ['tbwk_id'];
		}
		 public function getRefer_url(){
			return self::$_data ['refer_url'];
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
		public function setTbwk_id($value){
			return self::$_data ['tbwk_id'] = $value;
			$this;
		}
		public function setRefer_url($value){
			return self::$_data ['refer_url'] = $value;
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