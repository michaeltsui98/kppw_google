<?php global $_K,$_lang; Keke_tpl::checkrefresh('tpl/default/show_msg', '1355567085' );?><?php if($_K['inajax']==1) { ?>
<h3 class="flb"><em><?php echo $title;?></em><span>
<a href="javascript:;" class="flbc" onClick="hideWindow('<?php echo $r['handlekey']?>');" title="<?php echo $_lang['close'];?>">&#10005</a></span>
</h3>
   	<div class="c altw"><div class="<?php echo $type;?>"><p><?php echo $content?></p></div></div>
<p class="o pns">
<?php if($time>0) { ?>
<button class="submit" value="true" onclick="<?php if($url) { ?>window.location.href ='<?php echo $url?>';<?php } else { ?>hideWindow('<?php echo $r['handlekey']?>');<?php } ?>" id="fwin_dialog_submit"><?php echo $_lang['confirm'];?></button>
<?php } else { ?>
<button class="button" onclick="hideWindow('<?php echo $r['handlekey']?>');" id="fwin_dialog_submit"><?php echo $_lang['jumping'];?></button>
<?php } ?>
</p>
<script type="text/javascript">
var t = parseInt("<?php echo $time?>")*1000;
var u =encodeURI("<?php echo $url?>");
if(t>0&&u){
    setTimeout(function(){
window.location.href=u;
},t);		 
} 
</script>
<?php } else { ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="zh-cn" id="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="zh-cn" id="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="zh-cn" id="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="zh-cn"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<title><?php echo $_lang['jump_notice'];?></title>
<link href="<?php echo BASE_URL;?>/<?php echo SKIN_PATH;?>/ui/style/theme.css" rel="stylesheet" charset="utf-8"  >
</head>
<body>
<div id="win" class="win ">
<table cellspacing="0" cellpadding="0" class="win_table"><tbody><tr><td class="tt_l"></td><td class="tt_c"></td><td class="tt_r"></td></tr><tr><td class="m_l"></td><td class="m_c">
<div class="box">
<div class="inner">
<div class="box_header">
<div class="box_title">
<h1 class="title"><?php echo $title;?></h1>
</div>
<p class="win_close"><a href="#" title="<?php echo $_lang['close'];?>">&#10005</a></p>
</div>	
<div class="box_detail <?php echo $type;?>">
<div class="icon"></div>
<div class="detail ">
<p>
<?php echo $content;?>
</p>
</div>
</div>

<div class="box_footer">
<span class="msg">
<strong id="time" class="cc00"><?php echo $time;?></strong> <small><?php echo $_lang['seconds_auto_jump'];?></small>
</span>

<span class="btn_box">	
<button class="submit" onclick='window.location.href="<?php echo $url;?>"'><?php echo $_lang['submit'];?></button>
<?php if($type =='confirm') { ?>
<button class="button" onclick="window.history.back(-1);"><?php echo $_lang['cancel'];?></button>
<?php } ?>
</span>
</div>
</div>
</div>
</td><td class="m_r"></td></tr><tr><td class="b_l"></td><td class="b_c"></td><td class="b_r"></td></tr></tbody></table>	

</div> 
<script type='text/javascript'>
window.onload=function(){
setInterval(show_time, 1000);
}
function show_time(){
var time = document.getElementById("time").innerHTML;
time = parseInt(time);
if (time > 0){
time -= 1; 
}
document.getElementById("time").innerHTML = time;
if(time ==0){
window.location.href="<?php echo $url;?>";
}
}
</script>
</body>
</html>
<?php } ?><?php Keke_tpl::ob_out();?>