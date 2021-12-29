// Functions that fill the pages

function createImages(){
    return `
        <div class="text-center">
          <img src="img/paintings/quadriTrasparentiExample.png" class="rounded" alt="...">
        </div>
    `;
}

function generateCategoriesAndRelativeProducts(categorie, linguaggi){
    $("main").append("<div class='row mainContainer'><div class='col categories'></div></div>");

    for(let i=0; i<categorie.length; i++){

        let singleCategory = `<div class="col categoria${categorie[i]['IdCategoria']} m-5">
                                    <h3>${categorie[i]['Tipo']}</h3>
                                    <div class="row listaCategoria${categorie[i]['IdCategoria']}">
                                    </div>
                              </div>`;

        $(".categories").append(singleCategory);
        let selector = ".listaCategoria".concat(categorie[i]['IdCategoria']);
        addProductsToSpecifiedList(categorie[i]['IdCategoria'], selector, "cat");
    }

    for(let i=0; i<linguaggi.length; i++){

        let singleCategory = `<div class="col ${linguaggi[i]['NomeLinguaggio']} m-5">
                                    <h3>${linguaggi[i]['NomeLinguaggio']}</h3>
                                    <div class="row listaLinguaggio${linguaggi[i]['NomeLinguaggio']}">
                                    </div>
                              </div>`;

        $(".categories").append(singleCategory);
        let selector = `.listaLinguaggio${linguaggi[i]['NomeLinguaggio']}`;
        addProductsToSpecifiedList(linguaggi[i]['NomeLinguaggio'], selector, "lan",);
    }

}

function addProductsToSpecifiedList(tipologiaLista, selectorToWhereToAddProducts, getType) {
    $.getJSON("/API/api-search.php?"+ getType +"=" + tipologiaLista, function (data) {
        let results = data['Results'];
        let products = createProductsOfCategoryFromData(results);

        $(selectorToWhereToAddProducts).append(products);

    });
}

function fillHomePage(data) {
    let img = createImages();
    generateCategoriesAndRelativeProducts(data['Categorie'], data['Linguaggi']);
    //let linguaggi = createLanguages(data['Linguaggi']);
}

function createProductsOfCategoryFromData(data) {
    let content = '';
    quadri = [];
    for (let i = 0; i < data.length; i++) {
        let result = `
                <a href="editor.php?id=${data[i]["IdProd"]}" class="col-2 d-flex justify-content-center" >
                        <code id="quadro${data[i]["IdProd"]}">
                            <script>
                            if($('#quadro${data[i]["IdProd"]}').parent().parent().find('.CodeMirror').length === 0){
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
                            checkOnResize("code","col-2","col");
                            
                            $('#quadro${data[i]["IdProd"]}').on("touchend", function(event) {
                                window.location.href = "editor.php?id=${data[i]["IdProd"]}"         
                            });
                            </script>
                        </code>
                </a>      
            `;
        content += result;
    }
    return content;
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

function generateCart(data){
    let content = '';
    quadri = [];
    let products = data['Products'];
    let prices = data['Prices'];
    for (let i = 0; i < products.length; i++) {
        let result = `
                    <div class="col-10 col-md-5" >
                        <a href="../editor.php?id=${products[i]["IdProd"]}">
                            <article>
                               <div class="col-12">
                                    <h2>${products[i]["Titolo"]}</h2>
                                </div>
                                <div class="row justify-content-center">
                                    <code id="quadro${products[i]["IdProd"]}">
                                        <script>
                                            quadri.push(new CodeSquare(document.querySelector('#quadro${products[i]["IdProd"]}')));
                                            quadri[${i}].getSquare();
                                            quadri[${i}].setWidth(${products[i]["Larghezza"]});
                                            quadri[${i}].setHeight(${products[i]["Altezza"]});
                                            quadri[${i}].setPadding(${products[i]["Padding"]});
                                            quadri[${i}].setFramecolor('${products[i]["Colore_frame"]}');
                                            quadri[${i}].setFontSize(${products[i]["Dimensione_font"]});
                                            quadri[${i}].setLanguages('${products[i]["NomeLinguaggio"]}');
                                            quadri[${i}].setStyle('${products[i]["NomeTema"]}');
                                            quadri[${i}].disable();
                                            quadri[${i}].widthScale(300);
                                            quadri[${i}].updateStyle();
                                            quadri[${i}].setText('${products[i]["Codice"]}');
                                        </script>
                                    </code>
                                </div>
                                <div class="row">
                                    <p href="#" class="col-12 font-weight-bold">Price: € ${prices[i]}</p>
                                </div>
                            </article>                
                        </a>
                        <div class="row justify-content-center mt-2">
                            <label for="quantity${products[i]["IdProd"]}">Quantity:</label><input id="quantity${products[i]["IdProd"]}" type="number" min="1" max="" name="quantity" value="${products[i]["Quantità"]}" title="Qty" class="input-text text-center">
                        </div>
                        <div class="row justify-content-center mt-2 mb-4">
                            <a href="#" class="text-danger" id="delete${products[i]["IdProd"]}"> Delete Product </a>
                                <script>
                                    $("#delete${products[i]["IdProd"]}").on('click', function () {
                                        removeProdAndRefreshCart(${products[i]["IdProd"]});
                                    });
                                    $("#quantity${products[i]["IdProd"]}").on('change', function () {
                                        changeProdQuantity(${products[i]["IdProd"]}, $(this).val());
                                    });
                                </script>
                        </div>
                    </div>`;
        content += result;
    }
    return adaptableSection(content, "Cart");


}

// Recall previous function and change the description with the Price
function getArticleInCart(data){
    let results = data['Products'];
    let prices = data['Prices'];
    let content = generateCart(data);
    const main = $("main");
    main.html("");
    main.append(content);
    let content2 = ``;
    if(prices.length > 0){
        content2 += `
                      <div class="row">
                        <div class="col-12 text-center">
                            <a href="../checkout.php">Checkout</a>
                        </div>
                      </div>
                        
                      `;
    }
    let section = $("main section");
    section.append(content2);
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

function removeProdAndRefreshCart(idProd) {
    prod = {
        IdProd : idProd
    }
    $.post("/API/api-cart-removeElement.php", prod, function (data) {
        if(data['Empty'] == 1){
            data['Products'] = new Array();
            data['Prices'] = new Array();
        }
        getArticleInCart(data);
    });
}

function changeProdQuantity(idProd, quantity) {
    dataIn = {
        IdProd : idProd,
        Quantity : quantity
    }
    $.post("/API/api-cart-changeQuantityElement.php", dataIn, function (data) {
        getArticleInCart(data);
    });
}
