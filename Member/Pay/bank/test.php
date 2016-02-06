<?php


$dbconfig = require_once(dirname(__FILE__)."/../../../mysqlconf.php");;
require_once(dirname(__FILE__)."/../../../infoconfig.php");



$cfg['tb_pre'] = $dbconfig['DB_PREFIX'];
$cfg['db_charset'] = 'utf8';
$cfg['sqlerr'] = '1';
$cfg['errlog'] = '1';
$cfg['timediff'] = '0';
$fr_time = time();
define('FR_ROOT', str_replace("\\", '/', dirname(__FILE__)));
define('CACHE_ROOT', $cfg['cache_dir'] ? $cfg['cache_dir'] : FR_ROOT.'/cache');
define('DATA_ROOT', FR_ROOT.'/data');
include('../mysql.class.php');
$db = new db_mysql();
$db->halt = $cfg['sqlerr'];
$db->connect($dbconfig['DB_HOST'], $dbconfig['DB_USER'], $dbconfig['DB_PWD'], $dbconfig['DB_NAME'],0);




$out_trade_no = '8978043702669980';


$inquery = "UPDATE `{$cfg['tb_pre']}member_operation` SET sta=1 WHERE buyid='".$out_trade_no."'";
$db->query($inquery);

$operation = $db->get_one("SELECT mid,`money`,pname  FROM `{$cfg['tb_pre']}member_operation`  where  buyid='".$out_trade_no."' ");
$mid = $operation['mid'];
$pname = $operation['pname'];

$score = $operation['money'] * $infoconfig['cfg_recharge'];
$inquery = "UPDATE `{$cfg['tb_pre']}member` SET scores=scores+".$score." WHERE mid='".$mid."'";
$db->query($inquery);

//insert log
$inquery = "INSERT INTO  `{$cfg['tb_pre']}score_log`(mid,score,typeid,summary,addtime) VALUES('".$mid."','".$score."','4','".$pname."(".$operation['money'].")',".time().")  ";
$db->query($inquery);

echo "支付成功,请刷新付款页.";
