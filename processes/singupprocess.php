<?php
require("../lib/lib2.php");

$email=$_POST['email'];
$pwd=$_POST['pwd'];
$phone1=$_POST['phone1'];
$phone2=$_POST['phone2'];
$phone3=$_POST['phone3'];

$bool=true;

$table='user';

$sql="SELECT email FROM $table WHERE email='$email'";

$conn=mysqlconnect();///////////데이터베이스 접속

$row=process($sql,"select");

//echo $row['email'];

if(empty($row)==false)///////emthy비어있다면true반환
{
    $bool=false;
    $failtext="중복된 아이디 입니다.";
}
else
{

/*$table='user';
$calums='email,password,created,phone1,phone2,phone3';
$values=array($email,$pwd,$phone1,$phone2,$phone3);
$sql="INSERT INTO $user(email,password,created,phone1,phone2,phone3) VALUES('$email','$pwd',now(),'$phone1','$phone2','$phone3')";
$sql="INSERT INTO $table($calums) VALUES('$values[0]','$pwd',now(),'$phone1','$phone2','$phone3')";
이렇게도 가능했다 하지만 values값에 각기다른 배열을 반복문으로 줘야해서 생각을 많이해봐야갰다 2021-4-20
*/

$sql="INSERT INTO $table(email,password,created,phone1,phone2,phone3) VALUES('$email','$pwd',now(),'$phone1','$phone2','$phone3')";

//mysqli_select_db($conn,"thelittleprince");//////데이터베이스 선택

$bool=process($sql,"insert");

//echo $bool;

$successtext="회원가입 성공";
$failtext="회원가입 실패";

}
check($bool,$successtext,$failtext);
?>
