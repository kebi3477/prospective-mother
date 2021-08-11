<?php
session_start();
include "../dbcon.php";
if(!isset($_SESSION['user_nickname'])){
    echo "<script>
    alert('로그인후 이용하실 수 있습니다.');
    history.back();
    </script>";
    exit;
}

$num = $_POST['num'];
$name = $_SESSION['user_nickname'];
$check = $_POST['check'];
$report_text = $_POST['report_text'];
$val = $_POST['val'];

$str = implode(',' , $check);

$sql = "INSERT INTO report(board_num,nickname,type,box,report_text)
VALUES('$num','$name','$val','$str','$report_text')";
$result = $mysqli->query($sql);


if($result){
    echo "<script>
    alert('신고가 접수 되었습니다.');
    history.back();
    </script>";
    exit;
}
?>

