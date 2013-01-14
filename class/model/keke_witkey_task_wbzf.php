<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_wbzf  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_wbzf' );
			self::$pk = 'wbzf_id';
		}
		 public function getWbzf_id(){
			return self::$_data ['wbzf_id'];
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
		 public function getRepost_url(){
			return self::$_data ['repost_url'];
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
		 public function getUnit_price(){
			return self::$_data ['unit_price'];
		}
		 public function getAssign(){
			return self::$_data ['assign'];
		}
		 public function getPay_amount(){
			return self::$_data ['pay_amount'];
		}
		 public function getFans_count(){
			return self::$_data ['fans_count'];
		}
		 public function getIs_repost(){
			return self::$_data ['is_repost'];
		}
		 public function getTen_content(){
			return self::$_data ['ten_content'];
		}
		public function setWbzf_id($value){
			return self::$_data ['wbzf_id'] = $value;
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
		public function setRepost_url($value){
			return self::$_data ['repost_url'] = $value;
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
		public function setUnit_price($value){
			return self::$_data ['unit_price'] = $value;
			$this;
		}
		public function setAssign($value){
			return self::$_data ['assign'] = $value;
			$this;
		}
		public function setPay_amount($value){
			return self::$_data ['pay_amount'] = $value;
			$this;
		}
		public function setFans_count($value){
			return self::$_data ['fans_count'] = $value;
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
}