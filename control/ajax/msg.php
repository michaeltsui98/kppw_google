<?php  defined ('IN_KEKE') or exit ('Access Denied');
/**
 *编辑人 刀客
 *版本   3.0
 *时间  2013-1
 */
class Control_ajax_msg extends Controller{
	function action_index(){
		$to_uid=$_GET['to_uid'];
		$to_username=$_GET['to_username'];
		$redirect_uri=$_GET['redirect_uri'];
		require Keke_tpl::template('ajax/msg');
	}
	/**
	 * 发送信息
	 */
	function action_send(){
		Keke_msg::instance()->send_msg($_POST['to_uid'],$_POST['txt_title'],$_POST['txt_content']);
		$this->request->redirect ($_POST['redirect_uri']);
	}
}
