
<?php
require("../lib/calldblib.php");

    $email=$_POST['email'];
    $pwd=$_POST['pwd'];

    $bool=false;
    $table='user';

    $sql="SELECT * FROM $table WHERE email ='$email'";////////user테이블내용가져오기

    $row=process($sql,"select");
    //echo $row['password'];
    $sqlpassword=$row['password'];

if ($pwd === $sqlpassword) 
{
    // 로그인 성공
    session_start();
    
    sesstionuser($row['email'],$row['password'],$row['created'],$row['phone1'],$row['phone2'],$row['phone3']);/////세션에 user값들저장

    $sql="SELECT * FROM dreams WHERE email ='$email'";///dreams테이블내용가져오기
   
    $row=process($sql,"select");

    sessiondream($row['dreamtitle'],$row['dreamdescription'],$row['period'],$row['dreamcreate'],$row['months'],$row['days']);///세션에dream값들저장
    
    $bool=true;
    $successtext="꿈의 언덕에 오신걸 환영합니다.";
} 
else 
{
    if($row['email']==$email&&$row['password']!=$pwd)
    {
        $failtext="비밀번호가 일치 하지 않습니다.";///
    }
    else if(empty($result))
    {   
        $failtext="회원정보가 존재하지 않습니다.";///초기설정bool=false어차피 false임
    }
}
    $link='../pages/main.php';
    check($bool,$successtext,$failtext,$link);
?>
