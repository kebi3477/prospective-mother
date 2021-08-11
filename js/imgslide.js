const slideWidth = document.querySelector('.imgs').clientWidth;
const img = document.querySelector('.imgs');
const slideIndex = document.querySelectorAll('.imgs>img').length;
var slider = 1;
/*          imgslide prev       */
$("#prev_btn1").click(function(){
    if(slider == 1){
        img.style.marginLeft = (-2130)+'px';
        slider++;
    }
    else if(slider == 2){
        img.style.marginLeft = (-1420)+'px';
        slider++;
    }
    else if(slider == 3){
        img.style.marginLeft = (-710)+'px';
        slider++;
    }
    else if(slider == 4){
        img.style.marginLeft = (0)+'px';
        slider=1;
    }
});
    
    
/*          imgslide next       */
$("#prev_btn2").click(function(){
    
    if(slider == 1){
        img.style.marginLeft = (-710)+'px';
        slider++;
        
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
