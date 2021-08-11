<?php

session_start();
include "../dbcon.php";

$id = $_POST['id'];
$num = $_POST['num'];
$name = $_SESSION['user_nickname'];
$val = $_POST['val'];
$mini_writing = $_POST['mini_writing'];
$content = nl2br($mini_writing);

if($mini_writing == ""){
    echo "<script>
    alert('내용을 입력해주세요.');
    history.back();
    </script>";
    exit;
}

    $sql = "UPDATE free_reply SET content='$content' WHERE id='$id'";
    $result = $mysqli->query($sql);

    if($result){
        echo "<script>
        alert('댓글이 수정되었습니다.');
        location.href='free_share_content.php?num=$num';
        </script>";
        exit;
    }
    else{
        echo "<script>
        alert('수정에 실패하였습니다 잠시후 다시이용해주세요.');
        history.back();
        </script>";
        exit;
    }











?>