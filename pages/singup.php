<!DOCTYPE html>
<html>
<body>
    <div class="float-left" style="top:20%">
    <div >사용하실 이메일과<br>비밀번호를 입력해주세요</div>
    <br>
    <form action="../processes/singupprocess.php" method="POST">
    Email:<input type="email"name="email"class='id'placeholder="wirte email">
    <br>
    <br>
    PWD:<input type='password'name='pwd'class='pwd' placeholder="wirte password">
    <br>
    <br>
    핸드폰번호
    <br>
    <br>
    <input type='text' name='phone1'style="width:50px;font-size:16px;" value="010">-
    <input type='text' name='phone2' style="width:60px;font-size:16px;" placeholder="">-
    <input type='text' name='phone3' style="width:60px;font-size:16px;" placeholder="">
    <br>
    <br>
    <input type="submit">
    </form>
    <div onclick="fetchpage('./emthy.html','article')">지우기</div>
    </div>
</body>
</html>