<?php
require_once("db/lcf_mysql.php");
$pJson=$_POST['pJson'];
$pId=$_POST['pId'];//详细项目的id
$number=$_COOKIE['number'];  //加密的号码
echo "UPDATE cost_project SET costType='{$pJson}' where phone='{$number}' and id={$pId}";
MakeQuery("UPDATE cost_project SET costType='{$pJson}' where phone='{$number}' and id={$pId}");