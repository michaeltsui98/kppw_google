/**
 * 页头js
 */

$(function(){
	
	
	//显示登录层
	$("#login").click(function(){
			$("#login_box").toggleClass("hidden");
			$(this).toggleClass("selected");
			$("#txt_account").focus();
			return false;
	});
	
	//方法-隐藏登录弹出层
	var hideLoginPopup = function(){
		if (!$("#login_box").is(".hidden")) {
			$("#login").removeClass("selected");
			$("#login_box").addClass("hidden");
			
		}
	}; 
	//body点击触发隐藏方法
	$("body").click(function(){
		hideLoginPopup();
		$("#user_menu").addClass("hidden");
		$("#search_select a").not(".selected").addClass("hidden");
	});
	
	//登录后用户导航菜单
	$("#avatar").hover(function(){
		$("#user_menu").removeClass("hidden");
	},
	function(){
		$("#user_menu").addClass("hidden");
	});
	
	
	//阻止点击隐藏方法
	$("#login_box,#user_menu,#search_select").click(function (e) {
		e.stopPropagation();
	});
		
	//搜索选项
	$("#search_select a.selected").click(function(){
		$(this).nextAll("a").removeClass("hidden");
	});

	$("#search_select a").not(".selected").click(function(){
		$("#search_select .selected").attr("rel",$(this).attr("rel")).children("span").html($(this).html()).end().nextAll("a").addClass("hidden");
	})
	
	
	//语言选项 
	$("#lan_menu a").click(function(){
		setLang($(this).attr("rel"));
	})

});

$(function (){ 
	$("#lan_menu").hover(function(){
		$(this).addClass("hover").children().removeClass("hidden");
	},function (){ 
		$(this).removeClass("hover").children().not("a.selected").addClass("hidden");
	}); 
}); 


function search_keydown(event){
    if ($.browser.msie) {
        if (window.event.keyCode == 13) {
        	topSearch();
        }
    }
    else {
        if (event.keyCode == 13) {
        	topSearch();
        }
    }
}

function login_keydown(event){
    if ($.browser.msie) {
        if (window.event.keyCode == 13) {
        	ajaxLogin(INDEX);
        }
    }
    else {
        if (event.keyCode == 13) {
        	ajaxLogin(INDEX);
        }

   }
}
 
$("#search_btn").click(function(){topSearch();})
function topSearch(){
	var searchKey = $.trim($("#search_key").val());
 
	if(searchKey&&searchKey!=L.input_task_service){
		var type      = $("#search_select .selected").attr("rel");
		var link    = "index.php?do="+type+"&path=H2&search_key="+searchKey;
			$("#frm_search").attr("action",link);
		location.href=link;
	}
}
function setLang(o){
	var lang = o.value;
	var c    = $(o).children('option:selected').attr('c');
		setCurr(c);
		setTimeout(function(){
			if(lang==LANG){
				return false;
			}else{
				setcookie("_lang",lang,24*3600);
				document.location.replace(location.href);
			}
		},500);
}
function setCurr(c,t){
	var url  = SITEURL+'/index.php?do=ajax&ajax=ajax&ac=currency&curr='+c;
	$.post(url);
	t==1&&setTimeout(function(){
		document.location.replace(location.href);
	},500);
}
/**
 * * 清除输入框的字符,只限制数据输入
 * 
 * @param {Object}
 *            inputobj
 */
function clearstr(inputobj){
    inputobj.value = inputobj.value.replace(/\D/g, '');
    
}

 
//设置文字大小
var sizei = 0;
var setfontsize = function(){	
	i = sizei+1;
	sizei = sizei+1;
	var size = new Array("12","14","16","18");
    if(i<size.length){
		if(i>0){
		   $("#details").removeClass("font"+size[i-=1]);	
		}
		$("#details").addClass("font"+size[i+=1]);
	}else{
		sizei = 0;
		$("#details").removeClass("font"+size[3]);
		$("#details").addClass("font"+size[0]);
	}	
}
/**
 * 清除特殊符号
 * 
 * @param {Object}
 *            inputobj
 */
function clearspecial(inputobj){
	inputobj.value = inputobj.value.replace(/[^a-z\d\u4e00-\u9fa5]/ig, '');
}
var share=function(obj,title){
	var id = obj.id;
	 
	CHARSET.toLowerCase()=='utf-8'?obj.href = encodeURI(obj.href):'';
	ajaxmenu(obj,250,'1','2','43');
	return false;
}
/** 检查用户是否登陆 */
function check_user_login(url) {
	if (isNaN(uid) || uid == 0) {
		showDialog(L.you_not_login_now_login, 'confirm', L.login_tips, 'redirect_url()', 0);
		return false;
	} else {
		return true;
	}
}
/** showWindow跳转 */
function win_confirm(url) {
	if (url) {
		location.href = url;
	}
}
/** 用户登陆 */

function login() {
	location.href="index.php?do=login";
}

function redirect_url(url){
	 
   var furl = window.location.href;
   var tourl =url?url:"index.php?do=login";
   url = tourl.replace(/\?/,"\\?"); 
   var pos = furl.search(url);  
   if(pos == -1){ 
   	   setcookie('loginrefer',furl,120);
   }
  
 window.location.href = tourl;
}
/**
 * 上传进度条
 * 
 * @param parsentObj
 *            进度条所在父级元素
 * @param obj
 *            进度条选择器
 * @param time
 *            动画时间
 */
function loadingControl(parsentObj,obj,time){
	$(parsentObj).find(obj).animate({width:'100%'},time,function(){$(this).html('complete!')});
}

/**
 * 收藏
 * 
 * @param string
 *            type 收藏类型 task/work/case/shop/service
 * 
 */
function favor(pk,type,model_code,obj_uid,obj_id,obj_name,origin_id) {
	if (check_user_login()) {
		var url='index.php?do=ajax&view=ajax&ac=favor';
		$.post(url,{pk:pk,keep_type:type,obj_id:obj_id,obj_id:obj_id,model_code:model_code,obj_uid:obj_uid,obj_name:obj_name,origin_id:origin_id},function(json){
			if(json.status==1){
				showDialog(json.data,'info',json.msg);return false;
			}else{
				showDialog(json.data,'error',json.msg);return false;
			}
		},'json')
	}
}

/**
	 * 稿件描述检测
	 * 
	 * @Param contentObj
	 *            待检测文本域ID
	 * @param minLength
	 *            最小字数
	 * @param maxLength
	 *            最大字数
	 * @param winTitle
	 *            窗口标题
	 * @param msgType
	 * 			  msgType 消息提示类型  0 shoDialog提示。1表示tips提示
	 * @param showTarget
	 * 			showTarget 消息插入容器ID  。当msgType=1,2时有效
	 * @param Object
	 * 			editor 编辑器对象
	 */

function contentCheck(contentObj,winTitle,minLength,maxLength,msgType,showTarget,editor){
		var shtml = '';
		var len	  = 0;
		if(typeof editor=='object'){
			shtml =	editor.stripHtml();
		}else{
			shtml =	$("#"+contentObj).val();
		}
		len	  = shtml.length;
		if(len>maxLength){
			if(msgType!=0){
				tipsAppend(showTarget,winTitle+L.content_not_more_than+maxLength+L.words,'warning','m_warn',msgType==2?s=1:s=0);
			}else{
				var des_msg = $("#"+contentObj).attr("msgArea");
				$("#"+des_msg).addClass('msg').addClass('msg_error').html("<i></i><span>"+winTitle+L.content_not_more_than+maxLength+L.words+"</span>");
			}return false;
		}else if(len<minLength){
			if(msgType!=0){
				tipsAppend(showTarget,winTitle+L.content_not_less_than+minLength+L.words,'warning','m_warn',msgType==2?s=1:s=0);
			}else{
				var des_msg = $("#"+contentObj).attr("msgArea");	
				$("#"+des_msg).addClass('msg').addClass('msg_error').html("<i></i><span>"+winTitle+L.content_not_less_than+minLength+L.words+"</span>");
			}return false;
		}else{
			var des_msg = $("#"+contentObj).attr("msgArea");
			$("#"+des_msg).removeClass('msg').removeClass("msg_error").html(" ");
			return shtml;
		}
}

/**
 * 发送 站内信
 * 
 * @param int
 *            to_uid 接受方
 */
function sendMessage(to_uid,to_username) {
if(check_user_login()){
	if (uid == to_uid) {
		showDialog(L.can_not_give_yourself_send_message, 'error', L.operate_notice);
				return false;
		}
	var url = 'index.php?do=ajax&view=message&op=send&to_uid='+ to_uid+'&to_username='+to_username;
		showWindow('message',encodeURI(url));return false;
}
}
/**
 * 交易维权 *请在外部定义basic_url参数
 * 
 * @param string
 *            type 维权类型 1=>维权,2=>举报,3=>投诉
 * @param string
 *            obj 维权对象 task/work/product/order
 * @param string
 *            obj_id 对象编号
 * @param int
 *            to_uid 被举报人
 * @param string
 *            to_username 被举报人名称
 */
function report( obj, type,obj_id,to_uid,to_username) {
	if (check_user_login()) {
		var s='';
		if(type=='1') s=L.rights;else if(type=='2') s=L.report;else s=L.complaints;
		if(type==3){
			showWindow("report",'index.php?do=index&op=report_3&type='+type+'&obj='+obj,'get','0');			
		}else{ 
			if(uid==to_uid){
				showDialog(L.can_not_be_initiated+s,"error",L.operate_notice);return false;
			}else{
				showWindow("report",basic_url+'&op=report&type='+type+'&obj='+obj+'&obj_id='+obj_id+'&to_uid='+to_uid+'&to_username='+to_username,'get','0');
			}
		}
		
	}
}

/**
 * 消息提示方法
 * @param target 当前操作对象id
 * @param msg	提示消息
 * @param type	提示类型  successful error waring
 * @param color 提示框颜色
 */
function tipsAppend(target, msg, type, color,s){
	if(s==1){
	    $("#" + target).after("<div id='tips' class='fl_l ml_5'></div>");
	}else{
		$("#" + target).before("<div id='tips'></div>");
	}
    var tips = $("<div class='messages " + color + "' style='margin:0'><span class='icon16'>" + type + "</span>" + msg+"</div>" );
    $("#tips").empty().append(tips);
    $('html,body').animate({scrollTop:$("#"+target).offset().top-100});
    msgshow(tips);
	var hide = setTimeout(function() {
		msghide($("#tips"));
		clearTimeout(hide);
	}, 2000);
}

// 显示消息
function msgshow(ele) {
	var t = setTimeout(function() {
		ele.slideDown(200);
		clearTimeout(t);
	}, 100);
}
// 关闭消息
function msghide(ele) {
	ele.animate({
		opacity : .01
	}, 200, function() {
		ele.slideUp(200, function() {
			ele.remove();
		});
	});
};
/**
 * 互评页面调用
 */
function mark(require_url,Do,obj,obj_id){
	var jump='';
	Do&&obj&&obj_id?jump+='do-'+Do+'*'+obj+'-'+obj_id+'*view'+'-'+'mark':'';
	showWindow('mark',require_url+'&jump_url='+jump,'get',0);return false;
}
