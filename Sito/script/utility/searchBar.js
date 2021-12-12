function generaRisultati(data, titolo) {
    let content = '';
    for (let i = 0; i < data.length; i++) {
        let result = `
                    <div class="col-12 col-md-6">
                        <a href="../editor.php?id=${data[i]["IdProd"]}">
                            <article>
                               <div class="col-12">
                                    <h2>${data[i]["Titolo"]}</h2>
                                </div>
                                <div class="row justify-content-center">
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
                                            
                                        </script>
                                    </code>
                                </div>
                                <div class="row">
                                    <p class="col-12">${data[i]["Descrizione"]}</p>
                                </div>
                            </article>                
                         </a>
                    </div>
             
            `;
        content += result;
    }
    return adaptableSection(content, titolo);
}

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
                let risultatiRicerca = generaRisultati(articoli, data["Title"]);
                const main = $("main");
                main.html(risultatiRicerca);

            });
        } else {
            $.getJSON("/API/api-homepage.php", function (data) {
                let categories = generaCategorie(data['Categorie']);
                let language = generaLinguaggi(data['Linguaggi']);
                let productPoplar = generaProdottiPopolari(data['ProdottiPopolari']);
                const main = $("main");
                main.html("")
                main.append(categories);
                main.append(language);
                main.append(productPoplar);
            });
        }
    });


});




