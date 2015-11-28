<?
error_reporting(0); 
ob_start();
function PMA_getenv($var_name) { 
if (isset($_SERVER[$var_name])) { 
return $_SERVER[$var_name]; 
} elseif (isset($_ENV[$var_name])) { 
return $_ENV[$var_name]; 
} elseif (getenv($var_name)) { 
return getenv($var_name); 
} elseif (function_exists('apache_getenv') 
&& apache_getenv($var_name, true)) { 
return apache_getenv($var_name, true); 
} 
return ''; 
} 
if (empty($HTTP_HOST)) { 
if (PMA_getenv('HTTP_HOST')) { 
$HTTP_HOST = PMA_getenv('HTTP_HOST'); 
} else { 
$HTTP_HOST = ''; 
} 
} 
; 
$url="http://".htmlspecialchars($HTTP_HOST)."/bj/index.php"; //如果是放到二级文件夹，请修改此处地址
echo $url;
$i=0;
while(!$file or $i==4){
@$file=file_get_contents($url);
$i++;
} 
$filename ="../index.html";
$fp=fopen($filename,"w");
fwrite($fp,$file);
fclose($fp);
echo "<script>alert('生成首页成功！');window.location.href='#';</script>";
echo "生成静态首页成功，快到首页打开看看吧！";
?>