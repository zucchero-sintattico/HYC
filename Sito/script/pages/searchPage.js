
$key = (location.search.split("="))[1];

$(document).on('ready', function () {
    $.getJSON("/API/api-search.php?key=" + $key, function (data) {
        let articoli = data["Results"];
        $("main div").hide();
        $("main").append(`<div class="container">
                                            <div class="col categRes"></div>
                                            <div class="row searchResults"></div>
                                    </div>`);
        $(".categRes").append(`<h2>Search results for "${data["Title"]}"</h2>`);
        $(".searchResults").append(createProductsOfCategoryFromData(articoli, "res"));
        $(".searchResults").show();
    });
});