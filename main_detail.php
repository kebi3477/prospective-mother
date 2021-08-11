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
    <link rel="stylesheet" href="css/main_detail.css">
    <title>자세히보기</title>
</head>

<body>
    <header>
        <div class="head">
            <div class="logo">
               <a href="index.php"><img src="imgs/logo.png" alt="로고이미지"></a>
            </div>
            <div class="rmenu">
                <ul class="menu">
                    <li class="menu_text"><a href="spare_mother/spare_plan.php">예비엄마준비중</a></li>
                    <li class="menu_text"><a href="board/parenting_board.php">함께소통해요</a></li>
                    <li class="menu_text"><a href="free_share/free_share.php">무료나눔</a></li>
                    <li class="the"><a href="#">더보기&nbsp;<img src="imgs/morebtn.png" alt="더보기버튼"></a>
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
    <div class="dd">

    </div>
      <div class="main">
        <div class="main_board">
            <div class="board_top">
                <p><h2>예비엄마</h2></p>
                <p class="title2">"예비엄마는 임산부를 위한 정보 공유 사이트"</p>
                <p class="title3">임산부와 아이를 가진 부모에게 필요한 정보들을 얻고 나누는 소통공간입니다.</p>
            </div>
            <div class="mid">

            </div>
            <div class="img1">
                <img src="imgs/detail.jpg" alt="자세히보기이미지1">
            </div>
            <div class="mid">

            </div>
<pre>예비엄마 준비중, 함께소통해요, 무료나눔에서 커뮤니티 및 정보 서비스를 지향합니다.
예비엄마 홈페이지를 통해 사용자의 질과 삶을 행복하게 만들고 주변 이웃에게 선행을 베풀며
더 나아가 사회에서 따뜻한 변화를 나타날 수 있습니다.
</pre>
            <p class="logo_text">
                <span>집이라는 공간 안에'아이와 엄마가 연결되어 있다'는 것을 나타내어 로고를 제작하였습니다.</span>
            </p>
            <div class="img2">
                <img src="imgs/detail_logo.jpg" alt="자세히보기이미지2">
            </div>
        </div>
      </div>
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