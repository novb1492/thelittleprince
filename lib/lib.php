<script>
function dingdong(text)
{
        alert(text);
        location.href = "../pages/main.php";
}  
</script>
<?php 
function db()///////////////데이터베이스에 들어갈 암호및 경로
{
    return mysqli_connect("localhost","root", "6937544");
}
function query($conn,$sql)///////////////sql문 대입하기
{
 
    return mysqli_query($conn, $sql);
}
function fench($result)///////////////////////s1l문내용대로 가져오기
{
    return mysqli_fetch_array($result);
}

function fenchproperty($row,$property)/////////////////원하는값리턴
{
    return $row[$property];
}
?>
<?php 
function process($sql,$situation)////////////////////여기로온다
{

$conn = db();///////////데이터베이스 접속
$result =query($conn, $sql);//////////sql문 대입하기 ->결과가져오기
if($situation=="insert"||$situation=="update")
{
    return $result; ////////////////전체리턴
}
$row = fench($result);//////////////////////변수에 담기
  if($situation=="select")
    {
        return $row;
    }
}
function savecheck($result)
{
    if ($result === false) 
    {
        return 0;
    } 
    else 
    {   
      return 1;  
    }   
}
function sesstionuser($id,$email,$created)
{
    $_SESSION['email'] = $email;
    $_SESSION['id']= $id;
    $_SESSION['created']=$created;
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