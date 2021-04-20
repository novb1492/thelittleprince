<?php
require("../lib/calldblib.php");
require("../lib/functions.php");

$email=$_POST['email'];
$pwd=$_POST['pwd'];
$phone1=$_POST['phone1'];
$phone2=$_POST['phone2'];
$phone3=$_POST['phone3'];
$bool=false;


$table='user';

//echo preg_match( "/^[0-9]/i", $phone1 );

$sql="SELECT email FROM $table WHERE email='$email'";

$row=process($sql,"select");

if(empty($row)==false)///////emthy비어있다면true반환
{
    $failtext="중복된 아이디 입니다.";
}
else if(preg_match( "/^[0-9]/i", $phone1 )==false||preg_match( "/^[0-9]/i", $phone2 )==false||preg_match( "/^[0-9]/i", $phone3 )==false)////문자열로받은  숫자만 있나 검사
{
    $failtext="핸드폰 번호는 숫자입니다.";
}
else
{

/*$table='user';
$calums='email,password,created,phone1,phone2,phone3';
$values=array($email,$pwd,$phone1,$phone2,$phone3);
$sql="INSERT INTO $user(email,password,created,phone1,phone2,phone3) VALUES('$email','$pwd',now(),'$phone1','$phone2','$phone3')";
$sql="INSERT INTO $table($calums) VALUES('$values[0]','$pwd',now(),'$phone1','$phone2','$phone3')";
이렇게도 가능했다 하지만 values값에 각기다른 배열을 반복문으로 줘야해서 생각을 많이해봐야갰다 2021-4-20*/


$sql="INSERT INTO $table(email,password,created,phone1,phone2,phone3) VALUES('$email','$pwd',now(),'$phone1','$phone2','$phone3')";

//mysqli_select_db($conn,"thelittleprince");//////데이터베이스 선택

$bool=process($sql,"insert");

//echo $bool;

$successtext="회원가입 성공";
$failtext="회원가입 실패";

}
$link='../pages/main.php';
check($bool,$successtext,$failtext,$link);
?>