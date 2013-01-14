<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_member_group  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_member_group' );
			self::$pk = 'group_id';
		}
		 public function getGroup_id(){
			return self::$_data ['group_id'];
		}
		 public function getGroupname(){
			return self::$_data ['groupname'];
		}
		 public function getGroup_roles(){
			return self::$_data ['group_roles'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setGroup_id($value){
			return self::$_data ['group_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setGroupname($value){
			return self::$_data ['groupname'] = $value;
			$this;
		}
		public function setGroup_roles($value){
			return self::$_data ['group_roles'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}