<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * 常用的验证方法
 * @author 九江
 *
 */
class Keke_valid {
	/**
	 * 不能为空值(null,false,'',array())
	 * @param  $value
	 * @return boolean
	 */
	public static function not_empty($value) {
		if (is_object ( $value ) and $value instanceof ArrayObject) {
			$value = $value->getArrayCopy ();
		}
		return ! in_array ( $value, array (NULL,FALSE,'',array ()), TRUE );
	}
	/**
	 * 正则皮配
	 * @param  $value
	 * @param  $expression
	 * @return boolean
	 */
	public static function regex($value,$expression){
		return (bool)preg_match($expression, (string)$value);
	}
	/**
	 * 相等
	 * @param  $value
	 * @param  $required
	 * @return boolean
	 */
	public static function equals($value,$required){
		return ($value===$required);
	}
	/**
	 * 最大长度
	 * @param  $value
	 * @param  $length
	 * @return boolean
	 */
	public static function max_length($value,$length){
		return mb_strlen($value,CHARSET)<=$length;
	}
	/**
	 * 最小长度
	 * @param  $value
	 * @param  $length
	 * @return boolean
	 */
	public static function min_length($value,$length){
		return mb_strlen($value,CHARSET)>=$length;
	}
	/**
	 * email
	 * @param  $value
	 * @return boolean
	 */
	public static function email($value){
		if(mb_strlen($value,CHARSET)>254){
			return false;
		}
		return (bool)filter_var($value,FILTER_VALIDATE_EMAIL);
	}
	/**
	 * ip
	 * @param  $value
	 * @param  $type  IP地址类型 'ip4,ip6'
	 * @return boolean
	 */
	public static function ip($value,$type="ip4"){
		if($type==='ip4'){
			$flag = FILTER_FLAG_IPV4;
		}elseif($type==='ip6'){
			$flag = FILTER_FLAG_IPV6;
		}
		return (bool)filter_var($value,FILTER_VALIDATE_IP,$flag);
	}
	/**
	 * url
	 * @param  $value
	 * @return boolean
	 */
	public static function url($value){
		
		return (bool)filter_var($value,FILTER_VALIDATE_URL);
	}
	/**
	 * 电话，手机
	 * @param  $value
	 * @param array $length
	 * @return boolean
	 */
	public static function phone($value,$length=null){
		if(!is_array($value)){
			$length = array(7,8,10,11);
		}
		//去掉非数字
		$number = preg_replace('/\D+/', '', $value);
		return in_array(strlen($number), $length);
	}
    /**
     * 日期
     * @param unknown_type $value
     * @return boolean
     */
	public static function date($value){
		return (strtotime($value)!==false);
	}
	/**
	 * 范围
	 * @param  $value
	 * @param  $min 最小值
	 * @param  $max 最大值
	 * @return boolean
	 */
	public static function range($value,$min,$max){
		return ($value>=$min and $value<=$max);
	}
	/**
	 * 整数
	 * @param  $value
	 * @return boolean
	 */
	public static function digit($value){
		return is_int($value) or ctype_digit($value);
	}
	/**
	 * 有效的数字
	 * @param  $value
	 * @return boolean
	 */
	public static function numeric($value){
		//当前地区的小数点
		list($d)= array_values(localeconv());
		return (bool)preg_match('/^-?+(?=.*[\d])[\d]*+'.preg_quote($d).'?+[\d]*+$/D', (string)$value);
	}
	/**
	 * 颜色 
	 * @param $str
	 * @return boolean
	 */
	public static function color($str){
		return (bool) preg_match('/^#?+[0-9a-f]{3}(?:[0-9a-f]{3})?$/iD', $str);
	}
}

?>