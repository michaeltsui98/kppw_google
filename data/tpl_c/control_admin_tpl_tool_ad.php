<?php global $_K,$_lang; Keke_tpl::checkrefresh('control/admin/tpl/tool/ad', '1355567011' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<title>keke admin</title>
</head>
<link href="<?php echo BASE_URL;?>/control/admin/tpl/css/admin_management.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/control/admin/tpl/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var BASE_URL = "<?php echo BASE_URL;?>";
</script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/static/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/static/js/keke.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/static/js/in.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/control/admin/tpl/js/table.js"></script>
<script type="text/javascript">
In.add('form',{path:"<?php echo BASE_URL;?>/static/js/system/valid.js",type:'js'});
In.add('edit',{path:"<?php echo BASE_URL;?>/static/js/xheditor/xheditor.js",type:'js'});
In.add('calendar',{path:"<?php echo BASE_URL;?>/static/js/system/calendar.js",type:'js'});
In('form','calendar');
</script>
</head>
<body class="frame_body">
<div class="frame_content">
<div id="append_parent"></div>

<div class="page_title">
    <h1><?php echo $_lang['ads_manage'];?></h1>
    <div class="tool">
        <a class="here" href="<?php echo BASE_URL;?>/index.php/admin/tool_ad" ><?php echo $_lang['advertising'];?></a> 
<!--<a href="index.php?do=<?php echo $do;?>&view=ad_private_add" ><?php echo $_lang['add_advertising'];?></a>-->  
        <a href="<?php echo BASE_URL;?>/index.php/admin/tool_ad/adlist"><?php echo $_lang['ads_list'];?></a>
        
    </div>
</div>
<div class="box list">
<table class="detail" id="ad_details">
<?php $i=1 ?>
<?php $size=2 ?> <!-- 每一行显示的数量,这里定义  -->
<?php if(is_array($list_arr)) { foreach($list_arr as $v) { ?>
<?php if(($i-1)%$size===0) { ?>
<tr>
<?php } ?>
<td>
<div class="fl_l">
<img src="../../<?php echo $v['sample_pic'];?>">
</div>
<div style="padding-left:120px">
<p>广告位置：<a href="<?php echo BASE_URL;?>/index.php/admin/tool_ad/adlist?target_id=<?php echo $v['target_id']?>"><?php echo $v['name'];?></a></p>
<p>广告数量：<?php echo $v['ad_num'];?> 条<!--最大数量 --></p>
<p>已投放：<?php echo $target_ad_arr[$v['target_id']];?> 条<!-- 已经添加数 --></p>
<p><?php echo $_lang['ads_group_code'];?>:<?php echo $v['code'];?></p>
<ul class="list_detail">
<li><?php echo $_lang['ads_group_name'];?>:<?php echo $v['name'];?></li>
<li><?php echo $_lang['ads_group_code'];?>:<?php echo $v['code'];?></li>
<li><?php echo $_lang['description'];?>:<?php echo $v['description'];?></li>
<li><?php echo $_lang['has_been_add_number'];?>:<?php echo $target_ad_arr[$v['target_id']];?></li>
<li><?php echo $_lang['maximum_number'];?>:<?php echo $v['ad_num'];?></li>
</ul>
</div>
</td>
<?php if($i%$size===0) { ?>
</tr>
<?php } ?>
<?php $i++ ?>
<?php } } ?>
</table>
</div>
<script type="text/javascript">
$("#ad_details img").each(function(){
var p     = $(this);
var delay_t;
var next = p.parent().siblings().children().find("ul");
var offset;
var left_p;//position
var left_l;//length
var poffset = p.offset();
$(this).hover(function(){
window.clearTimeout(delay_t);
next.fadeIn("normal");
if(typeof(offset)=="undefined"){
offset=next.offset();
left_p=offset.left;//position
left_l=Math.abs(left_p); //length
}
next.css({"top":poffset.top+20});
if(offset.left>700){
if(BROWSER.ie){
next.css({"left":offset.left-280});
}else{
next.css({"left":offset.left-120});
}
}else{
if(BROWSER.ie){
next.css({"left":offset.left+80});
}else{
next.css({"left":offset.left+230});
}
}

},function(){
window.clearTimeout(delay_t);
delay_t = window.setTimeout(function(){
next.hide();
},100);

})
})
</script>
</div>
<script src="<?php echo BASE_URL;?>/static/js/artdialog/artDialog.js?skin=default" ></script>
<script src="<?php echo BASE_URL;?>/static/js/artdialog/plugins/iframeTools.js"  ></script>

<script src="<?php echo BASE_URL;?>/lang/<?php echo $_K['lang'];?>/script/lang.js"></script>
<script type="text/javascript">
var tips = window.parent.document.getElementById('del_tips');
function clear_tips(){
var s = setInterval(function(){
$(tips).children().html('').removeClass('tips_info');
clearInterval(s);
},1000);

}
function cdel(o,s){
d = art.dialog;
var c = "<?php echo $_lang['confirm_delete'];?>";
if(s){
c=s;
}
//d.follow(o);
d.confirm(c, function(){
$.ajax({
url:o.href,
dataType:'text',
beforeSend:function(){
 	        $(tips).children().html('删除中... ').addClass('tips_info'); 
},
success: function(data){
   if(data >=0){
$(o).parent().parent().remove();
}
},
complete:function(){
$(tips).children().html('提交成功!');
clear_tips();
}

});
 
}).follow(o);
return false;	
}

function kconfirm(o,s){
d = art.dialog;
var c = "<?php echo $_lang['confirm'];?>";
if(s){
c=s;
}
d.confirm(c, function(){
$.get(o.href,function(){
location.href = location.href;
})
}).follow(o);
return false;
}
//交互性提交
function kprom(o,s){
d = art.dialog;
var u = o.href;
d.prompt(s,function(data){
$.post(u,{'data':data},function(){
location.href = location.href;
})
}).follow(o);
return false;
}
//排序 
function submitSort(uri,f,ord){
uri += (uri.indexOf('?')==-1)?"?":"&";
uri += 'f='+f;
uri += '&ord='+ord;
//要去掉同级A标签到中最后一个排序字符

location.href = uri;
}
 
 
//批量删除，obj=>删除按钮对象
function batch_act(obj){ 
d = art.dialog;
//var frm = frm; 
var c = $(obj).val(); 
var conf = $(":checkbox[name='ckb[]']:checked").length;
if (conf > 0) {
d.confirm("<?php echo $_lang['confirm'];?>" + c + '?', function(){
//获取选中的值
var str = [];
$(":checkbox[name='ckb[]']:checked").each(function(){
str.push($(this).val());
})
var val = str.join(',');
var url = '<?php echo $del_uri;?>?ids='+val;
 
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
$(tips).children().html('提交成功!');
clear_tips();
}
});
}).follow(obj);
}else{
d.alert("<?php echo $_lang['has_none_being_choose'];?>");
}
return false;  
}
/**
 * 删除提交
 * @param <?php echo Object;?> obj buttion
 * @param <?php echo string;?> frm form_id
 */
function batch_sub(obj,frm,action){ 
d = art.dialog;
var frm = frm; 
var c = $(obj).val(); 
var conf = $(":checkbox[name='ckb[]']:checked").length;
if (conf > 0) {
d.confirm("<?php echo $_lang['confirm'];?>" + c + '?', function(){
var uri = $("#"+frm).attr('action');
$("#"+frm).attr('action',uri+action);
//获取选中的值
$("#" + frm).submit();
}).follow(obj);
}else{
d.alert("<?php echo $_lang['has_none_being_choose'];?>");
}
return false;  
}
/**
 * 对<a>标签进行进行ajax请求
 * @param <?php echo Object;?> o
 */
function js_submit(o){
var url = o.href;
$.get(url,function(){
location.href = location.href;
})
return false;
}
</script> 
<?php if(KEKE_DEBUG) { ?>
<div style="background-color:green;color:#fff;text-align:center;">
<?php list($times,$memory)=Keke::execute_time();var_dump(Keke_lang::$_files); ?>
执行时间: <?php echo $times;?> &nbsp;<?php echo $memory;?>

 

</div>

<?php } ?>
</body>
</html><?php Keke_tpl::ob_out();?>