<?php

/* 
 * 发送聊天记录到数据库
 */
require_once './mysql_conn.php';

$name = $_GET['name'];
$content = $_GET['text'];
$ip = $_SERVER['REMOTE_ADDR'] ;
 
$sql = "update chat_log set IsNew=0 where IsNew=1";   
 mysql_query($sql,$con)or die(mysql_error());        //将上一条聊天记录标记为旧消息
 
 
$sql = "insert into chat_log(name,content,addr,IsNew) values('$name','$content','$ip',1)";
echo $sql;

mysql_query($sql,$con) or die(mysql_error());
echo "ok";
mysql_close($con);