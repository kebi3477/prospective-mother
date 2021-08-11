<?php
session_start();
include "../dbcon.php";
$num = $_GET['num'];
$val = $_GET['val'];
$nickname = $_SESSION['user_nickname'];

if($val == 'parenting'){
$sql = "DELETE FROM parenting_board WHERE num='$num'";
$result = $mysqli->query($sql);

    if($result){
        echo "<script>
        alert('게시물이 삭제되었습니다.');
        location.href='parenting_board.php';
        </script>";
        exit;
    }
}

if($val == 'pregnant'){
    $sql = "DELETE FROM pregnant_board WHERE num='$num'";
    $result = $mysqli->query($sql);
    
        if($result){
            echo "<script>
            alert('게시물이 삭제되었습니다.');
            location.href='pregnant_board.php';
            </script>";
            exit;
        }
}

if($val == 'dad'){
    $sql = "DELETE FROM dad_board WHERE num='$num'";
    $result = $mysqli->query($sql);
    
        if($result){
            echo "<script>
            alert('게시물이 삭제되었습니다.');
            location.href='dad.php';
            </script>";
            exit;
        }
}



?>