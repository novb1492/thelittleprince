<?php
session_start();
require("../lib/lib2.php");


$email=$_POST['email'];
$updatecalum=$_POST['calum'];

if($updatecalum=="updatepwd")
{   
    $password=$_POST['password'];
    if($password==$_SESSION['password'])
    {
    $cpwd=$_POST['cpwd'];
    $npwd=$_POST['npwd'];
    }
    else
    {
        
    }
    
}
else if($updatecalum=="updatephone")
{
    $nphone1=$_POST['nphone1'];
    $nphone2=$_POST['nphone2'];
    $nphone3=$_POST['nphone3'];
}





   