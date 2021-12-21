$(document).on('ready', function () {
    let backMainSetted = false;
    let backmain = "";

    $("#searchField").on('input', function (event) {
        event.preventDefault();
        if (!backMainSetted) {
            backmain = "";
            backmain = $("main").html();
            backMainSetted = true;
        }
        let main = $("main");
        main.html("");
        if ($("#searchField").val() !== "") {

            $.getJSON("/API/api-search.php?key=" + $("#searchField").val(), function (data) {
                let articoli = data["Results"];
                const main = $("main");
                let risultatiRicerca = getFilteredArticles(articoli, data["Title"]);
                main.html(risultatiRicerca);

            });
        } else {
            backMainSetted = false;
            const main = $("main");
            main.html(backmain);
        }
    });


});




