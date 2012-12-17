<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
class Control_captcha extends Controller{
   
	
	/**
	 * 初始化验证码图形
	 */
	function action_index(){
		$style = 'basic';
		if(($id = $this->request->param('id'))!==null){
			$style = $id;
		}
		
		if(($ids = $this->request->param('ids'))!==null){
			//图片输出的高宽
			list($w,$h) = explode('/', $ids);
		}
	    Keke_captcha::instance($w,$h,$style)->render(false);
	}
	/**
	 * 检查code
	 */
	function action_check(){
		 
		//验证码
		if(($code = $this->request->param('id'))!==null){
			//不能请求 Keke_captcah::valid()，否则SESSION会刷新，所以这里
			//只做验证不刷新SESSION;
			echo ( bool ) (sha1 ( strtoupper ( $code ) ) === $_SESSION ['Keke_captcha_response']);
		}
		 
	}
	function action_test(){
		echo true;
	}
}