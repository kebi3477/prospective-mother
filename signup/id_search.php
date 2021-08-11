<?php

session_start();
include "../dbcon.php";

$name = $_POST['name'];
$tel = $_POST['tel'];

$sql = "select * from signup where name='$name'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);

if($name == '' || $tel == ''){
    echo "<script>
    alert('공백이 있습니다.');
    history.back();
    </script>";
    exit;
}
if($name != $row['name'] || $tel != $row['tel']){
    echo "<script>
    alert('이름 혹은 휴대전화가 틀렸습니다 확인후 입력해주세요.');
    history.back();
    </script>";
    exit;
}


if($name == $row['name'] && $tel == $row['tel']){
    
    echo "<script>
    alert('회원님의 아이디는 $row[id] 입니다.');
    location.href='login.html';
    </script>";
}



?>