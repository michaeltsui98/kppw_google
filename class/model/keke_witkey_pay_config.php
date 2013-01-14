<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_pay_config  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_pay_config' );
			self::$pk = 'k';
		}
		 public function getK(){
			return self::$_data ['k'];
		}
		 public function getV(){
			return self::$_data ['v'];
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
}