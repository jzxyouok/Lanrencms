<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户登录_<?php echo (C("SITENAME")); ?></title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="__PUBLIC__/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="__PUBLIC__/misc/html5shiv.min.js"></script>
        <script src="__PUBLIC__/misc/respond.min.js"></script>
    <![endif]-->
  </head> 
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>登陆</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><?php echo (C("SITENAME")); ?></p>
        <form action="<?php echo U("Public/checkLogin");?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username"  class="form-control" placeholder="用户名">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="密码">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="row" style="margin-bottom:15px;">
            <div class="col-xs-4">
              <input type="text" name="verify" class="form-control" placeholder="验证码">
            </div><!-- /.col -->
            <div class="col-xs-3">
              <img id="verifyImg" SRC="<?php echo U('Public/verify');?>" onClick="fleshVerify()" border="0" alt="点击刷新验证码" style="cursor:pointer" align="absmiddle">
            </div><!-- /.col -->
          </div>


          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">登陆</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="<?php echo U("Public/reg");?>"><button class="btn btn-block btn-info">注册</button></a>
        </div>



      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="__PUBLIC__/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="__PUBLIC__/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });

      
function fleshVerify(type){ 
  //重载验证码
  var timenow = new Date().getTime();
  if (type){
    $('#verifyImg').attr("src", '<?php echo U('Public/verify',array('type'=>1,'t'=>time()));?>');
  }else{
    $('#verifyImg').attr("src", '<?php echo U('Public/verify',array('t'=>time()));?>');
  }
}

    </script>
  </body>
</html>