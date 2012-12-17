<?php global $_K,$_lang; Keke_tpl::checkrefresh('control/admin/tpl/tool/ad_add', '1355567033' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <h1><?php echo $_lang['ads'];?><?php echo $page_tips;?></h1>
    <div class="tool">
        <a href="<?php echo BASE_URL;?>/index.php/admin/tool_ad/adlist"><?php echo $_lang['ads_list'];?></a>
        <a href="<?php echo BASE_URL;?>/index.php/admin/tool_ad/add" class="here"><?php echo $_lang['add_ads'];?><?php echo $page_tips;?></a>
    </div>
</div>
<div class="box post">
 
<form method="post" action="<?php echo BASE_URL;?>/index.php/admin/tool_ad/save"  enctype="multipart/form-data" id="form1">
    <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="hdn_ad_id" value="<?php echo $ad_data['ad_id'];?>">
    <input type="hidden" name="hdn_ad_type" id="hdn_ad_type" value="<?php echo $ad_data['ad_type'];?>" />
    <input type="hidden" name="hdn_target_id" id="hdn_ad_type" value="<?php echo $target_id;?>" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th scope="row" width="130"> <?php echo $_lang['ads_title'];?></th><td>
                <input type="text" value="<?php echo $ad_data['ad_name'];?>" name="ad_name" id="title" <?php if($tagname) { ?>readonly="readonly"<?php } ?> class="txt" style=" width:260px;" limit="required:true;len:1-50" msg="<?php echo $_lang['ad_title_not_null'];?>" original-title="<?php echo $_lang['ads_description'];?>" msgArea="item_title_msg"/><b style="color:red">*</b>
                <?php if($group_arr) { ?><input type="hidden" value="<?php echo $ad_data['ad_name'];?>" name="hdn_ad_name" /><?php } ?><!-- 隐藏域优先添加 -->
                <span id="item_title_msg"><?php echo $_lang['ads_description'];?></span></td>
        </tr> 
        <tr>
            <th scope="row" width="130"><?php echo $_lang['start_time'];?></th><td>
                <input type="text" value="<?php if($ad_data['start_time']){echo date('Y-m-d',$ad_data['start_time']); } ?>"  name="start_time" class="txt" onclick="showcalendar(event, this, 0)" title="设置广告广告开始的时间，格式 yyyy-mm-dd，留空为不限制开始时间">
                <span id="start_time_msg">设置广告展示生效开始时间，留空为永久有效</span></td>
        </tr>
        <tr>
            <th scope="row" width="130"><?php echo $_lang['end_time'];?></th><td>
                <input type="text" value="<?php if($ad_data['end_time']){echo date('Y-m-d',$ad_data['end_time']); } ?>" name="end_time" class="txt" onclick="showcalendar(event, this, 0)" title="设置广告广告结束的时间，格式 yyyy-mm-dd，留空为不限制结束时间" />
                <span id="end_time_msg">设置广告展示生效结束时间，留空为永久有效</span></td>
        </tr>
        <tr>
            <th scope="row" width="130"><?php echo $_lang['presentation'];?></th>
            <td>
            	<div id="select_ad_type">
            	<input type="radio" name="ad_type" value="code" onclick="swaptab('ad','backLava','',4,1)"  checked/><?php echo $_lang['code'];?>
            	<input type="radio" name="ad_type" value="text" onclick="swaptab('ad','backLava','',4,2)" /><?php echo $_lang['text'];?>
            	<input type="radio" name="ad_type" value="image" onclick="swaptab('ad','backLava','',4,3)" /><?php echo $_lang['img'];?>
            	<input type="radio" name="ad_type" value="flash" onclick="swaptab('ad','backLava','',4,4)" />flash
            	(<?php echo $_lang['select_ads_presentation'];?>)
            	</div>
            </td>
        </tr>
        <!-- code -->
        <tbody id="div_ad_1" class="hidden">
            <tr><th><?php echo $_lang['html_code'];?></th><td>
            	<textarea name="ad_type_code_content" title=<?php echo $_lang['according_display_effect_enter_content'];?> cols="100" rows="10" class="txt"><?php echo $ad_data['ad_content'];?></textarea>
            	</td>
            </tr>
        </tbody>
        <!-- 文字 -->
        <tbody id="div_ad_2" class="hidden">
            <tr><th><?php echo $_lang['text_content'];?></th><td>
            	<textarea name="ad_type_text_content" cols="100" title=<?php echo $_lang['according_display_effect_enter_content'];?> rows="10" class="txt"><?php echo $ad_data['ad_content'];?></textarea>
            	</td>
            </tr>
        </tbody>
 <!-- 图片 -->
         <tbody id="div_ad_3" class="hidden">
            <tr>
            	<th><?php echo $_lang['img_address'];?></th>
<td>
<input type="file" name="ad_type_image_file" value="<?php echo $ad_data['ad_file'];?>"  onchange="isExtName(this,1)" ext=".jpg,.png,.gif,.jpeg,.bmp" title=<?php echo $_lang['img_ads_img_call_address'];?> />
<?php if($ad_data['ad_file']) { ?>
<div class="clear"></div>
<input type="hidden" name="ad_type_image_path" value="<?php echo $ad_data['ad_file'];?>">
<div style="margin-top:10px;" >
<img src="<?php echo BASE_URL;?>/<?php echo $ad_data['ad_file'];?>" width="200px" height="200px" alt="<?php echo $_lang['ad_thumbnail'];?>" />
</div>
<?php } ?>
</td>
</tr>
<tr><th><?php echo $_lang['image_width'];?></th><td><input type="text" limit="required:false;type:int" msg="<?php echo $_lang['width_error'];?>" value="<?php if($ad_data['ad_type']==image) { ?><?php echo $ad_data['width'];?><?php } ?>" name="ad_type_image_width"  id="ad_type_image_width"  title=<?php echo $_lang['enter_img_ads_width'];?>  class="txt" msgArea="span_width"/><span id="span_width"></span></td></tr>
<tr><th><?php echo $_lang['image_height'];?></th><td><input type="text" limit="required:false;type:int" msg="<?php echo $_lang['height_error'];?>" value="<?php if($ad_data['ad_type']==image) { ?><?php echo $ad_data['height'];?><?php } ?>" name="ad_type_image_height" id="ad_type_image_height"  title=<?php echo $_lang['enter_img_ads_height'];?> class="txt"  msgArea="span_height"/><span id="span_height"></span></td></tr>
<tr><th>链接地址</th><td><input type="text" value="<?php echo $ad_data['ad_url'];?>" name="ad_type_image_url" class="txt" title=<?php echo $_lang['img_ads_img_call_address'];?> /></td></tr>
        </tbody>
        <!-- flash -->
        <tbody id="div_ad_4" class="hidden">
            <tr><th><?php echo $_lang['flash_address'];?></th><td><div id="flash_way">
            		<input type="radio" id="flash_url" name="flash_method" value="url">url
            		<input type="radio" id="flash_file" name="flash_method" value="file"><?php echo $_lang['file'];?>
            		<br/>
            		<input type="text" size="60" id="ad_type_falsh_url" name="ad_type_flash_url" value="<?php echo $ad_data['ad_file'];?>" class="txt" style="display:none;" /> 
           			<input type="file" name="ad_type_flash_file" id="ad_type_flash_file" style="display:none;" value="<?php echo $ad_data['ad_file'];?>"  onchange="isExtName(this,1)" ext=".jpg,.png,.gif,.jpeg,.bmp" />
           			</div></td>
            </tr>
<tr><th><?php echo $_lang['flash_width'];?></th><td><input type="text" value="<?php if($ad_data['ad_type']==flash) { ?><?php echo $ad_data['width'];?><?php } ?>" name="ad_type_flash_width" id="ad_type_flash_width" title=<?php echo $_lang['flash_ads_call_address'];?> class="txt" /></td></tr>
<tr><th><?php echo $_lang['flash_height'];?></th><td><input type="text" value="<?php if($ad_data['ad_type']==flash) { ?><?php echo $ad_data['height'];?><?php } ?>" name="ad_type_flash_height" id="ad_type_flash_height" title=<?php echo $_lang['flash_ads_height'];?> class="txt" /></td></tr>
        </tbody> 
        <tr>
        	<th><?php echo $_lang['order'];?></th>
        	<td><input type="text" name="listorder" value="<?php echo $ad_data['listorder'];?>" class="txt" limit="type:int" /></td>
        </tr>
        <tr>
        	<th><?php echo $_lang['is_open'];?></th>
        	<td><input type="radio" name="rdn_is_allow" value="1" <?php if($ad_data['is_allow']==='1' || !$ad_data['is_allow']) { ?>checked="checked"<?php } ?> /><?php echo $_lang['yes'];?>
        		<input type="radio" name="rdn_is_allow" value="0" <?php if($ad_data['is_allow']==='0') { ?>checked="checked"<?php } ?> /><?php echo $_lang['no'];?>
        	</td>
        </tr>
        <tr>
            <th scope="row">
                &nbsp;
            </th>
            <td>
                <div class="clearfix padt10">
                	<input type="hidden" name="sbt_action" value="1">
                    <button class="positive pill primary button" type="button" name="sbt_action" value="<?php echo $_lang['submit'];?>" onclick="checkform();">
                        <span class="check icon"></span><?php echo $_lang['submit'];?>
                    </button>
<button class="pill button" onclick="to_back();" value="<?php echo $_lang['return'];?>" type="button"><span class="uparrow icon"></span><?php echo $_lang['return'];?></button>
                </div>
            </td>
        </tr>
    </table>
</form>
 
</div>


<script type="text/javascript">
             $(function(){
         		var show_type=$("#hdn_ad_type").val();
if(show_type){
$("#select_ad_type :radio").each(function(index){
         			var value=$(this).val();
         			if(value==show_type){ //alert(index);
         				$(this).attr("checked","checked");
         				var tab = 'div_ad_'+(index+1);
$("#"+tab+"").removeClass("hidden");
         			}
         			});
}else{
$("#div_ad_1").removeClass("hidden");
}
         		
         		$("#flash_way :radio").click(function(){
         			$("#ad_type_flash_file").hide();
         			$("#ad_type_falsh_url").hide();
         			var v=$(this).val();
         			if(v=="url"){
         				$("#ad_type_falsh_url").show();
         			}
         			if(v=="file"){
         				$("#ad_type_flash_file").show();
         			}
         			
         		});
         		$("#rdn_position :radio").click(function(){
         			var type=$("#select_ad_type :checked").val();
         			var typeID=type+"_select";
         			var i = $(this).index();
         			i++;
         			var sel_option=document.getElementById(typeID);
         			if(typeof(sel_option)=="object")
         				sel_option.options['i'].selected=true;//没有触发onchange事件
         				var v=sel_option.value; 
         				setsize(v,type);
         		})
         });
         	// v = value o = code|text|image|flash
         	function setsize(v, o) {
if(v!=-1) {
var size = v.split('*');
//ad_type_image_width
 var w = size['0'];
 var h = size['1'];
 document.getElementById('ad_type_' + o + '_width').value = w;
 document.getElementById('ad_type_' +o + '_height').value = h;
}else{
document.getElementById('ad_type_' + o + '_width').value = '';
document.getElementById('ad_type_' +o + '_height').value = '';
}
}
function checkform(){

var i = checkForm(document.getElementById('form1'));
if(i){

 	document.getElementById("form1").submit();

}else{
return false;
}
}
function chkCheckBoxChs(){ //檢測是否有選擇多选框的至少一项
var obj = document.getElementsByName('ckb_tpl_type[]'); //獲取多選框數組
var objLen= obj.length; //獲取數據長度
var objYN; //是否有選擇
var i;
objYN=false;
for (i = 0;i< objLen;i++){
if (obj [i].checked==true) {
objYN= true;
break;
}
}
return objYN;

}
function chkRadio(){				
 var position = document.getElementsByName("ad_position");
 var objYN;
 var i;
 objYN=false;
 for(var i=0;i<position.length;i++){
  if(position[i].checked==true){
   return true;
   break;
  }
 }
return objYN;
}
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