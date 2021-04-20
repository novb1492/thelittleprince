<?php
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

?>

<?php
function mysqlconnect()///////////////데이터베이스에 들어갈 암호및 경로
{
    return mysqli_connect("localhost","root", "6937544","thelittleprince");
}
function inputquery($conn,$sql)///////////////sql문 대입하기
{
 
    return mysqli_query($conn, $sql);
}
function fench($result)///////////////////////s1l문내용대로 가져오기
{
    return mysqli_fetch_array($result);
}
?>