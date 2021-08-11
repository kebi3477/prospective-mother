<?php

include "../dbcon.php";

$user_id = $_POST['id'];
$sql = "SELECT * FROM signup where id = '$user_id'";

$result = $mysqli->query($sql);

$row = mysqli_fetch_array($result);
// if($result){
//     echo '1';
// }else{
//     echo '0';
// }
// $row = mysqli_fetch_array($result);

if(isset($row['id'])){    // 중복된 아이디 있을 때
    echo "0";
}else{
    echo "1";   // 중복된아이디 없을 때
}

?>