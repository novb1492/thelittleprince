<?php
require("../lib/lib.php");

$email=$_POST['email'];
$pwd=$_POST['pwd'];
$phone1=$_POST['phone1'];
$phone2=$_POST['phone2'];
$phone3=$_POST['phone3'];

$sql2="INSERT INTO user(email,password,created,phone1,phone2,phone3) VALUES('$email','$pwd',now(),'$phone1','$phone2','$phone3')";

$situation="insert";
$result = process($sql2,$situation);

$bool=check($result);////저장확인

switch($bool)
{  
  case 1:
    ?>
    <script>
        var text="회원가입에 성공하셨습니다."
        dingdong(text);
    </script>
    <?php
break;
    ?>
    <script>
        var text="회원가입에 실패하셨습니다."
        dingdong(text);
    </script>
    <?php
} 

?>
