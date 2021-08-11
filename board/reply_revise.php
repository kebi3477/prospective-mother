<?php

session_start();
include "../dbcon.php";

$id = $_GET['id'];
$num = $_GET['num'];
$name = $_SESSION['user_nickname'];
$val = $_GET['val'];

if($val == 'parenting'){
    $sql = "SELECT * FROM reply WHERE id='$id'";
    $result = $mysqli->query($sql);
}
if($val == 'pregnant'){
    $sql = "SELECT * FROM preg_reply WHERE id='$id'";
    $result = $mysqli->query($sql);
}
if($val == 'dad'){
    $sql = "SELECT * FROM dad_reply WHERE id='$id'";
    $result = $mysqli->query($sql);
}
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/top_bottom.css">
    <link rel="stylesheet" href="../css/board_content.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" type="text/javascript" defer></script>
    <script src="../js/board.js" type="text/javascript" defer></script>
    <title>Document</title>
</head>

<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">

    <header>
        <div class="head">
            <div class="logo">
                <a href="../index.php"><img src="../imgs/logo.png" alt="로고"></a>
            </div>
            <div class="rmenu">
                <ul class="menu">
                    <li class="menu_text"><a href="../spare_mother/spare_plan.php">예비엄마준비중</a></li>
                    <li class="menu_text"><a href="parenting_board.php">함께소통해요</a></li>
                    <li class="menu_text"><a href="../free_share/free_share.php">무료나눔</a></li>
                    <li class="the"><a href="#">더보기&nbsp;<img src="../imgs/morebtn.png" alt="더보기버튼"></a>
                        <ul class="submenu">
                            <div class="sub">
                                <li><a href="#">공지사항</a></li>
                                <li><a href="#">이벤트</a></li>
                                <li><a href="#">자주묻는질문</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
                <?php
                if(isset($_SESSION['user_nickname'])){
                ?>
                <ul class="logout">
                    <li><a href="../mypage/mypage.php">마이페이지</a></li>
                    <span class="line_span"></span>
                    <li><a href="../signup/logout.php">로그아웃</a></li>
                </ul>
                <?php    
                }
                else{
                ?>
                <a href="../signup/login.html">
                    <button class="login">
                        <span>로그인 / 회원가입</span>
                    </button>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </header>
    <div class="ee"></div>
    <?php
    if($val == 'parenting'){           
    ?>
    <div id="revise_back" style='background-color:#fff7ee'>
        <div class="that_writing_border border2" style='background-color:#ffe2ca'>
    <?php
    }
    if($val == 'pregnant'){
    ?>
    <div id="revise_back" style='background-color:#fdf3f3'>
        <div class="that_writing_border border2" style='background-color:#fcd0d7'>
    <?php
    }
    if($val == 'dad'){
    ?>
    <div id="revise_back" style='background-color:#f3fafd'>
        <div class="that_writing_border border2" style='background-color:#cae4ea'>
    <?php
    }
    ?>
        
            <div class="that_writing">
                <p class="that_text_name"><?=$_SESSION['user_nickname']?></p>
                <form method="POST" action="reply_revise_ok.php" id="reply">
                    <textarea name="mini_writing" class="textarea" placeholder="수정할 내용을 입력해주세요."></textarea>
                    <p>
                        <button type="submit" id="reply_btn2">수정</button>
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="hidden" name="num" value="<?=$num?>">
                        <input type="hidden" name="val" value="<?=$val?>"> 
                    </p>
                </form>
            </div>
        </div>
    </div>



    <footer>
        <div class="footer_center">
            <div class="fmenu">
                <ul>
                    <a href="#">
                        <li>상호 | (주)예비엄마</li>
                    </a>
                    <a href="#">
                        <li>사이트명 | (주)예비엄마</li>
                    </a>
                    <a href="#">
                        <li>대표 | 고창민</li>
                    </a>
                    <a href="#">
                        <li>사업자번호 | 123-45-67890</li>
                    </a>
                    <a href="#">
                        <li>통신판매 | 제2020-제주-012345</li>
                    </a>
                    <a href="#">
                        <li>작업정보제공 | J12345678912345</li>
                    </a>
                </ul>
                <ul>
                    <a href="#">
                        <li>주소 | [63243] 제주특별자치도 제주시 조현동3길 2</li>
                    </a>
                    <a href="#">
                        <li>전화 | 1234-5678</li>
                    </a>
                    <a href="#">
                        <li>이메일 | mother@nothing</li>
                    </a>
                    <a href="#">
                        <li>계좌번호 | [혜경은행] 1234-567-890123, 예금주 : (주)예비엄마</li>
                    </a>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>