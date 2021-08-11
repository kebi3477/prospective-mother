<?php
date_default_timezone_set("Asia/Seoul");/*한국시간*/
session_start();
include "../dbcon.php";

$num = $_POST['num'];

$mini_writing = $_POST['mini_writing'];
$nickname = $_SESSION['user_nickname'];
$date = date("Y-m-d H:i");
$content = nl2br($mini_writing);



if(!isset($nickname)){
    echo 2;
    exit;
}
if($content == ""){
    echo 3;
    exit;
}

$sql = "INSERT INTO free_reply(board_num,content,nickname,date)
VALUES('$num','$content','$nickname','$date')";
$result = $mysqli->query($sql);

if($result){
    echo 1;
}
else{
    echo 4;
}


?>