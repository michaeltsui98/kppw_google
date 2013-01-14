<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_comment  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_comment' );
			self::$pk = 'comment_id';
		}
		 public function getComment_id(){
			return self::$_data ['comment_id'];
		}
		 public function getObj_id(){
			return self::$_data ['obj_id'];
		}
		 public function getOrigin_id(){
			return self::$_data ['origin_id'];
		}
		 public function getObj_type(){
			return self::$_data ['obj_type'];
		}
		 public function getP_id(){
			return self::$_data ['p_id'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getContent(){
			return self::$_data ['content'];
		}
		 public function getOn_time(){
			return self::$_data ['on_time'];
		}
		 public function getStatus(){
			return self::$_data ['status'];
		}
		public function setComment_id($value){
			return self::$_data ['comment_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setObj_id($value){
			return self::$_data ['obj_id'] = $value;
			$this;
		}
		public function setOrigin_id($value){
			return self::$_data ['origin_id'] = $value;
			$this;
		}
		public function setObj_type($value){
			return self::$_data ['obj_type'] = $value;
			$this;
		}
		public function setP_id($value){
			return self::$_data ['p_id'] = $value;
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
		public function setContent($value){
			return self::$_data ['content'] = $value;
			$this;
		}
		public function setOn_time($value){
			return self::$_data ['on_time'] = $value;
			$this;
		}
		public function setStatus($value){
			return self::$_data ['status'] = $value;
			$this;
		}
}