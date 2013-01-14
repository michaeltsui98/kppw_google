<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_shop  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_shop' );
			self::$pk = 'shop_id';
		}
		 public function getShop_id(){
			return self::$_data ['shop_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getShop_type(){
			return self::$_data ['shop_type'];
		}
		 public function getShop_name(){
			return self::$_data ['shop_name'];
		}
		 public function getService_range(){
			return self::$_data ['service_range'];
		}
		 public function getShop_desc(){
			return self::$_data ['shop_desc'];
		}
		 public function getWork(){
			return self::$_data ['work'];
		}
		 public function getWork_year(){
			return self::$_data ['work_year'];
		}
		 public function getKeyword(){
			return self::$_data ['keyword'];
		}
		 public function getShop_background(){
			return self::$_data ['shop_background'];
		}
		 public function getLogo(){
			return self::$_data ['logo'];
		}
		 public function getBanner(){
			return self::$_data ['banner'];
		}
		 public function getShop_slogans(){
			return self::$_data ['shop_slogans'];
		}
		 public function getShop_skin(){
			return self::$_data ['shop_skin'];
		}
		 public function getShop_backstyle(){
			return self::$_data ['shop_backstyle'];
		}
		 public function getShop_font(){
			return self::$_data ['shop_font'];
		}
		 public function getShop_active(){
			return self::$_data ['shop_active'];
		}
		 public function getIs_close(){
			return self::$_data ['is_close'];
		}
		 public function getViews(){
			return self::$_data ['views'];
		}
		 public function getFocus_num(){
			return self::$_data ['focus_num'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getHomebanner(){
			return self::$_data ['homebanner'];
		}
		 public function getOn_sale(){
			return self::$_data ['on_sale'];
		}
		public function setShop_id($value){
			return self::$_data ['shop_id'] = $value;
			self::$pk_val = $value;
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
		public function setShop_type($value){
			return self::$_data ['shop_type'] = $value;
			$this;
		}
		public function setShop_name($value){
			return self::$_data ['shop_name'] = $value;
			$this;
		}
		public function setService_range($value){
			return self::$_data ['service_range'] = $value;
			$this;
		}
		public function setShop_desc($value){
			return self::$_data ['shop_desc'] = $value;
			$this;
		}
		public function setWork($value){
			return self::$_data ['work'] = $value;
			$this;
		}
		public function setWork_year($value){
			return self::$_data ['work_year'] = $value;
			$this;
		}
		public function setKeyword($value){
			return self::$_data ['keyword'] = $value;
			$this;
		}
		public function setShop_background($value){
			return self::$_data ['shop_background'] = $value;
			$this;
		}
		public function setLogo($value){
			return self::$_data ['logo'] = $value;
			$this;
		}
		public function setBanner($value){
			return self::$_data ['banner'] = $value;
			$this;
		}
		public function setShop_slogans($value){
			return self::$_data ['shop_slogans'] = $value;
			$this;
		}
		public function setShop_skin($value){
			return self::$_data ['shop_skin'] = $value;
			$this;
		}
		public function setShop_backstyle($value){
			return self::$_data ['shop_backstyle'] = $value;
			$this;
		}
		public function setShop_font($value){
			return self::$_data ['shop_font'] = $value;
			$this;
		}
		public function setShop_active($value){
			return self::$_data ['shop_active'] = $value;
			$this;
		}
		public function setIs_close($value){
			return self::$_data ['is_close'] = $value;
			$this;
		}
		public function setViews($value){
			return self::$_data ['views'] = $value;
			$this;
		}
		public function setFocus_num($value){
			return self::$_data ['focus_num'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setHomebanner($value){
			return self::$_data ['homebanner'] = $value;
			$this;
		}
		public function setOn_sale($value){
			return self::$_data ['on_sale'] = $value;
			$this;
		}
}