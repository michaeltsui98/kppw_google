<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );

/**
 * this not free,powered by keke-tech
 * @auther 九江
 * 
 */

class Keke_base {
	
	/**
	 * 方法功能的描述与说明
	 * 过滤form提交的$GET和$POST的值
	 * @parmers string $string
	 *
	 * @return 数据类型 (string)
	 */
	static public function k_addslashes($string) {
		
		if (is_array ( $string )) {
			$key = array_keys ( $string );
			$s = sizeof ( $key );
			for($i = 0; $i < $s; $i ++) {
				$string [$key [$i]] = self::k_addslashes ( $string [$key [$i]] );
			}
		} else {
			$string = addslashes ( trim ( $string ) );
		}
		return $string;
	}
    /**
     * 循环清理输入的变量 ,主要是为了那个开了安全模式的二B
     * @param string $value
     * @return 干净的变量 
     */
	public static function k_stripslashes($value)
	{
		if (is_array($value) OR is_object($value)){
			foreach ($value as $key => $val){
				// 转义每一个变量 
				$value[$key] = Keke::k_stripslashes($val);
			}
		}elseif (is_string($value)){
			if (Keke::$_magic_quote === TRUE){
				// 清除加的转义符
				$value = stripslashes($value);
			}
	
			if (strpos($value, "\r") !== FALSE){
				// 去掉换行符
				$value = str_replace(array("\r\n", "\r"), "\n", $value);
			}
		}
	
		return $value;
	}
	/**
	 * 盖楼函数
	 *
	 * @param $int $nodeid
	 *        	-- 顶级父ID的值
	 * @param $arTree array
	 *        	-- 数组
	 */
	static function sort_tree($nodeid, $data_arr, $pid = "indus_pid", $id = "indus_id") {
		$res = array ();
		for($i = 0; $i < sizeof ( $data_arr ); $i ++)
			if ($data_arr [$i] ["$pid"] == $nodeid) {
			array_push ( $res, $data_arr [$i] );
			$subres = self::sort_tree ( $data_arr [$i] ["$id"], $data_arr, $pid, $id );
			for($j = 0; $j < sizeof ( $subres ); $j ++)
				array_push ( $res, $subres [$j] );
		}
		return $res;
	}
	
 
	/**
	 *
	 * Enter 字符串星号装换
	 * @param string $str
	 * @param int $start    开始位置
	 * @param int $end		倒数多少个字符结束
	 * @param int $start_num  要替换成多少星星
	 * @param string $preg_str  要替换的特殊字符串
	 */
	public static function set_star($str, $start, $end, $start_num = 3, $preg_str = "*") {
		if (strlen ( $str ) <= ($start + $end)) {
				
			return $str;
		}
		$start_str = mb_strcut ( $str, 0, $start, CHARSET );
		$tmp_str = mb_strcut ( $str, 0, - $end, CHARSET );
		$end_str = mb_strcut ( $str, mb_strlen ( $tmp_str ), mb_strlen ( $str ) );
		$replace_str = str_repeat ( $preg_str, $start_num );
		return $start_str . $replace_str . $end_str;
	}
	/**
	 * 二级域名跳转。仅支持空间的二级
	 */
	static function redirect_second_domain() {
		global $_K;
		if (Keke::$_sys_config ['second_domain']) { //开启
			$host = $_SERVER ['HTTP_HOST'];
			preg_match ( '/^(\d+)\./', $host, $m );
			if ($m [1]) { //空间二级域名
				$uid = intval ( $m [1] );
				$e = Dbfactory::query ( sprintf ( ' select uid from %switkey_member where uid=%d', TABLEPRE, $uid ) );
				if ($e) {
					header ( 'Location:' . $_K ['siteurl'] . '/index.php?do=space&member_id=' . $uid . '&' . $_SERVER ['QUERY_STRING'] );
				} else {
					header ( 'Location:' . $_K ['siteurl'] . '/index.php?do=error&type=user' );
				}
			}
		}
	}
	/**
	 * 构造个人空间链接
	 * [可构造二级域名]
	 * @param int $mid 用户编号
	 */
	static function build_space_url($mid) {
		global $_K;
		if (Keke::$_sys_config ['second_domain']) { //开启二级域名
			$top = Keke::$_sys_config ['top_domain'];
			$p_url = preg_replace ( '/(\w*\.)?' . $top . '/', $mid . '.' . $top, $_K ['siteurl'] );
		} else {
			$p_url = $_K ['siteurl'] . "/index.php?do=space&member_id=$mid";
		}
		return $p_url;
	}
	
 
	static function send_mail($address, $title, $body) {
		global $_K;
		$basicconfig = Keke::$_sys_config;
		$mail = new Phpmailer_class ();
		if ($basicconfig ['mail_server_cat'] == "smtp" and function_exists ( 'fsockopen' )) {
				
			$mail->IsSMTP ();
			$mail->SMTPAuth = true;
			//$mail->CharSet = strtolower ( $_K ['charset'] );
			// $mail->SMTPSecure = "tsl";
			$mail->Host = $basicconfig ['smtp_url'];
			$mail->Port = $basicconfig ['mail_server_port'];
			$mail->Username = $basicconfig ['post_account'];
			$mail->Password = base64_decode ( $basicconfig ['account_pwd'] );
	
		} else {
			$mail->IsMail ();
		}
		$mail->CharSet = CHARSET=='gbk'?'iso-8859-1':CHARSET;
		$mail->SetFrom ( $basicconfig ['post_account'], $basicconfig ['website_name'] );
	
		if ($basicconfig ['mail_replay']){
			$mail->AddReplyTo ( $basicconfig ['mail_replay'], $basicconfig ['website_name'] );
		}	
	
		$mail->Subject = $title;

		$mail->MsgHTML ( $body );
	
		$mail->AddAddress ( $address);
	
		return $mail->Send ();
	}
	/**
	 * 按主键重组数组
	 *
	 * @param 数组 $arr        	
	 * @param 键名字 $key        	
	 */
	static public function get_arr_by_key($arr = array(), $key) {
		$size = sizeof ( $arr );
		$tmp = array ();
		
		for($i = 0; $i < $size; $i ++) {
			$tmp [$arr [$i] [$key]] = $arr [$i];
		}
		//去掉空值
		$tmp =  array_filter($tmp,array('Model','remove_null')); 
		return $tmp;
	}
	static function escape($string) {
		$search = array ('/</i', '/>/i', '/\">/i', '/\bunion\b/i', '/load_file(\s*(\/\*.*\*\/)?\s*)+\(/i', '/into(\s*(\/\*.*\*\/)?\s*)+outfile/i', '/\bor\b/i', '/\<([\/]?)script([^\>]*?)\>/si', '/\<([\/]?)iframe([^\>]*?)\>/si', '/\<([\/]?)frame([^\>]*?)\>/si' );
		$replace = array ('&lt;', '&gt;', '&quot;&gt;', 'union&nbsp;', 'load_file&nbsp; (', 'into&nbsp; outfile', 'or&nbsp;', '&lt;\\1script\\2&gt;', '&lt;\\1iframe\\2&gt;', '&lt;\\1frame\\2&gt;' );
		if (is_array ( $string )) {
			$key = array_keys ( $string );
			$size = sizeof ( $key );
			for($i = 0; $i < $size; $i ++) {
				$string [$key [$i]] = self::escape ( $string [$key [$i]] );
			}
		} else {
			$string = str_replace ( array ('\n', '\r' ), array (chr ( 10 ), chr ( 13 ) ), preg_replace ( $search, $replace, $string ) );
		}
		
		return $string;
	}
	static function filter_xss() {
		global $_lang;
		Keke_lang::loadlang ( 'public', 'public' );
		$temp = strtoupper ( urldecode ( urldecode ( $_SERVER ['REQUEST_URI'] ) ) );
		
		if (strpos ( $temp, '<' ) !== false || strpos ( $temp, '>' ) !== false || strpos ( $temp, '"' ) !== false || strpos ( $temp, 'CONTENT-TRANSFER-ENCODING' ) !== false) {
			
			Keke::show_msg ( $_lang ['operate_notice'], "index.php", 9999, $_lang ['xss_attack_warning_notice'], "error" );
			die ();
		}
		return true;
	}
	/**
	 * 过滤通过文本输入的内容中的特殊标签
	 * [input|textarea|button|marquee|iframe|frame...]
	 * Enter description here ...
	 * @param unknown_type $string
	 */
	static function filter_input($str) {
		if (is_array ( $str )) {
			$key = array_keys ( $str );
			$s = sizeof ( $str );
			for($i = 0; $i < $s; $i ++) {
				$str [$key [$i]] = self::filter_input ( $str [$key [$i]] );
			}
		} else {
			$str = htmlspecialchars_decode ( $str );
			$str = preg_replace ( '/<(input|textarea|select|button|marquee|iframe|frame|form|script)/', '</\\1', $str );
		}
		return $str;
	}
	/**
	 * 无限分类显示
	 *
	 * @param 输入 $array        	
	 * @param 输出 $temp_arr        	
	 * @param 显示方式 $out  (option,cat,list);
	 * @param 选中项索引 $index
	 * selected=selected
	 */
	static function get_tree($array, &$temp_arr, $out = 'option', $index = null, $id = 'indus_id', $pid = 'indus_pid', $name = 'indus_name') {
		$tree = array ();
		
		if ($array) {
			foreach ( $array as $v ) {
				$pt = $v [$pid];
				$list = @$tree [$pt] ? $tree [$pt] : array ();
				array_push ( $list, $v );
				$tree [$pt] = $list;
			}
		}
		if ($tree) {
			
			$tree [0] or $tree [0] = $tree [$array [0] [$pid]];
			
			foreach ( $tree [0] as $k => $v ) {
				if ($out == 'option') {
					if ($index == $v [$id]) {
						$temp_arr [] = "<option value=$v[$id] selected=selected>$v[$name]</option>";
					} else {
						$temp_arr [] = "<option value=$v[$id]>$v[$name]</option>";
					}
				
				} elseif ($out == 'cat') {
					$v ['ext'] = '';
					$temp_arr [] = $v;
				} else {
					
					isset ( $v [$name] ) and $v ['ext'] = $v [$name];
					$v ['level'] = 0;
					$temp_arr [] = $v;
				
				}
				if ($tree [$v [$id]])
					self::draw_tree ( $tree [$v [$id]], $tree, 0, $temp_arr, $out, $index, $id, $pid, $name );
			}
		
		}
	}
	
	static function draw_tree($arr, $tree, $level, &$temp_arr, $out, $index, $id, $pid, $name) {
		$level ++;
		$prefix = str_pad ( " |", $level + 2, '---', STR_PAD_RIGHT );
		$n = str_pad ( '', $level + 2, '--', STR_PAD_RIGHT );
		$n = str_replace ( "-", "&nbsp;", $n );
		foreach ( $arr as $k2 => $v2 ) {
			if ($out == 'option') {
				if ($index == $v2 [$id]) {
					$temp_arr [] = "<option value={$v2[$id]} selected=selected>$n$prefix$v2[$name]</option>";
				} else {
					$temp_arr [] = "<option value={$v2[$id]}>$n$prefix$v2[$name]</option>";
				}
			
			} elseif ($out == 'cat') {
				$v2 ['ext'] = $n . $prefix;
				$v2 ['level'] = $level;
				$temp_arr [] = $v2;
			} else {
				// ┗
				isset ( $v2 [$name] ) and $v2 ['ext'] = $n . "┣" . $v2 [$name];
				$v2 ['level'] = $level;
				$temp_arr [] = $v2;
			}
			if (isset ( $tree [$v2 [$id]] )) {
				self::draw_tree ( $tree [$v2 [$id]], $tree, $level, $temp_arr, $out, $index, $id, $pid, $name );
			}
		
		}
	
	}
	// gbk是gb2312(简体中文)的扩展,包括繁体等
	static function gbktoutf($string) {
		$string = self::charset_encode ( "gbk", "utf-8", $string );
		return $string;
	}
	//那个SB再把gbk 改成gb2312了，我艹
	static function utftogbk($string) { 
		$string = self::charset_encode ( "utf-8", "gbk", $string );
		return $string;
	}
	
	static function objtoarray($obj) {
		if (is_object ( $obj )) {
			$obj = ( array ) $obj;
		}
		if ($obj)
			foreach ( $obj as $k => $o ) {
				if (is_object ( $o ) || is_array ( $o )) {
					$obj [$k] = self::objtoarray ( $o );
				}
			}
		return $obj;
	
	}
	
	static function charset_encode($_input_charset, $_output_charset, $input) {
		$output = "";
		$string = $input;
		if (is_array ( $input )) {
			$key = array_keys ( $string );
			$size = sizeof ( $key );
			for($i = 0; $i < $size; $i ++) {
				$string [$key [$i]] = self::charset_encode ( $_input_charset, $_output_charset, $string [$key [$i]] );
			}
			return $string;
		} else {
			if (! isset ( $_output_charset ))
				$_output_charset = $_input_charset;
			if ($_input_charset == $_output_charset || $input == null) {
				$output = $input;
			} elseif (function_exists ( "mb_convert_encoding" )) {
				$output = mb_convert_encoding ( $input, $_output_charset, $_input_charset );
			} elseif (function_exists ( "iconv" )) {
				$output = iconv ( $_input_charset, $_output_charset, $input );
			} else
				die ( "sorry, you have no libs support for charset change." );
			
			return $output;
		}
	}


	/**
	 * echo json
	 *
	 * @param unknown_type $msg        	
	 * @param unknown_type $status        	
	 * @param unknown_type $dataarr        	
	 */
	static function echojson($msg = '', $status = 0, $dataarr = array()) {
		if (CHARSET == 'gbk') {
			$msg = self::gbktoutf ( $msg );
			$status = self::gbktoutf ( $status );
			$dataarr = self::gbktoutf ( $dataarr );
		}
		
		$arr = array ('msg' => $msg, 'status' => $status, 'data' => $dataarr );
		echo self::json_encode_k ( $arr );
		exit ();
	}
	static function json_encode_k($array) {
		if (function_exists ( 'json_encode' )) {
			return json_encode ( $array );
		} else {
			$json_obj = new json;
			return $json_obj->encode ( $array );
		}
	}
	
	// strtotime的重写， 如果不重置时间区， 会自动的被减去8小时
	static function sstrtotime($time, $now = null) {
		date_default_timezone_set ( 'Etc/GMT' );
		$time = strtotime ( $time, $now );
		date_default_timezone_set ( 'Asia/Shanghai' );
		return $time;
	}
	/**
	 * 随机生成字符串
	 *
	 * @param Int $length        	
	 * @return String Time Elapsed
	 * @author shangjinglong
	 * @copyright keke-tech
	 */
	static function randomkeys($length) {
		$key = null;
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz
                   ABCDEFGHIJKLOMNOPQRSTUVWXYZ'; // 字符池
		for($i = 0; $i < $length; $i ++) {
			$key .= $pattern {mt_rand ( 0, 35 )}; // 生成php随机数
		}
		return $key;
	
	}
	/**
	 * 获取随即客服
	 */
	static function get_rand_kf() {
		$kf_arr = Keke::get_table_data ( 'uid', 'witkey_space', ' group_id = 7' );
		$kf_arr_count = count ( $kf_arr );
		$randno = rand ( 0, $kf_arr_count - 1 );
		return $kf_uid = $kf_arr [$randno] [uid] ? $kf_arr [$randno] [uid] : ADMIN_UID;
	}
	
	/**
	 *
	 *
	 *
	 * 将时间戳转化为
	 *
	 * @param unknown_type $time        	
	 */
	public static function time2Units($time, $limit = null) {
		global $_lang;
		$tt = getdate ();
		$tt = $tt ['year'];
		
		$year = floor ( $time / 60 / 60 / 24 / 365 );
		$time -= $year * 60 * 60 * 24 * 365;
		$month = floor ( $time / 60 / 60 / 24 / 30 );
		$time -= $month * 60 * 60 * 24 * 30;
		$day = floor ( $time / 60 / 60 / 24 );
		$time -= $day * 60 * 60 * 24;
		$hour = floor ( $time / 60 / 60 );
		$time -= $hour * 60 * 60;
		$minute = floor ( $time / 60 );
		$time -= $minute * 60;
		$second = $time;
		$elapse = '';
		$unitArr = array ($_lang ['year'] => 'year', $_lang ['months'] => 'month', $_lang ['day'] => 'day', $_lang ['hour'] => 'hour', $_lang ['minute'] => 'minute' );
		
		foreach ( $unitArr as $cn => $u ) {
			if ($$u > 0) {
				$elapse .= $$u . $cn;
			
			}
			if ($u == $limit) {
				return $elapse;
			}
		}
		return $elapse;
	}
	
	/**
	 * 时间差计算
	 *
	 * @param Timestamp $time        	
	 * @return String Time Elapsed
	 * @author shangjinglong
	 * @copyright keke-tech
	 */
	
	static function time_to_units($end_time) {
		global $_lang;
		$now = time (); // 当前时间
		$res = $end_time - $now;
		$oneday = 24 * 60 * 60; // 一天的时间秒数
		$onehour = 60 * 60; // 一小时秒数
		if ($res <= 0) {
			$res = $_lang ['choosing'];
		} else if ($res > 0 && $res < $oneday) {
			$res = $_lang ['going_to_expired'];
		} else {
			if ($res / $oneday > 0) {
				$day = floor ( $res / $oneday ); // 天
				$left_sec = $res % $oneday; // 剩余的秒
				

				if ($left_sec / $onehour > 0) {
					$hour = number_format ( ($left_sec / $oneday) * 24, 0 ); // 小时
				} else
					$hour = 0; // 小时
			} else {
				$day = 0; // 天
				$left_sec = $res % $oneday; // 剩余的秒
				if ($left_sec / $onehour > 0) {
					$hour = number_format ( ($left_sec / $oneday) * 24, 0 ); // 小时
				} else
					$hour = 0; // 小时
			}
			$res = $day . $_lang ['day'] . $hour . $_lang ['hour'];
		}
		return $res;
	}
	
	// 用户中心－图片更新 end
	static function cutstr($string, $length, $in_slashes = 0, $out_slashes = 0, $censor = '', $html = 0) {
		global $_K;
		
		$string = trim ( $string );
		
		if ($in_slashes) {
			// 传入的字符有slashes
			$string = stripslashes ( $string );
		}
		if ($html < 0) {
			// 去掉html标签
			$string = preg_replace ( '/(\<[^\<]*\>|\r|\n|\s|\[.+?\])/is', ' ', $string );
			$string = htmlspecialchars ( $string );
		} elseif ($html == 0) {
			// 转换html标签
			$string = htmlspecialchars ( $string );
		}
		if ($length && strlen ( $string ) > $length) {
			// 截断字符
			$wordscut = '';
			if ($_K ['charset'] == 'utf-8') {
				// utf8编码
				$n = 0;
				$tn = 0;
				$noc = 0;
				while ( $n < strlen ( $string ) ) {
					$t = ord ( $string [$n] );
					if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
						$tn = 1;
						$n ++;
						$noc ++;
					} elseif (194 <= $t && $t <= 223) {
						$tn = 2;
						$n += 2;
						$noc += 2;
					} elseif (224 <= $t && $t < 239) {
						$tn = 3;
						$n += 3;
						$noc += 2;
					} elseif (240 <= $t && $t <= 247) {
						$tn = 4;
						$n += 4;
						$noc += 2;
					} elseif (248 <= $t && $t <= 251) {
						$tn = 5;
						$n += 5;
						$noc += 2;
					} elseif ($t == 252 || $t == 253) {
						$tn = 6;
						$n += 6;
						$noc += 2;
					} else {
						$n ++;
					}
					if ($noc >= $length) {
						break;
					}
				}
				if ($noc > $length) {
					$n -= $tn;
				}
				$wordscut = substr ( $string, 0, $n );
			} else {
				for($i = 0; $i < $length - 1; $i ++) {
					if (ord ( $string [$i] ) > 127) {
						$wordscut .= $string [$i] . $string [$i + 1];
						$i ++;
					} else {
						$wordscut .= $string [$i];
					}
				}
			}
			$string = $wordscut . $censor;
		}
		
		if ($out_slashes) {
			$string = addslashes ( $string );
		}
		$string = htmlspecialchars_decode ( $string );
		return trim ( $string );
	}
	/**
	 * 关键词过滤
	 */
	static function str_filter($content = '') {
		global $_K;
		if (is_array ( $content )) {
			foreach ( $content as $k => $v ) {
				$content [$k] = self::str_filter ( $v );
			}
			return $content;
		} else {
			$censor = $_K ['ban_content'];
			if (empty ( $censor ) || $content == '*' || $content == '?') {
				return $content;
			}
			$censor_arr = explode ( '|', $censor );
			$censor_arr = array_filter ( $censor_arr );
			foreach ( $censor_arr as $v ) {
				if (! ($v == '*' || $v == '?')) {
					$find [] = '/' . $v . '/i';
					$replase [] = '*';
				}
			}
			
			return preg_replace ( $find, $replase, $content );
		
		}
	}
	
	/**
	 * 用户名是否含有敏感词
	 * @param string $k
	 * @return boolean
	 */
	static function k_strpos($k) {
		global $_K;
		$user_arr = explode ( '|', $_K ['ban_users'] );
		$r = '';
		foreach ( $user_arr as $value ) {
			if (preg_match ( '/' . $value . '/', $k )) {
				$r = $value;
				break;
			}
		}
		return $r ? true : false;
	}
	// 在内容中匹配关键字
	public static function k_match($k_arr=NULL, $content) {
		$m = 0;
		foreach ( $k_arr as $value ) {
			if (preg_match ( '/' . $value . '/', $content )) {
				$m += 1;
			}
		}
		return $m;
	
	}
	
	/**
	 * 生成表单hash
	 *
	 * @return hash值
	 */
	static function formhash() {
		
		 $token = $_SESSION['security_token'];
		 if(!isset($token)){
		 	$token = sha1(uniqid(null,true));
		 	$_SESSION['security_token'] = $token;
		 }
		  
		 return $token;
	}
	/**
	 *
	 * 表单检查防止重复提交与跨服务器提交
	 * @param $var hash值        	
	 * @param $return_json 指定返回值类型(返回bool值,还是直接show_msg)        	
	 *
	 */
	static function formcheck($var, $return_json = false) {
		global $_lang;
		global $_K;
		if (! empty ( $var ) && $_SERVER ['REQUEST_METHOD'] == 'POST') {
			if ((empty ( $_SERVER ['HTTP_REFERER'] ) || preg_replace ( '/https?:\/\/([^\:\/]+).*/i', "\\1", $_SERVER ['HTTP_REFERER'] ) == preg_replace ( '/([^\:]+).*/', "\\1", $_SERVER ['HTTP_HOST'] )) and $var == FORMHASH) {
				return true;
			} elseif ($return_json == true) {
				return false;
			} elseif ($_K ['inajax']) {
				echo Request::current()->referrer();die;
				Keke::show_msg ( $_lang ['repeat_form_submit'], $_SERVER ['HTTP_REFERER'],  'error' );
			} else {
				Keke::show_msg ( $_lang ['illegal_or_repeat_submit'], Request::current()->referrer(),   'error' );
			}
		} else {
			return false;
		}
	}

	static function show_error($data = '') {
		require Keke_tpl::template ( 'tpl/default/show_error' );
	}
	static function get_ip() {
		global $_lang;
		if (! empty ( $_SERVER ["HTTP_CLIENT_IP"] ))
			$cip = $_SERVER ["HTTP_CLIENT_IP"];
		else if (! empty ( $_SERVER ["HTTP_X_FORWARDED_FOR"] ))
			$cip = $_SERVER ["HTTP_X_FORWARDED_FOR"];
		else if (! empty ( $_SERVER ["REMOTE_ADDR"] ))
			$cip = $_SERVER ["REMOTE_ADDR"];
		else
			$cip = $_lang ['can_not_get'];
		return $cip;
	}
	/**
	 * 处理js escape 编码
	 */
	static function unescape($escstr) {
		
		preg_match_all ( "/%u[0-9A-Za-z]{4}|%.{2}|[0-9a-zA-Z.+-_]+/", $escstr, $matches );
		$ar = &$matches [0];
		$c = "";
		foreach ( $ar as $val ) {
			if (substr ( $val, 0, 1 ) != "%") {
				$c .= $val;
			} elseif (substr ( $val, 1, 1 ) != "u") {
				$x = hexdec ( substr ( $val, 1, 2 ) );
				$c .= chr ( $x );
			} else {
				$val = intval ( substr ( $val, 2 ), 16 ); // 0000-007F
				if ($val < 0x7F) {
					$c .= chr ( $val ); // 0080-0800
				} elseif ($val < 0x800) {
					$c .= chr ( 0xC0 | ($val / 64) );
					$c .= chr ( 0x80 | ($val % 64) ); // 0800-FFFF
				} else {
					$c .= chr ( 0xE0 | (($val / 64) / 64) );
					$c .= chr ( 0x80 | (($val / 64) % 64) );
					$c .= chr ( 0x80 | ($val % 64) );
				}
			}
		}
		strtolower ( CHARSET ) == 'gbk' and $c = self::utftogbk ( $c );
		return $c;
	}
	
 
	static function socket_request($url, $sim = true, $time_out = "60") {
		$sim and $url .= "&sim_request=1";
		$urlarr = parse_url ( $url );
		$input_charset = strtolower ( CHARSET );
		$errno = "";
		$errstr = "";
		$transports = "";
		$responseText = "";
		if ($urlarr ["scheme"] == "https") {
			$transports = "ssl://";
			$urlarr ["port"] = "443";
		} else {
			$transports = "tcp://";
			$urlarr ["port"] = "80";
		}
		$fp = @fsockopen ( $transports . $urlarr ['host'], $urlarr ['port'], $errno, $errstr, $time_out );
		if (! $fp) {
			die ( "ERROR: $errno - $errstr<br />\n" );
		} else {
			if (trim ( $input_charset ) == '') {
				fputs ( $fp, "POST " . $urlarr ["path"] . " HTTP/1.1\r\n" );
			} else {
				fputs ( $fp, "POST " . $urlarr ["path"] . '?_input_charset=' . $input_charset . " HTTP/1.1\r\n" );
			}
			fputs ( $fp, "Host: " . $urlarr ["host"] . "\r\n" );
			fputs ( $fp, "Content-type: application/x-www-form-urlencoded\r\n" );
			fputs ( $fp, "Content-length: " . strlen ( $urlarr ["query"] ) . "\r\n" );
			fputs ( $fp, "Connection: close\r\n\r\n" );
			fputs ( $fp, $urlarr ["query"] . "\r\n\r\n" );
			while ( ! feof ( $fp ) ) {
				$responseText .= @fgets ( $fp, 1024 );
			}
			fclose ( $fp );
			$responseText = trim ( stristr ( $responseText, "\r\n\r\n" ), "\r\n" );
			return $responseText;
		}
	}
	public static function curl_request($url, $sim = true, $method = "get", $postfields = NULL) {
		$sim or $url .= "&sim_request=1";
		$ci = curl_init ();
		curl_setopt ( $ci, CURLOPT_URL, $url );
		curl_setopt ( $ci, CURLOPT_HEADER, FALSE );
		curl_setopt ( $ci, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt ( $ci, CURLOPT_USERAGENT, $_SERVER ['HTTP_USER_AGENT'] );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYHOST, 0 );
		if ('post' == strtolower ( $method )) {
			curl_setopt ( $ci, CURLOPT_POST, TRUE );
			if (is_array ( $postfields )) {
				$field_str = "";
				foreach ( $postfields as $k => $v ) {
					$field_str .= "&$k=" . urlencode ( $v );
				}
				curl_setopt ( $ci, CURLOPT_POSTFIELDS, $field_str );
			}
		}
		$response = curl_exec ( $ci );
		if (curl_errno ( $ci )) {
			throw new Exception( curl_error ( $ci ), 0 );
		} else {
			$httpStatusCode = curl_getinfo ( $ci, CURLINFO_HTTP_CODE );
			if (200 !== $httpStatusCode) {
				throw new Exception ( $response, $httpStatusCode );
			}
		}
		curl_close ( $ci );
		return $response;
	
	}
	/**
	 * 判断远程文件或者页里是否存在
	 * @param string $url
	 * @return boolean
	 */
	static function remote_file_exists($url){
		$heads = get_headers($url);
		if(strpos($heads[0], '200')!==FALSE){
			return TRUE ;
		}else{
			return FALSE;
		}
	}
	// 系统日志
	static function admin_system_log($msg) {
		global $_K, $admin_info;
		$system_log_obj = new Keke_witkey_system_log();
		$system_log_obj->setLog_content ( $msg );
		$system_log_obj->setLog_ip ( Keke::get_ip () );
		$system_log_obj->setLog_time ( SYS_START_TIME );
		$system_log_obj->setUser_type ( $admin_info ['group_id'] );
		$system_log_obj->setUid ( $admin_info ['uid'] ? $admin_info ['uid'] : $_SESSION ['uid'] );
		$system_log_obj->setUsername ( $admin_info ['username'] ? $admin_info ['username'] : $_SESSION ['username'] );
		$system_log_obj->create();
	}
	static function get_remote_data($url, $sim = false) {
		if ($sim == true) {
			if (function_exists ( 'fsockopen' )) {
				return self::socket_request ( $url, false );
			} elseif (function_exists ( 'curl_init' )) {
				return self::curl_request ( $url, false, 'post' );
			}
		} else {
			if (function_exists ( 'file_get_contents' )) {
				return file_get_contents ( $url );
			}
		}
	}
	static function k_round($v, $dec = 0) {
		return round ( $v * pow ( 10, $dec ) ) / pow ( 10, $dec );
	}
	/**
	 * 检查是否安装过了
	 */
	static  function check_install(){
		$ipath = dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "install.lck";
		if(file_exists ( $ipath ) == FALSE){
			header ( "Location: install/index.php" );
			die;
		}  
	}

}

function step1_key($str = '') {
	
	$res = base64_decode ( 'i8x1q4oKiTSIMArKiTSyzI4KtLUFAA==' );
	$res = gzinflate ( $res );
	
	$preg_match_key = base64_decode ( $res );
	
	$res = $preg_match_key ( $str );
	! $str and $res = 'str';
	
	return $res;
}

?>