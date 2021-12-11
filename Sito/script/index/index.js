function generaSectionBootstrap(contenuto, title) {
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
                <a href="editor.php?id=${data[i]["IdProd"]}" class="col-3 d-flex justify-content-center text-center">

                        <code id="quadro${data[i]["IdProd"]}">
                            <script>
                                quadri.push(new CodeSquare(document.querySelector('#quadro${data[i]["IdProd"]}')));
                                quadri[${i}].getSquare();
                                quadri[${i}].setText('${data[i]["Codice"]}');
                                quadri[${i}].setWidth(${data[i]["Larghezza"]});
                                quadri[${i}].setHeight(${data[i]["Altezza"]});
                                quadri[${i}].setPadding(${data[i]["Padding"]});
                                quadri[${i}].setFramecolor("${data[i]["Colore_frame"]}")
                                quadri[${i}].setFontSize(${data[i]["Dimensione_font"]});
                                quadri[${i}].setLanguages('${data[i]["NomeLinguaggio"]}');
                                quadri[${i}].setStyle('${data[i]["NomeTema"]}');
                                quadri[${i}].disable();
                                quadri[${i}].widthScale(300);
                                quadri[${i}].updateStyle();
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
    $.getJSON("/API/api-homepage.php", function (data) {
        let categorie = generaCategorie(data['Categorie']);
        let linguaggi = generaLinguaggi(data['Linguaggi']);
        let prodottiPopolari = generaProdottiPopolari(data['ProdottiPopolari']);
        const main = $("main");
        main.append(categorie);
        main.append(linguaggi);
        main.append(prodottiPopolari);
    });
});