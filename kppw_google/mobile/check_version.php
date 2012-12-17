<?php
 defined ( 'IN_KEKE' )&&defined('ISWAP')&&ISWAP or kekezu::echojson ($wap_msg, 0);
 //»ñÈ¡°æ±¾
  
 $ver_info = db_factory::get_one("select * from ".TABLEPRE."witkey_basic_config where k='mobile_version'");
 
 $update_info ['version'] = $ver_info['v'];
 $update_info [update_content] = $ver_info[desc];
 $update_info [url] = "";
   
kekezu::echojson('',1,$update_info);die();
 

