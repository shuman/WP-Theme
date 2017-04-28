
jQuery(document).ready(function($) {

    new WOW().init();

    $(document).on("change", ".select_region", function(){
        window.location.href = admin_ajax + "?action=set_region&region=" + $(this).val();
    });

    $('.navbar .dropdown').hover(function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown('fast');
    }, function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast');
    });

    $('.navbar .dropdown > a').click(function(){
        location.href = this.href;
    });


    $('#event_slider').flexslider({
        animation: "fade",
        slideshow: true,
        slideshowSpeed: 5000,
        animationSpeed: 1000,
        controlNav: true,
        directionNav: false,
    });

    $('#article_slider').flexslider({
        animation: "fade",
        slideshow: true,
        slideshowSpeed: 5000,
        animationSpeed: 1000,
        controlNav: true,
        directionNav: false,
    });

    // //declare event to run when div is visible
    // function isVisible(){
    //    $("#workshop_box").css("background-color","#41299a");
    // }

    // // //hookup the event
    // $('#symposium').bind('isVisible', isVisible);

    // //show div and trigger custom event in callback when div is visible
    // $('#symposium').on('show', function(){
    //     $(this).trigger('isVisible');
    // });



    $('#directory_filters').on('click', function(event){
        // The event won't be propagated up to the document NODE and 
        event.stopPropagation();
    });


    
    // scrollTop
    $(window).scroll(function(){
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    }); 

    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    $('.count_box').bind('mouseover', function() {
        $('div.promo_desc').removeClass('active');
        $('#'+$(this).attr('id')+'content').addClass('active');
    });  

    //Smooth Scrolling
    // $(function() {
    //     $('a[href*=#]:not([href=#])').click(function() {
    //         if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
    //             var target = $(this.hash);
    //             target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
    //             if (target.length) {
    //                 $('html,body').animate({
    //                   scrollTop: target.offset().top
    //               }, 1000);
    //                 return false;
    //             }
    //         }
    //     });
    // });

});






