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

        <div class="float-left"><a href="main.php" ><h1>THE LITTLE PRINCE</h1></a></div>
        
        <div class="float-right">
            <?php if (isset($_SESSION['email'])){ echo "{$_SESSION['email']}님 환영합니다";?>
            <br>
            <br>
            <a href="#!mypage" onclick="fetchpage('mypage.php','article')">마이페이지</a>
            <br>
            <br>
            <a href="../processes/logout.php">로그아웃</a>  
            
            <article style="top:10%"></article>      
        </div>
        
            <?php 
            if (isset($_SESSION['dreamtitle'])) 
            {?>        
                <div class="float-left"style="top:20%">
                    <a href="dreamchainge.php">꿈 변경하기</a>
                    <br>
                    <br>
                    <?php
                    echo "꿈의 제목<br><br>",$_SESSION['dreamtitle'],"<br><br>";
            
                    echo "꿈의 내용<br><br>",$_SESSION['dreamdescription'],"<br><br>";
                
                    echo "꿈의 기간<br><br>",$_SESSION['period'],"개월<br><br>";

                    echo "소원을 등록한날<br><br>",$_SESSION['dreamcreate'],"<br><br>";
                    ?>    
                </div value="float-left">    
            
            <?php
            }
            else////안에 else
            { 
                ?>               
                    <div class="float-left" style="top:10%">
                        <?php echo "{$_SESSION['email']}의 소원을 적어주세요";?>
                        <form action="../processes/dreamsprocess.php" method="POST">
                        <br>
                        DREAMTITLE
                        <br>
                        <input type="text"name="dreamtitle"rows="2"cols="20"value="소원의 제목을 적어주세요">
                        <br>
                        <br>
                        꿈의 내용
                        <br><textarea name="dreamdescription"rows="40"cols="200">소원을 적어주세요</textarea>
                        <br>
                        <br>
                        목표개월
                        <br>
                        <input type='number'name='period'value="1">
                        <br>
                        <!--<input type="hidden" name="id"value="<?php echo $_SESSION['id'];?>">-->
                        <input type="hidden" name="email"value="<?php  echo $_SESSION['email'];?>">
                        <input type="hidden" name="situation"value="insert">
                        <br>
                        <input type="submit">
                        </form>
                    </div>              
            <?php
            }///안에 else 대괄호
            ?>
            <?php
            }///if else 큰 대괄호 
            ?>
    </div value="전체캠버스">
</div value="야간모드">
</body>
</html>