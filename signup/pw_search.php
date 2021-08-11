<?php

session_start();
include "../dbcon.php";

$id = $_POST['id'];
$name = $_POST['name'];
$tel = $_POST['tel'];


$sql = "select * from signup where id='$id'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);

if($id == '' || $name == '' || $tel == ''){
    echo "<script>
    alert('공백이 있습니다.');
    history.back();
    </script>";
    exit;
}
if($id != $row['id'] || $name != $row['name'] || $tel != $row['tel']){
    echo "<script>
    alert('입력하신 정보가 틀립니다.');
    history.back();
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
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/top_bottom.css">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" type="text/javascript" defer></script>
    <title>로그인</title>
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
                <a href="#">
                    <button class="login">
                        <span class="login_text">로그인 / 회원가입</span>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <div class="dd"></div>
 <!-----------비밀번호 새로 입력------->
 <div class="pw_re">
    <div class="pw_bg">
       <h2>비밀번호 변경</h2>
       <form method="POST" action="pw_change.php">
           <table class="pw_re_table">
                <tr><td><input type="password" name="re_pw" placeholder="비밀번호" class="id_input"></td></tr>
               <tr><td><input type="password" name="re_pw1" placeholder="비밀번호 확인" class="name_input"></td></tr>
               <tr><td><input type="submit" value="비밀번호 변경" class="pw_sub"></td></tr>
               <tr><td class="pw_se_text">아이디 / 비밀번호 찾기가 안될 시 전화(1234-5678)<br><span class="id_email">이메일(mother@nothing)로 문의해 주시기 바랍니다.</span></td></tr>
           </table>
           <input type="hidden" name="id" value="<?=$id?>">
       </form>
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
