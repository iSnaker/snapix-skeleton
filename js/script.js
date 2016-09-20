$(function(){

    $('.slick-slider').slick({
        arrows: true,
        //dots: true,
        autoplay: true
    });
   /*
    // FIXED NAVBAR

   $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 90){
            $('#navbar_main').addClass('fixed');
        } else {
            $('#navbar_main').removeClass('fixed');
        }
    });*/


    // add the animation to the modal
    $( ".modal" ).each(function(index) {
        $(this).on('show.bs.modal', function (e) {
            var open = $(this).attr('data-easein');
            if(open == 'shake') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if(open == 'pulse') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if(open == 'tada') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if(open == 'flash') {
                $('.modal-dialog').velocity('callout.' + open);
            }  else if(open == 'bounce') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if(open == 'swing') {
                $('.modal-dialog').velocity('callout.' + open);
            }else {
                $('.modal-dialog').velocity('transition.' + open);
            }
        });
    });

    $('input[type="tel"]').mask('+7 (999) 999-99-99');
    $('input').focus(function(){
        $(this).parent().removeClass('has-error');
    });

});
