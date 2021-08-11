<?php
session_start();
include "../dbcon.php";

$nickname = $_SESSION['user_nickname'];

$pw = $_POST['password'];
$pw1 = $_POST['password1'];
$address = $_POST['address'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$tel3 = $_POST['tel3'];
$tel = $tel1.$tel2.$tel3;
$email = $_POST['email'];

if($pw == '' || $pw1 == '' || $address == '' || $tel == '' || $email == ''){
    echo "<script>
    alert('공백이 있습니다 다시입력해주세요.');
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


$sql = "UPDATE signup SET pw='$pw', address='$address',
tel='$tel', email='$email' WHERE nickname='$nickname'";

$result = $mysqli->query($sql);

if($result){
    echo "<script>
    alert('회원정보가 수정되었습니다..');
    location.href='../mypage/mypage.php';
    </script>";
    exit;
}
else{
    echo "<script>
    alert('잠시후 다시 시도해주세요.');
    </script>";
}
?>