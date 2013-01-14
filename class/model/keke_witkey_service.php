<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_service  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_service' );
			self::$pk = 'sid';
		}
		 public function getSid(){
			return self::$_data ['sid'];
		}
		 public function getModel_id(){
			return self::$_data ['model_id'];
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
		 public function getProfit_rate(){
			return self::$_data ['profit_rate'];
		}
		 public function getIndus_id(){
			return self::$_data ['indus_id'];
		}
		 public function getIndus_pid(){
			return self::$_data ['indus_pid'];
		}
		 public function getCus_cate_id(){
			return self::$_data ['cus_cate_id'];
		}
		 public function getTitle(){
			return self::$_data ['title'];
		}
		 public function getPrice(){
			return self::$_data ['price'];
		}
		 public function getUnite_price(){
			return self::$_data ['unite_price'];
		}
		 public function getService_time(){
			return self::$_data ['service_time'];
		}
		 public function getUnit_time(){
			return self::$_data ['unit_time'];
		}
		 public function getPic(){
			return self::$_data ['pic'];
		}
		 public function getAd_pic(){
			return self::$_data ['ad_pic'];
		}
		 public function getKey_word(){
			return self::$_data ['key_word'];
		}
		 public function getSubmit_method(){
			return self::$_data ['submit_method'];
		}
		 public function getFile_path(){
			return self::$_data ['file_path'];
		}
		 public function getContent(){
			return self::$_data ['content'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getIs_stop(){
			return self::$_data ['is_stop'];
		}
		 public function getSale_num(){
			return self::$_data ['sale_num'];
		}
		 public function getFocus_num(){
			return self::$_data ['focus_num'];
		}
		 public function getMark_num(){
			return self::$_data ['mark_num'];
		}
		 public function getLeave_num(){
			return self::$_data ['leave_num'];
		}
		 public function getViews(){
			return self::$_data ['views'];
		}
		 public function getPay_item(){
			return self::$_data ['pay_item'];
		}
		 public function getAtt_cash(){
			return self::$_data ['att_cash'];
		}
		 public function getRefresh_time(){
			return self::$_data ['refresh_time'];
		}
		 public function getTotal_sale(){
			return self::$_data ['total_sale'];
		}
		 public function getStatus(){
			return self::$_data ['status'];
		}
		 public function getIs_top(){
			return self::$_data ['is_top'];
		}
		 public function getPoint(){
			return self::$_data ['point'];
		}
		 public function getCity(){
			return self::$_data ['city'];
		}
		public function setSid($value){
			return self::$_data ['sid'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setModel_id($value){
			return self::$_data ['model_id'] = $value;
			$this;
		}
		public function setShop_id($value){
			return self::$_data ['shop_id'] = $value;
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
		public function setProfit_rate($value){
			return self::$_data ['profit_rate'] = $value;
			$this;
		}
		public function setIndus_id($value){
			return self::$_data ['indus_id'] = $value;
			$this;
		}
		public function setIndus_pid($value){
			return self::$_data ['indus_pid'] = $value;
			$this;
		}
		public function setCus_cate_id($value){
			return self::$_data ['cus_cate_id'] = $value;
			$this;
		}
		public function setTitle($value){
			return self::$_data ['title'] = $value;
			$this;
		}
		public function setPrice($value){
			return self::$_data ['price'] = $value;
			$this;
		}
		public function setUnite_price($value){
			return self::$_data ['unite_price'] = $value;
			$this;
		}
		public function setService_time($value){
			return self::$_data ['service_time'] = $value;
			$this;
		}
		public function setUnit_time($value){
			return self::$_data ['unit_time'] = $value;
			$this;
		}
		public function setPic($value){
			return self::$_data ['pic'] = $value;
			$this;
		}
		public function setAd_pic($value){
			return self::$_data ['ad_pic'] = $value;
			$this;
		}
		public function setKey_word($value){
			return self::$_data ['key_word'] = $value;
			$this;
		}
		public function setSubmit_method($value){
			return self::$_data ['submit_method'] = $value;
			$this;
		}
		public function setFile_path($value){
			return self::$_data ['file_path'] = $value;
			$this;
		}
		public function setContent($value){
			return self::$_data ['content'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setIs_stop($value){
			return self::$_data ['is_stop'] = $value;
			$this;
		}
		public function setSale_num($value){
			return self::$_data ['sale_num'] = $value;
			$this;
		}
		public function setFocus_num($value){
			return self::$_data ['focus_num'] = $value;
			$this;
		}
		public function setMark_num($value){
			return self::$_data ['mark_num'] = $value;
			$this;
		}
		public function setLeave_num($value){
			return self::$_data ['leave_num'] = $value;
			$this;
		}
		public function setViews($value){
			return self::$_data ['views'] = $value;
			$this;
		}
		public function setPay_item($value){
			return self::$_data ['pay_item'] = $value;
			$this;
		}
		public function setAtt_cash($value){
			return self::$_data ['att_cash'] = $value;
			$this;
		}
		public function setRefresh_time($value){
			return self::$_data ['refresh_time'] = $value;
			$this;
		}
		public function setTotal_sale($value){
			return self::$_data ['total_sale'] = $value;
			$this;
		}
		public function setStatus($value){
			return self::$_data ['status'] = $value;
			$this;
		}
		public function setIs_top($value){
			return self::$_data ['is_top'] = $value;
			$this;
		}
		public function setPoint($value){
			return self::$_data ['point'] = $value;
			$this;
		}
		public function setCity($value){
			return self::$_data ['city'] = $value;
			$this;
		}
}