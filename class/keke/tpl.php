<?php  defined ( 'IN_KEKE' ) or die ( 'Access Denied' );
/*
	模板文件夹在 tpl 目录下， 默认是default文件夹。
	模板缓存在 data/tpl_c目录下。
*/

class Keke_tpl {
	static function parse_code($tag_code, $tag_id, $tag_type = 'tag') {
		global $_K;
		$tplfile = 'db/' . $tag_type . '_' . $tag_id;
		$objfile = S_ROOT . 'data/tpl_c/' . str_replace ( '/', '_', $tplfile ) . '.php';
		//read
		$tag_code = Keke_tpl::parse_rule ( $tag_code );
		//write
		Keke_tpl::swritefile ( $objfile, $tag_code ) or exit ( "File: $objfile can not be write!" );
		
		return $objfile;
	
	}
	static function parse_template($tpl) {
		global $_K;
		//包含模板
		$tplfile = S_ROOT . './' . $tpl . '.htm';
		$objfile = S_ROOT . './data/tpl_c/' . str_replace ( '/', '_', $tpl ) . '.php';
		//read
		

		if (! file_exists ( $tplfile )) {
			$tpl = str_replace ( '/' . $_K ['template'] . '/', '/default/', $tpl );
			$tplfile = S_ROOT . './' . $tpl . '.htm';
		
		}
		
		$template = Keke_tpl::sreadfile ( $tplfile );
		empty ( $template ) and exit ( "Template file : $tplfile Not found or have no access!" );
		
		$template = Keke_tpl::parse_rule ( $template, $tpl );
		//write
		Keke_tpl::swritefile ( $objfile, $template ) or exit ( "File: $objfile can not be write!" );
	
	}
	/**
	 * 
	 * 解析规则
	 * @param string $content  -html
	 * @param array  $sub_tpls 
	 * @param string $tpl
	 * @return string
	 */
	public static function parse_rule($template, $tpl = null) {
		global $_K;
		//($_K['inajax'])&&ob_start();
		//ob_start();
		$template = preg_replace ( "/\<\!\-\-\{include\s+([a-z0-9_\/]+)\}\-\-\>/ie", "Keke_tpl::readtemplate('\\1')", $template );
		//处理子页面中的代码
		$template = preg_replace ( "/\<\!\-\-\{include\s+([a-z0-9_\/]+)\}\-\-\>/ie", "Keke_tpl::readtemplate('\\1')", $template );
		
		//标签调用
		$template = preg_replace ( "/\<\!\-\-\{tag\s+([^!@#$%^&*(){}<>?,.\'\"\+\-\;\":~`]+)\}\-\-\>/ie", "Keke_tpl::readtag(\"'\\1'\")", $template );
		
		//广告调用
		$template = preg_replace ( "/\<\!\-\-\{showad\((.+?)\)\}\-\-\>/ie", "Keke_tpl::showad('\\1')", $template );
		//多广告调用
		$template = preg_replace ( "/\<\!\-\-\{showads\((.+?)\)\}\-\-\>/ie", "Keke_tpl::showads('\\1')", $template );
		
		//预设广告调用
		$template = preg_replace ( "/\<\!\-\-\{ad_show\((.+?),(.+?)\)\}\-\-\>/ie", "Keke_tpl::ad_show('\\1','\\2')", $template );
		
		$template = preg_replace ( "/\<\!\-\-\{ad_show\((.+?)\)\}\-\-\>/ie", "Keke_tpl::ad_show('\\1')", $template );
		//动态调用
		//$template = preg_replace ( "/\<\!\-\-\{loadfeed\((.+?)\)\}\-\-\>/ie", "Keke_tpl::loadfeed('\\1')", $template );
		//时间处理
		$template = preg_replace ( "/\{date\((.+?),(.+?)\)\}/ie", "Keke_tpl::datetags('\\1','\\2')", $template );
		//货币显示
		$template = preg_replace ( "/{c\:(.+?)(,?)(\d?)\}/ie", "Curren::currtags('\\1','\\3')", $template );
		//头像处理
		$template = preg_replace ( "/\{avatar\((.+?),(.+?)\)\}/ie", "Keke_tpl::avatar('\\1','\\2')", $template );
		//文字裁剪
		$template = preg_replace ( "/\{cutstr\((.+?),(.+?)\)\}/ie", "Keke_tpl::cutstr('\\1','\\2')", $template );
		//PHP代码
		$template = preg_replace ( "/\<\!\-\-\{eval\s+(.+?)\s*\}\-\-\>/ies", "Keke_tpl::evaltags('\\1')", $template );
		//开始处理
		//变量
		$var_regexp = "((\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)(\[[a-zA-Z0-9_\-\.\"\'\[\]\$\x7f-\xff]+\])*)";
		$template = preg_replace ( "/\<\!\-\-\{(.+?)\}\-\-\>/s", "{\\1}", $template );
		$template = preg_replace ( "/([\n\r]+)\t+/s", "\\1", $template );
		$template = preg_replace ( "/(\\\$[a-zA-Z0-9_\[\]\'\"\$\x7f-\xff]+)\.([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/s", "\\1['\\2']", $template );
		$template = preg_replace ( "/\{(\\\$[a-zA-Z0-9_\[\]\'\"\$\.\x7f-\xff]+)\}/s", "<?=\\1?>", $template );
		$template = preg_replace ( "/$var_regexp/es", "Keke_tpl::addquote('<?=\\1?>')", $template );
		$template = preg_replace ( "/\<\?\=\<\?\=$var_regexp\?\>\?\>/es", "Keke_tpl::addquote('<?php echo \\1;?>')", $template );
		//逻辑
		$template = preg_replace ( "/\{elseif\s+(.+?)\}/ies", "Keke_tpl::stripvtags('<?php } elseif(\\1) { ?>','')", $template );
		$template = preg_replace ( "/\{else\}/is", "<?php } else { ?>", $template );
		//循环
		for($i = 0; $i < 6; $i ++) {
			$template = preg_replace ( "/\{loop\s+(\S+)\s+(\S+)\}(.+?)\{\/loop\}/ies", "Keke_tpl::stripvtags('<?php if(is_array(\\1)) { foreach(\\1 as \\2) { ?>','\\3<?php } } ?>')", $template );
			$template = preg_replace ( "/\{loop\s+(\S+)\s+(\S+)\s+(\S+)\}(.+?)\{\/loop\}/ies", "Keke_tpl::stripvtags('<?php if(is_array(\\1)) { foreach(\\1 as \\2 => \\3) { ?>','\\4<?php } } ?>')", $template );
			$template = preg_replace ( "/\{if\s+(.+?)\}(.+?)\{\/if\}/ies", "Keke_tpl::stripvtags('<?php if(\\1) { ?>','\\2<?php } ?>')", $template );
		}
		//常量
		$template = preg_replace ( "/\{([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\}/s", "<?php echo \\1;?>", $template );
		//换行
		$template = preg_replace ( "/ \?\>[\n\r]*\<\? /s", " ", $template );
		
		//附加处理
		$template = "<?php global \$_K,\$_lang; Keke_tpl::checkrefresh('$tpl', '{$_K['timestamp']}' );?>$template<?php Keke_tpl::ob_out();?>";
		
		//替换
		empty ( $_K ['block_search'] ) or $template = str_replace ( $_K ['block_search'], $_K ['block_replace'], $template );
		$template = str_replace("<?=", "<?php echo ", $template);
		return $template;
	}
	
	static function addquote($var) {
		$var =  str_replace ( "\\\"", "\"", preg_replace ( '/\[([a-zA-Z0-9_\-\.\x7f-\xff]+)\]/s', "['\\1']", $var ) );
		return $var;
	}
	/**
	 * 转义页面输入的字符中,防止sql注入
	 * @param string,array $value
	 * @param bool $double_encode
	 * @return string 安全的字符
	 */
	public static function chars($value, $double_encode = FALSE)
	{
		if(CHARSET==='gbk'){
			$charset = 'iso-8859-1';
		}else{
			$charset = CHARSET;
		}
		if(is_array($value) or is_object($value)){
			foreach ($value as $k=>$v){
			   $value[$k]=Keke_tpl::chars($v,$double_encode);
			}
		}else{
			$value = htmlspecialchars( (string) $value, ENT_QUOTES, $charset, $double_encode);
		}
		return $value;
	}
	static function striptagquotes($expr) {
		$expr = preg_replace ( '/\<\?\=(\\\$.+?)\?\>/s', "\\1", $expr );
		$expr = str_replace ( "\\\"", "\"", preg_replace ( '/\[\'([a-zA-Z0-9_\-\.\x7f-\xff]+)\'\]/s', "[\\1]", $expr ) );
		return $expr;
	}
	
	static function evaltags($php) {
		global $_K;
		$_K ['i'] ++;
		$search = "<!--EVAL_TAG_{$_K['i']}-->";
		$_K ['block_search'] [$_K ['i']] = $search;
		$_K ['block_replace'] [$_K ['i']] = "<?php " . Keke_tpl::stripvtags ( $php ) . " ?>";
		return $search;
	}
	
	static function datetags($parameter, $value) {
		global $_K;
		$_K ['i'] ++;
		$search = "<!--DATE_TAG_{$_K['i']}-->";
		$_K ['block_search'] [$_K ['i']] = $search;
		$_K ['block_replace'] [$_K ['i']] = "<?php if({$value}){echo date({$parameter},{$value}); } ?>";
		return $search;
	}
	
	//广告调用
	static function showad($adid) {
		global $_K;
		$content = '<!--{eval Keke_loaddata::ad(' . $adid . ')}-->';
		return $content;
	
	}
	/**
	 * 显示指定位置的广告
	 * @param $target 广告位置代码
	 * @param $do	     当前路由DO
	 */
	static function ad_show($target, $is_slide = null) {
		global $_K, $do;
		$content = '<!--{eval Keke_loaddata::ad_show(\'' . $target . '\',\'' . $do . '\',\'' . $is_slide . '\')}-->';
		return $content;
	}
	static function runwidget($widgetname) {
		global $_K;
		$content = '<!--{eval $widgetname = \'' . $widgetname . '\'; include(S_ROOT.\'widget/run.php\')}-->';
		return $content;
	}
	
	//广告群调用
	static function showads($adname) {
		$content = '<!--{eval Keke_loaddata::adgroup(' . $adname . ')}-->';
		return $content;
	}
	
	/**
	 * 头像调用
	 */
	static function avatar($uid, $size) {
		return '<!--{eval echo "<img class=pic_'.$size.' src=".Keke_user::instance()->get_avatar('.$uid.','.$size.')." >"}-->';
	}
	/**
	 * 文字裁剪
	 * @param string $string
	 * @param int $length
	 * @return string
	 */
	static function cutstr($string,$length){
		return '<!--{eval echo Keke::cutstr('.$string.','.$length.')}-->';
	}
	static function stripvtags($expr, $statement = '') {
		$res = preg_replace ( "/\<\?\=(\\\$.+?)\?\>/s", "\\1", $expr );
		$expr = str_replace ( "\\\"", "\"", $res );
		$statement = str_replace ( "\\\"", "\"", $statement );
		return $expr . $statement;
	}
	
	static function readtemplate($name) {
		global $_K;
		
		$tpl = Keke_tpl::tpl_exists ( $name );
		$tplfile = S_ROOT . './' . $tpl . '.htm';
		
		$sub_tpls [] = $tpl;
		
		if (! file_exists ( $tplfile )) {
			$tplfile = str_replace ( '/' . $_K ['template'] . '/', '/default/', $tplfile );
		}
		$content = trim ( Keke_tpl::sreadfile ( $tplfile ) );
		return $content;
	}
	
	static function readtag($name) {
		global $kekezu; 	
		$content = '<!--{eval Keke_loaddata::readtag(' . $name . ')}-->';
		return $content;
	
	}
	
	/* static function loadfeed($name) {
		$content = '<!--{eval Keke_loaddata::readfeed(' . $name . ')}-->';
		return $content;
	
	} */
	
	//获取文件内容
	static function sreadfile($filename) {
		$content = '';
		if (function_exists ( 'file_get_contents' )) {
			@$content = file_get_contents ( $filename );
		} else {
			if (@$fp = fopen ( $filename, 'r' )) {
				@$content = fread ( $fp, filesize ( $filename ) );
				@fclose ( $fp );
			}
		}
		return $content;
	}
	
	//写入文件
	static function swritefile($filename, $writetext, $openmod = 'w') {
		if (@$fp = fopen ( $filename, $openmod )) {
			flock ( $fp, 2 );
			fwrite ( $fp, $writetext );
			fclose ( $fp );
			return true;
		} else {
			return false;
		}
	}
	//判断字符串$haystack中是否存在字符$needle 返回第一次出现的位置   三个等号 判断绝对相等  uican 2009-12-03
	static function strexists($haystack, $needle) {
		return ! (strpos ( $haystack, $needle ) === FALSE);
	}
	
	static function tpl_exists($tplname) {
		global $_K;
		is_file ( S_ROOT . "tpl/" . $_K ['template'] . "/" . $tplname . ".htm" ) and $tpl = "tpl/{$_K['template']}/$tplname" or $tpl = $tplname;
		return $tpl;
	}
	
	static function template($name) {
		global $_K;
		
		$tpl = Keke_tpl::tpl_exists ( $name );
		$objfile = S_ROOT . 'data/tpl_c/' . str_replace ( '/', '_', $tpl ) . '.php';
		if(! file_exists ( $objfile ) or ! TPL_CACHE){
			Keke_tpl::parse_template ( $tpl );
		}

		return $objfile;
	}
	
	
	/**
	 * //子模板更新检查 
	 *
	 * @param string $subfiles 模板路径
	 * @param int $mktime 时间  
	 * @param string $tpl  当前页面模板
	 */
	static function checkrefresh($tpl, $mktime) {
		global $_K;
		if ($tpl) {
			$tplfile = S_ROOT . './' . $tpl . '.htm';
			(! file_exists ( $tplfile )) and $tplfile = str_replace ( '/' . $_K ['template'] . '/', '/default/', $tplfile );
			$submktime = filemtime ( $tplfile );
			($submktime > $mktime) and Keke_tpl::parse_template ( $tpl );
		}
	}
	
	//调整输出
	static function ob_out() {
		global $_K,$_lang;
		
		$content = ob_get_contents ();
		
		$preg_searchs = $preg_replaces = $str_searchs = $str_replaces = array();
		//if ($_K ['is_rewrite'] == 1) {
			
			/* $preg_searchs [] = '/\<a\s*href\=\"index\.php\/(.+?)\#(\w+)\"/ie';
			$preg_replaces [] = 'Keke_tpl::rewrite_url(\'index-\',\'\\1\',\'\\2\')';
			
			$preg_searchs [] = '/\<a\s*href\=\"index\.php\"/i';
			$preg_replaces [] = '<a href="index.html"';
			
			$preg_searchs [] = '/\<a\s*href\=\"http\:\/\/(.*)\/index\.php\?(.+?)\#(\w+)\"/ie';
			$preg_replaces [] = 'Keke_tpl::rewrite_url(\'http://\\1/index-\',\'\\2\',\'\\3\')';
			
			$preg_searchs [] = '/\<a\s*href\=\"index\.php\?(.+?)\"/ie';
			$preg_replaces [] = 'Keke_tpl::rewrite_url(\'index-\',\'\\1\')';  */
			
			//$content = strtr($content, array('/index.php'=>''));
			
 			//$content = strtr($content, array('/index.php'=>''));
		//}
		//$content = strtr($content, array('/index.php'=>''));
		
		
		if ($_K ['inajax']) {
			$preg_searchs [] = '/([\x01-\x09\x0b-\x0c\x0e-\x1f])+/';
			$preg_replaces [] = ' ';
			
			$str_searchs [] = ']]>';
			$str_replaces [] = ']]&gt;';
		}
		
		if ($preg_searchs) {
			$content = preg_replace ( $preg_searchs, $preg_replaces, $content );
		}
		if ($str_searchs) {
			$content = trim ( str_replace ( $str_searchs, $str_replaces, $content ) );
		}
		 
		Keke_tpl::obclean ();
		($_K ['inajax']) and self::xml_out ( $content );
		
		//echo $content;

	}
	static function obclean() {
		global $_K;
		 if($_K['inajax']==1){
		 	ob_end_clean();
		 	ob_start();
		 }
		 
	}
	static function rewrite_url($pre, $para, $hot = '') {
		$str = '';
		parse_str ( $para, $joint );
	 
		$s = array_filter ( $joint );
		$url = http_build_query ( $s );
		
		$url = str_replace ( array ("do=", '&', '=' ), array ("", '-', '-' ), $url );
		 
		$hot = $hot ? "#" . $hot : '';
		return '<a href="'.$url . '.html' . $hot . '"';
	}
	static function xml_out($content) {
		
		header ( "Expires: -1" );
		header ( "Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE );
		header ( "Pragma: no-cache" );
		header ( "Content-type: application/xml; charset=".CHARSET );
		echo '<' . "?xml version=\"1.0\" encoding=\"".CHARSET."\"?>\n";
		echo "<root><![CDATA[" . trim ( $content ) . "]]></root>";
		exit ();
	}

}