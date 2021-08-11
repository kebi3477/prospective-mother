<?php

session_start();
include "../dbcon.php";


// $cookie_no = count($_COOKIE);

// echo $cookie_no;
// var_dump($_COOKIE);

// foreach($_COOKIE as $key => $value){
//     setcookie($key,"",time()-3600,'/');
// }

if(isset($_SESSION['user_nickname'])){
    
    session_unset();
    session_destroy();

    if(!isset($_SESSION['user_nickname'])){
    echo "<script>
    alert('로그아웃 되었습니다.');
    location='../index.php';
    </script>";
    exit;
    }
    else{
        echo "<script>
        alert('잘못된 접근입니다 다시시도해주세요.');
        </script>";
    }
}


?>