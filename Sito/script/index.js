
function generaSectionBootstrap(contenuto, title){
    let result = `<section>
        <header>
            <h1>${title}</h1>
        </header>

        <div class="container-fluid">
            <div class="row flex-row flex-nowrap">
        `;

    result += contenuto;

    result += `</div>
            </div>
        </section>`;

    return result;
}

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

    return generaSectionBootstrap(content, "Categories");
}

function generaLinguaggi(data) {
    let content = '';
    for (let i = 0; i < data.length; i++) {
        let linguaggio = `
                <a href="editor.php" class="col-3 d-flex justify-content-center text-center">

                    <div class="row justify-content-center">
                        ${data[i]['NomeLinguaggio']}
                    </div>

                </a>
            `;
        content += linguaggio;
    }
    return generaSectionBootstrap(content, "Languages");
}

function generaProdottiPopolari(data) {
    let content = '';

    for (let i = 0; i < data.length; i++) {
        let prodottoPopolare = `
                <a href="#" class="col-3 d-flex justify-content-center text-center">

                        <code id="quadro${data[i]["IdProd"]}">
                            <script>
                                let quadro${data[i]["IdProd"]} = new CodeSquare(document.querySelector('#quadro${data[i]["IdProd"]}'));
                                quadro${data[i]["IdProd"]}.getSquare();
                                quadro${data[i]["IdProd"]}.setText('${data[i]["Codice"]}');
                                quadro${data[i]["IdProd"]}.setWidth(${data[i]["Larghezza"]});
                                quadro${data[i]["IdProd"]}.setHeight(${data[i]["Altezza"]});
                                quadro${data[i]["IdProd"]}.setPadding(${data[i]["Padding"]});
                                quadro${data[i]["IdProd"]}.setFramecolor("${data[i]["Colore_frame"]}")
                                quadro${data[i]["IdProd"]}.setFontSize(${data[i]["Dimensione_font"]});
                                quadro${data[i]["IdProd"]}.setLanguages('${data[i]["NomeLinguaggio"]}');
                                quadro${data[i]["IdProd"]}.setStyle('${data[i]["NomeTema"]}');
                                quadro${data[i]["IdProd"]}.disable();
                                quadro${data[i]["IdProd"]}.widthScale(300);
                                quadro${data[i]["IdProd"]}.updateStyle();
                                if($(window).width()<700){
                
                                            $('#quadro${data[i]["IdProd"]}').parent().removeClass("col-3");
                                            $('#quadro${data[i]["IdProd"]}').parent().addClass("col");
                                }
                            </script>
                        </code>

                </a>
            `;
        content += prodottoPopolare;
    }
    return generaSectionBootstrap(content, "Most Popular Products");
}


$(document).on("ready", function () {
    $.getJSON("api-homepage.php", function (data) {
        let categorie = generaCategorie(data['Categorie']);
        let linguaggi = generaLinguaggi(data['Linguaggi']);
        let prodottiPopolari = generaProdottiPopolari(data['ProdottiPopolari']);
        const main = $("main");
        main.append(categorie);
        main.append(linguaggi);
        main.append(prodottiPopolari);
    });
});