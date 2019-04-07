<?php
//将传入的str输出密文
$str=$_POST['str'];
require_once("xxtea.php");
$key = "costitem";
echo base64_encode(xxtea_encrypt($str,$key));