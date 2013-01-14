<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_taobao_work  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_taobao_work' );
			self::$pk = 'tbwk_id';
		}
		 public function getTbwk_id(){
			return self::$_data ['tbwk_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getWork_id(){
			return self::$_data ['work_id'];
		}
		 public function getWb_type(){
			return self::$_data ['wb_type'];
		}
		 public function getFans(){
			return self::$_data ['fans'];
		}
		 public function getWb_url(){
			return self::$_data ['wb_url'];
		}
		 public function getWb_account(){
			return self::$_data ['wb_account'];
		}
		 public function getWb_sid(){
			return self::$_data ['wb_sid'];
		}
		 public function getGet_cash(){
			return self::$_data ['get_cash'];
		}
		 public function getWb_data(){
			return self::$_data ['wb_data'];
		}
		 public function getHf_num(){
			return self::$_data ['hf_num'];
		}
		 public function getFocus_num(){
			return self::$_data ['focus_num'];
		}
		 public function getWb_num(){
			return self::$_data ['wb_num'];
		}
		 public function getFaver_num(){
			return self::$_data ['faver_num'];
		}
		 public function getCreate_day(){
			return self::$_data ['create_day'];
		}
		 public function getFgd_num(){
			return self::$_data ['fgd_num'];
		}
		 public function getHyd_num(){
			return self::$_data ['hyd_num'];
		}
		 public function getCbd_num(){
			return self::$_data ['cbd_num'];
		}
		 public function getYxl_num(){
			return self::$_data ['yxl_num'];
		}
		 public function getWb_leve(){
			return self::$_data ['wb_leve'];
		}
		 public function getClick_num(){
			return self::$_data ['click_num'];
		}
		 public function getIp(){
			return self::$_data ['ip'];
		}
		 public function getJump_url(){
			return self::$_data ['jump_url'];
		}
		public function setTbwk_id($value){
			return self::$_data ['tbwk_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			$this;
		}
		public function setWork_id($value){
			return self::$_data ['work_id'] = $value;
			$this;
		}
		public function setWb_type($value){
			return self::$_data ['wb_type'] = $value;
			$this;
		}
		public function setFans($value){
			return self::$_data ['fans'] = $value;
			$this;
		}
		public function setWb_url($value){
			return self::$_data ['wb_url'] = $value;
			$this;
		}
		public function setWb_account($value){
			return self::$_data ['wb_account'] = $value;
			$this;
		}
		public function setWb_sid($value){
			return self::$_data ['wb_sid'] = $value;
			$this;
		}
		public function setGet_cash($value){
			return self::$_data ['get_cash'] = $value;
			$this;
		}
		public function setWb_data($value){
			return self::$_data ['wb_data'] = $value;
			$this;
		}
		public function setHf_num($value){
			return self::$_data ['hf_num'] = $value;
			$this;
		}
		public function setFocus_num($value){
			return self::$_data ['focus_num'] = $value;
			$this;
		}
		public function setWb_num($value){
			return self::$_data ['wb_num'] = $value;
			$this;
		}
		public function setFaver_num($value){
			return self::$_data ['faver_num'] = $value;
			$this;
		}
		public function setCreate_day($value){
			return self::$_data ['create_day'] = $value;
			$this;
		}
		public function setFgd_num($value){
			return self::$_data ['fgd_num'] = $value;
			$this;
		}
		public function setHyd_num($value){
			return self::$_data ['hyd_num'] = $value;
			$this;
		}
		public function setCbd_num($value){
			return self::$_data ['cbd_num'] = $value;
			$this;
		}
		public function setYxl_num($value){
			return self::$_data ['yxl_num'] = $value;
			$this;
		}
		public function setWb_leve($value){
			return self::$_data ['wb_leve'] = $value;
			$this;
		}
		public function setClick_num($value){
			return self::$_data ['click_num'] = $value;
			$this;
		}
		public function setIp($value){
			return self::$_data ['ip'] = $value;
			$this;
		}
		public function setJump_url($value){
			return self::$_data ['jump_url'] = $value;
			$this;
		}
}