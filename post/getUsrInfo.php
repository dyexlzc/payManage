<?php
//使用cookies中储存的用户号码来进行查找
//获取usrname
$number=$_COOKIE['number'];  //加密的号码
require_once("db/lcf_mysql.php");
require_once("xxtea.php");
$key = "costitem";  //密匙
$var=json_decode(MakeQuery("select realname,company,lasttime from cost_usr where phone='${number}'"));
//解密信息
$name=xxtea_decrypt(base64_decode($var[0]->realname),$key);  //解密后的真实用户名

//构造json数组
$var[0]->realname=$name;
echo json_encode($var[0]);