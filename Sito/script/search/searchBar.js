
$(document).on('ready', function () {
    let backMainSetted = false;
    let backmain = "";

    $("#searchField").on('input', function (event) {
        event.preventDefault();
        if(!backMainSetted){
            backmain = "";
            backmain = $("main").html();
            backMainSetted = true;
        }
        let main = $("main");
        main.html("");
        if ($("#searchField").val() !== "") {

            $.getJSON("/API/api-search.php?key=" + $("#searchField").val(), function (data) {
                let articoli = data["Results"];
                let risultatiRicerca = getFilteredArticles(articoli, data["Title"]);
                const main = $("main");
                main.html(risultatiRicerca);

            });
        } else {
            backMainSetted = false;
            const main = $("main");
            main.html(backmain);
        }
    });


});




