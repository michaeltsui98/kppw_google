<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_article  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_article' );
			self::$pk = 'art_id';
		}
		 public function getArt_id(){
			return self::$_data ['art_id'];
		}
		 public function getArt_cat_id(){
			return self::$_data ['art_cat_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getArt_title(){
			return self::$_data ['art_title'];
		}
		 public function getCat_type(){
			return self::$_data ['cat_type'];
		}
		 public function getArt_source(){
			return self::$_data ['art_source'];
		}
		 public function getArt_pic(){
			return self::$_data ['art_pic'];
		}
		 public function getContent(){
			return self::$_data ['content'];
		}
		 public function getIs_recommend(){
			return self::$_data ['is_recommend'];
		}
		 public function getSeo_title(){
			return self::$_data ['seo_title'];
		}
		 public function getSeo_keyword(){
			return self::$_data ['seo_keyword'];
		}
		 public function getSeo_desc(){
			return self::$_data ['seo_desc'];
		}
		 public function getListorder(){
			return self::$_data ['listorder'];
		}
		 public function getIs_show(){
			return self::$_data ['is_show'];
		}
		 public function getIs_delineas(){
			return self::$_data ['is_delineas'];
		}
		 public function getPub_time(){
			return self::$_data ['pub_time'];
		}
		 public function getViews(){
			return self::$_data ['views'];
		}
		public function setArt_id($value){
			return self::$_data ['art_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setArt_cat_id($value){
			return self::$_data ['art_cat_id'] = $value;
			$this;
		}
		public function setUid($value){
			return self::$_data ['uid'] = $value;
			$this;
		}
		public function setUsername($value){
			return self::$_data ['username'] = $value;
			$this;
		}
		public function setArt_title($value){
			return self::$_data ['art_title'] = $value;
			$this;
		}
		public function setCat_type($value){
			return self::$_data ['cat_type'] = $value;
			$this;
		}
		public function setArt_source($value){
			return self::$_data ['art_source'] = $value;
			$this;
		}
		public function setArt_pic($value){
			return self::$_data ['art_pic'] = $value;
			$this;
		}
		public function setContent($value){
			return self::$_data ['content'] = $value;
			$this;
		}
		public function setIs_recommend($value){
			return self::$_data ['is_recommend'] = $value;
			$this;
		}
		public function setSeo_title($value){
			return self::$_data ['seo_title'] = $value;
			$this;
		}
		public function setSeo_keyword($value){
			return self::$_data ['seo_keyword'] = $value;
			$this;
		}
		public function setSeo_desc($value){
			return self::$_data ['seo_desc'] = $value;
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
		public function setIs_delineas($value){
			return self::$_data ['is_delineas'] = $value;
			$this;
		}
		public function setPub_time($value){
			return self::$_data ['pub_time'] = $value;
			$this;
		}
		public function setViews($value){
			return self::$_data ['views'] = $value;
			$this;
		}
}