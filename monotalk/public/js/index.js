$(function () {
    $(".owl-trend").owlCarousel({
       items: 1,
       nav: true,
       dots: true,
        navText:['<i class="fa fa-angle-left" ></i>','<i class="fa fa-angle-right" ></i>'],
        responsive:{
            0:{
                nav:false,
            },
            768:{
                nav:true
            },
        }
    });

    $('.owl-girl').owlCarousel({
        loop:false,
        dots:false,
        nav: true,
        margin:10,
        rewind: true,
        navText:['<i class="fa fa-angle-left" ></i>','<i class="fa fa-angle-right" ></i>'],
        responsive:{
            0:{
                items:1,
            },
            768:{
                items:2,
            },
            1200:{
                items:4,
            }
        }
    });

    $(".owl-new").owlCarousel({
        nav:true,
        dots:false,
        margin:15,
        loop:false,
        rewind: true,
        navText:['<i class="fa fa-angle-left" ></i>','<i class="fa fa-angle-right" ></i>'],
        responsive:{
            0:{
                items:1,
            },
            768:{
                items:2,
            },
            1024:{
                items:4,
            }
        }
    });
})
