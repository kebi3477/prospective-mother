<?php

session_start();
include "../dbcon.php";
$num = $_GET['num'];
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}
/*      조회수 중복방지 쿠키       */
if(isset($num) && !isset($_COOKIE['hit_cookie2'.$num])){
    
    $hit_sql = "UPDATE dad_board SET hit = hit + 1 WHERE num='$num'";
    $result = $mysqli->query($hit_sql);
    
    if(isset($result)){
        setcookie('hit_cookie2'.$num, time() + 3600, '/'); 
        /*   setcookie([쿠키이름], [값], [만료시간 / 초 단위], [경로]); */
    }
}

?>


<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/top_bottom.css">
    <link rel="stylesheet" href="../css/dad_content.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" type="text/javascript" defer></script>
    <script src="../js/board.js" type="text/javascript" defer></script>
    <title>게시판</title>
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
    <div class="report_pop">
        <div class="report_body">
            <div class="report_body_top">
                <img src="../imgs/exit.png">
            </div>
            <h2>게시글을 신고하시겠습니까?</h2>
            <form method="post" action="report.php">
                <div class="check_line">
                    <p class="p1"><input type="checkbox" value="영리목적/홍보성" name="check[]"><span>영리목적 / 홍보성</span></p>
                    <p class="p2"><input type="checkbox" value="개인정보노출" name="check[]"><span>개인정보노출</span></p>
                </div>
                <div class="check_line">
                    <p class="p1"><input type="checkbox" value="불법정보" name="check[]"><span>불법정보</span></p>
                    <p class="p2"><input type="checkbox" value="음란성/선정성" name="check[]"><span>음란성 / 선정성</span></p>
                </div>

                <div class="check_line">
                    <p class="p1"><input type="checkbox" value="거래/부정행위" name="check[]"><span>거래 부정행위</span></p>
                    <p class="p2"><input type="checkbox" value="욕설" name="check[]"><span>욕설 / 인신공격</span></p>
                </div>

                <div class="check_line">
                    <p class="p1"><input type="checkbox" value="같은내용반복게시" name="check[]"><span>같은내용 반복게시(도배)</span></p>
                    <p class="p2"><input type="checkbox" value="기타" name="check[]"><span>기타</span></p>
                </div>
                <textarea name="report_text" id="rep_text" placeholder="신고사유를 자세히 작성해주시기 바랍니다.
사유에따라 처리시간이 다소 지연될 수 있습니다."></textarea>
                <div class="report_span">
                    <span>신고는 반대 의견을 표시하는 기능이 아닙니다.</span>
                    <span>허위 신고의 경우 신고자가 재재받을 수 있음으로 유념해주시기 바랍니다.</span>
                </div>
                <p class="report_bottom">
                    <input type="submit" value="신고하기" id="report_submit" class="btn_size">
                    <button type="button" class="back">취소</button>
                    <input type="hidden" name="num" value="<?=$num?>">
                    <input type="hidden" name="val" value="예비아빠">
                </p>
            </form>
        </div>
    </div>
    <!-----------삭제 모달-------->
    <div class="delete_pop">
       <div class="delete_body">
          <div class="delete_body_top">
              <img src="../imgs/exit.png">
          </div>
          <h2>게시글을 삭제하시겠습니까?</h2>
          <div class="de_bottom">
             <a href="delete.php?num=<?=$num?>&val=dad"><button>삭제하기</button></a>
             <button>취소</button>
          </div>
       </div>
    </div>

    <div class="bg">
        <div id="dd"></div>
        <div class="main_board">

<?php
    $sql = "SELECT * FROM dad_board WHERE num='$num'";
    $result = $mysqli->query($sql);
                    
                
while($row = mysqli_fetch_array($result)):
    $string = $row['img_src'];
    $img_string = explode('/',$string);
    $count = count($img_string);       
?>
 
            <div class="board_header">
                <p class="type"><?=$row['type']?></p>
                <p><button class="report"><img src="../imgs/report.png" alt="신고이미지">신고하기</button></p>
            </div>
            <div class="board_title">

                <h2><?=$row['title']?></h2>

            </div>
            <div class="name_block">
                <div class="name_day">
                    <p><?=$row['name']?></p>
                    <span><?=$row['date']?></span>
                    <span>조회수 <?=$row['hit']?></span>
                </div>
                <div class="good_img">
                
                    <form method="POST" action="good.php" id="good1">
                        <button type="button"><img src="../imgs/good.png" alt="좋아요이미지"></button>                  
                        <input type="hidden" name="good" value="3" id="good_val">
                        <input type="hidden" name="num" value="<?=$num?>">
                    </form>
                </div>
            </div>
            <div class="board_content">
                <?php
            
    for($i = 0; $i<$count; $i++):
        if($row['img_src'] != ''){
?>
                <span class="content_img">
                    <img src="upload_img/<?=$img_string[$i]?>" alt="게시판이미지">
                </span>
                <?php
    }
?>
                <?php
    endfor;
?>
                <br>
                <?php
    if($row['movie_src'] != ''){
?>
                <p class="content_movie"><video src="upload_movie/<?=$row['movie_src']?>" controls></p>
                <?php
    }
?>
                <span><?=$row['content']?></span>
                <br><br>
            </div>
            <div class="the_text">
                <span><?=$row['name']?>님의 게시글 더보기<i class="fas fa-angle-right" id="arrow"></i></span>
                <?php
                if(isset($_SESSION['user_nickname'])){
                    if($row['name'] == $_SESSION['user_nickname']){
                ?>
                <div class="up_delete">
                    <a href="revise_board.php?num=<?=$num?>&val=dad"><span id="revise_go">수정</span></a>
                    <span class="line">|</span>
                    <span id="delete_go">삭제</span>
                </div>
                <?php
                    }
                    else if($_SESSION['user_nickname'] == "관리자"){
                ?>
                    <div class="up_delete">
                        <span id="delete_go">삭제</span>
                    </div>
                <?php
                    }

                }
                else{
                ?>
                    <div class="up_delete">
                        <span id="revise_go"></span>
                        <span class="line"></span>
                        <span id="delete_go"></span>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="that_line">
                <p class="good_text">
                    <img src="../imgs/good.png" alt="좋아요2">
                    <span>좋아요</span>
                </p>
                <p class="that">
                    <img src="../imgs/talk.png" alt="댓글말풍선이미지">
                    <span>댓글</span>
                </p>
            </div>
            <?php
endwhile;
?>
            <div class="bottom_that">
                <span>댓글</span>
            </div>
            
<?php

    $resql = "SELECT * FROM dad_reply WHERE board_num='$num'";
    $result_re = $mysqli->query($resql);
    
    $total_article = mysqli_num_rows($result_re);


    $view_article= 6;
    $block_ct = 10; //블록당 보여줄 페이지 개수
    
    $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
    
    $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
    $block_end = $block_start + $block_ct - 1; //블록 마지막 번호
    
    $total_page = ceil($total_article / $view_article); // 페이징한 페이지 수 구하기
    if($block_end > $total_page){
        $block_end = $total_page;
    }//만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
    
    $total_block = ceil($total_page/$block_ct); //블럭 총 개수
    
    $start_num = ($page-1) * $view_article; //시작번호 (page-1)에서 $list를 곱한다.
    
    
    
    
    $start = ($page-1) * $view_article;
    
    
    
    $cnt = 1;
    $cnt = $total_article-($view_article*($page-1));

    $sql2 = "SELECT * FROM dad_reply WHERE board_num='$num' limit $start,$view_article";
    $result2 = $mysqli->query($sql2);
    while($re_row = mysqli_fetch_array($result2)){
        $re_num = $re_row['id'];
?>                  
            <div class="that_content">
                <div class="con_flex">
                    <div class="re_content">
                        <p class="re_num"><?=$re_row['id']?></p>
                        <p class="nick_name"><?=$re_row['nickname']?></p>
                        <p class="that_con"><?=$re_row['content']?></p>
                        <p class="that_day"><?=$re_row['date']?></p>
                    </div>
                    <?php
                    if(isset($_SESSION['user_nickname'])){
                        if($re_row['nickname'] == $_SESSION['user_nickname']){
                    ?>
                    <p class="re_span">
                        <a href="reply_revise.php?id=<?=$re_num?>&num=<?=$num?>&val=dad"><span class="reply_revise_btn">수정</span></a>
                        <span>|</span>
                        <a href="reply_delete.php?id=<?=$re_num?>&num=<?=$num?>&val=dad"><span class="reply_delete_btn">삭제</span></a>
                    </p>
                    <?php
                        }
                        else if($_SESSION['user_nickname'] == "관리자"){
                    ?>
                    <p class="re_span">
                
                        <a href="reply_delete.php?id=<?=$re_num?>&num=<?=$num?>&val=dad"><span class="reply_delete_btn">삭제</span></a>
                    </p>
                     
                    <?php
                        }
            
                    }
                    else{
                    ?>
                    <p class="re_span">
                        <span class="reply_revise_btn"></span>
                        <span></span>
                        <span class="reply_delete_btn"></span>
                    </p>
                    <?php    
                    }
                    ?>
                </div>
            </div>
            
<?php
    }
?>

<?php
    
if($page % 10){
    $start_page = $page-$page % 10 + 1;
}
else{
    $start_page = $page-9;
}


$end_page = $start_page + 10;


$prev_group = $start_page -1;
if($prev_group < 1){
    $prev_group = 1;
}
$prev_page = $page - 1;
$next_page = $page + 1;
?>

        <div class="page_btn_grop">
<?php
if($total_article == 0){
    echo "<span class='page_no'>작성된 댓글이 없습니다 가장 먼저 작성해보세요.</span>";
}
else{
    echo "<a href=$_SERVER[PHP_SELF]?page=1&num=$num><span class='page_btn_class2'><img src='../imgs/ee.png'></span></a>";
if($page != 1){
    echo "<a href=$_SERVER[PHP_SELF]?page=$prev_page&num=$num>
    <span class='page_btn_class'>이전</span></a>";
}
else{
    echo "<span class='page_btn_class'>이전</span></a>";
}

for($i=$block_start; $i<=$block_end; $i++){
    
    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
    if($page == $i){ //만약 page가 $i와 같다면 
      echo "<span class='page_btn'>$i</span>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
    }else{
      echo "<a href='?page=$i&num=$num'><span class='page_btn_class'>$i</span></a>"; //아니라면 $i*/
    }
  }
if($page != $total_page){
    echo "<a href=$_SERVER[PHP_SELF]?page=$next_page&num=$num><span class='page_btn_class'>다음</span></a>";    
    }
else{
    echo "<span class='page_btn_class'>다음</span></a>";
}
    echo "<a href=$_SERVER[PHP_SELF]?page=$total_page&num=$num><span class='page_btn_class2'>
    <img src='../imgs/rr.png'>
    </spna></a>";
}
?>
        </div>
                   
            <div class="that_writing_border">
                <div class="that_writing">
                    <?php
                    if(isset($_SESSION['user_nickname'])){
                    ?>
                    <p class="that_text_name"><?=$_SESSION['user_nickname']?></p>
                    <form method="POST" action="reply.php" id="reply">
                        <textarea name="mini_writing" class="textarea" placeholder="댓글을 입력해주세요."></textarea>
                        <p>
                            <button type="button" id="reply_btn">등록</button>
                            <input type="hidden" name="num" value="<?=$num?>">
                            <input type="hidden" name="re_num" value="아빠">
                        </p>
                    </form>
                </div>
            </div>

                    <?php
                    }
                    else{
                    ?>
                    <p class="that_text_name">로그인이 필요합니다.</p>
                </div>
            </div>
                    <?php
                    }
                    ?>

            <div class="board_bottom">
                <div class="writing_btn">
                    <a href="writing.php">
                        <button class="writing"><img src="../imgs/pen.png" alt="연필이미지">
                            <span>글쓰기</span>
                        </button>
                    </a>
                </div>
                <div class="right_btn">
                    <a href="dad.php"><button class="list"><span>목록</span></button></a>
                    <a href="#">
                        <button class="top"><span class="top_icon">▲</span><span>위로</span></button>
                    </a>
                </div>
            </div>
        </div>

        <div id="ff"></div>
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