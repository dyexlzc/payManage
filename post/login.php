<?php
/*
    接口说明：
    参数列表：{
        用户密码
        手机号码
    }，
    返回类型:{
        -1：登陆失败
        0:未注册
        1:登录成功
    }
*/

$pwd = $_POST['pwd'];
$number = $_POST['number'];
$token = $_POST['token'];
require_once("xxtea.php");
$key = "costitem";
$pwd=base64_encode(xxtea_encrypt($pwd,$key));
$number=base64_encode(xxtea_encrypt($number,$key));

require_once("db/lcf_mysql.php");

$list=json_decode(MakeQuery("select pwd from cost_usr where phone='${number}'"));

if(count($list)){
    if($list[0]->pwd==$pwd){
        //如果密码对的上则登录成功
        setcookie("number", $number, time()+360000);//默认10分钟过期 
        echo 1;
        
        //更新登陆时间
        if(!strcmp($token,"selected"))
        {
            $session_id=md5(uniqid(microtime(true),true));
            $session_id=substr($session_id,0,10); //缩短，默认只有10位长度的值
            MakeQuery("UPDATE cost_usr SET sessionid='${session_id}' where phone='${number}'");  //更新session值
            setcookie("sessionid", $session_id, time()+360000);//默认10分钟过期 
            setcookie("number", $number, time()+360000);//默认10分钟过期 
            //本地设置cookie值，登录页面判断本地储存的usr和session是否和服务器相同，如果cookie为空【即已经过期】或者usr的session与客户端不同的话，就提示重新登录
            //echo "UPDATE cost_usr SET phone='${number}' where phone='${number}'";            
        }

    }
    else
        echo -1;
}
else{
    echo 0;
}