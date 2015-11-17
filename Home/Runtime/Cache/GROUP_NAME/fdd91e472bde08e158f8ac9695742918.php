<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo (C("SITENAME")); ?></title>
    <meta name="keywords" content="<?php echo (C("keyword")); ?>" />
    <meta name="description" content="<?php echo (C("content")); ?>" />    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  </head>
  <body>

    <!-- 循环分类-->
    <?php  $T = M("Arctype")->select(); foreach ($T as $t) { echo "<h3><a href=\"".U("Index/type",array("typeid"=>$t["id"]))."\">".$t["typename"]."</a></h3>"; $article = M("Archives")->where("typeid=".$t["id"])->limit("0,5")->field("id,title")->select(); foreach ($article as $a) { echo '<li><a href="'.U("Index/article",array("id"=>$a['id'])).'">'.$a['title'].'</a></li>'; } echo "<hr/>"; } ?>
    <!-- /.循环分类 -->

  </body>
</html>