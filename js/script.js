/*  시작될때 텍스트 랜덤 출력   */
var rand = Math.floor(Math.random() * 5 + 1);
    console.log(rand);

    /*  반복문으로 줄인 예  */
$(document).ready(function(){
    for(i = 1; i<=5; i++){
        if(rand == i){
            $('.rand_text'+i).fadeIn(2000);
        }
    }
    setTimeout(function(){
        $('.rand_text1,.rand_text2,.rand_text3,.rand_text4,.rand_text5').fadeOut(2000) 
    },3000);
});


/*  메뉴    */
$(".the").mouseover(function(){
    $(".submenu").stop().slideDown();
});
$(".the").mouseleave(function(){
    $(".submenu").stop().slideUp();
});


/* 아이디 찾기 모달 */
$("#id_search").click(function(){
    $(".id_pop").stop().show();
});
$(".id_bottom>button").click(function(){
    $(".id_pop").stop().hide();
});
$(".id_body_top>img").click(function(){
    $(".id_pop").stop().hide();
});
/* 비밀번호 찾기 모달 */
$("#pw_search").click(function(){
    $(".pw_pop").stop().show();
});
$(".pw_bottom>button").click(function(){
    $(".id_pop").stop().hide();
});
$(".pw_body_top>img").click(function(){
    $(".pw_pop").stop().hide();
});



/*  if 문 으로 랜덤 출력할때   */

// if(rand == 1){
    //     $('.rand_text1').fadeIn(2000);
    // }
    // else if(rand == 2){
    //     $('.rand_text2').fadeIn(2000);
    // }
    // else if(rand == 3){
    //     $('.rand_text3').fadeIn(2000);
    // }
    // else if(rand == 4){
    //     $('.rand_text4').fadeIn(2000);
    // }
    // else if(rand == 5){
    //     $('.rand_text5').fadeIn(2000);
    // }
    // else{
    //     console.log('0');
    // }
   