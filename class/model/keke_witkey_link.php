<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_link  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_link' );
			self::$pk = 'link_id';
		}
		 public function getLink_id(){
			return self::$_data ['link_id'];
		}
		 public function getLink_type(){
			return self::$_data ['link_type'];
		}
		 public function getLink_name(){
			return self::$_data ['link_name'];
		}
		 public function getLink_url(){
			return self::$_data ['link_url'];
		}
		 public function getLink_pic(){
			return self::$_data ['link_pic'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getLink_status(){
			return self::$_data ['link_status'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		public function setLink_id($value){
			return self::$_data ['link_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setLink_type($value){
			return self::$_data ['link_type'] = $value;
			$this;
		}
		public function setLink_name($value){
			return self::$_data ['link_name'] = $value;
			$this;
		}
		public function setLink_url($value){
			return self::$_data ['link_url'] = $value;
			$this;
		}
		public function setLink_pic($value){
			return self::$_data ['link_pic'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
		public function setLink_status($value){
			return self::$_data ['link_status'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setObj_type($value){
			return self::$_data ['obj_type'] = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
}