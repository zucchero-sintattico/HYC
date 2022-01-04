$(document).on('ready', function () {

    $("#searchField").on('input', function (event) {
        event.preventDefault();

        if ($("#searchField").val() !== "") {
            $.getJSON("/API/api-search.php?key=" + $("#searchField").val(), function (data) {
                $("main div").hide();
                $(".searchResults").remove();
                let articoli = data["Results"];
                $("main").append(`<div class="container">
                                            <div class="col categRes"></div>
                                            <div class="row m-auto pt-3 d-flex justify-content-center searchResults"></div>
                                    </div>`);
                $(".categRes").append(`<h2>Search results for "${data["Title"]}"</h2>`);
                $(".searchResults").append(createProductsOfCategoryFromData(articoli, "res"));
                $(".searchResults").show();
            });
        } else {
            $(".categRes").empty();
            $("main div").show();
            $(".searchResults").hide();
            $(".searchResults").remove();
        }
    });


});




