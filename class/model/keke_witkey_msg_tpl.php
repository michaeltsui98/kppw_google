<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_msg_tpl  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_msg_tpl' );
			self::$pk = 'tpl_id';
		}
		 public function getTpl_id(){
			return self::$_data ['tpl_id'];
		}
		 public function getK(){
			return self::$_data ['k'];
		}
		 public function getObj(){
			return self::$_data ['obj'];
		}
		 public function getDesc(){
			return self::$_data ['desc'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getSend_sms(){
			return self::$_data ['send_sms'];
		}
		 public function getSend_mail(){
			return self::$_data ['send_mail'];
		}
		 public function getSend_msg(){
			return self::$_data ['send_msg'];
		}
		 public function getSms_tpl(){
			return self::$_data ['sms_tpl'];
		}
		 public function getMsg_tpl(){
			return self::$_data ['msg_tpl'];
		}
		public function setTpl_id($value){
			return self::$_data ['tpl_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setK($value){
			return self::$_data ['k'] = $value;
			$this;
		}
		public function setObj($value){
			return self::$_data ['obj'] = $value;
			$this;
		}
		public function setDesc($value){
			return self::$_data ['desc'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setSend_sms($value){
			return self::$_data ['send_sms'] = $value;
			$this;
		}
		public function setSend_mail($value){
			return self::$_data ['send_mail'] = $value;
			$this;
		}
		public function setSend_msg($value){
			return self::$_data ['send_msg'] = $value;
			$this;
		}
		public function setSms_tpl($value){
			return self::$_data ['sms_tpl'] = $value;
			$this;
		}
		public function setMsg_tpl($value){
			return self::$_data ['msg_tpl'] = $value;
			$this;
		}
}