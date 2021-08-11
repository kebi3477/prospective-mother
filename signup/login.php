<?php

session_start();
include "../dbcon.php";

$id = $_POST['id'];
$pw = $_POST['password'];


if($id == '' || $pw == ''){
    echo "<script>
    alert('공백이있습니다 다시입력해주세요.');
    // history.back();
    </script>";
    exit;
}

if($id != '' && $pw != ''){
$sql = "SELECT * FROM signup where id = '$id'";

$result = $mysqli->query($sql);

$row = mysqli_fetch_array($result);
}

if(!isset($row['id'])){
    echo "<script>
    alert('존재하지않는 아이디입니다.');
    history.back();
    </script>";
    exit;
}

if($pw == $row['pw']){

    $_SESSION['user_nickname'] = $row['nickname'];

    echo "<script>
    alert('$_SESSION[user_nickname] 님 반갑습니다');
    location.href='../index.php';
    </script>";
}
else{
    echo "<script>
    alert('비밀번호가 틀립니다');
    history.back();
    </script>";
}



?>