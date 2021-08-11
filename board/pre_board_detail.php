<?php

session_start();
include "../dbcon.php";


if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}

$board_name = $_GET['name'];
$nickname = $_SESSION['user_nickname'];



$sql = "SELECT * FROM pregnant_board where name ='$board_name' order by num desc";
$result = $mysqli->query($sql);

$total_article = mysqli_num_rows($result);


$view_article=5;
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

$sql2 = "select * from pregnant_board where name='$board_name' order by num desc limit $start, $view_article";
$result2 = $mysqli->query($sql2);
$cnt = 1;
$cnt = $total_article-($view_article*($page-1));

?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo_icon.png" type="image/x-icon">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" defer="defer" type="text/javascript"></script>
    <script src="../js/mypage.js" defer="defer" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/mypage_pregnant.css">
    <link rel="stylesheet" href="../css/top_bottom.css">
    <title>Mypage</title>
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
    <div class="main">
        <div class="main_body">
            <div class="body_top">
                <h2><?=$board_name?>님의 기본정보</h2>
            </div>
            <div class="check_line">
                <img src="../imgs/check.png" alt="체크이미지"><span><?=$board_name?>님이 작성한 게시판</span>
            </div>
            <div class="tab">
                <a href="free_detail.php?name=<?=$board_name?>">
                    <div class="box box1">
                        <span>무료나눔</span>
                    </div>
                </a>
                <a href="board_detail.php?name=<?=$board_name?>">
                    <div class="box box2">
                        <span>육아</span>
                    </div>
                </a>
                <a href="#">
                    <div class="box box3">
                        <span>임신</span>
                    </div>
                </a>
                <a href="dad_board_detail.php?name=<?=$board_name?>">
                    <div class="box box4">
                        <span>예비아빠</span>
                    </div>
                </a>

                <div class="board">
                    <div class="board_body">
                        <table class="board_table">
                            <thead>
                                <th class="num">No.</th>
                                <th class="title">제목</th>
                                <th class="name">작성자</th>
                                <th class="day">등록일</th>
                                <th class="click_num">조회수</th>
                                <th class="good">좋아요</th>
                            </thead>
                            <tbody>
                                <?php
            
            while($row = mysqli_fetch_array($result2)){
                $num = $row['num'];                  
            ?>
                                <tr>
                                    <td><?=$cnt?></td>
                                    <td><a href="../board/pregnant_content.php?num=<?=$row['num']?>"><?=$row['title']?></a>
                                    </td>
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['date']?></td>
                                    <td><?=$row['hit']?></td>
                                    <td class="end_td"><?=$row['good']?></td>
                                </tr>
                                <?php
                $cnt--;
            }
                            ?>
                            </tbody>
                        </table>
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


// $next_group = $end_page;



/*마지막페이지*/
// if($next_group > $total_page){
//     $next_group = $total_page;
// }

?>

                        <div class="page_btn_grop">

                            <?php

if($total_article == 0){
    echo "<span class='page_no'>작성된 게시글이 없습니다.</span>";
}
else{
    echo "<a href=$_SERVER[PHP_SELF]?page=1><span class='page_btn_class2'><img src='../imgs/ee.png'></span></a>";
if($page != 1){
    echo "<a href=$_SERVER[PHP_SELF]?page=$prev_page>
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
      echo "<a href='?page=$i'><span class='page_btn_class'>$i</span></a>"; //아니라면 $i*/
    }
  }
if($page != $total_page){
    echo "<a href=$_SERVER[PHP_SELF]?page=$next_page><span class='page_btn_class'>다음</span></a>";    
}
else{
    echo "<span class='page_btn_class'>다음</span></a>";
}
    echo "<a href=$_SERVER[PHP_SELF]?page=$total_page><span class='page_btn_class2'>
    <img src='../imgs/rr.png'>
    </spna></a>";
}

?>

                        </div>

                        <!----------board_body 끝--->
                    </div>
                </div>
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