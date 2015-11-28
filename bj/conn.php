<?
/*替换为你自己的数据库名*/
$dbname = 'gy_wxedit';
/*填入数据库连接信息*/
$host = '127.0.0.1';
$port = 3306;
$user = 'root';//用户名(api key)
$pwd = '123456';//密码(secret key)
 /*以上信息都可以在数据库详情页查找到*/
//mysql_query("set names 'utf8'");
/*接着调用mysql_connect()连接服务器*/
$link = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
if(!$link) {
    die("Connect Server Failed: " . mysql_error());
}
/*连接成功后立即调用mysql_select_db()选中需要连接的数据库*/
if(!mysql_select_db($dbname,$link)) {
    die("Select Database Failed: " . mysql_error($link));
}
?>