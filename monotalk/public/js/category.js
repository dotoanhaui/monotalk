$(function () {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 1000000,
        values: [ 0, 1000000 ],
        slide: function( event, ui ) {
            $("#amount").val(ui.values[ 0 ] + "đ" + " - " + ui.values[ 1 ] + "đ");
            window.location.href = addFilter('price', ui.values[0] + ':'+ui.values[1], 3);
        }
    });

    /*$(window).load(function () {
        var url = window.location.href;
        if (getParameter(url, "price")) {
            var max = 3000000, min = 0;
            var price = getParameter(url, "price");
            var priceArr = price.split(":");
            var width = ((priceArr[1] - priceArr[0])/max)*100;
            var left1 = ((priceArr[0] - min)/max)*100;
            var left2 = ((priceArr[1] - min)/max)*100;
            $(".ui-slider-range").width(parseInt(width) + '%').css('left', parseInt(left1) + '%');
            var t = 0;
            $(".ui-slider-handle").each(function () {
                t++;
                $(this).addClass('slider' + t);
            })
            $(".slider3").css('left', parseInt(left1) + '%');
            $(".slider4").css('left', parseInt(left2) + '%');
        }
    })*/
})

function getParameter(url, name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(url);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function numberFomart(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
