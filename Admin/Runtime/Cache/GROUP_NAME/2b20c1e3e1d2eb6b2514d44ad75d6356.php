<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo (C("SITENAME")); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="__PUBLIC__/misc/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="__PUBLIC__/misc/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="__PUBLIC__/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="__PUBLIC__/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="__PUBLIC__/misc/html5shiv.min.js"></script>
        <script src="__PUBLIC__/misc/respond.min.js"></script>
    <![endif]-->
    <style>
      .color-palette {
        height: 35px;
        line-height: 35px;
        text-align: center;
      }
      .color-palette-set {
        margin-bottom: 15px;
      }
      .color-palette span {
        display: none;
        font-size: 12px;
      }
      .color-palette:hover span {
        display: block;
      }
      .color-palette-box h4 {
        position: absolute;
        top: 100%;
        left: 25px;
        margin-top: -40px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        display: block;
        z-index: 7;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      
      <header class="main-header">
        <!-- Logo -->
        <a href="__PUBLIC__/index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Lan</b>ren</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>懒人后台管理系统</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
          
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="__PUBLIC__/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION["admin"]['userid'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="__PUBLIC__/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      最后登陆时间：<?php echo date("m-d H:s",$_SESSION["admin"]['logintime']);?>
                      <small>IP:<?php echo $_SESSION["admin"]['loginip'];?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">修改</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo U("Public/logout");?>" class="btn btn-default btn-flat">退出</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="__PUBLIC__/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION["admin"]['userid'];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">功能管理</li>
    
            <li class="treeview active">
              <a href="#">
                <i class="fa  fa-cog"></i> <span>系统管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo U("System/index");?>"><i class="fa fa-cog"></i> 系统设置</a></li>
                <li><a href="<?php echo U("Admin/index");?>"><i class="fa fa-user"></i> 管理员</a></li>                
                <li><a href="<?php echo U("System/deleteCache");?>"><i class="fa fa-refresh"></i>更新缓存</a></li>
              </ul>
            </li>


            <li class="treeview active">
              <a href="#">
                <i class="fa fa-folder"></i> <span>文章管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo U("Type/index");?>"><i class="fa fa-circle-o"></i> 分类管理</a></li>
                <li><a href="<?php echo U("Type/article");?>"><i class="fa fa-circle-o"></i> 文章管理</a></li>
              </ul>
            </li>


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            文章管理
            <small>文章</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">文章</a></li>
            <li class="active">编辑</li>
          </ol>
        </section>

 <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo ($vo["title"]); ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="form1" action="<?php echo U("Type/article_update");?>" class="pageForm required-validate">
                  <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" >
                  <div class="box-body">
                    <div class="form-group">
                      <label>文档主栏目</label>
                      <select name="typeid" class="form-control required number">
                      <?php
 echo getJG(0,0,"",$vo['typeid']); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>标题</label>
                      <input type="text" name="title"  class="form-control required"  value="<?php echo ($vo["title"]); ?>">
                    </div>

                   
                    <div class="form-group">
                      <label>缩略图</label>
                      <div class="input-group">
                        <input type="text" id="litpic" name="litpic" class="form-control" value="<?php echo ($vo["litpic"]); ?>">
                        <span class="input-group-addon"><a href="javascript:void();" onclick="upyunWapPicUpload('litpic')"><i class="fa fa-fw fa-upload"></i>点击上传</a></span>
                      </div>
                    </div>   


                  <div class="form-group">
                    <label>内容摘要</label>
                    <textarea name="description" class="form-control" style="height:80px;">
                      <?php echo ($vo["description"]); ?>
                    </textarea>
                  </div>

                 <!-- Date range -->
                  <div class="form-group">
                    <label>更新时间</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservationtime" name="pubdate" value="<?php echo (date("Y-m-d H:i:s",$vo['pubdate'])); ?>">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->


                  <div class="form-group">
                    <label>点击数</label>
                    <input type="text" name="click"  class="form-control required"  value="<?php echo ($vo["click"]); ?>">
                  </div>

                   <div class="form-group">
                    <label>内容</label>
                      <textarea id="editor1" name="body"  cols="80">
                      <?php echo ($vo1["body"]); ?>
                      </textarea>
                  </div>  

                 <!-- checkbox -->
                  <div class="form-group">
                    <label>
                      <input name="remote" type="checkbox" class="minimal" checked>下载远程图片和资源
                    </label>
                  </div>

                  <div class="form-group">
                    <label>
                      <input name="autolitpic" type="checkbox" class="minimal" checked>提取第一个图片为缩略图
                    </label>
                  </div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button  id="sub" class="btn btn-primary">提交</button>
                  </div>
                </form>
              </div><!-- /.box -->
         
            </div><!--/.col (left) -->

          </div>   <!-- /.row -->
        </section><!-- /.content -->



      </div><!-- /.content-wrapper -->

      
    

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2020 <a href="http://www.lanrenmb.com"><?php echo C('copyright');?></a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            
         
          </div><!-- /.tab-pane -->
    
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>




    <!-- jQuery 2.1.4 -->
    <script src="__PUBLIC__/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="__PUBLIC__/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="__PUBLIC__/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="__PUBLIC__/dist/js/demo.js"></script>



<script src="__PUBLIC__/misc/jquery.validate.js" type="text/javascript"></script>
<script src="__PUBLIC__/misc/regional.zh.js" type="text/javascript"></script>
<style type="text/css">
span.error {   overflow:hidden; width:165px; height:21px; padding:0 3px; line-height:21px; background:#F00; color:#FFF; top:5px; left:318px;}
label.alt {display:block; overflow:hidden; position:absolute;line-height:20px}
.textInput, input.focus, input.required, input.error, input.readonly, input.disabled,
</style>

<script type="text/javascript">
$.validator.setDefaults({errorElement:"span"});
$(document).ready(function()
{
  $('#sub').click (function () {
    var $form=$("#form1");
    if(!$form.valid()){
    return false;}
    $("form").submit();
  });
}); 
</script>











     
    </div><!-- ./wrapper -->


  <!-- date-range-picker -->
  <script src="__PUBLIC__/misc/moment.min.js"></script>
  <script src="__PUBLIC__/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- daterange picker -->
  <link rel="stylesheet" href="__PUBLIC__/plugins/daterangepicker/daterangepicker-bs3.css">

  <script src="__PUBLIC__/misc/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" href="__PUBLIC__/misc/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1', {
            filebrowserUploadUrl: '/Admin/index.php?m=Upyun&a=upload&from=Wap'
        });

        //Date range picker with time picker
        $('#reservationtime').daterangepicker({singleDatePicker: true, timePickerIncrement: 1,timePicker: true,timePicker12Hour:false, format: 'YYYY/MM/DD h:mm A'});
      });
    </script>


<script src="__PUBLIC__/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="__PUBLIC__/static/artDialog/plugins/iframeTools.js"></script>
<script src="__PUBLIC__/static/upyun.js?2013"></script>     


  </body>
</html>