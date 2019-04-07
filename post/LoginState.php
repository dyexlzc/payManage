<?php
   // echo $_COOKIE['sessionid'];
   /*
   
        接口说明
        判断登录状态
        返回值：{
            1：已经登陆
            0: 未登录
        }
   
   
   */
   
   
   $number=$_COOKIE['number'];
   require_once("db/lcf_mysql.php");
   $var=json_decode(MakeQuery("select sessionid from cost_usr where phone='${number}'"));
   if($_COOKIE['sessionid']!=NULL && $var[0]->sessionid==$_COOKIE['sessionid']){
       echo 1;
   }
   else{
       echo 0;
   }