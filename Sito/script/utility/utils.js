let quadri = [];

function checkerSize(selector, initialFrom, initialTo){
    if ($(window).width() < 768) {
        $(selector).each(function () {
            $(this).parent().removeClass(initialFrom);
            $(this).parent().addClass(initialTo);
        });
    } else {
        $(selector).each(function () {
            $(this).parent().removeClass(initialTo);
            $(this).parent().addClass(initialFrom);
        });
    }
}

function checkOnResize(selector,initialFrom,initialTo) {
    checkerSize(selector,initialFrom,initialTo);
    $(window).on('resize', function () {
        checkerSize(selector,initialFrom,initialTo);
    });
}


