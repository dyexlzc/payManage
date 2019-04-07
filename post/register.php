<?php
/*
    接口说明：
    参数列表：{
        真实姓名
        用户密码
        手机号码
        所属组织
    }，
    返回类型:{
        -1：手机号码重复
        1:注册成功
    }


*/


$real = $_POST['real'];
$pwd = $_POST['pwd'];
$number = $_POST['number'];
$company = $_POST['company'];
$answer = $_POST['answer'];
//获取前端输入，其中所有信息都需要通过xxtea加密再存放到数据库中避免漏库后造成的数据泄露
require_once("xxtea.php");
$key = "costitem";
$real = base64_encode(xxtea_encrypt($real,$key));
$pwd = base64_encode(xxtea_encrypt($pwd,$key));
$number = base64_encode(xxtea_encrypt($number,$key));
$answer = base64_encode(xxtea_encrypt($answer,$key));
//除了枚举类型的组织名不加密以外其他的均需要加密
//Step1.查询number是否有重复，重复返回-1
require_once("db/lcf_mysql.php");
$list = json_decode(MakeQuery("select phone from cost_usr where phone='${number}'"));
if (!count($list)) {
    //如果项目个数为0，即没有查找到重复的，就可以进行插入
    //此处单条数据插入不需要过度优化
    MakeQuery("INSERT INTO cost_usr (realname, pwd,phone,company,answer) VALUES('${real}','${pwd}','${number}',${company},'${answer}');");
    //更新登陆时间
    $session_id = md5(uniqid(microtime(true),true));
    $session_id = substr($session_id,0,10);
    //缩短，默认只有10位长度的值
    MakeQuery("UPDATE cost_usr SET sessionid='${session_id}' where phone='${number}'");
    //更新session值
    setcookie("sessionid", $session_id, time()+360000);
    //默认10分钟过期
    setcookie("number", $number, time()+360000);
    //默认10分钟过期
    //本地设置cookie值，登录页面判断本地储存的usr和session是否和服务器相同，如果cookie为空【即已经过期】或者usr的session与客户端不同的话，就提示重新登录
    echo 1;
} else {
    echo -1;
}