<?php
session_start();
include "../dbcon.php";


if(!isset($_SESSION['user_nickname'])){
    echo "<script>
    alert('로그인 후 이용하실 수 있습니다.');
    location.href='../signup/login.html';
    </script>";
    exit;
}

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}

$sql = "SELECT * FROM free_share order by num desc";
$result = $mysqli->query($sql);

$total_article = mysqli_num_rows($result);


$view_article=6;
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

$sql2 = "select * from free_share order by num desc limit $start, $view_article";
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
    <link rel="stylesheet" href="../css/top_bottom.css">
    <link rel="stylesheet" href="../css/free_share.css">
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script src="../js/script.js" type="text/javascript" defer></script>
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
                    <li class="menu_text"><a href="#">무료나눔</a></li>
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
    <div class="imgslide">
        <a href="#"><img src="../imgs/free_back.jpg"></a>
    </div>
    <div class="mid">
        <form method="GET" action="free_search.php" class="search_form">
            <div class="search_all">
                <select name="search" class="select">
                    <option value="제목">제목</option>
                    <option value="내용">내용</option>
                    <option value="작성자">작성자</option>
                </select>
                <div class="search">
                    <input type="text" name="search_text" class="search_text" placeholder="검색어를 입력하세요.">
                    <button type="submit" class="search_btn"><img src="../imgs/search.png"></button>
                </div>
            </div>
        </form>
    </div>
    <div class="main">
        <div class="main_body">
            <div class="city_btn">
                <div class="map">
                    <span>지역별 검색</span>
                    <img src="../imgs/map.png">
                </div>
                <ul class="map_list">
                    <a href="free_city.php?city=서울">
                        <li>서울특별시</li>
                    </a>
                    <a href="free_city.php?city=부산">
                        <li>부산광역시</li>
                    </a>
                    <a href="free_city.php?city=대구">
                        <li>대구광역시</li>
                    </a>
                    <a href="free_city.php?city=인천">
                        <li>인천광역시</li>
                    </a>
                    <a href="free_city.php?city=대전">
                        <li>대전광역시</li>
                    </a>
                    <a href="free_city.php?city=세종">
                        <li>세종특별자치시</li>
                    </a>
                    <a href="free_city.php?city=경기">
                        <li>경기도</li>
                    </a>
                    <a href="free_city.php?city=강원">
                        <li>강원도</li>
                    </a>
                    <a href="free_city.php?city=충청북도">
                        <li>충청북도</li>
                    </a>
                    <a href="free_city.php?city=충청남도">
                        <li>충청남도</li>
                    </a>
                    <a href="free_city.php?city=전라북도">
                        <li>전라북도</li>
                    </a>
                    <a href="free_city.php?city=전라남도">
                        <li>전라남도</li>
                    </a>
                    <a href="free_city.php?city=경상북도">
                        <li>경상북도</li>
                    </a>
                    <a href="free_city.php?city=경상남도">
                        <li>경상남도</li>
                    </a>
                    <a href="free_city.php?city=제주">
                        <li>제주특별자치도</li>
                    </a>
                </ul>
            </div>
            <table>
                <tr>
                    <?php
                    $count = 1; 
                    
                    while($row = mysqli_fetch_array($result2)){
                        $num = $row['num'];
                        $string = $row['img_src'];
                        $img_string = explode('/',$string);
                        $img_count = count($img_string);      
                ?>
                    <td class="img_td">
                        <div class="img_board">

                            <a href="free_share_content.php?num=<?=$num?>"><img
                                    src="upload_img/<?=$img_string[0]?>"></a>
                        </div>
                        <a href="free_share_content.php?num=<?=$num?>">
                            <div class="img_text">
                                <p class="title"><?=$row['title']?></p>
                                <p class="address"><?=$row['address']?></p>
                                <p class="bottom">
                                    <span class="free">무료나눔</span>
                                    <span class="nick_name"><?=$row['name']?></span>
                                </p>
                            </div>
                        </a>
                    </td>
                    <?php  
                        
                ?>

                    <?php         
                        if($count == 3){
                        echo "</tr>";
                        echo "<tr><td class='line_td'></td></tr>";
                        }
                $count++;   
                }
                ?>

            </table>
            <div class="writing_btn">
                <a href="free_writing.php">
                    <button type="submit" class="writing"><img src="../imgs/pen.png"
                            alt="연필이미지"><span>글쓰기</span></button>
                </a>
            </div>
        </div>
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
    echo "<span class='page_no'>작성된 게시글이 없습니다 가장 먼저 작성해보세요.!!</span>";
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
    </div>
    <!---main-->
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