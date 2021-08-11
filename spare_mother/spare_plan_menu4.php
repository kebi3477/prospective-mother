<?php

session_start();
include "../dbcon.php";

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo_icon.png" type="image/x-icon">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" defer="defer" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/spare_mother.css">
    <link rel="stylesheet" href="../css/top_bottom.css">
    <title>예비엄마</title>
</head>

<body>
    <header>
        <div class="head">
            <div class="logo">
               <a href="../index.php"><img src="../imgs/logo.png" alt=""></a>
            </div>
            <div class="rmenu">
                <ul class="menu">
                    <li class="menu_text"><a href="spare_plan.php">예비엄마준비중</a></li>
                    <li class="menu_text"><a href="../board/parenting_board.php">함께소통해요</a></li>
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
    <div class="dd">

    </div>
    <div class="main main4">
        <div class="main_grop">
            <div class="left_menu">
                <div class="menu_img">
                    <h3>임신</h3>
                    <img src="../imgs/icon1.png" alt="임산부아이콘">
                </div>
                <ul class="mother_menu">
                    <a href="spare_plan.php">
                        <li>임신계획</li>
                    </a>
                    <a href="spare_plan_menu2.php">
                        <li>임신 전 상담 및 검사</li>
                    </a>
                    <a href="spare_plan_menu3.php">
                        <li>임신과 약물복용</li>
                    </a>
                    <a href="#">
                        <li class="li_bgcolor">임신 중 주의사항</li>
                    </a>
                    <a href="spare_plan_menu5.php">
                        <li>자주 호소하는 증상</li>
                    </a>
                    <a href="spare_plan_menu6.php">
                        <li>예방접종</li>
                    </a>
                    <a href="spare_plan_menu7.php">
                        <li>국민행복카드</li>
                    </a>
                    <a href="spare_plan_menu8.php">
                        <li>임신 지원 정책 서비스</li>
                    </a>
                </ul>
            </div>
            <div class="board">
                <img src="../imgs/plan_4.jpg">
            </div>
        </div>
        <div class="bottom bt4">
            <a href="#">
                <button class="top"><span class="top_icon">▲</span><span>위로</span></button>
            </a>
        </div>   

    </div><!--------main 끝--------->
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