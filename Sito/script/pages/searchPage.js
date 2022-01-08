
$key = (location.search.split("="))[1];

$(document).on('ready', function () {
    $.getJSON("/API/api-search.php?key=" + $key, function (data) {
        let articoli = data["Results"];
        $("main div").hide();
        $("main").append(`<div class="container">
                                            <div class="col categRes"></div>
                                            <div class="row m-auto pt-3 d-flex justify-content-center searchResults"></div>
                                    </div>`);
        $(".categRes").append(`<div class="row justify-content-center">
                                  <h2>Search results for "${data["Title"]}"</h2>
                                </div>`);
        $(".searchResults").append(createProductsOfCategoryFromData(articoli, "res"));
        $(".searchResults").show();
    });
});