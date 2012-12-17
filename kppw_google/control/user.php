<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 *  用户中心控制层基类
 * @author Michael
 * @version 2.2
   2012-10-25
 */
define('USER_URL', BASE_URL.'/index.php/user');
abstract  class Control_user extends Controller{
    /**
     * 一级导航菜单
     */
	protected static  $_nav = array(
    		  'msg'=>array('消息','msg_index'),
    		  'buyer'=>array('买家','buyer_index'),
    		  'seller'=>array('服务商','seller_index'),
    	 	  'finance'=>array('收支明细','finance_recharge'),
    		  'account'=>array('账号管理','account_index'),
    		  'custom'=>array('客户服务','custom_report')
    		);
    protected static $_default = 'buyer';
    
    /**
     * 消息导航 
     */
    protected static $_msg_nav  = array(
    		'index'=>array('写短信','msg_index'),
    		'in'=>array('收件箱','msg_in'),
    		'out'=>array('发件箱','msg_out'),
    		);
    
    /**
     * 买家导航
     */
    protected static $_buyer_nav = array(
    		'index'=>array('我发的任务','buyer_index'),
    		'goods'=>array('我买的商品','buyer_goods'),
    		'faver'=>array('我的收藏','buyer_faver'),
    		'mark'=>array('评价管理','buyer_mark'),
    		);
    /**
     * 卖家导航
     */
    protected static $_seller_nav =array(
    		'shop'=>array('店铺管理','seller_shop'),
    		'index'=>array('我参与的任务','seller_index'),
    		'order'=>array('我卖出的商品','seller_order'),
    		'goods'=>array('我发布的商品','seller_goods'),
    		'mark'=>array('评价管理','seller_mark'),
    		);
    /**
     * 账号导航
     */
    protected static $_account_nav = array(
    		'basic'=>array('基本资料','account_basic'),
    		'detail'=>array('详细资料','account_detail'),
    		'safe'=>array('账号安全','account_safe'),
    		'auth'=>array('账号认证','account_auth'),
    		'bind'=>array('账号绑定','account_bind'),
    		'prom'=>array('推广赚钱','account_prom'),
    		);
    /**
     * 收支导航
     */
    protected static $_finance_nav = array(
    		'recharge'=>array('我要充值','finance_recharge'),
    		'withdraw'=>array('我要提现','finance_withdraw'),
    		'detail'=>array('收支明细','finance_detail'),
    		'recharges'=>array('充值记录','finance_recharges'),
    		'withdraws'=>array('提现记录','finance_withdraws'),
    		'prom'=>array('推广收入','finance_prom'),
    		);
    /**
     * 客服导航
     */
    protected static $_custom_nav = array(
    		'report'=>array('举报','custom_report'),
    		'steer'=>array('建议','custom_steer'),
    );
}