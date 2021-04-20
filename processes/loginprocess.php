//loginprocess
<?php
require("../lib/lib2.php");

    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    
    $table='user';

    $sql="SELECT * FROM $table WHERE email ='$email'";////////user테이블내용가져오기
    
    $conn=mysqlconnect();///////////데이터베이스 접속

    $result=inputquery($conn, $sql);//////////sql문 대입하기 ->결과가져오기



    $row=fencharray($result);
    $sqlpassword=$row['password'];

    $bool=false;

if ($pwd === $sqlpassword) 
{
    // 로그인 성공
    session_start();
    
    sesstionuser($row['id'],$row['email'],$row['created'],$row['phone1'],$row['phone2'],$row['phone3']);/////세션에 user값들저장

    $sql="SELECT * FROM dreams WHERE email ='$email'";///dreams테이블내용가져오기
   
    $conn=mysqlconnect();///////////데이터베이스 접속

    $result=inputquery($conn, $sql);//////////sql문 대입하기 ->결과가져오기

    $row=fencharray($result);

    sessiondream($row['dreamtitle'],$row['dreamdescription'],$row['period'],$row['dreamcreate'],$row['months'],$row['days']);///세션에dream값들저장
    
    $bool=true;
    $successtext="꿈의 언덕에 오신걸 환영합니다.";
} 
else 
{
    if($row['email']==$email&&$row['password']!=$pwd)
    {
        $failtext="비밀번호가 일치 하지 않습니다.";
    }
    else if(isset($result))///isset은null=true반환
    {
        $failtext="회원정보가 존재하지 않습니다.";
    }
}
    check($bool,$successtext,$failtext);
?>
