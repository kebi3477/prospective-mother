<?php

session_start();
include "../dbcon.php";

$num = $_GET['num'];
$nickname = $_SESSION['user_nickname'];
$val = $_GET['val'];
if($val == 'parenting'){
    $sql = "SELECT * FROM parenting_board WHERE num = '$num'";
    $result = $mysqli->query($sql);
}
if($val == 'pregnant'){
    $sql = "SELECT * FROM pregnant_board WHERE num = '$num'";
    $result = $mysqli->query($sql);
}
if($val == 'dad'){
    $sql = "SELECT * FROM dad_board WHERE num = '$num'";
    $result = $mysqli->query($sql);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/top_bottom.css">
    <link rel="stylesheet" href="../css/writing.css">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" defer="defer" type="text/javascript"></script>
    <title>Document</title>
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
    <div class="dd"></div>
        <div class="writing_main">
            <span class="main_text">게시판 글쓰기</span>
                <form method="POST" action="revise.php" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan="3" class="type_td">
                            <?php
                            if($val == 'parenting'){
                            ?>
                                <span class="type">육아</span>
                            <?php
                            }
                            if($val == 'pregnant'){
                                ?>
                                    <span class="type">임신</span>
                                <?php
                                }
                            if($val == 'dad'){
                            ?>
                                <span class="type">예비아빠</span>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr><td colspan="3" class="title_td"><input type="text" name="title" placeholder="제목" class="title" maxlength="50"></td></tr>
                        <tr><td class="img_td">
                            <img src="../imgs/KakaoTalk_20201023_190920948.png" alt="사진이미지" class="file_img">
                            <input type="file" name="upload_img[]" multiple class="img" onchange="read(this);"><span class="photo">사진</span>
                        </td>
                            <td class="movie_td"><input type="file" name="upload_movie" class="movie">
                            <img src="../imgs/movie.png" alt="동영상버튼" class="file_movie">&nbsp;
                            <span class="movie_text">동영상</span>
                            </td><td><span class="ftext">이미지는 최대4개 동영상은 최대1개 까지 첨부해주세요.</span></td></tr>

                        <tr>
                            <td colspan="3" class="tarea">
                            <!-- <div id="preview"></div> -->
                            <textarea name="content" class="textarea" placeholder="내용을 입력해 주세요." rows="5" cols="50"></textarea>
                            </td>
                        </tr>   
                    </table>

                    <div class="bottom">
                        <a href="<?=$val?>_board.php">
                            <div class="back">취소</div>
                        </a>
                        <input type="submit" value="수정완료">
                    </div>
                    <input type="hidden" name='num' value="<?=$num?>">
                    <input type="hidden" name='val' value="<?=$val?>">
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