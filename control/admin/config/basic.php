<?php  defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * 全局配置管理控制层
 * @author Michael
 * 2012-10-06
 */
class Control_admin_config_basic extends  Control_admin {
    /**
     * 初始化加载页面，
     * @param string $type 确定加载那个配置模板文件
     */
	function action_index($type=NULL){
		//定义全局变量与语言包，只要加载模板，这个是必须要定义.操
		global $_K,$_lang;
	 	//基本uri,当前请求的uri ,本来是能通过Rotu类可以得出这个uri,为了程序灵活点，自己手写好了
		$base_uri = BASE_URL."/index.php/admin/config_basic";
		//定义配置类型，默认为web型 
		//列表数据,系统初始化时已经有了,这里无须再查
		$config_arr = Keke::$_sys_config;
		//语言列表
		$lang_arr = Keke::$_lang_list;
		//默认为系统配置模板
		if(isset($_GET['type'])){
			$type = $_GET['type'];
		}elseif(!isset($type)){
			$type = 'web';
		}
		//微博接口的中文名称
		$oauth_type_list = Keke_global::get_open_api();
		if($type=='weibo'){
			$api_open  = unserialize($config_arr['oauth_api_open']);
		}
		if($type=='focus'){
			$api_open  = unserialize($config_arr['attent_api_open']);
			//关注中不需要的接口
			unset($oauth_type_list['qq']);
			unset($oauth_type_list['taobao']);
			unset($oauth_type_list['alipay']);
		}
		//var_dump($oauth_type_list,$api_open);
		
		
		require Keke_tpl::template('control/admin/tpl/config/'.$type);
	}
	/**
	 * 基本配置
	 */
	function action_basic(){
		$this->action_index('basic');
	}
	/**
	 * seo配置 
	 */
	function action_seo(){
		$this->action_index('seo');
	}
	/**
	 * 邮件配置
	 */
	function action_mail(){
		$this->action_index('mail');
	}
	/**
	 * 地图配置 
	 */
	function action_map(){
		$this->action_index('map');
	}
	/**
	 * 基本配置
	 */
	function action_sys(){
		$this->action_index('basic');
	}
	/**
	 * 微博
	 */
	function action_weibo(){
		$this->action_index('weibo');
	}
	/**
	 * 加关注
	 */
	function action_focus(){
		$this->action_index('focus');
	}
	/**
	 * 保存配置数据
	 */
	function action_save(){
		global $_lang;
		$_POST = Keke_tpl::chars($_POST);
		//防止跨域提交，你懂的
		Keke::formcheck($_POST['formhash']);
		$type = $_POST['type'];
		//这里怎么说呢，定义生成sql 的字段=>值 的数组，你不懂，就是你太二了.
		$values = $_POST;
		unset($values['formhash']);
		unset($values['type']);
		unset($values['api']);
		//邮件账号简单加密一下
		if(isset($values['account_pwd'])){
			$values['account_pwd'] = base64_encode($_POST['account_pwd']);
		}
		//weibo oauth接口，是否开启
		if($_POST['type']==='weibo'){
			$values['oauth_api_open']  = serialize($_POST['api']);
		}
		//weibo关注接口
		if($_POST['type']==='focus'){
			$values['attent_api_open'] = serialize($_POST['api']);
		}
	
		foreach ($values as $k=>$v) {
			$where = "k = '$k'";
			DB::update('witkey_config')->set(array('v'))->value(array($v))->where($where)->execute();
		}
		
		Cache::instance()->del('keke_config');
		//执行完了，要给一个提示，这里没有对执行的结果做判断，是想偷下懒，如果执行失败的话，肯定给会报红的。亲!
		Keke::show_msg($_lang['submit_success'],'admin/config_basic/index?type='.$type,'success');
		
	}
	/**
	 * 发送测试邮件
	 */
	public static function action_send_mail(){
		global $_K,$_lang;
		$config_arr = Keke::$_sys_config;
		$mail = new Phpmailer_class ();
		if ($config_arr['mail_server_cat'] == "smtp") {
			$mail->IsSMTP ();
			$mail->SMTPAuth = true;
			$mail->CharSet = ($_K ['charset']);
			$mail->Host = $config_arr['smtp_url'];
			$mail->Port = $config_arr['mail_server_port'];
			$mail->Username = $config_arr['post_account'];
			$mail->Password = base64_decode($config_arr['account_pwd']);
		
		} else {
			$mail->IsMail ();
		}
		$mail->SetFrom ( $config_arr['post_account'], $config_arr['website_name'] );
		
		$mail->AddReplyTo ( $config_arr['mail_replay'], $config_arr['website_name'] );
		
		$mail->Subject = $_lang['keke_mail_testing'];
		
		$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
		$body = $_lang['test_mail_sent_successfully'];
		$mail->MsgHTML ( $body );
		$mail->AddAddress ( $_GET['email'], $config_arr['website_name'] );
		if (! $mail->Send ()) {
			echo  $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
	}
	/**
	 * 加载伪静态规则 
	 */
	function action_seo_rule(){
		global $_K,$_lang;
		
		require Keke_tpl::template('control/admin/tpl/config/seo_rule');
		
	}
	
}
