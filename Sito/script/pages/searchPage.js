
$key = (location.search.split("="))[1];

$(document).on('ready', function () {
    $.getJSON("/API/api-search.php?key=" + $key, function (data) {
        let articoli = data["Results"];
        let risultatiRicerca = generateCategoriesAndRelativeProducts(articoli, data["Title"]);
        const main = $("main");
        main.html(risultatiRicerca);
    });
});