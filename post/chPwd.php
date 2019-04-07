<?php
$ans = $_POST['ans'];
$number = $_POST['number'];
$newPwd = $_POST['newPwd'];
require_once("xxtea.php");
$key = "costitem";
$ans=base64_encode(xxtea_encrypt($ans,$key));
$number=base64_encode(xxtea_encrypt($number,$key));

require_once("db/lcf_mysql.php");

$list=json_decode(MakeQuery("select answer from cost_usr where phone='${number}'"));//获取的加密的密码
if(!strcmp($list[0]->answer,$ans)){
    //如果加密的答案和数据库相符
    $newPwd=base64_encode(xxtea_encrypt($newPwd,$key));
    MakeQuery("UPDATE cost_usr SET pwd='${newPwd}' where phone='${number}'");  //更新密码
    echo "ok";
}
