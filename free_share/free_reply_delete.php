<?php

session_start();
include "../dbcon.php";

$id = $_GET['id'];
$num = $_GET['num'];
$name = $_SESSION['user_nickname'];


    $sql = "DELETE FROM free_reply WHERE id='$id'";
    $result = $mysqli->query($sql);

    if($result){
        echo "<script>
        alert('댓글이 삭제되었습니다.');
        location.href='free_share_content.php?num=$num';
        </script>";
        exit;
    }
    else{
        echo "<script>
        alert('삭제에 실패하였습니다 잠시후 다시이용해주세요.');
        history.back();
        </script>";
        exit;
    }



?>

