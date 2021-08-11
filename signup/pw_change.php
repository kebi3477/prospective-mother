<?php

session_start();
include "../dbcon.php";

$id = $_POST['id'];
$re_pw = $_POST['re_pw'];
$re_pw1 = $_POST['re_pw1'];


$sql = "UPDATE signup SET pw='$re_pw' WHERE id='$id'";

$result = $mysqli->query($sql);

if($result){
    echo "<script>
    alert('비밀번호가 정상적으로 바뀌었습니다.');
    location.href='login.html';
    </script>";
}

?>