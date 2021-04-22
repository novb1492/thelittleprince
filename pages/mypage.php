<?php
session_start();
?>
<html>
<body>
    <div id="fadein">
        <?php
        if($_SESSION['email'])
        { 
        ?>  
                <?php
                echo "email: ",$_SESSION['email'],"<br>";
                echo "<br>IDnumber: ",$_SESSION['id'],"<br>";
                echo "<br>핸드폰번호: ",$_SESSION['phone1'],"-",$_SESSION['phone2'],"-",$_SESSION['phone3'];
                echo "<br>가입일: ",$_SESSION['created'],"<br>";               
                ?>   
                 <br>
                 <a href="updateinfor.php">회원정보 변경</a>            
                 <br>
                 <br>
                 <a onclick="fetchpage('./emthy.html','article')">지우기</a>   
        <?php
        }
        ?>
    </div value="fadein">
 </body>
</html>

