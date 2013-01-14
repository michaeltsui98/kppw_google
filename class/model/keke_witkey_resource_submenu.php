<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_resource_submenu  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_resource_submenu' );
			self::$pk = 'submenu_id';
		}
		 public function getSubmenu_id(){
			return self::$_data ['submenu_id'];
		}
		 public function getSubmenu_name(){
			return self::$_data ['submenu_name'];
		}
		 public function getMenu_name(){
			return self::$_data ['menu_name'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		public function setSubmenu_id($value){
			return self::$_data ['submenu_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setSubmenu_name($value){
			return self::$_data ['submenu_name'] = $value;
			$this;
		}
		public function setMenu_name($value){
			return self::$_data ['menu_name'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
}