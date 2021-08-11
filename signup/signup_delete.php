<?php
session_start();
include "../dbcon.php";

error_reporting(0);

$nickname = $_SESSION['user_nickname'];
$check = $_POST['check'];
$pw = $_POST['pw'];



if($check != '1'){
    echo "<script>
    alert('동의란에 체크해주시기바랍니다.');
    history.back();
    </script>";
    exit;
}
if($pw == ''){
    echo "<script>
    alert('비밀번호를 입력해주세요.');
    history.back();
    </script>";
    exit;
}

$sql = "SELECT * FROM signup WHERE nickname='$nickname'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);

if($pw != $row['pw']){
    echo "<script>
    alert('비밀번호를 확인해주세요.');
    history.back();
    </script>";
    exit;
}


$sql2 = "DELETE FROM signup WHERE nickname='$nickname'";
$result2 = $mysqli->query($sql2);

 if($result2){
    echo "<script>
    alert('<회원탈퇴완료> 그동안 예비엄마를 이용해주셔서 감사합니다.');
    location.href='../index.php';
    </script>";
}
if(isset($_SESSION['user_nickname'])){
    
    session_unset();
    session_destroy();
}





?>