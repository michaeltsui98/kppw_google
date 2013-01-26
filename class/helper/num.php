<?php

defined ( 'IN_KEKE' ) or die ( 'Access Dinied' );
/**
 * ���ݴ���
 * 
 * @author Michael
 * @version 3.0 2012-11-22
 *         
 */
class Num {
	/**
	 *
	 * @var ��λ�ĳ���
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
	 * ���ػ����ִ���
	 * 
	 * @param float $number
	 *        	����
	 * @param int $places
	 *        	С��λ
	 * @param bool $monetary
	 *        	�Ƿ�Ϊ����
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
	 * ��С��Ϊ�ֽ�
	 * 
	 * @param int $size        	
	 * @throws Keke_exception
	 * @return number
	 */
	public static function bytes($size) {
		// ȥ���ո�
		$size = trim ( ( string ) $size );
		
		// �ع���λΪ�ַ��� for the regex
		$accepted = implode ( '|', array_keys ( Num::$_byte_units ) );
		
		// ����������ʽ
		$pattern = '/^([0-9]+(?:\.[0-9]+)?)(' . $accepted . ')?$/Di';
		
		// ��֤����
		if (! preg_match ( $pattern, $size, $matches ))
			throw new Keke_exception ( 'The byte unit size, ":size", is improperly formatted.', array (
					':size' => $size 
			) );
			
			// �ҳ�ƥ���ֵ
		$size = ( float ) $matches [1];
		
		// ���ض�Ӧ�ĵ�λ
		$unit = Arr::get ( $matches, 2, 'B' );
		
		// ת��
		$bytes = $size * pow ( 2, Num::$_byte_units [$unit] );
		
		return $bytes;
	}
	/**
	 * �ֽڻ�Ϊ��С
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
	 * ���ܳ�������ת���� xx��
	 * @param int��float.. $number ����
	 * @param string $unit ��λ
	 */
	static function pretty_format($number, $unit = '') {
		global $_lang;
		$unit == '' && $unit = $_lang ['million'];
		if ($number < 10000) {
			return $number;
		}
		return ((round ( $number / 1000 )) / 10) . $unit; // round�������� ceil��һ��ȡ��
			                                                  // floor��ȥ��ȡ��
	}
}
