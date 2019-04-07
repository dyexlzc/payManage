<?php
//使用cookies中储存的用户号码来进行查找
//获取usrname
require_once("xxtea.php");
$number = $_POST['number'];
$key = "costitem";  //密匙
$number = base64_encode(xxtea_encrypt($number,$key));
require_once("db/lcf_mysql.php");


$var=json_decode(MakeQuery("select answer from cost_usr where phone='${number}'"));

//构造json数组
echo $var[0]->answer;