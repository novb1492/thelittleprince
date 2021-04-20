<?php
     function mysqlconnect()///////////////데이터베이스에 들어갈 암호및 경로(1번)
     {
         return mysqli_connect("localhost","root", "6937544","thelittleprince");
     }

        $conn=mysqlconnect();///////////데이터베이스 접속(1)

    function inputquery($conn,$sql)///////////////sql문 대입하기(2번)
    {
        return mysqli_query($conn, $sql);
    }
    function fencharray($result)///////////////////////s1l문내용대로 가져오기(3번)
    {
        return mysqli_fetch_array($result);
    }
    function process($sql,$situation)
    {
        global $conn;///global에 대해 이해했다 php전역변수특이하다 2021-4-20

        $result=inputquery($conn, $sql);//////////sql문 대입하기 ->결과가져오기(2)
        
        if($situation=="insert"||$situation=="update")
        {
            return $bool=savecheck($result);////저장확인
        }
        
        return fencharray($result);//select 일시(3)
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
    function check($bool,$successtext,$failtext,$link)
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
       gotourl($alerttext,$link);
    }
    function gotourl($alerttext,$link)
    {
    ?>
      <script>
        alert("<?php echo $alerttext?>");
        location.href = "<?php echo $link ?>";
        </script>
    <?php    
    }
    function sesstionuser($id,$email,$password,$created,$phone1,$phone2,$phone3)
    {
        $_SESSION['id']= $id;
        $_SESSION['email'] = $email;
        $_SESSION['password']=$password;
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