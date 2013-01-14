<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_template  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_template' );
			self::$pk = 'tpl_id';
		}
		 public function getTpl_id(){
			return self::$_data ['tpl_id'];
		}
		 public function getTpl_title(){
			return self::$_data ['tpl_title'];
		}
		 public function getTpl_desc(){
			return self::$_data ['tpl_desc'];
		}
		 public function getDevelop(){
			return self::$_data ['develop'];
		}
		 public function getTpl_pic(){
			return self::$_data ['tpl_pic'];
		}
		 public function getTpl_path(){
			return self::$_data ['tpl_path'];
		}
		 public function getIs_selected(){
			return self::$_data ['is_selected'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setTpl_id($value){
			return self::$_data ['tpl_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTpl_title($value){
			return self::$_data ['tpl_title'] = $value;
			$this;
		}
		public function setTpl_desc($value){
			return self::$_data ['tpl_desc'] = $value;
			$this;
		}
		public function setDevelop($value){
			return self::$_data ['develop'] = $value;
			$this;
		}
		public function setTpl_pic($value){
			return self::$_data ['tpl_pic'] = $value;
			$this;
		}
		public function setTpl_path($value){
			return self::$_data ['tpl_path'] = $value;
			$this;
		}
		public function setIs_selected($value){
			return self::$_data ['is_selected'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
}