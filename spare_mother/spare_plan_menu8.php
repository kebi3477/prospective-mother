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
    <script src="../js/spare_plan.js" defer="defer" type="text/javascript"></script>
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
    <div class="main main8">
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
                    <a href="spare_plan_menu4.php">
                        <li>임신 중 주의사항</li>
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
                    <a href="#" onclick="load();">
                        <li class="li_bgcolor">임신 지원 정책 서비스</li>
                    </a>
                </ul>
            </div>
            <div class="board board2">
                <span class="plan_text">예비엄마 준비중<img src="../imgs/slidebutton2.png"></span>
                <h1>임신 지원 정책 서비스</h1>
                <div class="box" id="box1">
                    <p>
                        <span class="line"></span>
                        <span class="title">저소득층 기저귀·조제분유 지원</span>
                   </p>
<pre>
저소득층 가구의 영아를 양육하는 부모에게 기저귀와 조제분유를 지원하여 경제적 부담을 덜어드립니다.                  
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box2">
                    <p>
                        <span class="line"></span>
                        <span class="title">의료급여 본인부담 면제</span>
                   </p>
<pre>
의료급여 수급권자 중 본인부담금 면제 대상자에게 본인부담금을 지원하여
저소득층의 국민보건 향상과 사회복지 증진에 기여합니다.                 
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box3">
                    <p>
                        <span class="line"></span>
                        <span class="title">미숙아 및 선천성이상아 의료비 지원</span>
                   </p>
<pre>
보건소에 등록하여 관리하고 있는 미숙아 및 선천성 이상아 치료에 소요되는 의료비를 지원합니다.                
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box4">
                    <p>
                        <span class="line"></span>
                        <span class="title">고용보험 미적용자 출산급여 지원</span>
                   </p>
<pre>
소득활동을 하고 있으나 고용보험의 '출산전후휴가급여'를 지원받지 못하는 출산여성에게 출산급여를 지원합니다.                
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box5">
                    <p>
                        <span class="line"></span>
                        <span class="title">의료급여임신·출산진료비지원</span>
                   </p>
<pre>
임신이 확인된 의료급여 수급권자에게 임신과 출산에 필요한 의료비를 지원합니다.                
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box6">
                    <p>
                        <span class="line"></span>
                        <span class="title">지역사회 통합건강증진사업</span>
                   </p>
<pre>
지역사회를 기반으로 금연, 음주폐해예방(절주), 신체활동, 영양, 비만예방관리, 구강보건, 지역사회중심재활 등의
다양한 건강증진사업을 실시하여 지역 주민들의 건강한 삶을 지원합니다.             
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box7">
                    <p>
                        <span class="line"></span>
                        <span class="title">인플루엔자 국가예방접종 지원사업</span>
                   </p>
<pre>
인플루엔자 예방접종을 통해 인플루엔자 유행을 방지하고 질병부담 감소시키며 겨울철 국민건강을 보호합니다.  
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box8">
                    <p>
                        <span class="line"></span>
                        <span class="title">산모·신생아 건강관리 지원사업</span>
                   </p>
<pre>
인플루엔자 예방접종을 통해 인플루엔자 유행을 방지하고 질병부담 감소시키며 겨울철 국민건강을 보호합니다.  
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box9">
                    <p>
                        <span class="line"></span>
                        <span class="title">의료급여 선택의료급여기관제</span>
                   </p>
<pre>
의료급여 수급권자에게 의료비를 지원하여 저소득층 국민 보건 향상과 사회복지 증진에 기여합니다.  
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box10">
                    <p>
                        <span class="line"></span>
                        <span class="title">아동통합서비스지원(드림스타트사업)</span>
                   </p>
<pre>
취약계층 아동에게 맞춤형 통합서비스를 제공하여 건강한 성장과 발달을 도모하고 공평한 출발 기회를 보장함으로써
건강하고 행복한 사회구성원으로 성장할 수 있도록 지원합니다.  
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box11">
                    <p>
                        <span class="line"></span>
                        <span class="title">고위험 임산부 의료비 지원</span>
                   </p>
<pre>
고위험 임신의 치료와 관리에 필요한 진료비를 지원하여 경제적 부담을 줄이고, 건강한 출산을 보장합니다.
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box12">
                    <p>
                        <span class="line"></span>
                        <span class="title">모성보호육아지원(출산전후휴가(유산ㆍ사산휴가 포함) 급여, 육아휴직등 급여)</span>
                   </p>
<pre>
출산 전후에 휴가급여와 육아휴직급여, 육아기 근로시간 단축급여를 제공하여 출산으로 인한
직장 여성의 이직을 방지하고 사업주의 여성 고용기피 요인을 해소합니다.
</pre>
                </div>
                <div class="enter"></div>

                <div class="box" id="box13">
                    <p>
                        <span class="line"></span>
                        <span class="title">선천성 난청검사 및 보청기 지원</span>
                   </p>
<pre>
선천성 난청을 조기진단과 조기 재활을 통해 난청으로 인해 발생할 수 있는 언어 지능 발달장애
사회부적응 등을 예방하고 건강한 성장을 도모합니다.
</pre>
                </div>

            </div>
        </div>
        <div class="bottom bt8">
            <a href="#">
                <button class="top"><span class="top_icon">▲</span><span>위로</span></button>
            </a>
        </div>   
        <div class="board tab1">
            <img src="../imgs/box_menu1.jpg">
            <div class="bottom tbt1">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab2">
            <img src="../imgs/box_menu2.jpg">
            <div class="bottom tbt2">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab3">
            <img src="../imgs/box_menu3.jpg">
            <div class="bottom tbt3">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab4">
            <img src="../imgs/box_menu4.jpg">
            <div class="bottom tbt4">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab5">
            <img src="../imgs/box_menu5.jpg">
            <div class="bottom tbt5">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab6">
            <img src="../imgs/box_menu6.jpg">
            <div class="bottom tbt6">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab7">
            <img src="../imgs/box_menu7.jpg">
            <div class="bottom tbt7">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab8">
            <img src="../imgs/box_menu8.jpg">
            <div class="bottom tbt8">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab9">
            <img src="../imgs/box_menu9.jpg">
            <div class="bottom tbt9">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab10">
            <img src="../imgs/box_menu10.jpg">
            <div class="bottom tbt10">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab11">
            <img src="../imgs/box_menu11.jpg">
            <div class="bottom tbt11">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab12">
            <img src="../imgs/box_menu12.jpg">
            <div class="bottom tbt12">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
        </div>

        <div class="board tab13">
            <img src="../imgs/box_menu13.jpg">
            <div class="bottom tbt13">
                <a href="spare_plan_menu8.php">
                    <button class="top"><span>목록</span></button>
                </a>
            </div>
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