<?php
include "../../../model/Pass.php";
require "../../../vm/beheerViewModel.php";

$admin = new Pass();

if ($admin->username==$_POST['username']&&$admin->pass==$_POST['password']){
    login();
    header("Location: ../../../beheer.php");
    echo '<meta http-equiv="refresh" content="0;url=../../../beheer.php">';

}else{
    logout();
    header("Location: login.php");
    echo '<meta http-equiv="refresh" content="0;url=login.php">';

}
exit();

?>


