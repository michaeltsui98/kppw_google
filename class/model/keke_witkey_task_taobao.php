<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_taobao  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_taobao' );
			self::$pk = 'taobao_id';
		}
		 public function getTaobao_id(){
			return self::$_data ['taobao_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getWb_platform(){
			return self::$_data ['wb_platform'];
		}
		 public function getIs_focus(){
			return self::$_data ['is_focus'];
		}
		 public function getIs_comment(){
			return self::$_data ['is_comment'];
		}
		 public function getIs_at(){
			return self::$_data ['is_at'];
		}
		 public function getIs_zf(){
			return self::$_data ['is_zf'];
		}
		 public function getZf_url(){
			return self::$_data ['zf_url'];
		}
		 public function getWb_content(){
			return self::$_data ['wb_content'];
		}
		 public function getWb_img(){
			return self::$_data ['wb_img'];
		}
		 public function getAt_num(){
			return self::$_data ['at_num'];
		}
		 public function getAt_user(){
			return self::$_data ['at_user'];
		}
		 public function getAssign(){
			return self::$_data ['assign'];
		}
		 public function getTaobao_user(){
			return self::$_data ['taobao_user'];
		}
		 public function getZf_obj(){
			return self::$_data ['zf_obj'];
		}
		 public function getUnit_price(){
			return self::$_data ['unit_price'];
		}
		 public function getClick_count(){
			return self::$_data ['click_count'];
		}
		 public function getPay_amount(){
			return self::$_data ['pay_amount'];
		}
		 public function getSy_amount(){
			return self::$_data ['sy_amount'];
		}
		 public function getIs_repost(){
			return self::$_data ['is_repost'];
		}
		 public function getTen_content(){
			return self::$_data ['ten_content'];
		}
		 public function getProm_url(){
			return self::$_data ['prom_url'];
		}
		public function setTaobao_id($value){
			return self::$_data ['taobao_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setWb_platform($value){
			return self::$_data ['wb_platform'] = $value;
			$this;
		}
		public function setIs_focus($value){
			return self::$_data ['is_focus'] = $value;
			$this;
		}
		public function setIs_comment($value){
			return self::$_data ['is_comment'] = $value;
			$this;
		}
		public function setIs_at($value){
			return self::$_data ['is_at'] = $value;
			$this;
		}
		public function setIs_zf($value){
			return self::$_data ['is_zf'] = $value;
			$this;
		}
		public function setZf_url($value){
			return self::$_data ['zf_url'] = $value;
			$this;
		}
		public function setWb_content($value){
			return self::$_data ['wb_content'] = $value;
			$this;
		}
		public function setWb_img($value){
			return self::$_data ['wb_img'] = $value;
			$this;
		}
		public function setAt_num($value){
			return self::$_data ['at_num'] = $value;
			$this;
		}
		public function setAt_user($value){
			return self::$_data ['at_user'] = $value;
			$this;
		}
		public function setAssign($value){
			return self::$_data ['assign'] = $value;
			$this;
		}
		public function setTaobao_user($value){
			return self::$_data ['taobao_user'] = $value;
			$this;
		}
		public function setZf_obj($value){
			return self::$_data ['zf_obj'] = $value;
			$this;
		}
		public function setUnit_price($value){
			return self::$_data ['unit_price'] = $value;
			$this;
		}
		public function setClick_count($value){
			return self::$_data ['click_count'] = $value;
			$this;
		}
		public function setPay_amount($value){
			return self::$_data ['pay_amount'] = $value;
			$this;
		}
		public function setSy_amount($value){
			return self::$_data ['sy_amount'] = $value;
			$this;
		}
		public function setIs_repost($value){
			return self::$_data ['is_repost'] = $value;
			$this;
		}
		public function setTen_content($value){
			return self::$_data ['ten_content'] = $value;
			$this;
		}
		public function setProm_url($value){
			return self::$_data ['prom_url'] = $value;
			$this;
		}
}