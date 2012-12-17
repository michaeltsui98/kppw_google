<?php defined('IN_KEKE') or die('Access Denied'); ?>

2012-12-14 14:42:21 --- CRITICAL: /index.php
2012-12-14 14:42:48 --- CRITICAL: <!DOCTYPE HTML>
<!--[if lt IE 7]> <html dir="ltr" lang="zh-cn" id="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="zh-cn" id="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="zh-cn" id="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="zh-cn"> <!--<![endif]-->
<head>
<meta charset="gbk">
<title>用户中心</title>
<!--[if lt IE 9]>
<script src="/kppw_google/static/js/html5.js"></script>
<![endif]-->
<link href="/kppw_google/tpl/default/ui/style/user.css" rel="stylesheet" charset="utf-8"  >
<script type="text/javascript" src="/kppw_google/static/js/jquery.js" ></script>
 	<script type="text/javascript" src="/kppw_google/static/js/in.js" ></script>
<script type="text/javascript" src="/kppw_google/lang/cn/script/lang.js"></script>
<script type="text/javascript" src="/kppw_google/static/js/keke.js"></script>
<script type="text/javascript">
In.add('valid',{path:"/kppw_google/static/js/system/valid.js",type:'js'});
In.add('edit',{path:"/kppw_google/static/js/xheditor/xheditor.js",type:'js'});
var BASE_URL = '/kppw_google'; 
</script>

</head>
<body id="user">
<div id="append_parent"></div>
<div id='ajax_tips' class="tips_box success">
<span></span>
</div>
<div class="header">
<div class="container">
<div class="logo">
<hgroup>
<h/>KPPW3./index.php</h/>
<h2>用户中心</h2>
</hgroup>
</div>
<div class="search">
<input type="search" placeholder="请输入关键字"><input type="button" value="搜索">
</div>
<div id="logined" class="login ">
<a href="javascript:void(/index.php);">您好， test4 !</a>
<a href="/kppw_google/index.php/login/logout">退出</a>
             </div>
</div>
</div>

<!--topbar start-->
<div class="topbar">
<div class="container">
<div class="for_website">
<ul>
<li><a href="#">手机版</a></li>
<li><a href="#">安卓客户端</a></li>
</ul>
</div>


<div class="for_user">
<ul>
<li>
<dl class="tp-menu">
<dt class="selected-item"><a href="#">买家<i class="arrow"></i></a></dt>
<dd class="hd-menu">
<a href="#">买家选项</a>
<a href="#">买家选项</a>
<a href="#">买家选项</a>
</dd>
</dl>
</li>
<li>
<dl class="tp-menu">
<dt class="selected-item"><a href="#">服务商<i class="arrow"></i></a></dt>
<dd class="hd-menu">
<a href="#">服务商选项</a>
<a href="#">服务商选项</a>
<a href="#">服务商选项</a>
</dd>
</dl>
</li>
<li>
<dl class="tp-menu">
<dt class="selected-item"><a href="#">收藏夹<i class="arrow"></i></a></dt>
<dd class="hd-menu">
<a href="#">收藏夹选项</a>
<a href="#">收藏夹选项</a>
<a href="#">收藏夹选项</a>
</dd>
</dl>
</li>
<li>
<dl class="tp-menu">

<dt class="selected-item"><a href="#">中文<i class="arrow"></i></a></dt>
<dd class="hd-menu">
<a href="#">简体中文</a>
<a href="#">繁体中文</a>
<a href="#">En</a>
</dd>
</dl>
</li>
<li>
<dl class="tp-menu">
<dt class="selected-item"><a href="#">人民币&yen;<i class="arrow"></i></a></dt>
<dd class="hd-menu">
<a href="#">港币</a>
<a href="#">台币</a>
<a href="#">美元</a>
</dd>
</dl>
</li>
</ul>
</div>


</div>
</div>
<!--topbar end-->

<!--nav start-->
<div class="primary_nav">
      <ul class="container">
      	    <li><a   href="/kppw_google/index.php/user/msg_index" ><em>消息</em></a></li>
    <li><a   href="/kppw_google/index.php/user/buyer_index" ><em>买家</em></a></li>
    <li><a   href="/kppw_google/index.php/user/seller_index" ><em>服务商</em></a></li>
    <li><a   href="/kppw_google/index.php/user/finance_recharge" ><em>收支明细</em></a></li>
    <li><a   class="selected"  href="/kppw_google/index.php/user/account_index" ><em>账号管理</em></a></li>
    <li><a   href="/kppw_google/index.php/user/custom_report" ><em>客户服务</em></a></li>
             
      </ul>
    </div>
    <!--nav end-->
    <!--content start-->
    <div class="wrapper">
    	<article class="article container">
    		<aside class="aside">
<nav class="minor_nav">
  <ul class="nav_group">
  	       <li><a href="/kppw_google/index.php/user/account_basic"  ><strong>基本资料</strong></a></li>
       <li><a href="/kppw_google/index.php/user/account_detail" class="selected" ><strong>详细资料</strong></a></li>
       <li><a href="/kppw_google/index.php/user/account_safe"  ><strong>账号安全</strong></a></li>
       <li><a href="/kppw_google/index.php/user/account_auth"  ><strong>账号认证</strong></a></li>
       <li><a href="/kppw_google/index.php/user/account_bind"  ><strong>账号绑定</strong></a></li>
       <li><a href="/kppw_google/index.php/user/account_prom"  ><strong>推广赚钱</strong></a></li>
        </ul>
    </nav>
</aside>
    		<div class="content">
    			<div class="box">
            <div class="inner clearfix">
                <header class="box_header">
                    <div class="box_title">
                        <h2 class="title">详细资料</h2>
                    </div>
                </header>
                <nav class="box_nav">
<ul id="test_ul" class="clearfix">
<li><a href="/kppw_google/index.php/user/account_detail">工作经历</a></li>
<li class="selected"><a href="/kppw_google/index.php/user/account_detail/skill">技能证书</a></li>
<li><a href="/kppw_google/index.php/user/account_detail/skill_tag">技能标签</a></li>
</ul>
                </nav>
<form action="/kppw_google/index.php/user/account_detail/skill_save" name="certs" method="post" onsubmit="return checkForm(this)" enctype="multipart/form-data" >
<input type="hidden" name="formhash" value="/7/83f53bc9/index.php3/index.phpa4c/index.phpd5cd8fcc/c967823/4842f">
 		                <div class="box_detail">
 		                	
 		                	<div id="con">
    
<div class="form_row">
<input type="hidden" name="cid[]" value="9">
                			<label class="form_label">证书名称：</label>
                			<input type="text" name="name[]" value="2323">
                	</div>
                	<div class="form_row">
                			<label class="form_label">颁发年份：</label>
                			<select name="year[]" >
                				    <option value="2/index.php/2" selected>2/index.php/2</option>
    <option value="2/index.php//" >2/index.php//</option>
    <option value="2/index.php//index.php" >2/index.php//index.php</option>
    <option value="2/index.php/index.php9" >2/index.php/index.php9</option>
    <option value="2/index.php/index.php8" >2/index.php/index.php8</option>
    <option value="2/index.php/index.php7" >2/index.php/index.php7</option>
    <option value="2/index.php/index.php6" >2/index.php/index.php6</option>
    <option value="2/index.php/index.php5" >2/index.php/index.php5</option>
    <option value="2/index.php/index.php4" >2/index.php/index.php4</option>
    <option value="2/index.php/index.php3" >2/index.php/index.php3</option>
    <option value="2/index.php/index.php2" >2/index.php/index.php2</option>
    <option value="2/index.php/index.php/" >2/index.php/index.php/</option>
    <option value="2/index.php/index.php/index.php" >2/index.php/index.php/index.php</option>
    <option value="/999" >/999</option>
    <option value="/998" >/998</option>
    <option value="/997" >/997</option>
    <option value="/996" >/996</option>
    <option value="/995" >/995</option>
    <option value="/994" >/994</option>
    <option value="/993" >/993</option>
    <option value="/992" >/992</option>
                			</select>
                	</div>

                	<div class="form_row float_row ">
                		 
                			<label class="form_label">证书图片：</label>
<div class="detail">
<p><input type="file" name="pic[]"></p>
<img  src="/kppw_google/data/uploads/2/index.php/2//2//2/243/index.php65/index.phpc82f6653cae.jpg" height="/5/index.php">
                			<div class="fl_r">
<a href="javascript:void(/index.php)" onclick="add(this)">添加</a>
<a href="/kppw_google/index.php/user/account_detail/skill_del?cid=9&pic=data/uploads/2/index.php/2//2//2/243/index.php65/index.phpc82f6653cae.jpg" onclick="return kdel(this)">删除</a>
</div>
</div>
                	</div>

                	<div class="form_line"></div>

<div class="form_row">
<input type="hidden" name="cid[]" value="//index.php">
                			<label class="form_label">证书名称：</label>
                			<input type="text" name="name[]" value="332">
                	</div>
                	<div class="form_row">
                			<label class="form_label">颁发年份：</label>
                			<select name="year[]" >
                				    <option value="2/index.php/2" >2/index.php/2</option>
    <option value="2/index.php//" >2/index.php//</option>
    <option value="2/index.php//index.php" selected>2/index.php//index.php</option>
    <option value="2/index.php/index.php9" >2/index.php/index.php9</option>
    <option value="2/index.php/index.php8" >2/index.php/index.php8</option>
    <option value="2/index.php/index.php7" >2/index.php/index.php7</option>
    <option value="2/index.php/index.php6" >2/index.php/index.php6</option>
    <option value="2/index.php/index.php5" >2/index.php/index.php5</option>
    <option value="2/index.php/index.php4" >2/index.php/index.php4</option>
    <option value="2/index.php/index.php3" >2/index.php/index.php3</option>
    <option value="2/index.php/index.php2" >2/index.php/index.php2</option>
    <option value="2/index.php/index.php/" >2/index.php/index.php/</option>
    <option value="2/index.php/index.php/index.php" >2/index.php/index.php/index.php</option>
    <option value="/999" >/999</option>
    <option value="/998" >/998</option>
    <option value="/997" >/997</option>
    <option value="/996" >/996</option>
    <option value="/995" >/995</option>
    <option value="/994" >/994</option>
    <option value="/993" >/993</option>
    <option value="/992" >/992</option>
                			</select>
                	</div>

                	<div class="form_row float_row ">
                		 
                			<label class="form_label">证书图片：</label>
<div class="detail">
<p><input type="file" name="pic[]"></p>
<img  src="/kppw_google/data/uploads/2/index.php/2//2//2/2285/5/index.phpc82f66542dc.jpg" height="/5/index.php">
                			<div class="fl_r">
<a href="javascript:void(/index.php)" onclick="add(this)">添加</a>
<a href="/kppw_google/index.php/user/account_detail/skill_del?cid=//index.php&pic=data/uploads/2/index.php/2//2//2/2285/5/index.phpc82f66542dc.jpg" onclick="return kdel(this)">删除</a>
</div>
</div>
                	</div>

                	<div class="form_line"></div>
	
</div>	
			

                	<div class="form_footer">
                		<div class="fl_l">
                			<input type="submit" value="提交">
                		</div>
                	 
                	</div>
                </div>
</form>

            </div>
        </div>
    		</div>
    	</article>
    </div>
    <!--content end-->
<script>
In('valid');
</script>
<script>
function add(o){

var html = '<div class="form_row">';
html += '<input type="hidden" name="cid[]">';
html += '<label class="form_label">证书名称：</label>';
html += '<input type="text" name="name[]">';
html += ' </div>';
html += '<div class="form_row">';
html += '<label class="form_label">颁发年份：</label>';
html += '<select name="year[]" >';
html += get_year();
html += '</select>';
html += '</div>';

html += '<div class="form_row">';
html += '	<label class="form_label">证书图片：</label>';
html += '	<input type="file" name="pic[]">';
html += '	<div class="fl_r">';
html += '	<a href="javascript:void(/index.php)" onclick="add(this)">添加</a>';
html += '	<a href="javascript:void(/index.php)" onclick="remove(this,/index.php)">删除</a>';
html += '	</div>';
html += '</div>';
html += '<div class="form_line"></div>';
$("#con").append(html);
}
function remove(o,i){
var p = $(o).parent().parent();
var p/ = $(p).prev();
var p2 = $(p/).prev();
var n/ = $(p).next();
p.remove();
p/.remove();
p2.remove();
n/.remove();
}
function get_year(){
var o = '';
var d = new Date();
var n = d.getFullYear();
for(i=/index.php;i<=2/index.php;i++){
o += '<option value="'+(n-i)+'">'+(n-i)+'</option>'
}
return o;
}
</script>	
<script type="text/javascript" defer="defer" src="/kppw_google/static/js/artdialog/artDialog.js"></script>
<script type="text/javascript" defer="defer" src="/kppw_google/static/js/artdialog/plugins/iframeTools.js"></script> 
<script type="text/javascript">
var tips = window.document.getElementById('ajax_tips');
function clear_tips(){
var s = setInterval(function(){
$(tips).children().html('').removeClass('tips_info');
clearInterval(s);
},//index.php/index.php/index.php);
} 
//排序 
function submitSort(uri,f,ord){
uri += (uri.indexOf('?')==-/)?"?":"&";
uri += 'f='+f;
uri += '&ord='+ord;
//要去掉同级A标签到中最后一个排序字符

location.href = uri;
}
//删除单条
function kdel(o,s,func){
d = art.dialog;
var c = "确认删除？";
if(s){
c=s;
}
d.confirm(c, function(){
$.ajax({
url:o.href,
dataType:'text',
beforeSend:function(){
 	        $(tips).children().html('删除中...').addClass('tips_info'); 
},
success: function(data){
if(typeof func =='function'){
func(o);
}else if(typeof func =='string'){
eval(func);
}else{
   location.href= location.href;	
}
},
complete:function(){
$(tips).children().html('提交成功!')
 clear_tips();
}
});
}).follow(o);
return false;
}
//删除多条
function batch_del(obj){
d = art.dialog;
var c = $(obj).val(); 
var conf = $(":checkbox[name='ckb[]']:checked").length;
if (conf > /index.php) {
d.confirm("确定" + c + '?', function(){
//获取选中的值
var str = [];
$(":checkbox[name='ckb[]']:checked").each(function(){
str.push($(this).val());
})
var val = str.join(',');
var url = '?ids='+val;
$.ajax({
url:url,
dataType:'text',
beforeSend:function(){
 	        $(tips).children().html('删除中...').addClass('tips_info'); 
},
success: function(data){
location.href= location.href;
},
complete:function(){
$(tips).children().html('提交成功!')
 clear_tips();
}
});
}).follow(obj);
}else{
d.alert("no_checkbox");
}
return false;  
}

function check_all(){
    var ckb = $("input[type='checkbox']");
    $.each(ckb,function(){
    	if($(this).attr('checked')){
    		$(this).attr('checked',false);
    	}else{
    		$(this).attr('checked',true);
    	}
    })
}
function kconfirm(o,s){
d = art.dialog;
var c = "确定?";
if(s){
c=s;
}
d.confirm(c, function(){
location.href = o.href;
}).follow(o);
return false;
}
</script>
 
执行时间: /index.php./index.php597/index.php/index.php/index.php/22/index.php7/index.php3/ &nbsp; memory usage: 2.92 MB 
</body>
</html>
2012-12-14 14:54:09 --- DEBUG: 每日任务状态更新
2012-12-14 14:54:09 --- DEBUG: Control_task_mreward_cronrun
2012-12-14 14:54:09 --- DEBUG: Control_task_sreward_cronrun
2012-12-14 14:54:38 --- ERROR: ErrorException [ 2 ]: preg_replace() [function.preg-replace]: Unknown modifier '\' ~ D:\KKserv\wwwroot\kppw_google\test.php [ 17 ]
2012-12-14 14:54:38 --- STRACE: ErrorException [ 2 ]: preg_replace() [function.preg-replace]: Unknown modifier '\' ~ D:\KKserv\wwwroot\kppw_google\test.php [ 17 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'preg_replace() ...', 'D:\KKserv\wwwro...', 17, Array)
#1 D:\KKserv\wwwroot\kppw_google\test.php(17): preg_replace(Array, Array, '<a href="/kppw_...')
#2 {main}
2012-12-14 14:55:01 --- ERROR: ErrorException [ 2 ]: preg_replace() [function.preg-replace]: Unknown modifier '\' ~ D:\KKserv\wwwroot\kppw_google\test.php [ 17 ]
2012-12-14 14:55:01 --- STRACE: ErrorException [ 2 ]: preg_replace() [function.preg-replace]: Unknown modifier '\' ~ D:\KKserv\wwwroot\kppw_google\test.php [ 17 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'preg_replace() ...', 'D:\KKserv\wwwro...', 17, Array)
#1 D:\KKserv\wwwroot\kppw_google\test.php(17): preg_replace(Array, Array, '<a href="/kppw_...')
#2 {main}
2012-12-14 14:55:01 --- ERROR: ErrorException [ 2 ]: preg_replace() [function.preg-replace]: Unknown modifier '\' ~ D:\KKserv\wwwroot\kppw_google\test.php [ 17 ]
2012-12-14 14:55:01 --- STRACE: ErrorException [ 2 ]: preg_replace() [function.preg-replace]: Unknown modifier '\' ~ D:\KKserv\wwwroot\kppw_google\test.php [ 17 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'preg_replace() ...', 'D:\KKserv\wwwro...', 17, Array)
#1 D:\KKserv\wwwroot\kppw_google\test.php(17): preg_replace(Array, Array, '<a href="/kppw_...')
#2 {main}
2012-12-14 14:55:02 --- ERROR: ErrorException [ 2 ]: preg_replace() [function.preg-replace]: Unknown modifier '\' ~ D:\KKserv\wwwroot\kppw_google\test.php [ 17 ]
2012-12-14 14:55:02 --- STRACE: ErrorException [ 2 ]: preg_replace() [function.preg-replace]: Unknown modifier '\' ~ D:\KKserv\wwwroot\kppw_google\test.php [ 17 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'preg_replace() ...', 'D:\KKserv\wwwro...', 17, Array)
#1 D:\KKserv\wwwroot\kppw_google\test.php(17): preg_replace(Array, Array, '<a href="/kppw_...')
#2 {main}
2012-12-14 15:02:11 --- ERROR: ErrorException [ 1 ]: preg_replace() [function.preg-replace]: Failed evaluating code: 
/\&lt;a\s*href\=\&quot;\.*\/(index)\.php\/.*\&quot;/ie ~ D:\KKserv\wwwroot\kppw_google\test.php [ 15 ]
2012-12-14 15:02:11 --- STRACE: ErrorException [ 1 ]: preg_replace() [function.preg-replace]: Failed evaluating code: 
/\&lt;a\s*href\=\&quot;\.*\/(index)\.php\/.*\&quot;/ie ~ D:\KKserv\wwwroot\kppw_google\test.php [ 15 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-14 15:02:13 --- ERROR: ErrorException [ 1 ]: preg_replace() [function.preg-replace]: Failed evaluating code: 
/\&lt;a\s*href\=\&quot;\.*\/(index)\.php\/.*\&quot;/ie ~ D:\KKserv\wwwroot\kppw_google\test.php [ 15 ]
2012-12-14 15:02:13 --- STRACE: ErrorException [ 1 ]: preg_replace() [function.preg-replace]: Failed evaluating code: 
/\&lt;a\s*href\=\&quot;\.*\/(index)\.php\/.*\&quot;/ie ~ D:\KKserv\wwwroot\kppw_google\test.php [ 15 ]
--
#0 [internal function]: Keke_core::shutdown_handler()
#1 {main}
2012-12-14 15:55:03 --- DEBUG: 每日任务状态更新
2012-12-14 15:55:03 --- DEBUG: Control_task_mreward_cronrun
2012-12-14 15:55:03 --- DEBUG: Control_task_sreward_cronrun
2012-12-14 15:57:47 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:47 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:47 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:57:47 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:57:47 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:57:47 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:57:48 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:48 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:48 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:57:48 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:57:48 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:48 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:48 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:48 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:48 --- ERROR: Keke_exception [ 0 ]: The requested URL data/uploads/2012/12/12/2285150c82f66542dc.jpg was not found on this server. Control_data ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:48 --- STRACE: Keke_exception [ 0 ]: The requested URL data/uploads/2012/12/12/2285150c82f66542dc.jpg was not found on this server. Control_data ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:48 --- ERROR: Keke_exception [ 0 ]: The requested URL data/uploads/2012/12/12/2430650c82f6653cae.jpg was not found on this server. Control_data ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:48 --- STRACE: Keke_exception [ 0 ]: The requested URL data/uploads/2012/12/12/2430650c82f6653cae.jpg was not found on this server. Control_data ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:57:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:57:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:57:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:57:59 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:59 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:59 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:59 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:57:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:57:59 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:59 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:57:59 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:57:59 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:02 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:02 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:02 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:02 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:02 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:02 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:02 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:02 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:03 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:03 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:03 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:03 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:03 --- DEBUG: n
2012-12-14 15:58:03 --- ERROR: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'n' not found ~ D:\KKserv\wwwroot\kppw_google\class\sys\cron.php [ 47 ]
2012-12-14 15:58:03 --- STRACE: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'n' not found ~ D:\KKserv\wwwroot\kppw_google\class\sys\cron.php [ 47 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'call_user_func(...', 'D:\KKserv\wwwro...', 47, Array)
#1 D:\KKserv\wwwroot\kppw_google\class\sys\cron.php(47): call_user_func('n::batch_run')
#2 [internal function]: Sys_cron::run()
#3 {main}
2012-12-14 15:58:03 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:03 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:04 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:04 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:04 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:04 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:04 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:04 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:04 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:04 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:04 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:04 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:04 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:04 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:04 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:04 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:11 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:11 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:12 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:12 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:12 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:12 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:12 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:12 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:41 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:41 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:41 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:41 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:41 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:41 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:41 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:41 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:41 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:41 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:41 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:41 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:41 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:41 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:46 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:46 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:46 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:46 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:46 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:46 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:46 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:46 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:46 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:46 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:50 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:50 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:50 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:50 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:51 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:51 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:51 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:51 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:53 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:53 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- DEBUG: n
2012-12-14 15:58:54 --- ERROR: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'n' not found ~ D:\KKserv\wwwroot\kppw_google\class\sys\cron.php [ 47 ]
2012-12-14 15:58:54 --- STRACE: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'n' not found ~ D:\KKserv\wwwroot\kppw_google\class\sys\cron.php [ 47 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'call_user_func(...', 'D:\KKserv\wwwro...', 47, Array)
#1 D:\KKserv\wwwroot\kppw_google\class\sys\cron.php(47): call_user_func('n::batch_run')
#2 [internal function]: Sys_cron::run()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:55 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:55 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:56 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:56 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:57 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:57 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:58 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:58 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:58 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:58 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:58 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:58 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:58 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:58 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:58 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:58 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:58:58 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:58:58 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:02 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:59:02 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:59:02 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:59:02 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:59:02 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:59:02 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:59:02 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:02 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:02 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:02 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:02 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:59:02 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:59:02 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:02 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:02 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:59:02 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:03 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:03 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:04 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:04 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:04 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:04 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:04 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:04 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 15:59:04 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 15:59:04 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:26 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:26 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:26 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:00:26 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:00:26 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:00:26 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:00:26 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:26 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:26 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:00:26 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:00:26 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:00:26 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:00:26 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:26 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:26 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:00:26 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:27 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:27 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:28 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:28 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:28 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:28 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:00:28 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:00:28 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:14 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:14 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:22 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:22 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:30 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:30 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:44 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:44 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:01:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- DEBUG: n
2012-12-14 16:01:46 --- ERROR: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'n' not found ~ D:\KKserv\wwwroot\kppw_google\class\sys\cron.php [ 47 ]
2012-12-14 16:01:46 --- STRACE: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'n' not found ~ D:\KKserv\wwwroot\kppw_google\class\sys\cron.php [ 47 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'call_user_func(...', 'D:\KKserv\wwwro...', 47, Array)
#1 D:\KKserv\wwwroot\kppw_google\class\sys\cron.php(47): call_user_func('n::batch_run')
#2 [internal function]: Sys_cron::run()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:01:46 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:01:46 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:04:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:04:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:04:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:04:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:05:00 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:00 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:05:01 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:05:01 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:19 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:19 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:11:20 --- DEBUG: n
2012-12-14 16:11:20 --- ERROR: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'n' not found ~ D:\KKserv\wwwroot\kppw_google\class\sys\cron.php [ 47 ]
2012-12-14 16:11:20 --- STRACE: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'n' not found ~ D:\KKserv\wwwroot\kppw_google\class\sys\cron.php [ 47 ]
--
#0 [internal function]: Keke_core::error_handler(2, 'call_user_func(...', 'D:\KKserv\wwwro...', 47, Array)
#1 D:\KKserv\wwwroot\kppw_google\class\sys\cron.php(47): call_user_func('n::batch_run')
#2 [internal function]: Sys_cron::run()
#3 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:11:20 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:11:20 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:11:21 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:11:21 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:12:54 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:12:54 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:13:02 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:13:02 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:14:39 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:39 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:40 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:40 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:41 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:41 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:41 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:41 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:41 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:41 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:14:49 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:14:49 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:10 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:10 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:11 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:11 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:11 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:11 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:11 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:11 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:12 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:12 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:13 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:13 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:51 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:51 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:51 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:51 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:51 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:51 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:51 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:51 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:52 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:52 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:16:53 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:16:53 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:43:55 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:43:55 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:43:55 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:43:55 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:43:55 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:43:55 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:43:55 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:43:55 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:43:55 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:43:55 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:43:55 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:43:55 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:43:55 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:43:55 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:43:59 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:43:59 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:43:59 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:43:59 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:43:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:43:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:43:59 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:43:59 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:43:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:43:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:43:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:43:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:43:59 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:43:59 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:44:22 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:44:22 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:44:22 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:44:22 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:44:22 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:44:22 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:44:22 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:44:22 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:44:22 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:44:22 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:44:22 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:44:22 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:44:22 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:44:22 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:45:16 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:45:16 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:45:16 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:45:16 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:45:16 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:45:16 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:45:16 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:45:16 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:45:16 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:45:16 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:45:16 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:45:16 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:45:16 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:45:16 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:48:28 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:48:28 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/ui/style/user.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:48:28 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:48:28 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:48:28 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:48:28 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:48:28 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:48:28 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:48:28 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:48:28 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/artDialog.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:48:28 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:48:28 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:48:29 --- ERROR: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 16:48:29 --- STRACE: Keke_exception [ 0 ]: The requested URL static/js/artdialog/plugins/iframeTools.js was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 16:52:59 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/account_detail/skill ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:52:59 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/account_detail/skill ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:53:06 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/account_detail/skill ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:53:06 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/account_detail/skill ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:53:10 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/account_detail ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:53:10 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/account_detail ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:55:17 --- DEBUG: 每日任务状态更新
2012-12-14 16:55:17 --- DEBUG: Control_task_mreward_cronrun
2012-12-14 16:55:17 --- DEBUG: Control_task_sreward_cronrun
2012-12-14 16:57:03 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/buyer_index ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:57:03 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/buyer_index ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:57:06 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/buyer_index ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:57:06 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/buyer_index ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 16:58:50 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/buyer_index ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 16:58:50 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/buyer_index ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:07:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:07:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:07:45 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:07:45 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:09:52 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/buyer_index ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:09:52 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: index.php/user/buyer_index ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:07 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:36:07 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/box.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:07 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:36:07 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/reset.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:07 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:36:07 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/base.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:07 --- ERROR: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:07 --- STRACE: Keke_exception [ 0 ]: The requested URL static/css/layout/layout.css was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:07 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:36:07 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/css/animate.css ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:07 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:07 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/css/common.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/css/blue_style.css was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/html5.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/jquery.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: The requested URL lang/cn/script/lang.js was not found on this server. Control_lang ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/keke.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: static/js/in.js ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/style/logo.png was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: The requested URL tpl/default/theme/blue/img/system/loading.gif was not found on this server. Control_tpl ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/system/loading.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:08 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:08 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/ten_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:09 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:09 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sina_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:09 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:09 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/qq_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:09 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:09 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/taobao_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:09 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:09 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/netease_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:09 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:09 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/sohu_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 17:36:09 --- ERROR: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
2012-12-14 17:36:09 --- STRACE: Keke_exception [ 0 ]: The requested URL static/img/ico/alipay_t.gif was not found on this server. Control_static ~ D:\KKserv\wwwroot\kppw_google\class\keke\request\client\internal.php [ 65 ]
--
#0 D:\KKserv\wwwroot\kppw_google\class\keke\request\client.php(57): Keke_Request_Client_Internal->execute_request(Object(Keke_Request))
#1 D:\KKserv\wwwroot\kppw_google\class\keke\request.php(1136): Keke_Request_Client->execute(Object(Keke_Request))
#2 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#3 {main}
2012-12-14 18:06:30 --- DEBUG: 每日任务状态更新
2012-12-14 18:06:30 --- DEBUG: Control_task_mreward_cronrun
2012-12-14 18:06:30 --- DEBUG: Control_task_sreward_cronrun
2012-12-14 18:12:09 --- ERROR: Keke_exception [ 0 ]: Unable to find a route to match the URI: user/index.php/user/finance_recharge ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
2012-12-14 18:12:09 --- STRACE: Keke_exception [ 0 ]: Unable to find a route to match the URI: user/index.php/user/finance_recharge ~ D:\KKserv\wwwroot\kppw_google\class\keke\request.php [ 1124 ]
--
#0 D:\KKserv\wwwroot\kppw_google\index.php(17): Keke_Request->execute()
#1 {main}