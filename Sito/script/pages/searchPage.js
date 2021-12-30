
$key = (location.search.split("="))[1];

$(document).on('ready', function () {
    $.getJSON("/API/api-search.php?key=" + $key, function (data) {
        let articoli = data["Results"];
        $("main div").hide();
        $("main").append(`<div class="row justify-content-center">
                                            <div class='col searchResults'></div>
                                        </div>`);
        $(".searchResults").append(`<h2>Search results for "${data["Title"]}"</h2>`);
        $(".searchResults").append(createProductsOfCategoryFromData(articoli, "res"));
        $(".searchResults").show();
    });
});