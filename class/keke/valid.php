<?php defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * ���õ���֤����
 * @author �Ž�
 *
 */
class Keke_valid {
	/**
	 * ����Ϊ��ֵ(null,false,'',array())
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
	 * ����Ƥ��
	 * @param  $value
	 * @param  $expression
	 * @return boolean
	 */
	public static function regex($value,$expression){
		return (bool)preg_match($expression, (string)$value);
	}
	/**
	 * ���
	 * @param  $value
	 * @param  $required
	 * @return boolean
	 */
	public static function equals($value,$required){
		return ($value===$required);
	}
	/**
	 * ��󳤶�
	 * @param  $value
	 * @param  $length
	 * @return boolean
	 */
	public static function max_length($value,$length){
		return mb_strlen($value,CHARSET)<=$length;
	}
	/**
	 * ��С����
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
	 * @param  $type  IP��ַ���� 'ip4,ip6'
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
	 * �绰���ֻ�
	 * @param  $value
	 * @param array $length
	 * @return boolean
	 */
	public static function phone($value,$length=null){
		if(!is_array($value)){
			$length = array(7,8,10,11);
		}
		//ȥ��������
		$number = preg_replace('/\D+/', '', $value);
		return in_array(strlen($number), $length);
	}
    /**
     * ����
     * @param unknown_type $value
     * @return boolean
     */
	public static function date($value){
		return (strtotime($value)!==false);
	}
	/**
	 * ��Χ
	 * @param  $value
	 * @param  $min ��Сֵ
	 * @param  $max ���ֵ
	 * @return boolean
	 */
	public static function range($value,$min,$max){
		return ($value>=$min and $value<=$max);
	}
	/**
	 * ����
	 * @param  $value
	 * @return boolean
	 */
	public static function digit($value){
		return is_int($value) or ctype_digit($value);
	}
	/**
	 * ��Ч������
	 * @param  $value
	 * @return boolean
	 */
	public static function numeric($value){
		//��ǰ������С����
		list($d)= array_values(localeconv());
		return (bool)preg_match('/^-?+(?=.*[\d])[\d]*+'.preg_quote($d).'?+[\d]*+$/D', (string)$value);
	}
	/**
	 * ��ɫ 
	 * @param $str
	 * @return boolean
	 */
	public static function color($str){
		return (bool) preg_match('/^#?+[0-9a-f]{3}(?:[0-9a-f]{3})?$/iD', $str);
	}
	/**
	 * С��
	 * @param numeric $value
	 * @param numeric $min
	 * @return boolean
	 */
	public static function less($value,$min){
		return (bool)(float)$value<=(float)$min;
	}
	/**
	 * ����
	 * @param numeric $value
	 * @param numeric $max
	 * @return boolean
	 */
	public static function large($value,$max){
		return (bool)(float)$value>=(float)$max;
	}
	
}

