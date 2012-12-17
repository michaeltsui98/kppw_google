<?php
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-09-08 11:31:34
 */
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
//ÓïÑÔ°ü³õÊ¼»¯
Keke_lang::package_init ( "shop" );
Keke_lang::loadlang("service_process");

$views = array ('config','list', 'order', 'op','process' ,'edit');

$view = in_array ( $view, $views ) ? $view : "list";

require "service_$view.php";
