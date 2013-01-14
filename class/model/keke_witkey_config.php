<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_config  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_config' );
			self::$pk = 'k';
		}
		 public function getK(){
			return self::$_data ['k'];
		}
		 public function getV(){
			return self::$_data ['v'];
		}
		 public function getType(){
			return self::$_data ['type'];
		}
		 public function getDesc(){
			return self::$_data ['desc'];
		}
		public function setK($value){
			return self::$_data ['k'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setV($value){
			return self::$_data ['v'] = $value;
			$this;
		}
		public function setType($value){
			return self::$_data ['type'] = $value;
			$this;
		}
		public function setDesc($value){
			return self::$_data ['desc'] = $value;
			$this;
		}
}