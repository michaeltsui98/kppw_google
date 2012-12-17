<?php global $_K,$_lang; Keke_tpl::checkrefresh('control/admin/tpl/tool/ad_list', '1355567034' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
        <a href="<?php echo BASE_URL;?>/index.php/admin/tool_ad" ><?php echo $_lang['advertising'];?></a>
        <a href="<?php echo BASE_URL;?>/index.php/admin/tool_ad/adlist"  class="here" ><?php echo $_lang['ads_list'];?></a>
    </div>
</div>
    <!--页头结束-->
    <!--提示结束-->
<div class="box search p_relative">
    <form class="detail" id="detail" action="<?php echo BASE_URL;?>/index.php/admin/tool_ad" method="get" name="s" id="sl">
                <table cellspacing="0" cellpadding="0">
<tbody>
 	<tr>
                <th>查询字段
                   <select name="slt_fields">
                   	<option></option>
                   	<?php if(is_array($query_fields)) { foreach($query_fields as $k => $v) { ?>
                   	 <option  value="<?php echo $k?>" <?php if($k == $_GET['slt_fields']) { ?> selected="selected" <?php } ?>><?php echo $v;?></option>
<?php } } ?> 
                   </select>
 <select name="slt_cond">
 	<option value="=" <?php if($_GET['slt_cond']=='=') { ?>selected="selected"<?php } ?>>=</option>
<option value=">" <?php if($_GET['slt_cond']=='>') { ?>selected="selected"<?php } ?>>></option>
<option value="<" <?php if($_GET['slt_cond']=='<') { ?>selected="selected"<?php } ?>><</option>
<option value="like" <?php if($_GET['slt_cond']=='like') { ?>selected="selected"<?php } ?>>Like</option>
 </select>
                 <input type="text" class="txt" name="txt_condition" id="txt_condition" value="<?php echo $_GET['txt_condition'];?>">
 <select name="page_size">
                			<option value="10" <?php if($_GET['page_size']=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10条</option>
                			<option value="20" <?php if($_GET['page_size']=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20条</option>
                			<option value="30" <?php if($_GET['page_size']=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30条</option>
            			</select>
 <input type="submit" value="<?php echo $_lang['search'];?>">
 </td>
            </tr>
 </tbody>
                </table>
            </form>
</div>
    <!--搜索结束-->
    <div class="box list">
        	<form class="detail" action="" id='frm_list' method="post">
        	 
              <table cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <th width="20%"><?php echo $_lang['ads_title'];?></th>
<th width="15%"><?php echo $_lang['location'];?></th>
                    <th width="15%"><?php echo $_lang['start_time'];?></th>
                    <th width="15%"><?php echo $_lang['end_time'];?></th>
<th width="15%"><a href="javascript:;" onclick="submitSort('<?php echo $uri;?>','on_time',<?php echo $ord_tag;?>)">编辑时间<?php if($_GET['f']=='on_time') { ?><?php echo $ord_char;?><?php } ?></a></th>
<th width="10%">是否可用</th>
                    <th><?php echo $_lang['operate'];?></th>
                  </tr>
                  <?php if(is_array($list_arr)) { foreach($list_arr as $v) { ?>
                  <tr class="item">
                    <td class="td28"><?php echo $v['ad_name'];?></td>
                    <td><?php echo $targets_arr[$v['target_id']]['name'];?></td><!-- 投放范围 -->
    <td><?php if($v['start_time']) { ?><!--<?php if($v['start_time']){echo date('Y-m-d',$v['start_time']); } ?>--><?php } else { ?>永久有效<?php } ?></td> <!-- 起始时间 -->
                    <td><?php if($v['end_time']) { ?><!--<?php if($v['end_time']){echo date('Y-m-d',$v['end_time']); } ?>--><?php } else { ?>永久有效<?php } ?></td>
<td><?php echo date('Y-m-d',$v['on_time']); ?></td>
                    <td><?php if($v['is_allow']==1) { ?><span style="color:green"><?php echo $_lang['available'];?></span><?php } else { ?><span style="color:red"><?php echo $_lang['not_available'];?></span><?php } ?></td><!-- 是否可用 -->
                    <td>
 
<a href="<?php echo BASE_URL;?>/index.php/admin/tool_ad/add?ad_id=<?php echo $v['ad_id']?>" class="button dbl_target"><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
 
</td>
                  </tr>
                  <?php } } ?>
                  <tr>
                    <td colspan="7">
                    <div class="clearfix">
                        <input type="hidden" name="sbt_action" class="sbt_action"/>
<select class="ps vm" id="ad_target_id">
<option value=""><?php echo $_lang['please_choose'];?></option>
                            	<?php if(is_array($targets_arr)) { foreach($targets_arr as $key => $v) { ?>
<option <?php if($target_id==$v['target_id']||$key==1) { ?>selected="selected"<?php } ?> value="<?php echo $v['target_id'];?>"><?php echo $v['name'];?></option>
<?php } } ?>
</select>
<a href="#" id="add_ad" class="button" onclick="return setlinks();"><span class="check icon"></span><?php echo $_lang['add_ad'];?></a>
                    </div>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                  <td colspan="9">
              		<div class="page"><?php echo $pages['page'];?></div>    
                  </td>
                  </tr>
                </tfoot>
              </table>
        	</form>
</div>
<script type="text/javascript">
function setlinks(){
var target_id=document.getElementById("ad_target_id");
var alink=document.getElementById("add_ad");
if(target_id.value!=""){
alink.href="<?php echo BASE_URL;?>/index.php/admin/tool_ad/add?target_id="+target_id.value;
return true;
}
return false;
}
function sync_select(){
var cat=document.getElementById("catid");
var target=document.getElementById("ad_target_id");
if(cat.value!=""){
var i=cat.selectedIndex;
target.options['i'].selected=true;
}
}
function update_order(n_id,n_value){
$.get("<?php echo BASE_URL;?>/index.php/admin/tool_adlist?action=u_order",{u_id:n_id,u_value:n_value});
}
</script>
 	<!--主体结束-->
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
</html>
<?php Keke_tpl::ob_out();?>