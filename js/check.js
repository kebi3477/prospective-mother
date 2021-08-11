/*  id 중복확인 함수    */

$(".id_check").click(function(){

    const user_id = $(".signup_form").serialize();/*form 태그의 값을 가져오는 함수*/
    const user_id_input = $("#id").val();
    const id_check_hidden = document.querySelector("input[name='id_check']");


    if(user_id_input.length < 6 || user_id_input.length > 15){
        alert('6자에서 15자이내로 입력해주세요');
        return false;
    }
    else{
    $.ajax({
        type : "POST",
        url : "../signup/id_check.php",
        data : user_id,
        dataType : "text",
        success : function(data){
            if(data == '1'){
                alert("사용가능한 아이디입니다.");
                id_check_hidden.value = '1';
                $("input[name=id]").attr("readonly",true);
                $("input[name=id").css({"background-color":"#ddd"});
                $(".id_check").hide();
                
            }else{
                alert("중복된 아이디입니다.");
                id_check_hidden.value = '0';
              
            }
        }
    });
}
});
/*-----------------------------------------------------*/
// function id_check(){
//     const id = $("#id").val();
//     location.href ='../signup/id_check.php?id='+id;
// }
/*----------------------------------------------------*/

/* 닉네임 중복확인 함수 */

$(".nick_check").click(function(){

    const user_name = $(".signup_form").serialize();    /*form 의 정보를 받아옴 */
    const user_nick_name = $(".nickname").val();        /*닉네임클래스에 value값을 받아옴*/
    const nick_hidden = document.querySelector("input[name='nick_name_check']");

    if(user_nick_name.length < 2 || user_nick_name.length > 10){
        alert('2자에서 10자이내로 입력해주세요.');
        return false;
    }
    else{
    $.ajax({
        type : "POST",
        url : "../signup/nick_check.php",
        data : user_name,
        dataType : "text",
        success : function(data){
            if(data == '1'){
                alert("사용가능한 닉네임입니다.");
                nick_hidden.value = '1';
                $("input[name=nickname]").attr("readonly",true);
                $("input[name=nickname]").css({"background-color":"#ddd"});
                $(".nick_check").hide();
                
            }else{
                alert("중복된 닉네임입니다.");
                nick_hidden.value = '0';
            }
        }
    });
}
});

/*      비밀번호 입력란 비교    */

const pw = document.querySelector("input[name='password']");
const pw1 = document.querySelector("input[name='password1']");
const pwshow = document.querySelector(".pw_check");
const pwshow1 = document.querySelector(".pw_check1");

pw.addEventListener("keyup", pw_check);
pw1.addEventListener("keyup", pw_check);

function pw_check(){
    if(pw.value != pw1.value){
        pwshow.style.display = 'block';
        pwshow1.style.display = 'none';
    }
    else{
        pwshow.style.display = 'none';
        pwshow1.style.display = 'block';
    }
}
/*      전체 유효성 검사    */

$(".signup_box").click(function(){


    const pw_input = document.querySelector('.sign_pw').value,
    pw1_input = document.querySelector('.sign_pw1').value,
    name = document.querySelector('.name'),
    address = document.querySelector('.address'),
    email = document.querySelector('.email'),
    tel1 = document.querySelector('.tel1'),
    tel2 = document.querySelector('.tel2'),
    tel3 = document.querySelector('.tel3'),
    id_check_submit = document.querySelector("input[name='id_check']"),
    nick_check_submit = document.querySelector("input[name='nick_name_check']");
    

    
    if(pw_input.length < 8 || pw_input.length > 14){
        alert('비밀번호는 8 ~ 14자 이내로 작성해주세요.');
        $(".sign_pw").focus();
        return false;
    }
    else if(pw_input != pw1_input){
        alert('비밀번호를 확인해주세요.');
        $(".sign_pw1").focus();
        return false;
    }
    else if(name.value == ''){
        alert('이름을 입력해주세요');
        $(".name").focus();
        return false;
    }
    else if(address.value == ''){
        alert('주소를 입력해주세요');
        $(".address").focus();
        return false;
    }
    else if(tel1,tel2,tel3.value == ''){
        alert('휴대폰번호를 입력해주세요');
        $(".tel1").focus();
        return false;
    }
    else if(email.value == ''){
        alert('이메일을 입력해주세요');
        $(".email").focus();
        return false;
    }
    else if(id_check_submit.value == '0'){
        alert('아이디 중복체크를 해주세요');
        return false;
    }
    else if(nick_check_submit.value == '0'){
        alert('닉네임 중복체크를 해주세요.');
        return false;
    }
});

function back(){
    location.href='../mypage/mypage.php';
}
