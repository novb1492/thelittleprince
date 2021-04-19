<?php
session_start();
require("../lib/lib.php");

$email=$_SESSION['email'];

$mainsituation=$_POST['situation'];

if($mainsituation=="updatepwd")
{
    $cpwd=$_POST['cpwd'];
    $npwd=$_POST['npwd'];
    $situation="select";
}
else if($mainsituation=="updatephone")
{
    $cphone1=$_POST['cphone1'];
    $cphone2=$_POST['cphone2'];
    $cphone3=$_POST['cphone3'];
    
    $nphone1=$_POST['nphone1'];
    $nphone2=$_POST['nphone2'];
    $nphone3=$_POST['nphone3'];

    $situation="select"; 
}

$sql2="SELECT* FROM user WHERE email='$email'";
$row = process($sql2,$situation);

if($mainsituation=="updatepwd")
{
    if($cpwd===$row['password'])
    {
        $situation="update";
        $sql2="UPDATE user SET password=$npwd WHERE email='$email'";
        $result = process($sql2,$situation);
        $bool=check($result);////저장확인
        switch($bool)
        {  
        case 1:
        ?>
            <script>
                var text="비밀번호변경에 성공하셨습니다."
                dingdong(text);
            </script>
        <?php
        case 0:
        break;
        ?>
            <script>
                var text="비밀번호변경에 실패하셨습니다."
                dingdong(text);
            </script>
        <?php
        } 
    }
    else
    {
        echo "현재 비밀번호 입력이 틀렸습니다";
    }
}
else if($mainsituation=="updatephone")
{
    if($cphone1==$_SESSION['phone1']&&$cphone2==$_SESSION['phone2']&&$cphone3==$_SESSION['phone3'])
    {   
        $sql2="UPDATE user SET phone1='$nphone1',phone2='$nphone2',phone3='$nphone3' WHERE email='$email'";
        $situation="update";
        $result = process($sql2,$situation);
        $bool=check($result);////저장확인
        switch($bool)
        {  
        case 1:
        ?>
            <script>
                var text="전화번호변경에 성공하셨습니다."
                dingdong(text);
            </script>
        <?php
        $_SESSION['phone1']=$nphone1;
        $_SESSION['phone2']=$nphone2;
        $_SESSION['phone3']=$nphone3;
        break;
        case 0:
        ?>
            <script>
                var text="전화번호변경에 실패하셨습니다."
                dingdong(text);
            </script>
        <?php
        } 
    } 
    else
    {
        echo "현재 전회번호 입력이 틀렸습니다"; 
    }
}
?>