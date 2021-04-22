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
            <a href=""onclick="fetchpage('../mypage.php')">마이페이지</a>
            <br>
            <br> 
            <a href="../account/logout.php">로그아웃</a>
            <br> 
            <article style="top:10%"></article>         
            </div value="float-right">
            
            <div class="float-left"style="top:10%">
                        꿈의 내용을 변경해 주는 페이지 입니다.
                        <form action="../processes/dreamsprocess.php" method="POST">
                        <br>
                        DREAMTITLE
                        <br>
                        <input type="text"name="dreamtitle"rows="2"cols="20"value="<?php echo $_SESSION['dreamtitle']?>">
                        <br>
                        <br>
                        꿈의 내용
                        <br>
                        <textarea name="dreamdescription"rows="40"cols="200"><?php echo $_SESSION['dreamdescription']?></textarea>
                        <br>
                        <br>
                        목표개월
                        <br>
                        <input type='number'name='period'value="<?php echo $_SESSION['period']?>">
                        <br>
                        <br>
                        <input type="hidden" name="id"value="<?php echo $_SESSION['id'];?>">
                        <input type="hidden" name="email"value="<?php  echo $_SESSION['email'];?>">
                        <input type="hidden" name="situation"value="update">
                        <input type="submit">
                        </form>
            </div value="float-left">              
                
            <?php
            }///if대괄호
            ?>
        <div class="float-left"><a href="main.php" ><h1>THE LITTLE PRINCE</h1></a> </div>

    </div value="전체캠버스">
</div value="야간모드">
</body>
</html>