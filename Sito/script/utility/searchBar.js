
$(document).on('ready', function () {
    $("body > div > div:nth-child(3) > div > form").hide();

    $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(3) > a").on("click", function (event) {
        event.preventDefault();
        $("body > div > div:nth-child(3) > div > form").slideToggle();
        $("body > div > div:nth-child(3) > div > form > input").trigger('focus');
    });


    $("#searchField").on('input', function () {
        quadri = [];
        if ($("#searchField").val() !== "") {
            $.getJSON("/API/api-search.php?key=" + $("#searchField").val(), function (data) {
                let articoli = data["Results"];
                let risultatiRicerca = getFilteredArticles(articoli, data["Title"]);
                const main = $("main");
                main.html(risultatiRicerca);

            });
        } else {
            $.getJSON("/API/api-homepage.php", function (data) {
                let categories = createCategories(data['Categorie']);
                let language = createLanguages(data['Linguaggi']);
                let productPoplar = createPopularArticles(data['ProdottiPopolari']);
                const main = $("main");
                main.html("")
                main.append(categories);
                main.append(language);
                main.append(productPoplar);
            });
        }
    });


});




