<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_cron  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_cron' );
			self::$pk = 'cron_id';
		}
		 public function getCron_id(){
			return self::$_data ['cron_id'];
		}
		 public function getCron_name(){
			return self::$_data ['cron_name'];
		}
		 public function getSpan(){
			return self::$_data ['span'];
		}
		 public function getNextruntime(){
			return self::$_data ['nextruntime'];
		}
		 public function getAllow(){
			return self::$_data ['allow'];
		}
		 public function getFilename(){
			return self::$_data ['filename'];
		}
		public function setCron_id($value){
			return self::$_data ['cron_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setCron_name($value){
			return self::$_data ['cron_name'] = $value;
			$this;
		}
		public function setSpan($value){
			return self::$_data ['span'] = $value;
			$this;
		}
		public function setNextruntime($value){
			return self::$_data ['nextruntime'] = $value;
			$this;
		}
		public function setAllow($value){
			return self::$_data ['allow'] = $value;
			$this;
		}
		public function setFilename($value){
			return self::$_data ['filename'] = $value;
			$this;
		}
}