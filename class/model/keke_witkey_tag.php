<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_tag  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_tag' );
			self::$pk = 'tag_id';
		}
		 public function getTag_id(){
			return self::$_data ['tag_id'];
		}
		 public function getTagname(){
			return self::$_data ['tagname'];
		}
		 public function getTag_type(){
			return self::$_data ['tag_type'];
		}
		 public function getCache_time(){
			return self::$_data ['cache_time'];
		}
		 public function getTag_code(){
			return self::$_data ['tag_code'];
		}
		 public function getTpl_type(){
			return self::$_data ['tpl_type'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getTag_cond(){
			return self::$_data ['tag_cond'];
		}
		public function setTag_id($value){
			return self::$_data ['tag_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTagname($value){
			return self::$_data ['tagname'] = $value;
			$this;
		}
		public function setTag_type($value){
			return self::$_data ['tag_type'] = $value;
			$this;
		}
		public function setCache_time($value){
			return self::$_data ['cache_time'] = $value;
			$this;
		}
		public function setTag_code($value){
			return self::$_data ['tag_code'] = $value;
			$this;
		}
		public function setTpl_type($value){
			return self::$_data ['tpl_type'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setTag_cond($value){
			return self::$_data ['tag_cond'] = $value;
			$this;
		}
}