function generaCategorie(data) {
    let content = '';
    for (let i = 0; i < data.length; i++) {
        let categoria = `

                        <section class="col-3 d-flex justify-content-center text-center" onclick="createCatalogWithCategories(${data[i]['IdCategoria']})">    
                            <div class="card card-block justify-content-center">
                                <img class="card-img-top" src="img/logos/${data[i]['ImgCategoria']}"
                                     alt="Card image cap">
                                    <div class="class-footer mt-auto">
                                        <p class="card-text">${data[i]['Tipo']}</p>
                                    </div>
                            </div>
                        </section>
                        <script>$("#category${data[i]['IdCategoria']}").on('click',function (){
                            createCatalogWithCategories(${data[i]['IdCategoria']});
                        })</script>
                       
            `;
        content += categoria;
    }

    return horizontalSection(content, "Categories");
}


function generaLinguaggi(data) {
    let content = '';
    for (let i = 0; i < data.length; i++) {
        let linguaggio = `
                <section href="editor.php" class="col-3 d-flex justify-content-center text-center">
                    <div class="row justify-content-center">
                        ${data[i]['NomeLinguaggio']}
                    </div>
                </section>
            `;
        content += linguaggio;
    }
    return horizontalSection(content, "Languages");
}



function generaProdottiPopolari(data) {
    let content = '';

    for (let i = 0; i < data.length; i++) {
        let prodottoPopolare = `
                <a href="editor.php?id=${data[i]["IdProd"]}" class="col-3 d-flex justify-content-center" onclick="">
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
    return horizontalSection(content, "Most Popular Products");
}

function createCatalogWithCategories(idCategory) {
    $.getJSON("/API/api-search.php?cat=" + idCategory, function (data) {
        let articles = generaRisultati(data)
        const main = $("main");
        main.html("");
        main.append(articles);
        console.log(articles);
    });
}

$(document).on("ready", function (event) {
    event.preventDefault();
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