<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_industry  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_industry' );
			self::$pk = 'indus_id';
		}
		 public function getIndus_id(){
			return self::$_data ['indus_id'];
		}
		 public function getIndus_pid(){
			return self::$_data ['indus_pid'];
		}
		 public function getIndus_name(){
			return self::$_data ['indus_name'];
		}
		 public function getIs_recommend(){
			return self::$_data ['is_recommend'];
		}
		 public function getIndus_type(){
			return self::$_data ['indus_type'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getList_type(){
			return self::$_data ['list_type'];
		}
		 public function getList_tpl(){
			return self::$_data ['list_tpl'];
		}
		 public function getIndus_intro(){
			return self::$_data ['indus_intro'];
		}
		 public function getList_desc(){
			return self::$_data ['list_desc'];
		}
		public function setIndus_id($value){
			return self::$_data ['indus_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setIndus_pid($value){
			return self::$_data ['indus_pid'] = $value;
			$this;
		}
		public function setIndus_name($value){
			return self::$_data ['indus_name'] = $value;
			$this;
		}
		public function setIs_recommend($value){
			return self::$_data ['is_recommend'] = $value;
			$this;
		}
		public function setIndus_type($value){
			return self::$_data ['indus_type'] = $value;
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
		public function setList_type($value){
			return self::$_data ['list_type'] = $value;
			$this;
		}
		public function setList_tpl($value){
			return self::$_data ['list_tpl'] = $value;
			$this;
		}
		public function setIndus_intro($value){
			return self::$_data ['indus_intro'] = $value;
			$this;
		}
		public function setList_desc($value){
			return self::$_data ['list_desc'] = $value;
			$this;
		}
}