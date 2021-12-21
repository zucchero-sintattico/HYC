
$(document).on('ready', function () {
    let backMainSetted = false;
    let timeOut = true;
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
        if ($("#searchField").val() !== "" && timeOut) {
            timeOut = false;
            $.getJSON("/API/api-search.php?key=" + $("#searchField").val(), function (data) {
                let articoli = data["Results"];
                const main = $("main");
                if(articoli !== ""){
                    let risultatiRicerca = getFilteredArticles(articoli, data["Title"]);
                    main.html(risultatiRicerca);
                }else {
                    main.html("<h2>not found</h2>");
                }

            });
        } else {
            backMainSetted = false;
            const main = $("main");
            main.html(backmain);
        }
        timeOut = true;
    });


});




