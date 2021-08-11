<?php

include "../dbcon.php";

$user_name = $_POST['nickname'];

$sql = "SELECT * FROM signup where nickname = '$user_name'";

$result = $mysqli->query($sql);

$row = mysqli_fetch_array($result);


if(isset($row['nickname'])){    // 중복된 아이디 있을 때
    echo "0";
}else{
    echo "1";   // 중복된아이디 없을 때
}

?>