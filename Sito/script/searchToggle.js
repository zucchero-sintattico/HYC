$(document).on('ready', function () {
    $("form").hide();

    $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(4) > a").on("click", function () {
        $("form").slideToggle();
    });
});