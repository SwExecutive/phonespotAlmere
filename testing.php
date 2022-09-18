<?php
session_start();

$_SESSION["testlogin"]="true";
$_SESSION["testloginTime"]= date("d-m-Y H:i:s", strtotime('+1 day', time()+7200));

//echo  $_SESSION['testlogin'];
//echo  $_SESSION['testloginTime'];

echo  $_SESSION['login'];
echo  $_SESSION['loginTime'];