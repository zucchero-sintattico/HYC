
$(document).on('ready', function () {
    $("body > div > div:nth-child(3) > div > form").hide();

    $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(3) > a").on("click", function (event) {
        event.preventDefault();
        $("body > div > div:nth-child(3) > div > form").slideToggle();
        $("body > div > div:nth-child(3) > div > form > input").trigger('focus');
    });
    let backMainSetted = false;
    let backmain = "";

    $("#searchField").on('input', function () {
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




