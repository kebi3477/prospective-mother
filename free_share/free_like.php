<?php
session_start();
include "../dbcon.php";

$num = $_POST['num'];
$nickname = $_SESSION['user_nickname'];
$good_val = $_POST['good'];


$sql = "select * from free_like where board_num ='$num'";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result)){
    if($row['nickname'] == $nickname && $row['board_num'] == $num){
        exit;
    }
}


if($good_val == 0){
    $sql2 = "UPDATE free_share SET good = good + 1 WHERE num='$num'";
    $result2 = $mysqli->query($sql2);
    echo "1";
    $sql3 = "INSERT INTO free_like(nickname,board_num)VALUES('$nickname','$num')";
    $result3 = $mysqli->query($sql3); 
    exit;
}









// if(!isset($row['nickname']) && !isset($row['board_num'])){
//     echo 0;
//     // exit;
// }






?>