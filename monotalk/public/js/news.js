$(function () {
    $('.owl-news').owlCarousel({
        smartSpeed: 2000,
        items:1,
        loop:true,
        dots:true,
        nav: true,
        // margin:60,
        navText:['<i class="fal fa-chevron-left"></i>','<i class="fal fa-chevron-right"></i>'],
        responsive:{
            0:{
                items:1,
                margin:25,
                dots:true,
            },
            824:{
                items:1,
                margin:25,
                dots:true,
            },
            1200:{
                items:1,
                margin:25,
                dots:false,
            }
        }
    });
    $(".toggle-mobile").click(function () {
        $(".bg-cover").show();
        $(".nav-mobile").css("transform", "translateX(0)");
    });

    $(".btn-close, .bg-cover").click(function () {
        $(".bg-cover").hide();
        $(".nav-mobile").css("transform", "translateX(-320px)");
        $(".filter-mobile-wrapper").css("transform", "translateX(-320px)");
    });

    $(".to-mobile-lv2").click(function () {
        $(this).children(".to-lv2").toggleClass("text-pale");
        $(this).children(".mobile-lv2").slideToggle(300);
    })

    $(".cart-top").click(function () {
        $(".cart-top-content").toggleClass("d-flex");
    })

    // Detail
    $(".owl-related").owlCarousel({
        dots:true,
        nav:false,
        margin:30,
        responsive: {
            0:{
                items:1,
            },
            824:{
                items:1,
            },
            1024:{
                items:3,
            },
        }
    });
})