<?php

session_start();
include "../dbcon.php";

if(!isset($_SESSION['user_nickname']) || empty($_SESSION['user_nickname'])){
    
    echo"<script>
            alert('로그인 후 이용해주세요.');
            location.href='../signup/login.html';
        </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/top_bottom.css">
    <link rel="stylesheet" href="../css/free_share_writing.css">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" defer="defer" type="text/javascript"></script>
    <script src="../js/preview.js" defer="defer" type="text/javascript"></script>
    <title>무료나눔</title>
</head>
<body>
    <header>
        <div class="head">
            <div class="logo">
               <a href="../index.php"><img src="../imgs/logo.png" alt=""></a>
            </div>
            <div class="rmenu">
                <ul class="menu">
                    <li class="menu_text"><a href="../spare_mother/spare_plan.php">예비엄마준비중</a></li>
                    <li class="menu_text"><a href="../board/parenting_board.php">함께소통해요</a></li>
                    <li class="menu_text"><a href="free_share.php">무료나눔</a></li>
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
    <div class="dd"></div>
        <div class="writing_main">
            <span class="main_text">무료나눔 글쓰기</span>
                <form method="POST" action="free_share_writing_ok.php" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan="2" class="title_td"><input type="text" name="title" placeholder="제목" class="title" maxlength="50"></td>
                        </tr>
                        <tr>
                            <td class="img_td" colspan="2">
                                <div class="img_flex">
                                    <p>
                                        <img src="../imgs/KakaoTalk_20201023_190920948.png" alt="사진이미지" class="file_img">
                                        <input type="file" name="upload_img[]" multiple class="img" onchange="read(this);">
                                        <span class="photo">사진</span>
                                    </p>
                                    <p><span class="ftext">이미지는 4장 첨부해주세요.</span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="prev_td">
                                <div id="preview"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="address_td">거래지역</td>
                            <td class="product">거래물품</td>
                        </tr>
                        <tr>
                            <td class="address_input">
                                <textarea name="address" class="add_input" placeholder="동(읍 / 면 / 리)까지 작성해주세요. &#13;&#10;ex.서울특별시 동작구 상도동"></textarea>
                            </td>
                            <td class="product_input">
                                <input type="text" name="product" class="pro_input" placeholder="거래물품을 입력해주세요.">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="con_title">
                                상세설명
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tarea">
                                <textarea name="content" class="textarea" placeholder="거래방법, 상품상태, 설명 등 자세하게 입력해주세요." rows="5" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="con_title1">
                                주의사항
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tarea1">
                                <textarea name="warning" class="textarea" placeholder="주의사항을 입력해주세요." rows="5" cols="50"></textarea>
                            </td>
                        </tr>        
                    </table>

                    <div class="bottom">
                        <a href="free_share.php">
                            <div class="back">취소</div>
                        </a>
                        <input type="submit" value="작성완료">
                    </div>
                </form>
                
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