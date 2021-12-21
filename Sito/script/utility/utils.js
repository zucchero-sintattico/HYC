let quadri = [];


function checkOnResize() {
    if ($(window).width() < 768) {
        $('code').each(function () {
            $(this).parent().removeClass("col-5");
            $(this).parent().addClass("col");
        });
    } else {
        $('code').each(function () {
            $(this).parent().removeClass("col");
            $(this).parent().addClass("col-5");
        });
    }
    $(window).on('resize', function () {
        if ($(window).width() < 768) {
            $('code').each(function () {
                $(this).parent().removeClass("col-5");
                $(this).parent().addClass("col");
            });
        } else {
            $('code').each(function () {
                $(this).parent().removeClass("col");
                $(this).parent().addClass("col-5");
            });
        }

    });
}