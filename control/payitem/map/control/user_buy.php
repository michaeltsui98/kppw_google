<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-11-5下午03:42:39
 */


if(isset($formhash)&&Keke::submitcheck($formhash)){
	$res=Sys_payitem::payitem_cost($item_code,$buy_num);
	$res and Keke::show_msg($_lang['system prompt'],"index.php?do=$do&view=$view&op=$op&show=my#userCenter","1",$item_info['item_name'].$_lang['buy_success'],'alert_right') or Keke::show_msg($_lang['system prompt'],$_SERVER['HTTP_REFERER'],"1",$item_info['item_name'].$_lang['buy_fail'],"alert_error");
}
//隐藏交稿剩余数量
$remain= Sys_payitem::payitem_exists($uid,$item_code);
require keke_tpl_class::template("control/payitem/$item_code/tpl/user_buy");