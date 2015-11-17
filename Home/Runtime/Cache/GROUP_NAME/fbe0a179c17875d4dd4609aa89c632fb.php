<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo ($vo["title"]); ?>_<?php echo (C("SITENAME")); ?></title>
    <meta name="keywords" content="<?php echo ($vo["title"]); ?>" />
    <meta name="description" content="<?php echo ($vo["description"]); ?>" />    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  </head>
  <body>


      <!--图片链接-->
      <img src="__PUBLIC__/images/logo.png">
      <!--/.图片链接-->

      <!--表中有的字段都可以调用-->
      <h3><?php echo ($vo["title"]); ?></h3>
      <h4><?php echo (date("Y-m-d H:i:s",$vo['pubdate'])); ?></h4>
      <h4><?php echo html_entity_decode($vo['body']);?></h4>
      <!--/.表中有的字段都可以调用-->

  </body>
</html>