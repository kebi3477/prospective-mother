<?php

include "../dbcon.php";

$id = $_POST['id'];
$pw = $_POST['password'];
$pw1 = $_POST['password1'];
$name = $_POST['name'];
$nickname = $_POST['nickname'];
$address = $_POST['address'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$tel3 = $_POST['tel3'];
$tel = $tel1.$tel2.$tel3;
$email = $_POST['email'];

if($id == '' || $pw == '' || $pw1 == '' || $name == '' || $nickname == ''
|| $address == '' || $tel == '' || $email == ''){
    echo "<script>
    alert('공백이 있습니다 다시입력해주세요.');
    history.back();
    </script>";
    exit;
}

if(strlen($id) < 6 || strlen($id) > 15){
    echo "<script>
    alert('아이디는 6자리부터 15자리까지 입력해주세요');
    history.back();
    </script>";
    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<script>
    alert('이메일은 이메일형식에 맞춰입력해주세요.');
    history.back();
    </script>";
    exit;
}

if(!preg_match("/^[\x{ac00}-\x{d7af}]{2,5}$/u",$name)){
    echo "<script>
    alert('이름을 올바르게 입력해주세요');
    history.back();
    </script>";
    exit;
}

if(strlen($pw) < 8 || strlen($pw) > 14){
    echo "<script>
    alert('비밀번호는 8자리부터 14자리까지 입력해주세요');
    history.back();
    </script>";
    exit;
}

if($pw != $pw1){
    echo "<script>
    alert('비밀번호가 맞지않습니다 다시입력해주세요.');
    history.back();
    </script>";
    exit;
}
if(!is_numeric($tel)){
    echo "<script>
    alert('휴대폰번호는 숫자로 입력해주세요.');
    history.back();
    </script>";
    exit;
}


$sql = "INSERT INTO signup(id,pw,name,nickname,address,tel,email)
VALUES('$id','$pw','$name','$nickname','$address','$tel','$email')";

$result = $mysqli->query($sql);

if($result){
    echo "<script>
    alert('$name 님 가입을 환영합니다.');
    location.href='../signup/login.html';
    </script>";
}
else{
    echo "<script>
    alert('잠시후 다시 시도해주세요.');
    </script>";
}
?>