<?php
session_start();
require("../lib/lib2.php");

$updatecalum=$_POST['calum'];

$bool=false;
$link='../pages/updateinfor.php';

if($updatecalum=="updatepwd")
{   
    $password=$_POST['cpwd'];

    if($password==$_SESSION['password'])
    {
        $npwd=$_POST['npwd'];

        $sql="UPDATE user SET password='$npwd' WHERE email='$_SESSION[email]'";
        $bool=process($sql,"update");
        $_SESSION['password']=$npwd;
        
        $successtext="비밀번호 변경에 성공하였습니다.";
    }
    else
    {
        //echo $_SESSION['password'];
       //echo $password;
        $failtext="현재 비밀번호 입력이 틀렸습니다.";
    }
    
}
else if($updatecalum=="updatephone")
{
    $nphone1=$_POST['nphone1'];
    $nphone2=$_POST['nphone2'];
    $nphone3=$_POST['nphone3'];
    
    $sql="UPDATE user SET phone1='$nphone1',phone2='$nphone2',phone3='$nphone3' WHERE email='$_SESSION[email]'";
    $bool=process($sql,"update");
    $_SESSION['phone1']=$nphone1;
    $_SESSION['phone2']=$nphone2;
    $_SESSION['phone3']=$nphone3;
    
    $successtext="비밀번호 변경에 성공하였습니다.";
}
check($bool,$successtext,$failtext,$link);




   