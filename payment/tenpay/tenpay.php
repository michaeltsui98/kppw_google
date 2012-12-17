<?php  defined('IN_KEKE') OR die('access deined');

require 'classes/RequestHandler.class.php';
//require 'classes/ResponseHandler.class.php';
//require 'classes/client/ClientResponseHandler.class.php';
//require 'classes/client/TenpayHttpClient.class.php';

/**
 * 财付通支付接口类
 * @author Michael
 * @version 3.0 2012-12-28
 *
 */
class Tenpay extends Sys_payment {
    /**
     * @var RequestHandler
     */
	private  $_request;

	function get_pay_html($method, $pay_amount, $subject, $order_id, $rid,$bank_code=NULL){
		$this->init_param($pay_amount, $subject, $order_id, $rid, $bank_code);
		if($method=='post'){
			return $this->buildRequestForm('提交中...');    	
		}else{
			return $this->_request->getRequestURL();
		}
		
	}
	
	function init_param($pay_amount, $subject, $order_id,$rid,$bank_code){
		global $_K;
		$order_id= (int)$order_id;
		
		$code_arr = array_flip(self::$_bank_code);
		
		$out_trade_no = "{$_SESSION['uid']}-{$order_id}-$rid";
		
		$return_url = $_K ['siteurl'] . '/payment/tenpay/return.php';
		$notify_url = $_K ['siteurl'] . '/payment/tenpay/notify.php';

		/* 获取提交的商品名称 */
		$product_name = $subject;
		/* 获取提交的商品价格 */
		$order_price = $pay_amount;
		/* 获取提交的备注信息 */
		$remarkexplain = 'from:'.$_SESSION['username'];
		/* 接口类型 */
		$trade_mode=1;
		/* 支付银行 */
		$bank_type_value=$code_arr[$bank_code];
		/* 商品价格（包含运费），以分为单位 */
		$total_fee = $order_price*100;
		/* 商品名称 */
		$desc = "商品：".$product_name.",备注:".$remarkexplain;
		 
		/* 创建支付请求对象 */
		$reqHandler = new RequestHandler();
		$reqHandler->init();
		$reqHandler->setKey($this->_pay_config['key']);
		$reqHandler->setGateUrl("https://gw.tenpay.com/gateway/pay.htm");
		
		//----------------------------------------
		//设置支付参数 
		//----------------------------------------
		$reqHandler->setParameter("partner", $this->_pay_config['pid']);
		$reqHandler->setParameter("out_trade_no", $out_trade_no);
		$reqHandler->setParameter("total_fee", $total_fee);  //总金额
		$reqHandler->setParameter("return_url", $return_url);
		$reqHandler->setParameter("notify_url", $notify_url);
		$reqHandler->setParameter("body", $desc);
		$reqHandler->setParameter("bank_type", $bank_type_value);  	  //银行类型，默认为财付通
		//用户ip
		$reqHandler->setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);//客户端IP
		$reqHandler->setParameter("fee_type", "1");               //币种
		$reqHandler->setParameter("subject",$desc);          //商品名称，（中介交易时必填）
		
		//系统可选参数
		$reqHandler->setParameter("sign_type", "MD5");  	 	  //签名方式，默认为MD5，可选RSA
		$reqHandler->setParameter("service_version", "1.0"); 	  //接口版本号
		$reqHandler->setParameter("input_charset", CHARSET);   	  //字符集
		$reqHandler->setParameter("sign_key_index", "1");    	  //密钥序号
		
		//业务可选参数
		$reqHandler->setParameter("attach", "");             	  //附件数据，原样返回就可以了
		$reqHandler->setParameter("product_fee", "");        	  //商品费用
		$reqHandler->setParameter("transport_fee", "0");      	  //物流费用
		$reqHandler->setParameter("time_start", date("YmdHis"));  //订单生成时间
		$reqHandler->setParameter("time_expire", "");             //订单失效时间
		$reqHandler->setParameter("buyer_id", "");                //买方财付通帐号
		$reqHandler->setParameter("goods_tag", "");               //商品标记
		$reqHandler->setParameter("trade_mode",$trade_mode);              //交易模式（1.即时到帐模式，2.中介担保模式，3.后台选择（卖家进入支付中心列表选择））
		$reqHandler->setParameter("transport_desc","");              //物流说明
		$reqHandler->setParameter("trans_type","1");              //交易类型
		$reqHandler->setParameter("agentid","");                  //平台ID
		$reqHandler->setParameter("agent_type","");               //代理模式（0.无代理，1.表示卡易售模式，2.表示网店模式）
		$reqHandler->setParameter("seller_id","");                //卖家的商户号
		
		
		
		//请求的URL
		//$reqUrl = $reqHandler->getRequestURL();
		$this->_request  = $reqHandler;
		//echo "<br/><a href=\"$reqUrl\" target=\"_blank\">财付通支付</a>";
		//获取debug信息,建议把请求和debug信息写入日志，方便定位问题
		/**/
		//$debugInfo = $reqHandler->getDebugInfo();
		
		
	}

	function buildRequestForm($btn_name){
		$action = $this->_request->getGateURL();
		$url = $this->_request->getRequestURL();
		$sHtml = "<form action='".$action."' name='tenpaysubmit' method='post'>";
		$params = $this->_request->getAllParameters();
		foreach($params as $k => $v) {
			$sHtml.= "<input type=\"hidden\" name=\"{$k}\" value=\"{$v}\" />\n";
		}
		$sHtml = $sHtml."<input type='submit' value='".$btn_name."'></form>";
		
		$sHtml = $sHtml."<script>document.forms['tenpaysubmit'].submit();</script>";
		return $sHtml;
		
	}
	
	/**
	 * 财付通的银行代码与银行图片的对应关系数组
	 * @var array
	 */
	private  static $_bank_code = array(
			"1001"=>"17",
			"1002"=>"10",
			"1003"=>"2",
			"1004"=>"9",
			"1005"=>"1",
			"1006"=>"4",
			"1008"=>"8",
			"1009"=>"12",
			"1010"=>"18",
			"1020"=>"5",
			"1021"=>"7",
			"1022"=>"3",
			"1024"=>"20",
			"1025"=>"22",
			"1027"=>"6",
			'1028'=>'27',
			"1032"=>"11",
			"1033"=>"14",
			"1052"=>"19",
			"8001"=>"logo",
	);
}
