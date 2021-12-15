
$(document).on('ready', function (event) {
    event.preventDefault();
    $.getJSON("/API/api-cart.php", function (data) {
        getArticleInCart(data);
        checkOnResize();
    });
});