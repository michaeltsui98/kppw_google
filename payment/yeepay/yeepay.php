<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );


/**
 * 易宝支付接品组装
 * 
 * @author Michael
 * @version 3.0 2012-11-30
 *         
 */
class Yeepay extends Sys_payment {
	private $_debug = 1;
	private $_reqUrl;
	private $_config = array ();
	function __construct() {
		parent::__construct ( 'yeepay' );
		if ($this->_debug === 1) {
			// 测试地址
			$this->_reqUrl = "http://tech.yeepay.com:8080/robot/debug.action";
		} else {
			// 正式地址
			$this->_reqUrl = "https://www.yeepay.com/app-merchant-proxy/node";
		}
	}
	function get_pay_html($method, $pay_amount, $subject, $order_id, $rid, $bank_code = NULL) {
		$this->init_param ( $pay_amount, $subject, $order_id, $rid );
		if ($method == 'post') {
			return $this->buildRequestForm ( '提交中...' );
		} else {
			return $this->getRequestURL ();
		}
	}
	/**
	 * 请求参数组装
	 */
	function init_param($pay_amount, $subject, $order_id, $rid) {
		global $_K;
		$order_id = ( int ) $order_id;
		
		$out_trade_no = "{$_SESSION['uid']}-{$order_id}-$rid";
		
		$return_url = $_K ['siteurl'] . '/payment/yeepay/return.php'; // 回调地址
		
		$p1_MerId = $this->_pay_config ['pid'];
		$merchantKey = $this->_pay_config ['key'];
		
		$this->_config ['p1_MerId'] = $p1_MerId;
		/*
		 * $p1_MerId			= "10001126856";																										#测试使用
		 * $merchantKey	=
		 * "69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl";		#测试使用
		 */
		$logName = "YeePay_HTML.log";
		
		// 业务类型
		// 支付请求，固定值"Buy" .
		$p0_Cmd = "Buy";
		$this->_config ['p0_Cmd'] = $p0_Cmd;
		// 送货地址
		// 为"1": 需要用户将送货地址留在易宝支付系统;为"0": 不需要，默认为 "0".
		$p9_SAF = "0";
		$this->_config ['p9_SAF'] = $p9_SAF;
		$p2_Order = date(YmdHis).mt_rand(1, 2000);
		$this->_config ['p2_Order'] = $p2_Order;
		// 支付金额,必填.
		// 单位:元，精确到分.
		$p3_Amt = $pay_amount;
		$this->_config ['p3_Amt'] = $p3_Amt;
		// 交易币种,固定值"CNY".
		$p4_Cur = "CNY";
		$this->_config ['p4_Cur'] = $p4_Cur;
		// 商品名称
		// 用于支付时显示在易宝支付网关左侧的订单产品信息.
		$p5_Pid = $subject;
		$this->_config ['p5_Pid'] = $p5_Pid;
		// 商品种类
		$p6_Pcat = "";
		$this->_config ['p6_Pcat'] = $p6_Pcat;
		// 商品描述
		$p7_Pdesc = 'from:' . $_SESSION ['username'];
		$this->_config ['p7_Pdesc'] = $p7_Pdesc;
		// 商户接收支付成功数据的地址,支付成功后易宝支付会向该地址发送两次成功通知.
		$p8_Url = $return_url;
		$this->_config ['p8_Url'] = $p8_Url;
		// 商户扩展信息
		// 商户可以任意填写1K 的字符串,支付成功时将原样返回.
		$pa_MP = $out_trade_no;
		
		$this->_config ['pa_MP'] = $pa_MP;
		// 支付通道编码
		// 默认为""，到易宝支付网关.若不需显示易宝支付的页面，直接跳转到各银行、神州行支付、骏网一卡通等支付页面，该字段可依照附录:银行列表设置参数值.
		$pd_FrpId = "";
		$this->_config ['pd_FrpId'] = $pd_FrpId;
		// 应答机制
		// 默认为"1": 需要应答机制;
		$pr_NeedResponse = "1";
		$this->_config ['pr_NeedResponse'] = $pr_NeedResponse;
		// 用签名函数生成签名串
		$hmac = $this->getReqHmacString ( $p2_Order, $p3_Amt, $p4_Cur, $p5_Pid, $p6_Pcat, $p7_Pdesc, $p8_Url, $pa_MP, $pd_FrpId, $pr_NeedResponse );
		$this->_config ['hmac'] = $hmac;
	}
	function buildRequestForm($btn_name) {
		$action = $this->_reqUrl;
		
		$sHtml = "<form action='" . $action . "' name='yeepaysubmit' method='post'>";
		$params = $this->_config;
		foreach ( $params as $k => $v ) {
			$sHtml .= "<input type=\"hidden\" name=\"{$k}\" value=\"{$v}\" />\n";
		}
		$sHtml = $sHtml . "<input type='submit' value='" . $btn_name . "'></form>";
		 
		$sHtml .="<script>document.forms['yeepaysubmit'].submit();</script>";
		return $sHtml;
	}
	function getRequestURL() {
		$url = $this->_reqUrl . '?';
		return $url .= http_build_query ( $this->_config );
	}
	
	// 名函数生成签名串
	function getReqHmacString($p2_Order, $p3_Amt, $p4_Cur, $p5_Pid, $p6_Pcat, $p7_Pdesc, $p8_Url, $pa_MP, $pd_FrpId, $pr_NeedResponse) {
		
		$p0_Cmd = $this->_config['p0_Cmd'];
		$p9_SAF = $this->_config['p9_SAF'];
		$p1_MerId = $this->_pay_config['pid'];
		$merchantKey = $this->_pay_config['key'];
		// include 'merchantProperties.php';
		 
		// 行签名处理，一定按照文档中标明的签名顺序进行
		$sbOld = "";
		// 入业务类型
		$sbOld = $sbOld . $p0_Cmd;
		// 入商户编号
		$sbOld = $sbOld . $p1_MerId;
		// 入商户订单号
		$sbOld = $sbOld . $p2_Order;
		// 入支付金额
		$sbOld = $sbOld . $p3_Amt;
		// 入交易币种
		$sbOld = $sbOld . $p4_Cur;
		// 入商品名称
		$sbOld = $sbOld . $p5_Pid;
		// 入商品分类
		$sbOld = $sbOld . $p6_Pcat;
		// 入商品描述
		$sbOld = $sbOld . $p7_Pdesc;
		// 入商户接收支付成功数据的地址
		$sbOld = $sbOld . $p8_Url;
		// 入送货地址标识
		$sbOld = $sbOld . $p9_SAF;
		// 入商户扩展信息
		$sbOld = $sbOld . $pa_MP;
		// 入支付通道编码
		$sbOld = $sbOld . $pd_FrpId;
		// 入是否需要应答机制
		$sbOld = $sbOld . $pr_NeedResponse;
		
		$this->logstr ( $p2_Order, $sbOld, $this->HmacMd5 ( $sbOld, $merchantKey ) );
		
		return $this->HmacMd5 ( $sbOld, $merchantKey );
	}
	function getCallbackHmacString($r0_Cmd, $r1_Code, $r2_TrxId, $r3_Amt, $r4_Cur, $r5_Pid, $r6_Order, $r7_Uid, $r8_MP, $r9_BType) {
		
		// include 'merchantProperties.php';
		$p1_MerId = $this->_pay_config ['pid'];
		$merchantKey = $this->_pay_config ['key'];
		// 得加密前的字符串
		$sbOld = "";
		// 入商家ID
		$sbOld = $sbOld . $p1_MerId;
		// 入消息类型
		$sbOld = $sbOld . $r0_Cmd;
		// 入业务返回码
		$sbOld = $sbOld . $r1_Code;
		// 入交易ID
		$sbOld = $sbOld . $r2_TrxId;
		// 入交易金额
		$sbOld = $sbOld . $r3_Amt;
		// 入货币单位
		$sbOld = $sbOld . $r4_Cur;
		// 入产品Id
		$sbOld = $sbOld . $r5_Pid;
		// 入订单ID
		$sbOld = $sbOld . $r6_Order;
		// 入用户ID
		$sbOld = $sbOld . $r7_Uid;
		// 入商家扩展信息
		$sbOld = $sbOld . $r8_MP;
		// 入交易结果返回类型
		$sbOld = $sbOld . $r9_BType;
		
		$this->logstr ( $r6_Order, $sbOld, $this->HmacMd5 ( $sbOld, $merchantKey ) );
		return $this->HmacMd5 ( $sbOld, $merchantKey );
	}
	
	// 取得返回串中的所有参数
	function getCallBackValue(&$r0_Cmd, &$r1_Code, &$r2_TrxId, &$r3_Amt, &$r4_Cur, &$r5_Pid, &$r6_Order, &$r7_Uid, &$r8_MP, &$r9_BType, &$hmac) {
		$r0_Cmd = $_REQUEST ['r0_Cmd'];
		$r1_Code = $_REQUEST ['r1_Code'];
		$r2_TrxId = $_REQUEST ['r2_TrxId'];
		$r3_Amt = $_REQUEST ['r3_Amt'];
		$r4_Cur = $_REQUEST ['r4_Cur'];
		$r5_Pid = $_REQUEST ['r5_Pid'];
		$r6_Order = $_REQUEST ['r6_Order'];
		$r7_Uid = $_REQUEST ['r7_Uid'];
		$r8_MP = $_REQUEST ['r8_MP'];
		$r9_BType = $_REQUEST ['r9_BType'];
		$hmac = $_REQUEST ['hmac'];
		
		return null;
	}
	function CheckHmac($r0_Cmd, $r1_Code, $r2_TrxId, $r3_Amt, $r4_Cur, $r5_Pid, $r6_Order, $r7_Uid, $r8_MP, $r9_BType, $hmac) {
		if ($hmac == $this->getCallbackHmacString ( $r0_Cmd, $r1_Code, $r2_TrxId, $r3_Amt, $r4_Cur, $r5_Pid, $r6_Order, $r7_Uid, $r8_MP, $r9_BType ))
			return true;
		else
			return false;
	}
	function HmacMd5($data, $key) {
 
		
		// 需要配置环境支持iconv，否则中文参数不能正常处理
		$key = iconv ( "GB2312", "UTF-8", $key );
		$data = iconv ( "GB2312", "UTF-8", $data );
		
		$b = 64; // byte length for md5
		if (strlen ( $key ) > $b) {
			$key = pack ( "H*", md5 ( $key ) );
		}
		$key = str_pad ( $key, $b, chr ( 0x00 ) );
		$ipad = str_pad ( '', $b, chr ( 0x36 ) );
		$opad = str_pad ( '', $b, chr ( 0x5c ) );
		$k_ipad = $key ^ $ipad;
		$k_opad = $key ^ $opad;
		
		return md5 ( $k_opad . pack ( "H*", md5 ( $k_ipad . $data ) ) );
	}
	function logstr($orderid, $str, $hmac) {
		// include 'merchantProperties.php';
		if($this->_debug==0){
			return false;
		}
		//$logName = "YeePay_HTML.log";
		$str =  "\r\n" . date ( "Y-m-d H:i:s" ) . "|orderid[" . $orderid . "]|str[" . $str . "]|hmac[" . $hmac . "]" ;
		Keke::$_log->add(Log::DEBUG, $str)->write(); 
	}
}
