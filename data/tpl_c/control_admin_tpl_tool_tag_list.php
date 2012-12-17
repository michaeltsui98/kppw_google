<?php global $_K,$_lang; Keke_tpl::checkrefresh('control/admin/tpl/tool/tag_list', '1355567094' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link href="<?php echo $_K['siteurl'];?>/static/css/base.css" rel="stylesheet">
<div class="page_title">
    	<h1><?php echo $_lang['tag_manage'];?></h1>
        <div class="tool">         
            <a href="<?php echo BASE_URL;?>/index.php/admin/tool_tag/" <?php if($_K['action'] == 'index' and !$this->request->param('id')) { ?>class="here"<?php } ?> ><?php echo $_lang['tag_list'];?></a>
<a href="<?php echo BASE_URL;?>/index.php/admin/tool_tag/index/1" <?php if($this->request->param('id') == '1') { ?>class="here"<?php } ?> >活动</a>
<a href="<?php echo BASE_URL;?>/index.php/admin/tool_tag/index/2" <?php if($this->request->param('id') == '2') { ?>class="here"<?php } ?> >协议</a>
<a href="<?php echo BASE_URL;?>/index.php/admin/tool_tag/add/<?php echo $id;?>"><?php echo $_lang['add'];?> </a>
        </div>
</div>
<div class="box search p_relative">
  <form method="get" action="<?php echo BASE_URL;?>/index.php/admin/tool_tag"  id="frm_list">
        	<table class="detail" cellspacing="0" cellpadding="0">
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
 
<div class="box list clearfix">
    <table width="100%" class="detail" border="0" cellspacing="0" cellpadding="0" class="tab_list t_c">
        	<tr class="item">
        		<th width="50">
        			<a href="javascript:;" onclick="submitSort('<?php echo $uri;?>','tag_id',<?php echo $ord_tag;?>)">ID<?php if($_GET['f']=='tag_id') { ?><?php echo $ord_char;?><?php } ?></a>
        		</th>
        		<th align="left"><?php echo $_lang['tag_name'];?></th>
           		<th><?php echo $_lang['internal_calling_code'];?></th>
                <th><?php echo $_lang['js_calling_code'];?></th>
<th><a href="javascript:;" onclick="submitSort('<?php echo $uri;?>','on_time',<?php echo $ord_tag;?>)"><?php echo $_lang['time'];?><?php if($_GET['f']=='on_time') { ?><?php echo $ord_char;?><?php } ?></a></th>
                <th width="160"><?php echo $_lang['operate'];?></th>
               
            </tr>
                <?php if(is_array($list_arr)) { foreach($list_arr as $v) { ?>
                <tr class="item">
                	<td><input type="checkbox" name="ckb[]" class="checkbox" value="<?php echo $v['tag_id'];?>"><?php echo $v['tag_id'];?></td>
                    <td><?php echo $v['tagname'];?></td>
                    <td>
                        <input type="text" class="txt" value="<?php echo '<!--{tag '.$v['tagname'].'}-'; ?>->" size="30" onfocus="setCopy(this.value,'点击复制')">
                    </td>
                    <td>
                        <input type="text" class="txt" value="<script src='<?php echo $_K['siteurl'];?>/js.php?op=tag&tag_id=<?php echo $v['tag_id']?>'></script>"  size="60" onfocus="setCopy(this.value,'点击复制')">
                    </td>
<td><?php if($v['on_time']){echo date('Y-m-d',$v['on_time']); } ?></td>
                    <td colspan="3">
                        <a href="<?php echo $base_uri;?>/preview?&tag_id=<?php echo $v['tag_id'];?>" target="_blank" class="button dbl_target">
                        <span class="book icon"></span><?php echo $_lang['view'];?></a>
                        <a href="<?php echo $add_uri;?>?tag_id=<?php echo $v['tag_id']?>" class="button">
                        <span class="pen icon"></span><?php echo $_lang['edit'];?></a>
                        <a href="<?php echo $del_uri;?>?tag_id=<?php echo $v['tag_id']?>" onclick="return cdel(this)"  class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
                    </td>
                </tr>
<?php } } ?>
<tfoot>	
<tr >
    <td colspan="9">
    <div class="page" ><?php echo $pages['page'];?></div>
    <input type="checkbox" onclick="checkall(event);" id="checkbox" name="checkbox"/>
        	<label for="checkbox"> <?php echo $_lang['select_all'];?></label>
        	<input type="hidden" name="sbt_action" class="sbt_action"/>
<button type="submit" name="sbt_action" onclick="return batch_act(this)" value="<?php echo $_lang['mulit_delete'];?>" class="pill negative" >
<span class="trash icon"></span><?php echo $_lang['mulit_delete'];?>
</button>
        	</td>
        </tr>
   </tfoot>
       </table>
</div>
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