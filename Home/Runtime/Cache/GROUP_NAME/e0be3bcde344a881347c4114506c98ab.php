<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo (C("SITENAME")); ?>_<?php echo ($type["typename"]); ?></title>
    <meta name="keywords" content="<?php echo ($type["typename"]); ?>" />
    <meta name="description" content="<?php echo ($type["typename"]); ?>" />    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  </head>
  <body>

      <h3><?php echo ($type["typename"]); ?></h3>

      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U("Index/article",array("id"=>$vo["id"]));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

      <br/>
      <!--分页-->
      <?php echo ($page); ?>
      <!--/.分页-->

  </body>
</html>