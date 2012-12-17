<?php  defined ( "IN_KEKE" ) or  die ( "Access Denied" );
/**
 * 客客的用户信息
 * @author Michael	
 * @version 2.2 
 * 2012-11-12
 *
 */

class Keke_user_keke extends Keke_user {
    
   function get_user_info($uid,$fields='*'){
   	   return DB::select($fields)->from('witkey_space')->where("uid='$uid'")->get_one()->execute();
   }
	
   function get_avatar($uid,$size='middle'){
   	   
   	   return Keke_user_avatar::get_avatar($uid,$size);
   }
   
   function del_user($uid){
   	   $sql = "DELETE a,b,c,d,e,f,g,h,i,j,k from :Pwitkey_member as a \n".
				"LEFT JOIN :Pwitkey_space as b on a.uid = b.uid\n".
				"LEFT JOIN :Pwitkey_member_auth as c on a.uid =c.uid\n".
				"LEFT JOIN :Pwitkey_member_black as d on a.uid = d.uid\n".
				"LEFT JOIN :Pwitkey_member_ext as e on a.uid = e.uid\n".
				"LEFT JOIN :Pwitkey_member_oltime as f on a.uid = f.uid\n".
				"LEFT JOIN :Pwitkey_msg as g on a.uid = g.uid\n".
				"LEFT JOIN :Pwitkey_comment as h on a.uid = h.uid\n".
				"LEFT JOIN :Pwitkey_shop as i on a.uid = i.uid\n".
				"LEFT JOIN :Pwitkey_shop_case as j on i.shop_id = j.shop_id\n".
				"LEFT JOIN :Pwitkey_shop_member as k on i.shop_id = k.shop_id\n".
				"where a.uid = '$uid'";
   	   DB::query($sql,Database::DELETE)->tablepre(':P')->execute();
   	   //删除用户头象
   	   $home_dir = Keke_user_avatar::get_home($uid);
   	   //删除这个目录下的文件
   	   keke_file_class::delete_files($home_dir,TRUE);
   } 
	
}
