/*  좋아요   */
$("#good").click(function(){

    const good_form = $("#good").serialize();    /*form 의 정보를 받아옴 */


    $.ajax({
        type : "POST",
        url : "../board/good.php",
        data : good_form,
        dataType : "text",
        success : function(data){
            if(data == '1'){
                $("#good>button>img").attr("src", "../imgs/good2.png");
                $(".good_text>img").attr("src", "../imgs/good2.png");
            }
            else{
                alert('좋아요취소');
            }
        }
    });
});
/*  좋아요   */
$("#good1").click(function(){

    const good_form = $("#good1").serialize();    /*form 의 정보를 받아옴 */


    $.ajax({
        type : "POST",
        url : "../board/good.php",
        data : good_form,
        dataType : "text",
        success : function(data){
            if(data == '1'){
                $("#good1>button>img").attr("src", "../imgs/good3.png");
                $(".good_text>img").attr("src", "../imgs/good3.png");
            }
            else{
                alert('좋아요취소');
            }
        }
    });
});

/*  좋아요   */
$("#good2").click(function(){

    const good_form = $("#good2").serialize();    /*form 의 정보를 받아옴 */


    $.ajax({
        type : "POST",
        url : "../board/good.php",
        data : good_form,
        dataType : "text",
        success : function(data){
            if(data == '1'){
                $("#good2>button>img").attr("src", "../imgs/good4.png");
                $(".good_text>img").attr("src", "../imgs/good4.png");
            }
            else{
                alert('좋아요취소');
            }
        }
    });
});

/* 댓글 */
$("#reply_btn").click(function(){

    const reply_form = $("#reply").serialize();    /*form 의 정보를 받아옴 */
    

    $.ajax({
        type : "POST",
        url : "../board/reply.php",
        data : reply_form,
        dataType : "text",
        success : function(data){
            if(data == '1'){
                location.reload();
            }
            else if(data == '2'){
                alert('로그인후 이용할 수 있습니다.');
            }
            else if(data == '3'){
                alert('내용을 입력해주세요.');
            }
            else{
                alert('작성에 실패하였습니다 잠시후 다시 시도해주세요.');
            }
        }
    });
});


출처: https://alpreah.tistory.com/101 [생각에 취하는날]
// function onKeyDown(){
//     if(Event.keyCode == 13){
//         const reply_revise_form = $("#reply_revise_form").serialize();    /*form 의 정보를 받아옴 */
    
//     $.ajax({
//         type : "POST",
//         url : "../board/reply_revise.php",
//         data : reply_revise_form,
//         dataType : "text",
//         success : function(data){
//             if(data == '1'){
//                 $(".reply_pop2").stop().show();  
//             }
//             else{
//                 alert('실패');
//             }
            
//         }
//     });  
//     }
// }





/* 게시글 모달 */
$("#revise_go").click(function(){
    $(".reserve_pop").stop().show();
});
$(".re_bottom>button").click(function(){
    $(".reserve_pop").stop().hide();
});
$(".reserve_body_top>img").click(function(){
    $(".reserve_pop").stop().hide();
});

$("#delete_go").click(function(){
    $(".delete_pop").stop().show();
});
$(".de_bottom>button").click(function(){
    $(".delete_pop").stop().hide();
});
$(".delete_body_top>img").click(function(){
    $(".delete_pop").stop().hide();
});


/*  신고 하기  모달 */
$(".report").click(function(){
    $(".report_pop").stop().show();
});
$(".report_bottom>button").click(function(){
    $(".report_pop").stop().hide();
});
$(".report_body_top>img").click(function(){
    $(".report_pop").stop().hide();
});