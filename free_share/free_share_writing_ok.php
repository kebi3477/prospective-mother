<?php
session_start();
date_default_timezone_set("Asia/Seoul");/*한국시간*/

include "../dbcon.php";

@mkdir("upload_img",0700,true);

$title = $_POST['title'];
$nick_name = $_SESSION['user_nickname'];
$upload_img = $_FILES['upload_img']['name'];
$address = $_POST['address'];
$product = $_POST['product'];
$content = $_POST['content'];
$warning = $_POST['warning'];
$date = date("Y년 m월 d일");
$dir = "upload_img/";
$arr = array('image/png','image/jpg','image/jpeg','image/gif');
$arr_cnt = count($arr);

$content = nl2br($content);
$warning = nl2br($warning);


/*  이미지 파일 확장자 검사 */
if($upload_img[0] != ''){
    foreach($_FILES['upload_img'] as $key => $value){
        foreach($value as $value2){
            if($key == 'type'){
                if($value2 == $arr[0] || $value2 == $arr[1] || $value2 == $arr[2] || $value2 == $arr[3]){
                    continue;
                }
                else{
                    echo "<script>
                    alert('이미지는 jpg, jpeg, png, gif 파일형식만 가능합니다.');
                    history.back();
                    </script>";
                    exit;
                }
           
            } 
        }
    }
}


$count = count($_FILES['upload_img']['name']);

/*  이미지 파일 최대 개수 검사 */
if($count > '4'){
    echo "<script>
    alert('이미지는 4장까지 넣어주세요.');
    history.back();
    </script>";
    exit;
}

$str = empty($_FILES) ? '' : implode('/', $_FILES['upload_img']['name']);
/* 삼항연산자 empty값이 참이면 공백실행 아니면 impload실행*/

for($i=0; $i<$count; $i++){     /*  for문으로 선택한 이미지를 개수만큼 업로드*/
    
   move_uploaded_file($_FILES['upload_img']['tmp_name'][$i],$dir.$upload_img[$i]);    
    /*업로드 파일을 선택된 개수만큼 폴더에 저장*/  
}



/*  게시판 공백 검사 */
if($title == ''){
    echo "<script>
    alert('제목을 입력해주세요.');
    history.back();
    </script>";
    exit;
}
if($upload_img[0] == ''){
    echo "<script>
    alert('이미지를 넣어주세요.');
    history.back();
    </script>";
    exit;
}
if($address == ''){
    echo "<script>
    alert('거래지역을 입력해주세요.');
    history.back();
    </script>";
    exit;
}
if($product == ''){
    echo "<script>
    alert('거래물품을 입력해주세요.');
    history.back();
    </script>";
    exit;
}
if($content == ''){
    echo "<script>
    alert('상세설명을 입력해주세요.');
    history.back();
    </script>";
    exit;
}
if($warning == ''){
    echo "<script>
    alert('주의사항을 입력해주세요.');
    history.back();
    </script>";
    exit;
}


$sql = "INSERT INTO free_share(title,name,img_src,address,product,content,warning,date)
                VALUES('$title','$nick_name','$str','$address','$product','$content','$warning','$date')";
$result = $mysqli->query($sql);

if($result){
   echo "<script>
   alert('게시글 작성완료');
   location.href='free_share.php';
   </script>";
           
}
else{
    echo "<script>
    alert('게시글 작성실패');
    history.back();
    </script>";
    exit;
}
        



              



// if($i==0){  /*  i가 0일때는 a가 공백이므로 문자열 처음에 / 가 안적힘   */
    //     $img_src = $img_src.$_FILES['upload_img']['name'][$i];
    // }
    // else{
    //     $img_src = $img_src."/".$_FILES['upload_img']['name'][$i];
    // }

// foreach($upload_img as $key => $value) {
//     // foreach($value as $value2){
        
//     //     if($key == 'name'){
        
            
//     //     for($i=0; $i<3; $i++){
//     //         $file_dir = $dir.$value2;
            
            
//         }
        
            // for($i=0; $i<1; $i++){
            //     $file_dir = $dir.$value2;
            //  move_uploaded_file($_FILES['upload_img']['tmp_name'][$i],$file_dir);
            //  move_uploaded_file($_FILES['upload_img']['tmp_name'][$i],$file_dir);
            //  move_uploaded_file($_FILES['upload_img']['tmp_name'][$i],$file_dir);
            //     echo $file_dir."<br>";
                
            
    //     }
    // }

        // if($key == 'name'){
        //     for($i=0; $i<count($upload_img); $i++){
        //         $file_dir = $dir.$value[$i];
        //         if(move_uploaded_file($_FILES['upload_img']['tmp_name'][$i],$file_dir)){
                   
        //         }
        //     }
        //             $sql = "INSERT INTO parenting_board(type,title,img_src,movie_src,content,date)
        //             VALUES('$type','$title','$file_dir','$dd','$content','$date')";
        //             $result = $mysqli->query($sql);
                    
        //             $sql2 = "select * from parenting_board";
        //             $result2 = $mysqli->query($sql2);
        //             $row = mysqli_fetch_array($result2);

        //            while($row = mysqli_fetch_array($result2)){
        //                echo $row['img_src']."<br>";
        //            }
        //             echo $row['num']."<br>".$row['type']."<br>".$row['title']."<br>".$row['img_src']
        //             ."<br>".$row['movie_src']."<br>".$row['content']."<br>".$row['date'];

        //             if($result){
        //                 echo "1";
        //             }
        //             else{
        //                 echo "2";
        //             }
        // }               

                
            
            


  





// for($i = 0; $i < count($_FILES['upload_img']['name']); $i++){
//     $upload_img_file[] = "upload_img/".$upload_img[$i];


//     if(move_uploaded_file($_FILES['upload_img']['tmp_name'][$i],$upload_img_file)){

//         $sql = "INSERT INTO parenting_board(type,title,img_src,movie_src,content,date)
//         VALUES('$type','$title','$upload_img_file',null,$content,'$date')";
        
//         $result = $mysqli->query($sql);
        
//         echo "<script>
//         alert('작성완료');
//         location.href='./parenting_board.php';
//         </scirpt>";
        
//     }
//     else{
//         echo "2";
//     }
// }

?>