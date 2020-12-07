$(function () {
    $(".filter-sort-see .filter-mobile").click(function () {
        $(".bg-cover").show();
        $(".filter-mobile-wrapper").css("transform", "translateX(0)");
    })

    $(".btn-close").click(function () {
        $(".bg-cover").hide();
        $(this).parent().css("transform", "translateX(-320px)");
    })

    $(".filter-list .title").click(function () {
        $(this).children("i").toggleClass("rotate");
        $(this).next().slideToggle(200);
    });

    if ($(window).width() <= 824) {
        $(".btn-see-1").click(function () {
            $(".btn-see i").css("border", "none");
            $(this).children("i").css("border", "2px solid lightgray").css("padding", "3px");
            $(".all-product .product-item").removeClass("col-xs-6 col-sm-6").addClass("col-xs-12 col-sm-12");
        });
        $(".btn-see-2").click(function () {
            $(".btn-see i").css("border", "none");
            $(this).children("i").css("border", "2px solid lightgray").css("padding", "3px");
            $(".all-product .product-item").removeClass("col-xs-12 col-sm-12").addClass("col-xs-6 col-sm-6")
        });
        if ($(".all-product .product-item").hasClass("col-xs-6 col-sm-6")) {
            $(".btn-see-2 i").css("border", "2px solid lightgray").css("padding", "3px");
        }
    }

    if ($(".all-product .product-item").hasClass("col-md-4 col-lg-4")) {
        $(".btn-see-3 i").css("border", "2px solid lightgray").css("padding", "3px");
    }

    $(".btn-see-2").click(function () {
        $(".btn-see i").css("border", "none");
        $(this).children("i").css("border", "2px solid lightgray").css("padding", "3px");
        $(".all-product .product-item").removeClass("col-md-4 col-lg-4").addClass("col-md-6 col-lg-6")
    });

    $(".btn-see-3").click(function () {
        $(".btn-see i").css("border", "none");
        $(this).children("i").css("border", "2px solid lightgray").css("padding", "3px");
        $(".all-product .product-item").removeClass("col-md-6 col-lg-6").addClass("col-md-4 col-lg-4");
    });

    $(".sort").click(function () {
        $(this).children(".fa-chevron-down").toggleClass("rotate");
        $(this).find(".sort-list").slideToggle(200);
    });

    $(".sort-mobile").click(function () {
        $(".sort-mobile-wrapper").slideToggle("200");
    })

    $(".sort-list li").click(function () {
        var attr = $(this).children('a').attr('href');
        window.location.href = attr;
    });

    $(window).load(function () {
        var url = $(location).attr('href');
        $(".sort-list li a").each(function () {
            if ($(this).attr('href') == url) {
                $(".sort-by b").html($(this).html());
            }
        })
    })

    $(".toggle-mobile").click(function () {
        $(".bg-cover").show();
        $(".nav-mobile").css("transform", "translateX(0)");
    });

    $(".hasLogin").click(function () {
        $(this).children().find("i").toggleClass('toggle-login');
        $(this).next().toggleClass('d-none').toggleClass('slide-top');
    })

    $(".search-form a").click(function () {
        $(".searchQ").toggleClass('d-none').toggleClass('slide-top');
    })

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

    $(window).scroll(function() {
        if ($(this).scrollTop() > 59.2 ){
            $('.navbar').addClass("sticky slide-bottom category-body");
        }
        else{
            $('.navbar').removeClass("sticky slide-bottom category-body");
        }
    });

    $("label.color").click(function () {
        $("label.color").removeClass('active');
        $(this).addClass('active');
        $(this).parents('.product-item').children('a').children('.img-product').attr('src', $(this).attr('data-src'));
    })

    $(".color-filter").click(function () {
        var attr = $(this).val();
        window.location.href = attr;
    })

    $(".filter-list input[type=checkbox]").each(function () {
        if ($(this).is(':checked')) {
            $(this).parents('.filter-content').prev().children('i').addClass('rotate');
            $(this).parents('.filter-content').show();
        }
    })
})
