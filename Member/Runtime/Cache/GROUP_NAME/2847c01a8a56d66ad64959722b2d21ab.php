<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo ($cfg_sitetitle); ?>提示信息</title>
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

  <!-- jQuery 2.1.4 -->
  <script src="__PUBLIC__/plugins/jQuery/jQuery-2.1.4.min.js"></script>

  <?php if(isset($misc)){echo $misc;} ?>

  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">


      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container" style="text-align:center;">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              提示信息
              <small><?php echo (C("SITENAME")); ?></small>
            </h1>
          </section>

          <!-- Main content -->
          <section class="content" >


            <?php if(isset($message)): ?><div class="callout callout-info">
                <p><?php echo($message); ?></p>
              </div>
            <?php else: ?>
              <div class="callout callout-danger">
                <p><?php echo($error); ?></p>
              </div><?php endif; ?>

            <div class="box box-default">
              <div class="box-body">
                页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
            <script type="text/javascript">
            (function(){
            var wait = document.getElementById('wait'),href = document.getElementById('href').href;
            var interval = setInterval(function(){
              var time = --wait.innerHTML;
              if(time <= 0) {
                location.href = href;
                clearInterval(interval);
              };
            }, 1000);
            })();
            </script>

          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2020 <a href="http://www.lanrenmb.com"><?php echo C('copyright');?></a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->


    <!-- Bootstrap 3.3.5 -->
    <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="__PUBLIC__/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="__PUBLIC__/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="__PUBLIC__/dist/js/demo.js"></script>





  </body>
</html>