<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * PHPWind 的用户信息
 * @author Michael	
 * @version 2.2 
 * 2012-11-06
 *
 */
include_once S_ROOT.'client/pw_client/uc_client.php';

class Keke_user_pw extends Keke_user {
 
	function get_user_info($uid,$fields='*', $isuid = 1){
		return Keke_user::instance('keke')->get_user_info($uid,$fields,$isuid);
	}
	
	function get_avatar($uid,$size='middle'){
		
		 $size = in_array ( $size, array ('middle', 'small' ) ) ? $size : 'middle';
		 $user_info = uc_user_get($uid,1);
		 $avatars = explode('|', $user_info['avatar']);
		 $avatar = $avatars[0];
		 if(Keke_valid::not_empty($avatar)){
		 	//自定义图片
		 	if(strpos($avatar, '/')!==FALSE){
		 		$path = UC_API ."/attachment/upload/$size/$avatar";
		 	}else{
		 	  //系统图片
		 		$path = UC_API ."/images/face/$avatar";
		 	}
		 }else{
		 	//默认图片
		 	$path =  UC_API ."/images/face/0.gif";
		 }
		 return $path;
	}
	
	function del_user($uid){
		Keke_user::instance('keke')->del_user($uid);
		uc_user_delete($uid);
	}
	
	function avatar_flash($uid){
		//$db_siteid = uc_db_siteid();
		 
		//$pwServer['HTTP_USER_AGENT'] = 'Shockwave Flash';
		
		//$swfhash = $this->GetVerify($uid,$db_siteid);
		
		$pw_url = rtrim(UC_API,'/');
		
		//$ico_url = 'http://localhost/kppw_google/data/avatar/pw.php?action=uploadicon&verify='.$swfhash.'&wuid='.$uid.'&';
		
		$ico_url = 'http://localhost/kppw_google/data/avatar/pw.php?action=uploadicon&step=2&&url=images/facebg.jpg&imgsize=20480&';
		
		$icon_encode_url  = 'saveFace='.rawurlencode($ico_url);
		
		$html = <<<EOT
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase=" http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="500" height="405" id="FlashVars" align="middle">
		<param name="movie" value="$pw_url/js/face.swf" />
		<param name="wmode" value="transparent"/>
		<param name="FlashVars" value="$icon_encode_url" />
		<!--[if !IE]>-->
		<object type="application/x-shockwave-flash" data="$pw_url/js/face.swf" width="500" height="405" FlashVars="$icon_encode_url" wmode="transparent"  allowScriptAccess="always">
		<!--<![endif]-->
		<p><span style="display:none;">
		<embed src="$pw_url/images/blank.swf" type="application/x-shockwave-flash" wmode="transparent"/></span><em class="s2" style="position:relative;top:3px;">该浏览器尚未安装flash插件，<a href="http://www.adobe.com/go/getflashplayer" target="_blank">点击安装</a></em></p>
        <!--[if !IE]>-->
		</object>
		<!--<![endif]-->
		</object>
EOT;
	return $html;	
	}
	function GetVerify($str, $app = null) {
		//empty($app) && $app = $GLOBALS['db_siteid'];
		return substr(md5($str . $app ), 8, 8);
	}
	
}
