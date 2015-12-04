<?php
require_once('conn.php');
mysql_query("set names 'utf8'");
?>
<!DOCTYPE html>
<html>
    <head>
<title>QQ兴趣部落编辑器,兴趣部落发帖编辑器,兴趣部落素材-懒人部落</title>
<meta name="keywords" content="QQ兴趣部落编辑器,兴趣部落发帖编辑器,兴趣部落素材" />
<meta name="description" content="懒人部落专注于提供兴趣部落工具，其内容涵盖QQ兴趣部落编辑器,兴趣部落发帖编辑器,兴趣部落素材等，让任何一个部落运营人员都能轻松制作自己想要效果！" />
        <meta charset="UTF-8">
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <link href="css/common.css" type="text/css" rel="stylesheet">
        <link href="css/index.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
        <link rel="stylesheet" href="css/editor-min.css" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/colorpicker-min.js"></script>
    </head>

<!-- 顶部样式  -->

<link type="text/css" href="/Public/css/newindex1.css" rel="stylesheet" />



</head>

<style type="text/css">
.current_nav53{ border-bottom:3px solid #06a7e1;}
.current_nav53 a{ color:#3399e0;}
</style>

<body>

<div class="head der">
         
<div class="log lo">
        	
<div class="clear le"><a href="/" target="_blank" title="懒人部落最大兴趣部落导航平台！"><img src="http://buluo.lanrenmb.com/upload/0/e/e/d/thumb_565722377994f.png" /></a></div>
            <div class="topimg le">
           <div class="seachefot">
            <script type="text/javascript">
$(document).ready(function(){
  
  $('.seachefot li').mousemove(function(){
  $(".seachefot li.seaches").addClass("intro");
  $(this).find('.menu').show();
  });
  $('.seachefot li').mouseleave(function(){
 $(".seachefot li.seaches").removeClass("intro")
  $(this).find('.menu').hide();
  });
  
});
</script>
            
            <li class="seaches">
             <span>频道</span> 
       
             <div class="menu l">
             	<div class="menu_box l">
                	<ul>
                    	<li>
                        	<a href="/">首页</a>
                            <a href="/Index/type/channel/43.html" target="_blank">兴趣部落</a>               
                            <a href="/Index/type/typeid/90.html" target="_blank" title="部落帮助">部落帮助</a>
                            <a href="/Index/type/typeid/94.html" target="_blank" title="部落营销">部落营销</a>
                           <a href="/Index/type/typeid/95.html" target="_blank" title="微信精选">微信精选</a>
                        </li>
                        <li>
                        	<a href="/Index/type/typeid/93.html" target="_blank" title="部落素材">部落素材</a>
                            <a href="/Index/type/typeid/101.html" target="_blank">标题</a>
                            <a href="/Index/type/typeid/103.html" target="_blank">正文</a>
							<a href="/Index/type/typeid/102.html" target="_blank">图文</a>
                        </li>
                        <li>
                        	<a href="/Index/type/typeid/92.html" target="_blank" title="部落符号">部落符号</a>
                            <a href="/Index/type/typeid/96.html" target="_blank">Emoji</a>
                            <a href="/Index/type/typeid/97.html" target="_blank">图案</a>
                            <a href="/Index/type/typeid/98.html" target="_blank">表情</a>
							<a href="/Index/type/typeid/99.html" target="_blank">箭头</a>
							<a href="/Index/type/typeid/100.html" target="_blank">爱心</a> 
                        </li>
                        <li>
                        	<a href="#">其他功能</a>
                            <a href="/bj/">部落编辑器</a>
                            
                        </li>
                    </ul>

                </div>
                <div class="menu_pic l">
                
                    <div class="nabend l">
                    	<div class="l"><img src="/Public/images/code.png" /></div>
                        <div class="naover l">
                        	<h3>懒人部落</h3>
                             <a href="http://s.p.qq.com/pub/jump?d=AAAXbteL">扫描或点击关注</a>
                        </div>
                    </div>
                </div>
             </div>   </li>
           
            
            </div>
            
            </div>
            <div class="clear_so le">

            	 <form role="form" method="get" id="form1" action="/Index/search.html">


                	<input type="text" name="keyword" value="输入部落名称、ID、关键词搜索" class="seak sea" onfocus="javascript:if(this.value == '输入部落名称、ID、关键词搜索') this.value = ''; this.style.color='black';" onblur="if(this.value == '') {this.value = '输入部落名称、ID、关键词搜索';  this.style.color = '#bdbdbd';}"/>
                    <input type="submit" class="sercallf le" value="" />
               
				
				</form>
            </div>
        <div class="detfor r">
<li class="wxadd"> 
<a href="#" target="_blank" title="微信收录">提交</a></li>

<li class="weibo"><a href="#" target="_blank">微博</a></li>
<li class="wxapp"><a href="#" target="_blank" title="微信APP">APP</a></li>
<li class="dlogin"> <a href="#" target="_blank">登录</a><span class="splite">|</span><a href="#" target="_blank">注册</a></li>
</div>
        </div>
    </div>
<div class="main_main">
 <div class="ptadc">
    <div class="ptadcf"><script type="text/javascript">
    /*960*90 创建于 2015-11-23*/
    var cpro_id = "u2414342";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>

</div>
    </div>

<!--  -->

<br>

    <body style="background:transparent">
        <div class="wxeditor">
            <div class="clearfix">
  <div class="left clearfix">
                    <div class="tabbox clearfix">
                        <ul class="tabs" id="tabs">

                            <li class="editorlogo"><a href="/"><span style="font-size:25px;">懒人部落</span></a></li>
                            <li><a href="javascript:void(0);" tab="tab1" class="current">整套模板</a></li><li><a href="javascript:void(0);" tab="tab2" class="">标题</a></li><li><a href="javascript:void(0);" tab="tab3" class="">内容</a></li><li><a href="javascript:void(0);" tab="tab4" class="">图文</a></li><li><a href="javascript:void(0);" tab="tab5" class="">分割</a></li><li><a href="javascript:void(0);" tab="tab6" class="">点赞赞赏</a></li><li><a href="javascript:void(0);" tab="tab7" class="">节日</a></li>
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
                <div style="font-size:18px;line-height:24px;font-weight:700">懒人部落，专注于兴趣部落</div>
                <div><em style="color:#8c8c8c;font-style:normal;font-size:12px;">2015-12-01</em> <a style="font-size:12px;color:#607fa6" href="http://s.p.qq.com/pub/jump?d=AAAXZdYh" id="post-user">懒人部落(一键关注)</a> </div>
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
    function launchFullscreen(a){if(a.requestFullscreen){a.requestFullscreen()}else{if(a.mozRequestFullScreen){a.mozRequestFullScreen()}else{if(a.msRequestFullscreen){a.msRequestFullscreen()}else{if(a.webkitRequestFullscreen){a.webkitRequestFullScreen()}}}}};function exitFullscreen(){if(document.exitFullscreen){document.exitFullscreen()}else{if(document.mozCancelFullScreen){document.mozCancelFullScreen()}else{if(document.webkitExitFullscreen){document.webkitExitFullscreen()}}}};function fullscreenElement(){return document.fullscreenElement||document.webkitCurrentFullScreenElement||document.mozFullScreenElement||null};$(function(){$("#phoneclose").on('click',function(){$("#previewbox").hide()});$("#phone").on('click',function(){if($("#previewbox").css("display")=="block"){$("#previewbox").hide()}else{$("#previewbox").show()}});$(window).on('fullscreenchange webkitfullscreenchange mozfullscreenchange',function(){if(!fullscreenElement()){$('.wxeditor').css({margin:'0'})}});$('.fullshowbox').on('click',function(){$('.wxeditor').css({margin:'50px 0'});launchFullscreen(document.documentElement)});$('.fullhidebox').on('click',function(){$('#wxeditortip,#header').show();exitFullscreen()});var b=["borderTopColor","borderRightColor","borderBottomColor","borderLeftColor"],d=[];$.each(b,function(a){d.push(".itembox .wxqq-"+b[a])});$("#colorpickerbox").ColorPicker({flat:true,color:"#00bbec",onChange:function(a,e,f){$(".itembox .wxqq-bg").css({backgroundColor:"#"+e});$(".itembox .wxqq-color").css({color:"#"+e});$.each(d,function(g){$(d[g]).css(b[g],"#"+e)})}});var c=UE.getEditor("editor",{topOffset:0,autoFloatEnabled:false,autoHeightEnabled:false,autotypeset:{removeEmptyline:true},toolbars:[['fullscreen','source','undo','redo','bold','italic','underline','fontborder','strikethrough','removeformat','autotypeset','blockquote','pasteplain','forecolor','backcolor','insertorderedlist','insertunorderedlist','selectall','cleardoc','rowspacingtop','rowspacingbottom','lineheight','indent','justifyleft','justifycenter','justifyright','fontfamily','fontsize','justifyjustify','touppercase','tolowercase','simpleupload','emotion','insertvideo','map','date','time','spechars','preview','searchreplace'],['con','title','fork','guide','division','other','mystyle']],autoHeightEnabled:false,allowDivTransToP:false,autoFloatEnabled:true,enableAutoSave:false});c.ready(function(){c.addListener('contentChange',function(){$("#preview").html(c.getContent()+'<div><a style="font-size:12px;color:#607fa6" href="javascript:void(0);" id="post-user">懒人部落，专注于兴趣部落</a></br><a style="font-size:12px;color:#607fa6" href="javascript:void(0);" id="post-user">阅读原文</a> <em style="color:#8c8c8c;font-style:normal;font-size:12px;">阅读 100000+</em><span class="fr"><a style="font-size:12px;color:#607fa6" href="javascript:void(0);">举报</a></span></div>')});$(".itembox").on("click",function(a){c.execCommand("insertHtml","<div>"+$(this).html()+"</div><br />")})});$(".tabs li a").on("click",function(){$(this).addClass("current").parent().siblings().each(function(){$(this).find("a").removeClass("current")});$("#"+$(this).attr("tab")).show().siblings().hide()})});
</script>
