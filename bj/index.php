<?php
require_once('conn.php');
mysql_query("set names 'utf8'");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>微信排版图文编辑器</title>
        <meta charset="UTF-8">
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <link href="css/common.css" type="text/css" rel="stylesheet">
        <link href="css/index.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
        <link rel="stylesheet" href="css/editor-min.css" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/colorpicker-min.js"></script>
    </head>
    <body style="background:transparent">
        <div class="wxeditor">
            <div class="clearfix">
  <div class="left clearfix">
                    <div class="tabbox clearfix">
                        <ul class="tabs" id="tabs">

                            <li class="editorlogo"><a href="#"><span style="font-size:25px;">微信排版</span></a></li>
                            <li><a href="#" tab="tab1" class="current">关注</a></li><li><a href="#" tab="tab2" class="">标题</a></li><li><a href="#" tab="tab3" class="">内容</a></li><li><a href="#" tab="tab4" class="">互推</a></li><li><a href="#" tab="tab5" class="">分割</a></li><li><a href="#" tab="tab6" class="">原文引导</a></li><li><a href="#" tab="tab7" class="">节日</a></li>
                        </ul>
                        <em class="fr"></em>
                    </div>
                    <div class="tplcontent">
                        <div id="colorpickerbox"></div>
                        <div>
<div id="tab1" class="tab_con ">
<ul class="content clearfix">

<?php
$res=mysql_query("select * from wxstyle where type=1 order by id desc" ,$link);
if ($myrow = mysql_fetch_array($res))
{
  do {
	$style =  $myrow[2];
	$code =  $myrow[3];
	echo "<!--".$style." -->";
	echo '<li><div class="itembox">';
	echo $code;
	echo '</div></li>';
  }
  while ($myrow = mysql_fetch_array($res));
}
?>
<br /><br />
</ul>
</div>
<div id="tab2" class="tab_con dn">
<ul class="content clearfix">
<?php
$res=mysql_query("select * from wxstyle where type=2 order by id desc" ,$link);
if ($myrow = mysql_fetch_array($res))
{
  do {
	$style =  $myrow[2];
	$code =  $myrow[3];
	echo "<!--".$style." -->";	
	echo '<li><div class="itembox">';
	echo $code;
	echo '</div></li>';
  }
  while ($myrow = mysql_fetch_array($res));
}
?>
<br /><br />
</ul>
</div>
<div id="tab3" class="tab_con dn">
<ul class="content clearfix">
<?php
$res=mysql_query("select * from wxstyle where type=3 order by id desc" ,$link);
if ($myrow = mysql_fetch_array($res))
{
  do {
	$style =  $myrow[2];
	$code =  $myrow[3];
	echo "<!--".$style." -->";	
	echo '<li><div class="itembox">';
	echo $code;
	echo '</div></li>';
  }
  while ($myrow = mysql_fetch_array($res));
}
?>
<br /><br />
</ul>
</div>
<div id="tab4" class="tab_con dn">
<ul class="content clearfix">
<?php
$res=mysql_query("select * from wxstyle where type=4 order by id desc" ,$link);
if ($myrow = mysql_fetch_array($res))
{
  do {
	$style =  $myrow[2];
	$code =  $myrow[3];
	echo "<!--".$style." -->";	
	echo '<li><div class="itembox">';
	echo $code;
	echo '</div></li>';
  }
  while ($myrow = mysql_fetch_array($res));
}
?>
<br /><br />
</ul>
</div>
<div id="tab5" class="tab_con dn">
<ul class="content clearfix">
<?php
$res=mysql_query("select * from wxstyle where type=5 order by id desc" ,$link);
if ($myrow = mysql_fetch_array($res))
{
  do {
	$style =  $myrow[2];
	$code =  $myrow[3];
	echo "<!--".$style." -->";	
	echo '<li><div class="itembox">';
	echo $code;
	echo '</div></li>';
  }
  while ($myrow = mysql_fetch_array($res));
}
?>
<br /><br />
</ul>
</div>
<div id="tab6" class="tab_con dn">
<ul class="content clearfix">
<?php
$res=mysql_query("select * from wxstyle where type=6 order by id desc" ,$link);
if ($myrow = mysql_fetch_array($res))
{
  do {
	$style =  $myrow[2];
	$code =  $myrow[3];
	echo "<!--".$style." -->";	
	echo '<li><div class="itembox">';
	echo $code;
	echo '</div></li>';
  }
  while ($myrow = mysql_fetch_array($res));
}
?>
<br /><br />
</ul>
</div>
<div id="tab7" class="tab_con dn">
<ul class="content clearfix">
<?php
$res=mysql_query("select * from wxstyle where type=7 order by id desc" ,$link);
if ($myrow = mysql_fetch_array($res))
{
  do {
	$style =  $myrow[2];
	$code =  $myrow[3];
	echo "<!--".$style." -->";	
	echo '<li><div class="itembox">';
	echo $code;
	echo '</div></li>';
  }
  while ($myrow = mysql_fetch_array($res));
}
?>
<br /><br />
</ul>
</div>
</div>
</div>
<div class="goto">→</div>
                </div>
                <div class="right">
                    <div id="bdeditor">
                        <script type="text/javascript" charset="utf-8" src="js/ueditor/ueditor.config.js"></script>
                        <script type="text/javascript" charset="utf-8" src="js/ueditor/ueditor.all.min.js"> </script>
                        <script type="text/javascript" charset="utf-8" src="js/ueditor/lang/zh-cn/zh-cn.js"></script>
                              <script id="editor" type="text/plain" style="width:100%;height:560px;"></script>
              </div>
                </div>
            </div>
      
        <div id="previewbox">
                <div style="height:100%;overflow-y:scroll;padding-right:5px;">
                <div style="font-size:18px;line-height:24px;font-weight:700">久恒懒人，专注于微信公众号</div>
                <div><em style="color:#8c8c8c;font-style:normal;font-size:12px;">2014-11-19</em> <a style="font-size:12px;color:#607fa6" href="javascript:void(0);" id="post-user">jh99vucom</a> </div>
                <div id="preview"></div>
                </div>

                <div style="position:absolute;right:50px;top:40px;cursor:pointer;width:50px;height:50px;font-size:50px;font-weight:700" id="phoneclose">X</div>
        </div>
        <div class="fullshowbox">全屏</div>
        <div class="fullhidebox">退出</div>
        <div id="phone">手机预览</div>  
    </div>
    </body>
</html>
<script>
    function launchFullscreen(a){if(a.requestFullscreen){a.requestFullscreen()}else{if(a.mozRequestFullScreen){a.mozRequestFullScreen()}else{if(a.msRequestFullscreen){a.msRequestFullscreen()}else{if(a.webkitRequestFullscreen){a.webkitRequestFullScreen()}}}}};function exitFullscreen(){if(document.exitFullscreen){document.exitFullscreen()}else{if(document.mozCancelFullScreen){document.mozCancelFullScreen()}else{if(document.webkitExitFullscreen){document.webkitExitFullscreen()}}}};function fullscreenElement(){return document.fullscreenElement||document.webkitCurrentFullScreenElement||document.mozFullScreenElement||null};$(function(){$("#phoneclose").on('click',function(){$("#previewbox").hide()});$("#phone").on('click',function(){if($("#previewbox").css("display")=="block"){$("#previewbox").hide()}else{$("#previewbox").show()}});$(window).on('fullscreenchange webkitfullscreenchange mozfullscreenchange',function(){if(!fullscreenElement()){$('.wxeditor').css({margin:'0'})}});$('.fullshowbox').on('click',function(){$('.wxeditor').css({margin:'50px 0'});launchFullscreen(document.documentElement)});$('.fullhidebox').on('click',function(){$('#wxeditortip,#header').show();exitFullscreen()});var b=["borderTopColor","borderRightColor","borderBottomColor","borderLeftColor"],d=[];$.each(b,function(a){d.push(".itembox .wxqq-"+b[a])});$("#colorpickerbox").ColorPicker({flat:true,color:"#00bbec",onChange:function(a,e,f){$(".itembox .wxqq-bg").css({backgroundColor:"#"+e});$(".itembox .wxqq-color").css({color:"#"+e});$.each(d,function(g){$(d[g]).css(b[g],"#"+e)})}});var c=UE.getEditor("editor",{topOffset:0,autoFloatEnabled:false,autoHeightEnabled:false,autotypeset:{removeEmptyline:true},toolbars:[['fullscreen','source','undo','redo','bold','italic','underline','fontborder','strikethrough','removeformat','autotypeset','blockquote','pasteplain','forecolor','backcolor','insertorderedlist','insertunorderedlist','selectall','cleardoc','rowspacingtop','rowspacingbottom','lineheight','indent','justifyleft','justifycenter','justifyright','fontfamily','fontsize','justifyjustify','touppercase','tolowercase','simpleupload','emotion','insertvideo','map','date','time','spechars','preview','searchreplace'],['con','title','fork','guide','division','other','mystyle']],autoHeightEnabled:false,allowDivTransToP:false,autoFloatEnabled:true,enableAutoSave:false});c.ready(function(){c.addListener('contentChange',function(){$("#preview").html(c.getContent()+'<div><a style="font-size:12px;color:#607fa6" href="javascript:void(0);" id="post-user">久恒懒人，微信公众平台专家</a></br><a style="font-size:12px;color:#607fa6" href="javascript:void(0);" id="post-user">阅读原文</a> <em style="color:#8c8c8c;font-style:normal;font-size:12px;">阅读 100000+</em><span class="fr"><a style="font-size:12px;color:#607fa6" href="javascript:void(0);">举报</a></span></div>')});$(".itembox").on("click",function(a){c.execCommand("insertHtml","<div>"+$(this).html()+"</div><br />")})});$(".tabs li a").on("click",function(){$(this).addClass("current").parent().siblings().each(function(){$(this).find("a").removeClass("current")});$("#"+$(this).attr("tab")).show().siblings().hide()})});
</script>
