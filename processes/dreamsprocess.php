<?php
session_start();
require("../lib/lib.php");

$email=$_POST['email'];
$dreamtitle=$_POST['dreamtitle'];
$dreamdescription=$_POST['dreamdescription'];
$id=$_POST['id'];
$period=$_POST['period'];
$situation=$_POST['situation'];
$month=date("n");
$day=date("j");

if($situation=="insert")
{
    $sql2="INSERT INTO dreams(id,period,email,dreamtitle,dreamdescription,dreamcreate,months,days) VALUES('$id','$period','$email','$dreamtitle','$dreamdescription',now(),$month,$day)";
    $situation="insert";
}
else if($situation=="update")
{
    $sql2= "UPDATE dreams SET dreamtitle='$dreamtitle',dreamdescription='$dreamdescription',period='$period',dreamcreate=now(),months='$month',days='$day' WHERE email='$email'";
    $situation="update";   
}
    $result = process($sql2,$situation);
   
    $bool=check($result);////저장확인

    if($bool==1)
    {
    ?>
    <script>
        var text="목표를 설정했습니다."
        dingdong(text);
    </script>
    <?php
    }   
    else 
    {
    ?>
    <script>
        var text="목표설정에 실패 했습니다."
        dingdong(text);
    </script>
    <?php
    }

    $situation="select";
    $sql2="SELECT dreamcreate FROM dreams WHERE email ='$email'";////////dreams테이블에서 변경된 시간 가져오기
    $row=process($sql2,$situation);
    $dreamcreate=$row['dreamcreate'];

    sessiondream($dreamtitle,$dreamdescription,$period,$dreamcreate,$month,$day);   
?>
