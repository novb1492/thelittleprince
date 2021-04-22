<?php
require("../lib/bagichtmlheads.html");
require("../lib/htmlhead.html");
session_start();
?>
<!DOCTYPE html>
<html>

<body id="fadein">
    <div id="box" onmouseover="textcolor();//야간글자모드제일 위에 씌우기">
    <?php if(isset($_SESSION['email'])){///로그인시 ?> 
    
    <script src="../animation/check.js"></script>
    
    <script>check(<?php echo $_SESSION['months'];?>,<?php echo $_SESSION['days'];?>,<?php echo $_SESSION['period'];?>)//////////소원이 있을시</script> 
    
    <?php require('jslinks.html')?>
    
    <script src="../p5.js">////변수를 다들고 마지막에 그려야함</script>

    <div id="canvas"value="전체 캠버스">
   
    <div class="float-right">  
            <?php  echo "{$_SESSION['email']}님 환영합니다","<br>"; ?>
            <a id="box2"href="#!mypage"onclick="fetchpage('../pages/mypage.php','article')">마이페이지</a>
            <br>
            <br>       
            <a id="box3"href="../processes/logout.php">로그아웃</a>
    </div value="float-right">
    
    <div class="float-center">   
    <?php
        if(isset($_SESSION['dreamtitle']))
        {     
    ?>
        <a id="box4"href="dream.php" ><h2>소원을 확인하러 갑니다</h2></a>
    <?php
        }else
        {
    ?>
        <a id="box4"href="dream.php" ><h2>소원을 작성하러 갑니다</h2></a>
    <?php
        }//작성하러갑니다닫는거?>
    </div value="float center">
    <div class="float-left"style="top:10%" value="아티클"><article></article></div value="아티클">
    
    <?php
    }/////////로그인시 if닫는거
    else{ ////로그인없을시?>

    <?php require('jslinks.html')?>

    <div id="canvas2"value="전체 캠버스">   
    <script src="../p52.js"></script>
       <div class="float-right">
            <a id="box5"href="#!singup"onclick="fetchpage('singup.php','article')">회원가입</a>
            <br>
            <form action="../processes/loginprocess.php" method="POST">
            Email:<input type="text"name="email"class='id'value="wirte email">
            <br>
            <br>
            PWD:<input type='password'name='pwd'class='pwd' value="wirte password">
            <br>
            <br>
            <input type="submit">
            </form>
        </div value="float-right">
            
            <article></article>  
            
            <div class="float-center">꿈을 함께 이뤄갈 동산으로 오세요.</div>
          
    <?php
    }?>

    <div  class="float-left"><a  id="box6" href="main.php" ><h1>THE LITTLE PRINCE</h1></a> </div>
    
    </div value="전체 캠버스">
    </div value="야간 글자모드">
</body>
</html>