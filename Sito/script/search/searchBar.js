$(document).on('ready', function () {

    $("#searchField").on('input', function (event) {
        event.preventDefault();

        if ($("#searchField").val() !== "") {
            $.getJSON("/API/api-search.php?key=" + $("#searchField").val(), function (data) {
                $("main div").hide();
                $(".searchResults").remove();
                let articoli = data["Results"];
                $("main").append(`<div class="row justify-content-center">
                                            <div class='col  searchResults'></div>
                                        </div>`);
                $(".searchResults").append(`<h2>Search results for "${data["Title"]}"</h2>`);
                $(".searchResults").append(createProductsOfCategoryFromData(articoli, "res"));
                $(".searchResults").show();
            });
        } else {
            $("main div").show();
            $(".searchResults").hide();
            $(".searchResults").remove();
        }
    });


});




