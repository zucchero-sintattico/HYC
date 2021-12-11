function generaRisultati(data, titolo) {
    let content = '';
    for (let i = 0; i < data.length; i++) {
        let result = `
                <div class="col-10 col-md-5">
                    <a href="../editor.php?id=$data[i]["IdProd"]">
                        <article>
                            <div class="col-12">
                                <h2> $data[i]["Titolo"]</h2>
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
                                        if($(window).width()<700){
                        
                                                    $('#quadro${data[i]["IdProd"]}').parent().removeClass("col-3");
                                                    $('#quadro${data[i]["IdProd"]}').parent().addClass("col");
                                        }
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
    return adaptableSection(content, "Results for " + titolo);
}

$(document).on('ready', function () {
    $("body > div > div:nth-child(3) > div > form").hide();

    $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(3) > a").on("click", function () {
        $("body > div > div:nth-child(3) > div > form").slideToggle();
    });


    $("#searchField").on('input', function () {
        if ($("#searchField").val() !== "") {
            $.getJSON("/API/api-search.php?key=" + $("#searchField").val(), function (data) {
                let articoli = data["Risultati"];
                let risultatiRicerca = generaRisultati(articoli, $("#searchField").val());
                const main = $("main");
                main.html(risultatiRicerca);

            });
        }else{
            $.getJSON("/API/api-homepage.php", function (data) {
                let categorie = generaCategorie(data['Categorie']);
                let linguaggi = generaLinguaggi(data['Linguaggi']);
                let prodottiPopolari = generaProdottiPopolari(data['ProdottiPopolari']);
                const main = $("main");
                main.html("")
                main.append(categorie);
                main.append(linguaggi);
                main.append(prodottiPopolari);
            });
        }
    });


});




