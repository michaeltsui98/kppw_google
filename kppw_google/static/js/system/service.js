/**
 * 威客商城js
 */
$(function() {

	var grade = $(".progress_bar").attr("grade");
	$(".progress_bar").animate({
		width : grade + "%"
	}, 3000);
	$("#leave").click(function() {
		$("html,body").animate({
			scrollTop : $(".lyk").offset().top
		});
	})
	
	$(".arrow-bottom-left,.arrow-top-right").click(function(){
		$("#left_nav").toggleClass("hidden");
		$("#top_nav").toggleClass("hidden");
		setcookie('nav-arrow-'+sid,$(this).attr("id"),3600);
	})
	var nav_arrow = getcookie('nav-arrow-'+sid);
	if(nav_arrow){
		if(nav_arrow=='arrow-bottom-left'){
			$("#top_nav").addClass("hidden");
			$("#left_nav").removeClass("hidden");
		}else if(nav_arrow=='arrow-top-right'){
				$("#left_nav").addClass("hidden");
				$("#top_nav").removeClass("hidden");
			}	
	}
})

/**
 * 内容检测
 * @param obj
 * @param event
 */
function checkCommentInner(obj,e){
	var  num   = obj.value.length;
		e.keyCode==8?num-=1:num+=1;
		num<0?num=0:'';
	var Remain = Math.abs(100-num);
		if(num<=100){
			$(obj).next().find(".answer_word").text(L.can_input+Remain+L.word);
		}else{
			var nt = $(obj).val().toString().substr(0,100);
			$(obj).val(nt);	
		}
}
/**
 * 编辑
 */
function seEdit(sid){
   // var sid = parseInt(sid);
    if (typeof(sid) == 'undefined' || isNaN(sid)) {
        showDialog("$_lang['none_exists_service']", "alert", "{$_lang['operate_notice']}");
        return false;
    }
    else {
        var url = "index.php?do=user&view=witkey&op=g_pub&model_id=6&ac=edit&ser_id=" + sid;
		showWindow('service_edit',url,'get',0);return false;
    }
}
/**
 * 操作
 */
function service_op(t){
	if(!uid){
		return false;
	}
	showDialog(L.operate_confirm,'confirm',L.operate_notice,function(){
		var url = SITEURL+'/index.php?do=service&sid='+sid+'&view=service_op&t='+t;
		showWindow('service_op',url,'get',0);return false;
	});
}
/**
 * 商品下单
 * @param type
 *            汉字 购买类型
 * @param sid
 *            商品ID
 * @param s_uid
 *            卖家uid
 */
function sub_order(type,sid,s_uid){
	if(check_user_login()){
		if(uid==s_uid){
			showDialog(L.s_can_not_buy_your_own+type,"alert",L.operate_notice);return false;
		}else{
			//showDialog(L.s_confirm_to_buy,"confirm",L.operate_notice,"location.href='index.php?do=shop_order&op=confirm&sid="+sid+"'");return false;
			showDialog(L.s_confirm_to_buy,"confirm",L.operate_notice,function(){formSub('index.php?do=shop_order&op=confirm&sid='+sid,'url',false)});return false;
		}
	}
}
/* 商品缩略图 */
window.onload=function(){
$('.pro_decs_img').each(function(){
	var obj = $(this).children('img');
	var pw = $(this).width();
	var ph = $(this).height();
	var mw = obj.width();
	var mh = obj.height();

	var objcz = mw -mh;
	var wcz = mw-pw;
	var hcz = mh-ph;

	if(wcz > 0 && hcz>0){
		if(objcz<=0){
			obj.width(pw+'px');
			obj.height('auto');
		}else{
			obj.width('auto');
			obj.height(pw+'px');
		}
	}else if(wcz > 0 && hcz<0 || wcz < 0 && hcz<0){
		obj.css({'margin-top': -hcz/2 +'px' })
	}		
	
	var last_wcz = obj.width()-pw;
	var last_hcz = obj.height()-ph;

	var w_speed = last_wcz/pw;
	var h_speed = last_hcz/ph;

	if (h_speed<1){
			h_speed=1;
	}
	if (w_speed<1){
			w_speed=1;
	}

	$(this).mousemove(function(e){
		var x_y = $(this).offset();
		var set_X= e.pageX - x_y.left;
		var set_Y= e.pageY - x_y.top;
		//$('#xy').html(' X '+e.pageX+' Y '+e.pageY+' sX '+x_y.left+' sY '+x_y.top+' set_X ' + set_X + ' set_Y ' + set_Y +' h_speed ' +h_speed +' w_speed ' +w_speed + ' 宽差值 '+ wcz +' 高差值 ' + hcz + ' objcz ' + objcz+ ' 最终高差值' + last_hcz + ' 最终宽差值' + last_wcz );

		if(last_wcz>0 && set_X<=last_wcz){
			obj.css({'margin-left': -set_X * w_speed +'px' });
		}else if(last_hcz>0 && set_Y<=last_hcz){
			obj.css({'margin-top': -set_Y * h_speed  +'px' });
		}	
	})

});

}