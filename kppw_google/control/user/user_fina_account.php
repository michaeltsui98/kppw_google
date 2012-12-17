<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * @copyright keke-tech
 * @author Chen
 * @version v 2.0
 * 2011-10-8обнГ06:42:39
 */



$opps=array('add','list');

in_array($opp, $opps) or $opp='list';

require "user_" . $op."_".$opp.".php" ;


