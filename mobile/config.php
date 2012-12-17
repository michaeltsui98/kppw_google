<?php
defined ( 'IN_KEKE' ) && defined ( 'ISWAP' ) && ISWAP or kekezu::echojson ( $wap_msg, 0 );
$phone_arr ['phone'] = $kekezu->_sys_config ['phone'];
$phone_arr ['kf_phone'] = $kekezu->_sys_config ['kf_phone'];
kekezu::echojson ( '', 1, $phone_arr );
die ();