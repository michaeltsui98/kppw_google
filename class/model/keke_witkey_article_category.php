<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_article_category  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_article_category' );
			self::$pk = 'art_cat_id';
		}
		 public function getArt_cat_id(){
			return self::$_data ['art_cat_id'];
		}
		 public function getArt_cat_pid(){
			return self::$_data ['art_cat_pid'];
		}
		 public function getCat_name(){
			return self::$_data ['cat_name'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getIs_show(){
			return self::$_data ['is_show'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getCat_type(){
			return self::$_data ['cat_type'];
		}
		public function setArt_cat_id($value){
			return self::$_data ['art_cat_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setArt_cat_pid($value){
			return self::$_data ['art_cat_pid'] = $value;
			$this;
		}
		public function setCat_name($value){
			return self::$_data ['cat_name'] = $value;
			$this;
		}
		public function setListorder($value){
			return self::$_data ['listorder'] = $value;
			$this;
		}
		public function setIs_show($value){
			return self::$_data ['is_show'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setCat_type($value){
			return self::$_data ['cat_type'] = $value;
			$this;
		}
}