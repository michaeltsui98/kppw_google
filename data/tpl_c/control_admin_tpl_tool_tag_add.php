<?php global $_K,$_lang; Keke_tpl::checkrefresh('control/admin/tpl/tool/tag_add', '1355567086' );?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    	<h1><?php echo $_lang['tag_manage'];?></h1>
        <div class="tool">         
            <a href="<?php echo BASE_URL;?>/index.php/admin/tool_tag/" ><?php echo $_lang['tag_list'];?></a>
<a href="<?php echo BASE_URL;?>/index.php/admin/tool_tag/index/1" >活动</a>
<a href="<?php echo BASE_URL;?>/index.php/admin/tool_tag/index/2" >协议</a>
<a href="<?php echo BASE_URL;?>/index.php/admin/tool_tag/add/<?php echo $id;?>" class="here"><?php echo $_lang['add'];?> </a>
        </div>
</div>
<div class="box post">
    <div class="tabcon"></div>
<div class="title">
<h2><?php echo $tag_type_arr[$tag_type]['1']?><?php echo $_lang['tag'];?></h2>
</div>	
 
<form method="post" action="<?php echo BASE_URL;?>/index.php/admin/tool_tag/save">
 <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
 <input type="hidden" name="hdn_tag_id" value="<?php echo $_GET['tag_id'];?>">	
 <table class="detail" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
            <th scope="row" width="130">
            	<?php echo $_lang['tag_name'];?><?php echo $_lang['zh_mh'];?>
</th>
            <td colspan="2">
             	<input type="text" class="txt" name="txt_tagname" value="<?php echo $tag_info['tagname'];?>">
标题中必须包含“活动”或“协议”才能在显示<?php echo $_lang['tag_change_notice'];?>
            </td>
          </tr>
   <tr>
            <th scope="row"  >
            	    html<?php echo $_lang['code'];?><?php echo $_lang['zh_mh'];?>
</th>
            <td>
             	<textarea rows="15"  cols="100" name="tar_custom_code" 
id="system-create-location" 
class="xheditor {urlBase:'<?php echo $_K['siteurl']?>/',tools:'simple',admin:'../../',html5Upload:false,emotMark:false,upImgUrl:'../../index.php?do=ajax&view=upload&file_type=att'}" ><?php echo $tag_info['tag_code'];?></textarea>
</td>
<td></td>
          </tr>
  <tr>
            <th scope="row"  ><?php echo $_lang['cache_time'];?><?php echo $_lang['zh_mh'];?></th>
            <td colspan="2">
             	<input type="text" size="3" class="txt"  name="txt_cache_time" value="<?php echo $tag_info['cache_time']?>">
<?php echo $_lang['seconds_notice'];?>
            </td>
          </tr>
   <tr>
            <th scope="row"  ></th>
            <td colspan="2"> 
                 <button type="submit" name="submit" value=<?php echo $_lang['submit'];?> id="submit_save" class="positive primary pill button">
                 	<span class="check icon"></span><?php echo $_lang['submit'];?>
 </button>
                 <button type="button" name="rst_edit" class="pill button" value=<?php echo $_lang['return'];?> 
 onclick="to_back();"><span class="uparrow icon"></span><?php echo $_lang['return'];?></button>
            </td>
          </tr>
  </table>
</form>
</div>	
 <script type="text/javascript">
 	In('edit');
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