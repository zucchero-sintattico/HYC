$(document).on('ready', function () {
    $("body > div > div:nth-child(3) > div > form").hide();

    $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(3) > a").on("click", function () {
        $("body > div > div:nth-child(3) > div > form").slideToggle();
    });
});