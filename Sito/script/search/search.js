function generaCategorie(data) {
    let content = '';
    for (let i = 0; i < data.length; i++) {
        let categoria = `
                        <a href="editor.php" class="col-3 d-flex justify-content-center text-center">
    
                            <div class="card card-block">
                                <img class="card-img-top" src="img/logos/${data[i]['ImgCategoria']}"
                                     alt="Card image cap">
                                    <div class="class-footer mt-auto">
                                        <p class="card-text">${data[i]['Tipo']}</p>
                                    </div>
                            </div>
                        </a>
            `;
        content += categoria;
    }

    return horizontalSection(content, "Categories");
}



$(document).on("ready", function () {
    $.getJSON("/API/api-search.php", function (data) {
        const main = $("main");
        main.append("<h1>cioa</h1>");
    });
});