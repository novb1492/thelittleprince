<?php
session_start();
require("../lib/calldblib.php");

$email=$_POST['email'];
$dreamtitle=$_POST['dreamtitle'];
$dreamdescription=$_POST['dreamdescription'];
//$id=$_POST['id'];
$period=$_POST['period'];
$situation=$_POST['situation'];
$month=date("n");
$day=date("j");
//echo $day;
if($situation=="insert")
{
    $sql="INSERT INTO dreams(period,email,dreamtitle,dreamdescription,dreamcreate,months,days) VALUES('$period','$email','$dreamtitle','$dreamdescription',now(),'$month','$day')";
    $situation="insert";
    $successtext="목표등록에 성공";
}
else if($situation=="update")
{
    $sql= "UPDATE dreams SET dreamtitle='$dreamtitle',dreamdescription='$dreamdescription',period='$period',dreamcreate=now(),months='$month',days='$day' WHERE email='$email'";
    $situation="update";   
    $successtext="목표변경에 성공";
}
else
{
    $failtext="목표지정에 실패했습니다.";
}

$bool=process($sql,$situation);

if($bool==true)
{
    $now = date('Y-m-d H:i:s');
    sessiondream($dreamtitle,$dreamdescription,$period,$now,$month,$day);
}
$link='../pages/dream.php';
check($bool,$successtext,$failtext,$link);
?>
