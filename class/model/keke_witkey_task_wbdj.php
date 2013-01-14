<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task_wbdj  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task_wbdj' );
			self::$pk = 'wbdj_id';
		}
		 public function getWbdj_id(){
			return self::$_data ['wbdj_id'];
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getWb_platform(){
			return self::$_data ['wb_platform'];
		}
		 public function getWb_content(){
			return self::$_data ['wb_content'];
		}
		 public function getWb_img(){
			return self::$_data ['wb_img'];
		}
		 public function getClick_price(){
			return self::$_data ['click_price'];
		}
		 public function getProm_url(){
			return self::$_data ['prom_url'];
		}
		 public function getPay_amount(){
			return self::$_data ['pay_amount'];
		}
		 public function getClick_count(){
			return self::$_data ['click_count'];
		}
		public function setWbdj_id($value){
			return self::$_data ['wbdj_id'] = $value;
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
		public function setWb_content($value){
			return self::$_data ['wb_content'] = $value;
			$this;
		}
		public function setWb_img($value){
			return self::$_data ['wb_img'] = $value;
			$this;
		}
		public function setClick_price($value){
			return self::$_data ['click_price'] = $value;
			$this;
		}
		public function setProm_url($value){
			return self::$_data ['prom_url'] = $value;
			$this;
		}
		public function setPay_amount($value){
			return self::$_data ['pay_amount'] = $value;
			$this;
		}
		public function setClick_count($value){
			return self::$_data ['click_count'] = $value;
			$this;
		}
}