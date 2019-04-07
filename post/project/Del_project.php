<?php
/*
    接口说明：删除指定id，而且确保是number正确的
    返回数据:{
        真实姓名,
        项目:{
            ...
            ...
            
        }
    }


*/


//获取usrname
header("content-type:text/html; ");
$number=$_COOKIE['number'];  //加密的号码,确保删除操作来自于创建者
$pId=$_POST['pId'];//需要删除的工程id;
require_once("../db/lcf_mysql.php");
require_once("../xxtea.php");
//echo "select phone from cost_project where id=${pId}";
$var=json_decode(MakeQuery("select phone from cost_project where id=${pId}"));//获取项目创建者电话
if(!strcmp($var[0]->phone,$number)){
    //如果确实是来自创建者的操作，就执行删除
    MakeQuery("delete from cost_project where id=${pId}");
    echo "ok";
}
