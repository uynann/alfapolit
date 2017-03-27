$(document).ready(function() {


    $(window).scroll(function(){

        var top = $(document).scrollTop();

        var branHeight = $('.brand').outerHeight();


        if ((top > branHeight) && !($('.navigation.mobile-nav').hasClass('show'))) {
            $('.navigation').addClass('sticky');
        } else {
            $('.navigation').removeClass('sticky');
        }
    });


    $('.toggle-mobile-nav').click(function() {
        $(this).parent('.navigation.mobile-nav').toggleClass('show');
    });

    $(window).resize(function(){
        if($(this).width() > 980){
            $('.navigation.mobile-nav').removeClass('show');
        }
    });


    $("#owl-carousel").owlCarousel({
        autoPlay : true,
        loop : true,
        slideSpeed : 50,
        paginationSpeed : 50,
        singleItem:true

    });

});

