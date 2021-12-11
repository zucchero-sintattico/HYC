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
                                <p class="col-12">${data[i]["Descrizione"] }</p>
                            </div>
                        </article>
                    </a>
                </div>
            `;
        content += result;
    }
    return adaptableSection(content, "Results for ". $titolo);
}



$(document).on("ready", function () {
    $.getJSON("/API/api-search.php", function (data) {
        let titolo = data["Titolo"];
        let articoli = data["Risultati"];
        let risultatiRicerca = generaRisultati(articoli, titolo);
        const main = $("main");
        main.append(risultatiRicerca);
    });
});