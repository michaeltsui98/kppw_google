<?php  defined('IN_KEKE') OR die('access deiend');
/**
 * 货币处理
 * 货币的转换输出
 * 
 */
class Curren {
	
	const CONV_URL = 'http://www.google.com/ig/calculator?hl=en&q=1'; //汇率转换接口.CNY=?USD
	static $_curr; //默认币种
	static $_now; //当前币种
	static $_default; //默认币种信息
	static $_currencies; //货币信息数组
	static $_symbol_right;
	

	public static function get_instance() {
		static $_obj = null;
		if ($_obj == null) {
			$_obj = new self();
		}
		return $_obj;
	}
	public function __construct() {
		self::$_currencies = self::get_curr_list();
		self::$_curr = strtoupper ( Keke::$_sys_config ['currency'] ); //默认币种
		self::$_now = Keke::$_currency;
		self::$_default = self::$_currencies [self::$_curr];
		self::$_symbol_right = self::$_currencies [self::$_curr]['symbol_right'];
	}
	/**
	 * 获取货币列表
	 */
	public static function get_curr_list($code='*'){
		//return self::$_currencies = Keke::get_table_data ($code, 'witkey_currencies', '', '', '', '', 'code', 3600 );
		$res = DB::select()->from('witkey_currencies')->cached(99999,'keke_currencies')->execute();
		return Keke::get_arr_by_key($res,'code');
		
	}
	/**
	 * 货币显示
	 * @param $v 数值
	 * @param　$dec 自定精度
	 * @param  $simple  精简模式  ,仅转换成数字,不format
	 */
	public static function output($v,$dec=-1,$simple=false) {
		self::get_instance();
		$curr = self::$_now;
		$data = self::$_currencies [$curr];
		$v = (float)$v;
		if ($curr != self::$_curr) {
			$v = self::convert ( $v,$dec );
		}
		$dec>-1 and $dec = intval($dec) or $dec = $data ['decimal_places'];
		if($simple){
			return Keke::k_round($v,$dec);
		}else{
			return $data ['symbol_left'] . number_format ( $v, $dec, $data ['decimal_point'], $data ['thousands_point'] ) . $data ['symbol_right'];
		}
	}
	/**
	 * 货币转换[不需要进行汇率转换就勿使用此方法]
	 * @param $v 货币数值
	 * @param　$dec 自定精度
	 * @param $reverse 是否反转
	 * [
	 *		 false=>不反转，及将默认货币转换为当前选择货币
	 * 		true=>反转,用于财务结算，从当前选择货币转换为默认货币
	 * ]
	 */
	public static function convert($v,$dec=-1, $reverse = false) {
		self::get_instance();
		$curr = self::$_now; //当前选择币种
		$defa = self::$_default;
		$data = self::$_currencies [$curr];
		if ($v) {
			if ($curr != self::$_curr) {
				if ($reverse) {
					$rate = 1 / $data ['value'];
					$rate = Keke::k_round ( $rate, $defa ['decimal_places'] );
				} else {
					$rate = $data ['value'];
				}
				$v = Keke::k_round ( $v * $rate, $data ['decimal_places'] );
				if($dec==-1){
					$reverse == true and $dec = $defa ['decimal_places'] or $dec = $data ['decimal_places'];
				}else{
					$dec = intval($dec);
				}
				$v = Keke::k_round ( $v, $dec );
			}
		}
		return $v;
	}
	/**
	 * 货币标签
	 * @param $v 币值
	 * @param $dec 精度。默认保留2位 。页面显示而已，不需要高精度
	 */
	static function currtags($v,$dec) {
		global $_K;
		$_K ['i'] ++;
		isset($dec) and $dec = intval($dec) or $dec = -1;
		$search = "<!--CURR_TAG_{$_K['i']}-->";
		$_K ['block_search'] [$_K ['i']] = $search;
		$_K ['block_replace'] [$_K ['i']] = "<?php  echo Curren::output(floatval({$v}),{$dec});  ?>";
		return $search;
	}
	/**
	 * 更新币种汇率
	 * [支持批量更新]
	 * @param $mulit 是否批量
	 * @param $ex 待更新币种
	 */
	public function update($mulit = false, $ex = '') {
		$ex = strtoupper ( $ex );
		$res = false;
		if ($mulit == true) {
			$data = self::$_currencies;
			unset ( $data [self::$_curr] );
			$s = sizeof ( $data );
			if ($s) {
				foreach ( $data as $k => $v ) {
					$res = $this->update ( false, $k );
					if ($res == false) {
						break;
					}
				}
			} else {
				$res = true;
			}
		} else {
			if ($ex) {
				if ($ex == self::$_curr) {
					$res = true;
				} else {
					$url = self::CONV_URL . self::$_curr . '=?' . $ex;
					$data = Keke::get_remote_data ( $url );
					//类似{lhs: "1 Chinese yuan",rhs: "0.157406 U.S. dollars",error: "",icc: true}
					$data = explode ( '"', $data );
					$data = explode ( ' ', $data ['3'] );
					$rate = floatval ( $data [0] ); //汇率
					$rate and $res = Dbfactory::execute ( sprintf ( " update %switkey_currencies set value='%.8f',last_updated='%s' where code='%s'", TABLEPRE, $rate, time (), $ex ) );
				}
			}
		}
		return $res;
	}
}