<?php

defined ( 'IN_KEKE' ) or die ( 'Access Dinied' );
/**
 * 数据处理
 * 
 * @author Michael
 * @version 2.2 2012-11-22
 *         
 */
class Num {
	/**
	 *
	 * @var 单位的长度
	 */
	public static $_byte_units = array (
			'B' => 0,
			'K' => 10,
			'KB' => 10,
			'M' => 20,
			'MB' => 20,
			'G' => 30,
			'GB' => 30,
			'T' => 40,
			'TB' => 40,
			'P' => 50,
			'PB' => 50,
			'E' => 60,
			'EB' => 60,
			'Z' => 70,
			'ZB' => 70,
			'Y' => 80,
			'YB' => 80 
	);
	/**
	 * 本地化数字处理
	 * 
	 * @param float $number
	 *        	数字
	 * @param int $places
	 *        	小数位
	 * @param bool $monetary
	 *        	是否为货币
	 * @return string
	 */
	public static function format($number, $places, $monetary = FALSE) {
		$info = localeconv ();
		
		if ($monetary) {
			$decimal = $info ['mon_decimal_point'];
			$thousands = $info ['mon_thousands_sep'];
		} else {
			$decimal = $info ['decimal_point'];
			$thousands = $info ['thousands_sep'];
		}
		
		return number_format ( $number, $places, $decimal, $thousands );
	}
	/**
	 * 大小换为字节
	 * 
	 * @param int $size        	
	 * @throws Keke_exception
	 * @return number
	 */
	public static function bytes($size) {
		// 去掉空格
		$size = trim ( ( string ) $size );
		
		// 重构单位为字符串 for the regex
		$accepted = implode ( '|', array_keys ( Num::$_byte_units ) );
		
		// 构造正则表达式
		$pattern = '/^([0-9]+(?:\.[0-9]+)?)(' . $accepted . ')?$/Di';
		
		// 验证内容
		if (! preg_match ( $pattern, $size, $matches ))
			throw new Keke_exception ( 'The byte unit size, ":size", is improperly formatted.', array (
					':size' => $size 
			) );
			
			// 找出匹配的值
		$size = ( float ) $matches [1];
		
		// 返回对应的单位
		$unit = Arr::get ( $matches, 2, 'B' );
		
		// 转换
		$bytes = $size * pow ( 2, Num::$_byte_units [$unit] );
		
		return $bytes;
	}
	/**
	 * 字节换为大小
	 * 
	 * @param unknown $bytes        	
	 */
	public static function bytes_to_size($bytes) {
		$units = array (
				0 => 'B',
				1 => 'kB',
				2 => 'MB',
				3 => 'GB' 
		);
		$log = log ( $bytes, 1024 );
		$power = ( int ) $log;
		$size = pow ( 1024, $log - $power );
		return round ( $size, 2 ) . ' ' . $units [$power];
	}
	/**
	 * 将很长的数字转换成 xx万
	 * @param int、float.. $number 数字
	 * @param string $unit 单位
	 */
	static function pretty_format($number, $unit = '') {
		global $_lang;
		$unit == '' && $unit = $_lang ['million'];
		if ($number < 10000) {
			return $number;
		}
		return ((round ( $number / 1000 )) / 10) . $unit; // round四舍五入 ceil进一法取整
			                                                  // floor舍去法取整
	}
}
