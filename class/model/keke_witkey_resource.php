<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_resource  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_resource' );
			self::$pk = 'resource_id';
		}
		 public function getResource_id(){
			return self::$_data ['resource_id'];
		}
		 public function getResource_name(){
			return self::$_data ['resource_name'];
		}
		 public function getResource_url(){
			return self::$_data ['resource_url'];
		}
		 public function getSubmenu_id(){
			return self::$_data ['submenu_id'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		public function setResource_id($value){
			return self::$_data ['resource_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setResource_name($value){
			return self::$_data ['resource_name'] = $value;
			$this;
		}
		public function setResource_url($value){
			return self::$_data ['resource_url'] = $value;
			$this;
		}
		public function setSubmenu_id($value){
			return self::$_data ['submenu_id'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
}