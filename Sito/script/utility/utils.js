let quadri = [];

function checkerSize(selector, initialFrom, initialTo){
    if ($(window).width() < 768) {

        selector.each(function () {
            $(this).removeClass(initialFrom);
            $(this).addClass(initialTo);
        });

    } else {
        selector.each(function () {
            $(this).removeClass(initialTo);
            $(this).addClass(initialFrom);
        });
    }
}

function checkOnResize(selector, initialFrom, initialTo) {
    checkerSize(selector,initialFrom,initialTo);
    $(window).on('resize', function () {
        checkerSize(selector,initialFrom,initialTo);
    });
}





