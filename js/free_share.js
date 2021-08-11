
const slideWidth = document.querySelector('.imgs').clientWidth;
const img = document.querySelector('.imgs');
const slideIndex = document.querySelectorAll('.imgs>img').length;
var slider = 1;
/*          imgslide prev       */
$("#prev_btn1").click(function(){
    if(slider == 1){
        img.style.marginLeft = (-2130)+'px';
        slider=4;
        console.log(slider);
    }
    else if(slider == 4){
        img.style.marginLeft = (-1420)+'px';
        slider--;
        console.log(slider);
    }
    else if(slider == 3){
        img.style.marginLeft = (-710)+'px';
        slider--;
        console.log(slider);
    }
    else if(slider == 2){
        img.style.marginLeft = (0)+'px';
        slider--;
        console.log(slider);
    }
});
    
    
/*          imgslide next       */

$("#prev_btn2").click(function(){
    
    if(slider == 1){
        img.style.marginLeft = (-710)+'px';
        slider = 2;
        
    }
    else if(slider == 2){
        img.style.marginLeft = (-1420)+'px';
        slider++; 
    }
    else if(slider == 3){
        img.style.marginLeft = (-2130)+'px';
        slider++;
    }
    else if(slider == 4){
        img.style.marginLeft = (-0)+'px';
        slider=1;
    }
});


/*  좋아요   */
$("#good").click(function(){

    const good_form = $("#good").serialize();    /*form 의 정보를 받아옴 */


    $.ajax({
        type : "POST",
        url : "../free_share/free_like.php",
        data : good_form,
        dataType : "text",
        success : function(data){
            if(data == '1'){
                $("#good>button>img").attr("src", "../imgs/good3.png");
                $(".good_text>img").attr("src", "../imgs/good3.png");
            }
            else{
                $("#good>button>img").attr("src", "../imgs/good.png");
                $(".good_text>img").attr("src", "../imgs/good.png");
            }
        }
    });
});

/* 댓글 */
$("#reply_btn").click(function(){

    const reply_form = $("#reply").serialize();    /*form 의 정보를 받아옴 */
    

    $.ajax({
        type : "POST",
        url : "../free_share/free_share_reply.php",
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