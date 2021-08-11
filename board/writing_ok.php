<?php
session_start();
date_default_timezone_set("Asia/Seoul");/*한국시간*/

include "../dbcon.php";

@mkdir("upload_img",0700,true);
@mkdir("upload_movie",0700,true);


$type = $_POST['type'];
$title = $_POST['title'];
$nick_name = $_SESSION['user_nickname'];
$upload_img = $_FILES['upload_img']['name'];
$upload_movie = $_FILES['upload_movie']['name'];
$content = $_POST['content'];
$date = date("Y년 m월 d일");
$dir = "upload_img/";
$dir2 = "upload_movie/";
$arr = array('image/png','image/jpg','image/jpeg','image/gif');
$movie_arr = array('video/mp4','video/mov','video/avi','video/wmv');
$arr_cnt = count($arr);

$content = nl2br($content);



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
/*  동영상 파일 확장자 검사 */
if($upload_movie != ''){
    foreach($_FILES['upload_movie'] as $key => $value){
        if($key == 'type'){
            if($value == $movie_arr[0] || $value == $movie_arr[1] || $value == $movie_arr[2] || $value == $movie_arr[3]){
                continue;
                }
            else{
                echo "<script>
                alert('동영상은 mp4, mov, avi, wmv 파일형식만 가능합니다.');
                history.back();
                </script>";
                exit;
            }  
        }  
    }
}

$count = count($_FILES['upload_img']['name']);

/*  이미지 파일 최대 개수 검사 */
if($count > '4'){
    echo "<script>
    alert('이미지는 최대 4장까지만 넣어주세요.');
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

/*  동영상 파일 용량 검사 100MB 이상은 안되게   */
foreach($_FILES['upload_movie'] as $key => $value){
    if($key == 'size'){
            
        if($value >= 105933318){
            echo "<script>
             alert('동영상 용량은 100MB 아래로 첨부해주세요.');
             history.back();
             </script>";
             exit;
        }
        else if($value < 105933318 && $upload_movie != ''){
            move_uploaded_file($_FILES['upload_movie']['tmp_name'],$dir2.$upload_movie);
        }
    }

}  

/*  게시판 공백 검사 */
if($type == "게시판선택"){
    echo "<script>
    alert('게시판유형을 선택해주세요.');
    history.back();
    </script>";
    exit;
}
if($title == ''){
    echo "<script>
    alert('게시판 제목을 입력해주세요.');
    history.back();
    </script>";
    exit;
}
if($content == ''){
    echo "<script>
    alert('게시판 내용을 입력해주세요.');
    history.back();
    </script>";
    exit;
}

/*  게시판유형을 육아로 선택했을때 */
if($type == '육아'){

        $sql = "INSERT INTO parenting_board(type,title,name,img_src,movie_src,content,date)
                VALUES('$type','$title','$nick_name','$str','$upload_movie','$content','$date')";
        $result = $mysqli->query($sql);

        if($result){
            echo "<script>
            alert('게시글 작성완료');
            location.href='parenting_board.php';
            </script>";
           
        }
        else{
            echo "<script>
            alert('게시글 작성실패');
            history.back();
            </script>";
            exit;
        }
        
}
/*  게시판유형을 임신으로 선택했을때 */
if($type == '임신'){

    $sql = "INSERT INTO pregnant_board(type,title,name,img_src,movie_src,content,date)
                VALUES('$type','$title','$nick_name','$str','$upload_movie','$content','$date')";
        $result = $mysqli->query($sql);
    if($result){
        echo "<script>
        alert('게시글 작성완료');
        location.href='pregnant_board.php';
        </script>";
    }
    else{
        echo "<script>
        alert('게시글 작성실패');
        history.back();
        </script>";
        exit;
    }
}

if($type == '예비아빠'){

    $sql = "INSERT INTO dad_board(type,title,name,img_src,movie_src,content,date)
                VALUES('$type','$title','$nick_name','$str','$upload_movie','$content','$date')";
        $result = $mysqli->query($sql);
    if($result){
        echo "<script>
        alert('게시글 작성완료');
        location.href='dad.php';
        </script>";
    }
    else{
        echo "<script>
        alert('게시글 작성실패');
        history.back();
        </script>";
        exit;
    }
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