$(document).on('ready', function () {
    $("form").hide();

    $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(3) > a").on("click", function () {
        $("form").slideToggle();
    });
});