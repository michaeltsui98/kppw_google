<?php defined('IN_KEKE') or die('access deined');
/**
 * paypal 支付接口
 * @author Michael	
 * @version 3.0 2012-12-01
 *
 */

class Paypal extends Sys_payment{
    /**
     * 
     * @var 0,正式环境，1测试环境
     */
	private  $_debug = 1;
		
	private $ipnResponse;
	private $lastError = NULL;
	/**
	 * @var 提交的正式地址
	 */
	protected  $gatewayUrl='https://www.paypal.com/cgi-bin/webscr';
	
	private $fields = array();
	
	public $ipnData = array();
	
    /**
	 * Initialize the Paypal gateway
	 *
	 * @param none
	 * @return void
	 */
	public function __construct()
	{
        parent::__construct('paypal');

        if($this->_debug===1){
        	//测试地址
        	$this->gatewayUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        }
		// Populate $fields array with a few default
		$this->set_field('rm', '2');           // Return method = POST
		$this->set_field('cmd', '_xclick');
	}
    function get_pay_html($method, $pay_amount, $subject, $order_id, $rid,$bank_code=NULL){
    	$this->init_param($pay_amount, $subject, $order_id, $rid,$bank_code);
    	if($method=='post'){
    		return $this->buildRequestForm('提交中...');
    	}else{
    		return $this->getRequestURL();
    	}
    }
    function init_param($pay_amount, $subject, $order_id,  $rid,$bank_code){
    	global $_K;
    	$return_url =  $_K ['siteurl']."/payment/paypal/return.php";
    	$notify_url =  $_K ['siteurl']."/payment/paypal/return.php";
    	$cancel_url = $_K ['siteurl'] . "/index.php/user/finance_recharges";
    	$order_id = (int)$order_id;
    	$out_trade_no = "{$_SESSION['uid']}-{$order_id}-$rid";
    	//CHARSET=='gbk' and $subject = Keke::gbktoutf($subject);
    	$this->set_field('business', $this->_pay_config['pay_account']);
    	$this->set_field('custom', $out_trade_no);
    	$this->set_field('amount', $pay_amount);
    	$this->set_field('v_moneytype', 'HKD');
    	$this->set_field('notify_url', $notify_url);
    	$this->set_field('return', $return_url);
    	$this->set_field('cancel_return', $cancel_url);
    	$this->set_field('currency_code', 'HKD');
    	$this->set_field('item_name', "(from:" . $_SESSION['username'] . ")");
    	$this->set_field('charset', CHARSET);
    }
	function buildRequestForm($btn_name) {
		// echo 1;
		$sHtml = "<form  name='paypalsubmit'  action='".$this->gatewayUrl."' method='post'>";
		
		foreach ($this->fields as $key=>$val){
			$sHtml .= "<input type='hidden' name='" . $key . "' value='" . $val . "'/>";
		}
		$sHtml = $sHtml . "<input type='submit'  value='$btn_name'/>";
		$sHtml .= "<script>document.forms[\"paypalsubmit\"].submit();</script>";
		return $sHtml;
	}
	
	function getRequestURL(){
		$url = $this->gatewayUrl.'?';
		return $url .= http_build_query($this->fields);
	}
	
    public function set_field($k,$v){
        $this->fields[$k] = $v;
    }

    /**
	 * 验证返回的结果,用来作回调处理
	 * @return boolean
	 */
	public function validateIpn(){
		foreach ($_POST as $field=>$value){
			$this->ipnData[$field] = $value;
		}
		
		$this->ipnData['cmd'] = '_notify-validate';
		$res =  Keke::curl_request($this->gatewayUrl,TRUE,'post',$this->ipnData);
		
		if(strcmp($res, 'VERIFIED')==0){
			return TRUE;
		}elseif(strcmp($res, 'INVALID')==0){
			return FALSE;
		}
	}
	
	function logResults(){
		Keke::$_log->add(Log::DEBUG, $this->lastError)->write();
	}
}

