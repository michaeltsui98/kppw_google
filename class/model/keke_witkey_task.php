<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 /** 
 * @copyright keke-tech 
 * @author Michaeltsui98 
 * @version 3.0 2013-1-14 10:09:46 
 */
class Keke_witkey_task  extends Model {
		function  __construct(){
			parent::__construct ( 'witkey_task' );
			self::$pk = 'task_id';
		}
		 public function getTask_id(){
			return self::$_data ['task_id'];
		}
		 public function getModel_id(){
			return self::$_data ['model_id'];
		}
		 public function getNeed_work(){
			return self::$_data ['need_work'];
		}
		 public function getSingle_cash(){
			return self::$_data ['single_cash'];
		}
		 public function getProfit_rate(){
			return self::$_data ['profit_rate'];
		}
		 public function getFail_rate(){
			return self::$_data ['fail_rate'];
		}
		 public function getTask_status(){
			return self::$_data ['task_status'];
		}
		 public function getSub_status(){
			return self::$_data ['sub_status'];
		}
		 public function getTask_title(){
			return self::$_data ['task_title'];
		}
		 public function getTask_desc(){
			return self::$_data ['task_desc'];
		}
		 public function getIndus_id(){
			return self::$_data ['indus_id'];
		}
		 public function getIndus_pid(){
			return self::$_data ['indus_pid'];
		}
		 public function getUid(){
			return self::$_data ['uid'];
		}
		 public function getUsername(){
			return self::$_data ['username'];
		}
		 public function getStart_time(){
			return self::$_data ['start_time'];
		}
		 public function getSub_time(){
			return self::$_data ['sub_time'];
		}
		 public function getEnd_time(){
			return self::$_data ['end_time'];
		}
		 public function getSp_time(){
			return self::$_data ['sp_time'];
		}
		 public function getDelay_time(){
			return self::$_data ['delay_time'];
		}
		 public function getDelay_cash(){
			return self::$_data ['delay_cash'];
		}
		 public function getCity(){
			return self::$_data ['city'];
		}
		 public function getTask_cash(){
			return self::$_data ['task_cash'];
		}
		 public function getReal_cash(){
			return self::$_data ['real_cash'];
		}
		 public function getCover_id(){
			return self::$_data ['cover_id'];
		}
		 public function getView_num(){
			return self::$_data ['view_num'];
		}
		 public function getWork_num(){
			return self::$_data ['work_num'];
		}
		 public function getLeave_num(){
			return self::$_data ['leave_num'];
		}
		 public function getFocus_num(){
			return self::$_data ['focus_num'];
		}
		 public function getMark_num(){
			return self::$_data ['mark_num'];
		}
		 public function getAtt_cash(){
			return self::$_data ['att_cash'];
		}
		 public function getContact(){
			return self::$_data ['contact'];
		}
		 public function getAtt_desc(){
			return self::$_data ['att_desc'];
		}
		 public function getIs_delay(){
			return self::$_data ['is_delay'];
		}
		 public function getR_task_id(){
			return self::$_data ['r_task_id'];
		}
		 public function getIs_top(){
			return self::$_data ['is_top'];
		}
		 public function getIs_auto_bid(){
			return self::$_data ['is_auto_bid'];
		}
		 public function getPoint(){
			return self::$_data ['point'];
		}
		public function setTask_id($value){
			return self::$_data ['task_id'] = $value;
			self::$pk_val = $value;
			$this;
		}
		public function setModel_id($value){
			return self::$_data ['model_id'] = $value;
			$this;
		}
		public function setNeed_work($value){
			return self::$_data ['need_work'] = $value;
			$this;
		}
		public function setSingle_cash($value){
			return self::$_data ['single_cash'] = $value;
			$this;
		}
		public function setProfit_rate($value){
			return self::$_data ['profit_rate'] = $value;
			$this;
		}
		public function setFail_rate($value){
			return self::$_data ['fail_rate'] = $value;
			$this;
		}
		public function setTask_status($value){
			return self::$_data ['task_status'] = $value;
			$this;
		}
		public function setSub_status($value){
			return self::$_data ['sub_status'] = $value;
			$this;
		}
		public function setTask_title($value){
			return self::$_data ['task_title'] = $value;
			$this;
		}
		public function setTask_desc($value){
			return self::$_data ['task_desc'] = $value;
			$this;
		}
		public function setIndus_id($value){
			return self::$_data ['indus_id'] = $value;
			$this;
		}
		public function setIndus_pid($value){
			return self::$_data ['indus_pid'] = $value;
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
		public function setStart_time($value){
			return self::$_data ['start_time'] = $value;
			$this;
		}
		public function setSub_time($value){
			return self::$_data ['sub_time'] = $value;
			$this;
		}
		public function setEnd_time($value){
			return self::$_data ['end_time'] = $value;
			$this;
		}
		public function setSp_time($value){
			return self::$_data ['sp_time'] = $value;
			$this;
		}
		public function setDelay_time($value){
			return self::$_data ['delay_time'] = $value;
			$this;
		}
		public function setDelay_cash($value){
			return self::$_data ['delay_cash'] = $value;
			$this;
		}
		public function setCity($value){
			return self::$_data ['city'] = $value;
			$this;
		}
		public function setTask_cash($value){
			return self::$_data ['task_cash'] = $value;
			$this;
		}
		public function setReal_cash($value){
			return self::$_data ['real_cash'] = $value;
			$this;
		}
		public function setCover_id($value){
			return self::$_data ['cover_id'] = $value;
			$this;
		}
		public function setView_num($value){
			return self::$_data ['view_num'] = $value;
			$this;
		}
		public function setWork_num($value){
			return self::$_data ['work_num'] = $value;
			$this;
		}
		public function setLeave_num($value){
			return self::$_data ['leave_num'] = $value;
			$this;
		}
		public function setFocus_num($value){
			return self::$_data ['focus_num'] = $value;
			$this;
		}
		public function setMark_num($value){
			return self::$_data ['mark_num'] = $value;
			$this;
		}
		public function setAtt_cash($value){
			return self::$_data ['att_cash'] = $value;
			$this;
		}
		public function setContact($value){
			return self::$_data ['contact'] = $value;
			$this;
		}
		public function setAtt_desc($value){
			return self::$_data ['att_desc'] = $value;
			$this;
		}
		public function setIs_delay($value){
			return self::$_data ['is_delay'] = $value;
			$this;
		}
		public function setR_task_id($value){
			return self::$_data ['r_task_id'] = $value;
			$this;
		}
		public function setIs_top($value){
			return self::$_data ['is_top'] = $value;
			$this;
		}
		public function setIs_auto_bid($value){
			return self::$_data ['is_auto_bid'] = $value;
			$this;
		}
		public function setPoint($value){
			return self::$_data ['point'] = $value;
			$this;
		}
}