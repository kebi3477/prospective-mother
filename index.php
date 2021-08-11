<?php

session_start();
include "dbcon.php";

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/logo_icon.png" type="image/x-icon">
    <script src="js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="js/script.js" defer="defer" type="text/javascript"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/top_bottom.css">
    <title>예비엄마</title>
</head>

<body>
    <header>
        <div class="head">
            <div class="logo">
               <a href="#"><img src="imgs/logo.png" alt=""></a>
            </div>
            <div class="rmenu">
                <ul class="menu">
                    <li class="menu_text"><a href="spare_mother/spare_plan.php">예비엄마준비중</a></li>
                    <li class="menu_text"><a href="board/parenting_board.php">함께소통해요</a></li>
                    <li class="menu_text"><a href="free_share/free_share.php">무료나눔</a></li>
                </ul>
                <?php
                if(isset($_SESSION['user_nickname'])){
                ?>
                <ul class="logout">
                    <li><a href="mypage/mypage.php">마이페이지</a></li>
                    <span class="line_span"></span>
                    <li><a href="signup/logout.php">로그아웃</a></li>
                </ul>
                <?php    
                }
                else{
                ?>
                <a href="signup/login.html">
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
    <div class="cloud">
        <img src="imgs/cloud.png" alt="구름">
    </div>
    <div class="maple maple1">
        <img src="imgs/maple1.png" alt="단풍잎1">
    </div>
    <div class="maple maple1_1">
        <img src="imgs/maple2.png" alt="단풍잎1_1">
    </div>
    <div class="maple maple2">
        <img src="imgs/maple3.png" alt="단풍잎2">
    </div>
    <div class="maple maple3">
        <img src="imgs/maple4.png" alt="단풍잎3">
    </div>
    <div class="maple maple4">
        <img src="imgs/maple5.png" alt="은행잎1">
    </div>
    <div class="maple maple5">
        <img src="imgs/maple7.png" alt="은행잎2">
    </div>
    
        <div class="rand">
            <span class="rand_text1">“그거알아? 세상에서 가장 위대한 것은 어머니래”</span>
            <span class="rand_text2">“너에게 행복을 줄 수 있는 아이가 되기를 기도할게”</span>
            <span class="rand_text3">“앞날에 축복과 축하할 일만 가득했으면 좋겠어”</span>
            <span class="rand_text4">“딸이든 아들이든 건강하게만 세상에 나와줬으면 좋겠어”</span>
            <span class="rand_text5">“오랜만이야. 반가워 또 왔네?”</span>
        </div>
  
    <div class="bg">
        <img src="imgs/background1.jpg" alt="배경이미지">
    </div>
    
        
    
    <div class="text">
        <h2>예비엄마들을 위한<br>정보공유 사이트</h2>
    </div>
    <a href="main_detail.php">
        <div class="btnbox">
            <span>자세히보기</span>
        </div>
    </a>
    <footer>
        <div class="footer_center">
            <div class="fmenu">
                <ul>
                    <a href="#"><li>상호 | (주)예비엄마</li></a>
                    <a href="#"><li>사이트명 | (주)예비엄마</li></a>
                    <a href="#"><li>대표 | 고창민</li></a>
                    <a href="#"><li>사업자번호 | 123-45-67890</li></a>
                    <a href="#"><li>통신판매 | 제2020-제주-012345</li></a>
                    <a href="#"><li>작업정보제공 | J12345678912345</li></a>
                </ul>
                <ul>
                    <a href="#"><li>주소 | [63243] 제주특별자치도 제주시 조현동3길 2</li></a>
                    <a href="#"><li>전화 | 1234-5678</li></a>
                    <a href="#"><li>이메일 | mother@nothing</li></a>
                    <a href="#"><li>계좌번호 | [혜경은행] 1234-567-890123, 예금주 : (주)예비엄마</li></a>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>