//loginprocess
<?php
require("../lib/lib.php");

    $email=$_POST['email'];
    $pwd=$_POST['pwd'];


    $situation="select";
    $property="password";

    $sql2="SELECT * FROM user WHERE email ='$email'";////////user테이블내용가져오기
    $row=process($sql2,$situation);
    $sqlpassword=fenchproperty($row,$property);//////////패스워드꺼내서 비교하기

if ($pwd === $sqlpassword) 
{
    // 로그인 성공
    session_start();
    
    sesstionuser($row['id'],$row['email'],$row['created']);/////세션에 user값들저장
    $_SESSION['phone1']=$row['phone1'];
    $_SESSION['phone2']=$row['phone2'];
    $_SESSION['phone3']=$row['phone3'];
    
    $sql2="SELECT * FROM dreams WHERE email ='$email'";///dreams테이블내용가져오기
    $row=process($sql2,$situation);

    sessiondream($row['dreamtitle'],$row['dreamdescription'],$row['period'],$row['dreamcreate'],$row['months'],$row['days']);///세션에dream값들저장
 
?>
    <script>
        var text="꿈의 언덕에 오신걸 환영합니다";
        dingdong(text);
    </script>
<?php
} 
else 
{
?>
    <script>
        var text="비밀번호 혹은 아이디가 일치 하지 않습니다.";
        dingdong(text);
    </script>
<?php
}
?>
