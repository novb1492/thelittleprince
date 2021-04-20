<?php

    function mysqlconnect()///////////////데이터베이스에 들어갈 암호및 경로
    {
        return mysqli_connect("localhost","root", "6937544","thelittleprince");
    }
    function inputquery($conn,$sql)///////////////sql문 대입하기
    {
        return mysqli_query($conn, $sql);
    }
    function fencharray($result)///////////////////////s1l문내용대로 가져오기
    {
        return mysqli_fetch_array($result);
    }
    function process($sql,$situation)
    {
        $conn=mysqlconnect();///////////데이터베이스 접속

        $result=inputquery($conn, $sql);//////////sql문 대입하기 ->결과가져오기
        
        if($situation=="insert"||$situation=="update")
        {
            return $bool=savecheck($result);////저장확인
        }
        
        return fencharray($result);//select 일시
    }

    function savecheck($result)
    {
        if ($result === false) 
        {
            return false;
        } 
        else 
        {   
          return true;  
        }   
    }
    function check($bool,$successtext,$failtext)
    {
      $alerttext;
        if($bool==true)
        {
            $alerttext=$successtext;
        }
        else
        {
            $alerttext=$failtext;
        }
      ?> 
       <script>
       alert("<?php echo $alerttext?>");
        location.href = "../pages/main.php";
        </script>
        <?php
    }
    function sesstionuser($id,$email,$created,$phone1,$phone2,$phone3)
    {
        $_SESSION['email'] = $email;
        $_SESSION['id']= $id;
        $_SESSION['created']=$created;
        $_SESSION['phone1']=$phone1;
        $_SESSION['phone2']=$phone2;
        $_SESSION['phone3']=$phone3;
    }
    function sessiondream($dreamtitle,$dreamdescription,$period,$dreamcreate,$mon,$day)
    {
        $_SESSION['dreamtitle']=$dreamtitle;
        $_SESSION['dreamdescription']=$dreamdescription;
        $_SESSION['period']=$period;
        $_SESSION['dreamcreate']=$dreamcreate;
        $_SESSION['months']=$mon;
        $_SESSION['days']=$day;
    }
  
?>