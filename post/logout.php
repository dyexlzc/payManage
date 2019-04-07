<?php
    /*
    注销页面
    post即可注销
    */
        setcookie("sessionid","", time()+360000);//默认10分钟过期 
        setcookie("number", "", time()+360000);//默认10分钟过期 