<?php
require("../lib/lib2.php");

$email=$_POST['email'];
$pwd=$_POST['pwd'];
$phone1=$_POST['phone1'];
$phone2=$_POST['phone2'];
$phone3=$_POST['phone3'];

$sql="INSERT INTO user(email,password,created,phone1,phone2,phone3) VALUES('$email','$pwd',now(),'$phone1','$phone2','$phone3')";

$conn=mysqlconnect();///////////데이터베이스 접속

//mysqli_select_db($conn,"thelittleprince");//////데이터베이스 선택

$result=inputquery($conn, $sql);//////////sql문 대입하기 ->결과가져오기

$bool=savecheck($result);////저장확인

$successtext="회원가입 성공";
$failtext="회원가입 실패";

check($bool,$successtext,$failtext);


?>
