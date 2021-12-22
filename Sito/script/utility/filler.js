// Functions that fill the pages

function createCategories(data) {
    let content = '';
    for (let i = 0; i < data.length; i++) {
        let categoria = `
                        <section class="col-3 d-flex justify-content-center text-center" id="category${data[i]['IdCategoria']}">    
                            <div class="card card-block justify-content-center">
                                <img class="card-img-top" src="img/logos/${data[i]['ImgCategoria']}"
                                     alt="${data[i]['ImgCategoria']}">
                                    <div class="class-footer mt-auto">
                                        <p class="card-text">${data[i]['Tipo']}</p>
                                    </div>
                            </div>
                        </section>
                        <script>
                        $("#category${data[i]['IdCategoria']}").on('click',function (){
                            createCatalogWithCategories(${data[i]['IdCategoria']});
                        })</script>
                       
            `;
        content += categoria;
    }

    return horizontalSection(content, "Categories");
}


function createLanguages(data) {
    let content = '';
    for (let i = 0; i < data.length; i++) {
        let linguaggio = `
                <section href="editor.php" class="col-3 d-flex justify-content-center text-center" id="language${data[i]['NomeLinguaggio']}" >
                    <div class="row justify-content-center">
                        ${data[i]['NomeLinguaggio']}
                    </div>
                </section>
                <script>
                        $("#language${data[i]['NomeLinguaggio']}").on('click',function (){
                            createCatalogByLanguages("${data[i]['NomeLinguaggio']}");
                        })
                </script>
            `;
        content += linguaggio;
    }
    return horizontalSection(content, "Languages");
}



function createPopularArticles(data) {
    let content = '';

    for (let i = 0; i < data.length; i++) {
        let prodottoPopolare = `
                <a href="editor.php?id=${data[i]["IdProd"]}" class="col-5 d-flex justify-content-center" onclick="">
                        <code id="quadro${data[i]["IdProd"]}">
                            <script>
                            if(!$('#quadro${data[i]["IdProd"]} > .CodeMirror').length){
                                quadri.push(new CodeSquare(document.querySelector('#quadro${data[i]["IdProd"]}')));
                                quadri[${i}].getSquare();                        
                                quadri[${i}].setWidth(${data[i]["Larghezza"]});
                                quadri[${i}].setHeight(${data[i]["Altezza"]});
                                quadri[${i}].setPadding(0);
                                quadri[${i}].setFramecolor("transparent");
                                quadri[${i}].setFontSize(${data[i]["Dimensione_font"]});
                                quadri[${i}].setLanguages('${data[i]["NomeLinguaggio"]}');
                                quadri[${i}].setStyle('${data[i]["NomeTema"]}');
                                quadri[${i}].disable();
                                quadri[${i}].widthScale(300);
                                quadri[${i}].updateStyle();
                                quadri[${i}].setText('${data[i]["Codice"]}'); 
                             }
                            checkOnResize("code","col-5","col");
                            
                            $('#quadro${data[i]["IdProd"]}').on("touchend", function(event) {
                                $(this).href("editor.php?id=${data[i]["IdProd"]}");
               
                            });
                            </script>
                        </code>

                </a>

            `;
        content += prodottoPopolare;
    }
    return horizontalSection(content, "Most Popular Products");
}

function getFilteredArticles(data, filterName) {
    let content = '';
    quadri = [];
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
                                            quadri[${i}].setPadding(0);
                                            quadri[${i}].setFramecolor("transparent")
                                            quadri[${i}].setFontSize(${data[i]["Dimensione_font"]});
                                            quadri[${i}].setLanguages('${data[i]["NomeLinguaggio"]}');
                                            quadri[${i}].setStyle('${data[i]["NomeTema"]}');
                                            quadri[${i}].disable();
                                            quadri[${i}].widthScale(300);
                                            quadri[${i}].updateStyle();
                                            quadri[${i}].setText('${data[i]["Codice"]}');
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
    return adaptableSection(content, filterName);
}

// Recall previous function and change the description with the Price
function getArticleInCart(data){
    let results = data['Articles'];
    let prices = data['Prices'];
    let content = getFilteredArticles(data, "Cart");
    const main = $("main");
    main.html("");
    main.append(content);
    for(let i = 0; i < prices.length; i++){
        $("main article:nth-child(${i}) p").val("Price: $" + prices[i]);
    }
}

function createCatalogWithCategories(idCategory) {
    $.getJSON("/API/api-search.php?cat=" + idCategory, function (data) {
        let results = data['Results'];
        let categoryName = data['Title'];
        quadri = [];
        let articles = getFilteredArticles(results, categoryName);
        const main = $("main");
        main.html("");
        main.append(articles);
    });
}

function createCatalogByLanguages(idLang) {
    $.getJSON("/API/api-search.php?lan=" + idLang, function (data) {
        let results = data['Results'];
        let languageName = data['Title'];
        quadri = [];
        let articles = getFilteredArticles(results, languageName);
        const main = $("main");
        main.html("");
        main.append(articles);
    });
}

function fillHomePage(data) {
    let categorie = createCategories(data['Categorie']);
    let linguaggi = createLanguages(data['Linguaggi']);
    let prodottiPopolari = createPopularArticles(data['ProdottiPopolari']);
    const main = $("main");
    main.append(categorie);
    main.append(linguaggi);
    main.append(prodottiPopolari);

}