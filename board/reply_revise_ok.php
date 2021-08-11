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

if($val == 'parenting'){
    $sql = "UPDATE reply SET content='$content' WHERE id='$id'";
    $result = $mysqli->query($sql);

    if($result){
        echo "<script>
        alert('댓글이 수정되었습니다.');
        location.href='board_content.php?num=$num';
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
}


if($val == 'pregnant'){
    $sql = "UPDATE preg_reply SET content='$content' WHERE id='$id'";
    $result = $mysqli->query($sql);

    if($result){
        echo "<script>
        alert('댓글이 수정되었습니다.');
        location.href='pregnant_content.php?num=$num';
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
}


if($val == 'dad'){
    $sql = "UPDATE dad_reply SET content='$content' WHERE id='$id'";
    $result = $mysqli->query($sql);

    if($result){
        echo "<script>
        alert('댓글이 수정되었습니다.');
        location.href='dad_content.php?num=$num';
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
}








?>