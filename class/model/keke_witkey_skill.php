<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_skill  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_skill' );
			self::$pk = 'skill_id';
		}
		 public function getSkill_id(){
			return self::$_data ['skill_id'];
		}
		 public function getIndus_id(){
			return self::$_data ['indus_id'];
		}
		 public function getSkill_name(){
			return self::$_data ['skill_name'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setSkill_id($value){
			return self::$_data ['skill_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setIndus_id($value){
			return self::$_data ['indus_id'] = $value;
			$this;
		}
		public function setSkill_name($value){
			return self::$_data ['skill_name'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}