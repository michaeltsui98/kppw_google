<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_test  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_test' );
			self::$pk = 'id';
		}
		 public function getId(){
			return self::$_data ['id'];
		}
		 public function getName(){
			return self::$_data ['name'];
		}
		 public function getContent(){
			return self::$_data ['content'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		public function setId($value){
			return self::$_data ['id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setName($value){
			return self::$_data ['name'] = $value;
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
}