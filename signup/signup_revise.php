<?php
session_start();
include "../dbcon.php";

$nickname = $_SESSION['user_nickname'];


$sql = "SELECT * FROM signup where nickname='$nickname'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/top_bottom.css">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" type="text/javascript" defer></script>
    <script src="../js/check.js" type="text/javascript" defer></script>
    <title>회원정보수정</title>
</head>

<body>
    <header>
        <div class="head">
            <div class="logo">
                <a href="../index.php">
                    <img src="../imgs/logo.png" alt="로고">
                </a>
            </div>
            <div class="rmenu">
                <ul class="menu">
                    <li class="menu_text"><a href="../spare_mother/spare_plan.php">예비엄마준비중</a></li>
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
                    <li><a href="logout.php">로그아웃</a></li>
                </ul>
                <?php    
                }
                else{
                ?>
                <a href="login.html">
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
    <!------------header-------------->
    <div class="align">
        <div class="signup_logo">
            <img src="../imgs/logo.png" alt="로고">
        </div>
        <form method="POST" action="signup_revise_ok.php" class="signup_form">
            <span class="signup_text">회원정보수정</span>
            <table class="signup_table re_table">
                <tr>
                    <td colspan="2" class="id_td">
                        <div class="id_revise">
                            <span><?=$row['id']?></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="password" placeholder="비밀번호 ( 8 ~ 14 자로 작성해주세요. )"
                            maxlength="14" required autocomplete="new-password" class="sign_pw"></td>
                </tr>
                <tr>
                    <td colspan="2" class="pw_td"><input type="password" name="password1" placeholder="비밀번호 확인" required
                            autocomplete="new-password" class="sign_pw1"><span class="pw_check">*비밀번호가 틀립니다.</span>
                        <span class="pw_check1">*비밀번호가 일치합니다.</span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="id_revise">
                            <span><?=$row['name']?></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="nick_td">
                        <div class="id_revise">
                            <span><?=$row['nickname']?></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><span class="point_text">*신뢰를 기반하는 커뮤니티 사이트이므로 신중히 작성바랍니다.</span></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="address" value="<?=$row['address']?>"  required class="address"></td>
                </tr>
                <tr>
                    <td class="tel_td"><input type="text" name="tel1" placeholder="휴대전화" required class="tel tel1" maxlength="3">
                        <input type="text" name="tel2"  maxlength="4" class="tel tel2" required>
                        <input type="text" name="tel3" maxlength="4"  class="tel tel3" required></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" value="<?=$row['email']?>" class="email" required autocomplete="email"></td>
                </tr>
                
                <tr>
                    <td colspan="2" class="box_flex">
                        <input type="submit" value="수정하기" class="signup_box revise_box">
                        <button class="back" onclick="back()">취소</button>
                    </td>
                </tr>
            </table>
        </form>

        <!-- <img src="../imgs/signup_img.png" alt="회원가입이미지"> -->
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