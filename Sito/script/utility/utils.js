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

let hasAlreadySwappedToMobile = false;

function checkOnResize(selector, initialFrom, initialTo) {
    checkerSize(selector,initialFrom,initialTo);
    $(window).on('resize', function () {
        modifyIndexIfMobile();
        checkerSize(selector,initialFrom,initialTo);
    });
}

function modifyIndexIfMobile(){

    if ($(window).width() < 768) {
        $(".mobilePedix").each(function(){
            if($(this).prev().find(".productWhole").length > 1){
                $(this).show();
            }else{
                $(this).hide();
            }
        });
    } else {
        $(".mobilePedix").hide();
    }
}





