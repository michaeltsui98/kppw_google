<?php global $_K,$_lang; Keke_tpl::checkrefresh('control/admin/tpl/tool/tpl', '1355566942' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    	<h1><?php echo $_lang['tpl_manage'];?></h1>
         <div class="tool"></div>
</div>
<div class="box list">
    
        <table class="detail"  height="auto" border="0" cellspacing="0" cellpadding="0" >
            <tr>
            	<th><?php echo $_lang['tpl_name'];?></th>
<th width="150"><?php echo $_lang['tpl_img'];?></th>
<th><?php echo $_lang['explain'];?></th>
<th><?php echo $_lang['open_status'];?></th>
<th><?php echo $_lang['current_skin'];?></th>
<th><?php echo $_lang['author'];?></th>
<th><?php echo $_lang['operate'];?></th>
            </tr>
<form name="frm_list" action="<?php echo BASE_URL;?>/index.php/admin/tool_tpl/save" method="post">
<?php if(is_array($list_arr)) { foreach($list_arr as $v) { ?>
<tr class="item">
                <td><?php echo $_lang[$v['tpl_title']];?></td>
<td>
                    <img src="../../tpl/<?php echo $v['tpl_title']?>/img/style/<?php echo $v['tpl_title'];?>.jpg" alt=<?php echo $_lang['preview'];?> width="110px;" height="120px;" />
</td>
<td><?php echo $v['tpl_desc']?></td>
                <td>
                	<label for="rdo_temp_<?php echo $v['tpl_id'];?>">
                         <input type="radio" value="<?php echo $v['tpl_id'];?>" 
 id="rdo_temp_<?php echo $v['tpl_id'];?>" name="rdo_is_selected" 
 <?php if($v['is_selected']==1) { ?>checked="checked"<?php } ?>/>
                    </label>
                </td>
                <td>
                	<?php if(is_array($skins)) { foreach($skins as $k => $vv) { ?>
<input type="radio" value="<?php echo $k;?>" id="rdo_tpl_<?php echo $v['tpl_id'];?>"
 name="skin[<?php echo $v['tpl_title'];?>]" <?php if($v['tpl_pic']==$k) { ?>checked<?php } ?>/><?php echo $_lang[$vv];?></br>
<?php } } ?>
                </td>
<td><?php echo $v['develop']?></td>	
                <td>
                	<button type="submit"  name="sbt_edit" id="sbt_edit" class="button" value="<?php echo $_lang['use'];?>"> <?php echo $_lang['use'];?> </button>
                	 <a type="button" class="button" value="<?php echo $_lang['preview'];?>" onclick="window.open('http://www.kekezu.com/app_store-view-app_tpl.html#holder')"><span class="book icon"></span><?php echo $_lang['view'];?></a>
                     <a type="button" class="button" value="<?php echo $_lang['edit'];?>" href='<?php echo BASE_URL;?>/index.php/admin/tool_tpl/list?tplname=<?php echo $v['tpl_path'];?>'><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
 <a type="button" class="button" value="<?php echo $_lang['export'];?>" href='<?php echo BASE_URL;?>/index.php/admin/tool_tpl/backup?tplname=<?php echo $v['tpl_path'];?>'><?php echo $_lang['backup'];?></a>
 <?php if($v['tpl_path']!='default') { ?>
                        <a href="<?php echo BASE_URL;?>/index.php/admin/tool_tpl/del?delid=<?php echo $v['tpl_id']?>" 
type="button" class="button" value="<?php echo $_lang['uninstall'];?>" onclick="return confirm(<?php echo $_lang['comfirm_want_del'];?>)"><?php echo $_lang['uninstall'];?></a>
                     <?php } ?>
                </td>  
                   
            </tr>
<?php } } ?>
</form>
  <tr>
                <td scope="row">
                    
                </td>
                <td colspan="6">
                	<?php echo $_lang['enter_dir_name'];?>
<form name="frm_list" action="<?php echo BASE_URL;?>/index.php/admin/tool_tpl/install" method="post" enctype="multipart/form-data">
<input name="txt_newtplpath" type="text" class="txt" >
<button type="submit" name="sbt_edit" class="button" value=<?php echo $_lang['from_dir_install'];?>><?php echo $_lang['from_dir_install'];?></button>
</form>
                </td>
             </tr>
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
</html><?php Keke_tpl::ob_out();?>