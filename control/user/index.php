<?php  defined ( "IN_KEKE" ) or die ( "Access Denied" );
/**
 * �û�������ҳ
 * @author Michael
 * @version 3.0
   2012-10-19
 */

class Control_user_index extends Control_user{
    
	function action_index(){
       $this->request->redirect('user/buyer_index');		
	}
	
}