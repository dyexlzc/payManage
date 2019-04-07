<?php

$pJson = $_POST['pJson'];
$number=$_COOKIE['number'];
$pCost=$_POST['pCost'];
require_once("../xxtea.php");

$key = "costitem";

require_once("../db/lcf_mysql.php");
//直接将加密的number存入数据库

//MakeQuery();  //新建工程，标明创建人电话
$pJosnObj = json_decode($pJson);
//var_dump($pJosnObj);


MakeQuery ("INSERT INTO cost_project (title, Mdescribe,create_time,over_time,costType,phone,money,type) VALUES (
    '{$pJosnObj->ProjectName}',
    '{$pJosnObj->ProjectDesc}',
    '{$pJosnObj->ProjectTime_start}',
    '{$pJosnObj->ProjectTime_end}',
    '{$pCost}',
    '{$number}',
    '{$pJosnObj->ProjectMoney}',
    '{$pJosnObj->ProjectType}'
    )");

