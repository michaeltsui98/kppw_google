<?php	defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/**
 * ╧╚к╬╫Ииэ
 * @author lj
 * @charset:GBK  last-modify 2011-12-12-ионГ11:04:44
 * @version V2.0
 */

 

$sect_info = Keke::get_table_data ( "*", "witkey_member_ext", " type='sect' and uid='$member_id' ", "", "", "", "k" );

require keke_tpl_class::template(SKIN_PATH."/space/{$type}_{$view}");

