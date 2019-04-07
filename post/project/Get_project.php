<?php
/*
    接口说明：此页面读取cookies中的number,找到真实姓名，返回项目详细内容
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
$number=$_COOKIE['number'];  //加密的号码
require_once("../db/lcf_mysql.php");
require_once("../xxtea.php");
$key = "costitem";  //密匙
$var=json_decode(MakeQuery("select realname from cost_usr where phone='${number}'"));
$name=xxtea_decrypt(base64_decode($var[0]->realname),$key);  //解密后的真实用户名
//构造json数组
$jvar['name']=$name;
$jvar['plist']=array();
//$idarr=explode(",", $var[0]->project_id);//分隔出id的集合

//以加密的number从数据库中 直接选取
$idarr=json_decode(MakeQuery("select id from cost_project where phone='${number}'"));

if(count($idarr)==0){
    //如果没有参加项目，就给一个空字符
}
for($i=0;$i<count($idarr);$i++){
    // echo "select title,Mdescribe,create_time,over_time,member,phone,money,type from cost_project where id=".$idarr[$i];
    $p=json_decode(MakeQuery("select id,title,Mdescribe,create_time,over_time,costType,phone,money,type from cost_project where id=".$idarr[$i]->id))[0]; 
    array_push($jvar['plist'], $p); //构建新array
}
echo json_encode ($jvar);
