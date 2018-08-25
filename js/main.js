$(document).ready(function(){

   //if the browser is bigger than the web content > fix footer
    if ($(document).height() < $(window).height() ) {
       $( "footer" ).addClass( "footer-fixed" );
    }

       //animation menu anchor points
       $(".anchor-point-btn a").click(function() {
           var section = $(this).attr("href");
           $('html, body').animate({
              scrollTop: $(section).offset().top - 70
           }, 800);
           return false;
      });
      $(".anchor-point-link").click(function() {
          var section = $(this).attr("href");
          $('html, body').animate({
             scrollTop: $(section).offset().top - 70
          }, 800);
          return false;
      });

    //menu mobile

    $('#menu-btn').click(function(){
      if($(window).width() < 991){
        showHideMenuMobile();
      }
    });
    $('.menu-container').find('.menu-item').click(function(){
      if($(window).width() < 991){
        showHideMenuMobile();
      }
    });
    $('.menu-container').find('.menu-item a').click(function(){
      if($(window).width() < 991){
        showHideMenuMobile();
      }
    });

        //More info button
    $('#more-info-btn').click(function(){
       $('.more-info-container').toggleClass('hidden', [1000]);
       $('#more-info-btn').toggleClass('active');
       $('#more-info-btn').find('.fa').toggleClass('fa-angle-down', [1000]);
       $('#more-info-btn').find('.fa').toggleClass('fa-angle-up', [1000]);
    });


    //assign class to speciality-and-expanation-container depending on it's position
    assignClassToSpecialityAndExplanationContainers();

    //click on speciality opens more inf
    $('.speciality-and-explanation-container').click(function(){
        if($(this).hasClass('container-clicked')){
            $(this).removeClass('container-clicked');
            $(this).find('.explanation-container').addClass('hidden');
        }else{
            $('.speciality-and-explanation-container').each(function(){
                if($(this).hasClass('container-clicked')){
                    $(this).removeClass('container-clicked');
                    $(this).find('.explanation-container').addClass('hidden');
                }
            });
            $(this).addClass('container-clicked');
            $(this).find('.explanation-container').removeClass('hidden');
        }

    });
});


$(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if(scroll > 0){
        $('.menu-container').addClass('position-fixed');
        $('.menu-container').css('box-shadow','0 2px 3px rgba(0,0,0,0.25)');
        $('body').css('margin-top','74px');
    } else {
         $('.menu-container').removeClass('position-fixed');
        $('.menu-container').css('box-shadow','none');
        $('body').css('margin-top','0');
    }
});


$(window).resize(function(){
    //if the browser is bigger than the web content > fix footer
    if($(window).width() > 991){
      $('.menu-hidden-mobile').css('display','block');
    }else{
      $('.menu-hidden-mobile').css('display','none');
    }
   if ($( "footer" ).hasClass( "footer-fixed" )){
       if (($('#html').height() + $('footer').height()) > $(window).height()) {
            $( "footer" ).removeClass( "footer-fixed" );
       }
   }else{
       if ($('#html').height() <= $(window).height()) {
           $( "footer" ).addClass( "footer-fixed");
        }
   }
});

//Show and hide menu mobile and add shadow
function showHideMenuMobile(){
    if($('.menu-hidden-mobile').is(':hidden')){
        $('.menu-hidden-mobile').slideDown();
        $('.menu-container').css('box-shadow','0 2px 3px rgba(0,0,0,0.25)');
   }else{
       $('.menu-hidden-mobile').slideUp();
       if($(window).scrollTop() == 0){
        $('.menu-container').css('box-shadow','none');
       }
   }
}



function assignClassToSpecialityAndExplanationContainers(){
    var index;

    $('.speciality-and-explanation-container').each(function(){
        //Give index + 1 in the loop
        index = $(this).index() + 1;

        if ($(window).width() > 991){
            if (index == 1|| ((index - 5) / 1) == 1 ){
                $(this).find('.explanation-container').addClass('container-align-left');
            }else if  (index == 2 || ((index - 5) / 2) == 1){
                $(this).find('.explanation-container').addClass('container-align-left');
            }else if  (index == 3 || ((index - 5) / 3) == 1){
                $(this).find('.explanation-container').addClass('container-align-center');
            }else if  (index == 4 || ((index - 5) / 4) == 1){
                $(this).find('.explanation-container').addClass('container-align-right');
            }else if  (index == 5 || ((index - 5) / 5) == 1){
                $(this).find('.explanation-container').addClass('container-align-right');
            }
        }else if($(window).width() < 991 && $(window).width() > 575 ) {
            if (index == 2 || Number.isInteger(index / 2)) {
                $(this).find('.explanation-container').addClass('container-align-right');
            } else {
                $(this).find('.explanation-container').addClass('container-align-left');
            }
        }
    });
}
