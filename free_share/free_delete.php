<?php
session_start();
include "../dbcon.php";
$num = $_GET['num'];

$nickname = $_SESSION['user_nickname'];

$sql = "DELETE FROM free_share WHERE num='$num'";
$result = $mysqli->query($sql);

if($result){
    echo "<script>
    alert('게시물이 삭제되었습니다.');
    location.href='free_share.php';
    </script>";
}

?>