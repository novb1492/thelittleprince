<?php
require("../lib/bagichtmlheads.html");
require("../lib/htmlhead.html");
require('jslinks.html');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="../p52.js"></script>
    </head>
<body id="fadein">

<div onmouseover="textcolor();//야간글자모드제일 위에 씌우기">

<div id="canvas2"value="전체캔버스">

    
    <div class="float-right">
        
        <?php if (isset($_SESSION['email'])){ echo "{$_SESSION['email']}님 환영합니다";?>
        <br>
        <a href="#!mypage"onclick="fetchpage('mypage.php','article')">마이페이지</a>
        <br>
        <br>     
        <a href="../processes/logout.php">로그아웃</a>
        <div style="top:20%"><article></article></div>   
    </div value="float-right">
        
        <div class="float-left"style="top:10%">
        비밀번호 변경
        <br>
        <br>
                    <form action="../processes/updateprocess.php" method="POST">
                    현재 비밀번호를 입력해주세요
                    <br>
                    <input type="password"name="cpwd"class='id'value="현재 비밀번호를 적어주세요">
                    <br>
                    새로 사용하실 비밀번호를 입력해주세요
                    <br>
                    <input type="password"name="npwd"class='id'value="새로운 비빌번호를 적어주세요">
                    <br>
                    <br>
                    <input type="hidden" name="calum"value="updatepwd">
                    <input type="submit">
                    </form> 
        <br>
        <br>
        핸드폰 번호 변경
        <br>
        <br>
                    <form action="../processes/updateprocess.php" method="POST">
                    현재 핸드폰번호
                    <br>
                    <?php echo 0,$_SESSION['phone1']?>-<?php echo $_SESSION['phone2']?>-<?php echo $_SESSION['phone3']?>
                    <br>
                    새로운 핸드폰번호
                    <br>
                    <input type='tel' name='nphone1'style="width:50px;font-size:16px;"value="010">-
                    <input type='tel' name='nphone2' style="width:60px;font-size:16px;"value="">-
                    <input type='tel' name='nphone3' style="width:60px;font-size:16px;"value="">
                    <br>
                    <br>
                    <input type="hidden" name="calum"value="updatephone">
                    <input type="submit">
                    </form>
        <br>
        <br>
     
        </div value="float-left">
        <?php
        }
        ?>
    <div class="float-left"><a href="../pages/main.php" ><h1>THE LITTLE PRINCE</h1></a> </div>
</div value="전체캠버스">
</div value="야간모드">
</body>
</html>