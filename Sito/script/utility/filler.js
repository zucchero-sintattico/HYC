// Functions that fill the pages
function createImages(){
    let image = `
        <div class="row no-wrap">
          <img src="img/paintings/room1.jpg" alt="...">
          <img src="img/paintings/room2.jpg" alt="...">
          <img src="img/paintings/room3.jpg" alt="...">
          <img src="img/paintings/room4.jpg" alt="...">
        </div>
    `;

    $("main").append(image);

}

function addH2Animation(){
    let h2s = $("h2");
    h2s.next().next().css("opacity",0);
    h2s.next().next().css("font-size","20px");
    h2s.next().next().css("font-weight","bold");
    h2s.next().next().next().css("opacity",0);

    h2s.each(function(){
        $(this).on("mouseenter",function(){
            $(this).parent().find(".isFirstP")[0].style.setProperty("opacity", "0", "important");
            $(this).css("color", "#545454");
            $(this).next().next()[0].animate([
                    {
                        opacity: 1,
                        transform: "translateX(150px) translateY(4px)",
                    }],

                {
                    duration: 400, iterations: 1, fill: "forwards", delay:50, easing: "ease-out"
                }
            );

            $(this).next().next().next()[0].animate([
                {
                    transform: "translateX(-20px) translateY(7px)",
                },
                {
                    opacity: 1,
                    transform: "translateX(5px) translateY(7px)",
                }],

                {
                    duration: 400, iterations: 1, fill: "forwards", delay:50, easing: "ease-out"
                }
            );

        })

        $(this).on("mouseleave",function(){
            $(this).parent().find(".isFirstP")[0].style.setProperty("opacity", "1", "important");
            $(this).css("opacity", "1");
            $(this).next().next()[0].animate([
                    {
                        opacity: 0,
                        transform: "translateX(0px) translateY(4px)",
                    }],

                {
                    duration: 400, iterations: 1, fill: "forwards", delay:50, easing: "ease-in"
                }
            );

            $(this).next().next().next()[0].animate([
                {
                    transform: "translateY(7px)",
                },
                    {
                        opacity: 0,
                        transform: "translateX(-20px) translateY(7px)",
                    }],

                {
                    duration: 400, iterations: 1, fill: "forwards", delay:50, easing: "ease-in"
                }
            );

        })

    })
}

function generateCategoriesAndRelativeProducts(categorie, linguaggi){
    $("main").append("<div class='row mainContainer pt-0 mt-0'><div class='col categories'><div class='row d-flex justify-content-center'><h1>Categories</h1></div></div></div>");
    $("main > div:first-child").hide(); //  started hide, show after full loading
    for(let i=0; i<categorie.length; i++){

        let singleCategory = `<div class="col categoria${categorie[i]['IdCategoria']} m-5">
                                    <div class="row">
                                        <h2>${categorie[i]['Tipo']}:</h2>
                                        <p class="isFirstP"> > </p>
                                        <p> > </p>
                                        <p>Sfoglia tutti</p>
                                    </div>
                                    
                                    <div class="container listaCategoria${categorie[i]['IdCategoria']}">
                                        <div class="row"></div>
                                    </div>
                              </div>`;

        $(".categories").append(singleCategory);

        let selector = `.listaCategoria${categorie[i]['IdCategoria']} > div`;
        addProductsToSpecifiedList(categorie[i]['IdCategoria'], selector, "cat");


        $(selector).css("white-space", "nowrap");

        let h2ParentSelector = ".categoria".concat(categorie[i]['IdCategoria']);

        $(h2ParentSelector).find("h2").on("click", function () {
            $.getJSON("/API/api-search.php?cat=" + categorie[i]['IdCategoria'], function (data) {
                let articoli = data["Results"];
                $("main div").hide();
                $("main").append(`<div class="container">
                                            <div class="col categRes"></div>
                                            <div class="row m-auto pt-3 d-flex justify-content-center searchResults"></div>
                                    </div>`);
                $(".categRes").append(`<h2>${data["Title"]}</h2>`);
                const searchResults = $(".searchResults");
                searchResults.append(createProductsOfCategoryFromData(articoli, "res"));
                searchResults.show();
            });
        })



    }

    for(let i=0; i<linguaggi.length; i++){

        let singleCategory = `<div class="col ${linguaggi[i]['NomeLinguaggio']} m-5">
                                    <div class="row">
                                        <h2>${linguaggi[i]['NomeLinguaggio']}:</h2>
                                        <p class="isFirstP"> > </p>
                                        <p> > </p>
                                        <p>Sfoglia tutti</p>
                                    </div>
                                    <div class="container listaLinguaggio${linguaggi[i]['NomeLinguaggio']}">
                                        <div class="row"></div>
                                    </div>
                              </div>`;

        $(".categories").append(singleCategory);
        let selector = `.listaLinguaggio${linguaggi[i]['NomeLinguaggio']} > div`;
        addProductsToSpecifiedList(linguaggi[i]['NomeLinguaggio'], selector, "lan",);

        let h2ParentSelector = ".".concat(linguaggi[i]['NomeLinguaggio']);

        $(h2ParentSelector).find("h2").on("click", function () {
            $.getJSON("/API/api-search.php?lan=" + linguaggi[i]['NomeLinguaggio'], function (data) {
                let articoli = data["Results"];
                $("main div").hide();
                $("main").append(`<div class="container">
                                            <div class="col categRes"></div>
                                            <div class="row searchResults"></div>
                                    </div>`);
                $(".categRes").append(`<h2>${data["Title"]}</h2>`);
                const searchResults = $(".searchResults");
                searchResults.append(createProductsOfCategoryFromData(articoli, "res"));
                searchResults.show();
            });
        })

    }




    $(".isFirstP").each(function(){
        $(this).css("opacity","0");
        $(this).css("font-size", "28px");
        $(this).css("font-weight","bold");
    })

    const categoryAnimation = $(".categories > div > div:first-child");

    categoryAnimation.on("mouseenter", function(){
        $(this).find("p").first().css("opacity", "1");
    });

    categoryAnimation.on("mouseleave", function(){
        $(this).find("p").first().css("opacity", "0");
    });
    addH2Animation();

}

function addProductsToSpecifiedList(listTypology, selectorToWhereToAddProducts, getType) {
    $.getJSON("/API/api-search.php?"+ getType +"=" + listTypology, function (data) {
        let results = data['Results'];
        let products = createProductsOfCategoryFromData(results,getType);

        $(selectorToWhereToAddProducts).append(products);
        $(selectorToWhereToAddProducts).find(".paintingInfo").css("opacity", 0);

    });
}

function fillHomePage(data) {
    generateCategoriesAndRelativeProducts(data['Categorie'], data['Linguaggi']);
}

function createProductsOfCategoryFromData(data, cat) {
    let content = '';
    quadri = [];
    for (let i = 0; i < data.length; i++) {
        let result = `
                    <div class="col productWhole">
                        <div class="row paintingInfo paintingTitle">
                            <label>${data[i]["Titolo"]}</label>
                        </div>
                        
                        <div class="col d-flex justify-content-center">
                            <div id="quadro${cat}${data[i]["IdProd"]}">
                                    <script>
                                    const frame = $('#quadro${cat}${data[i]["IdProd"]} .CodeMirror');
                                        if(frame.length === 0){
                                            quadri.push(new CodeSquare(document.querySelector('#quadro${cat}${data[i]["IdProd"]}')));
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
                                            quadri[${i}].setText(${data[i]["Codice"]}); 
                                            quadri[${i}].createAnimationAndSetDescriptionInformation("editor.php?id=${data[i]["IdProd"]}");     
                                            quadri[${i}].disablePadding();
                                            let parent = $("#quadro${cat}${data[i]["IdProd"]}").parent();
                                            checkOnResize(parent,"row","col");
                                            $(".CodeMirror").css("position", "relative").css("z-index", "-1");
       
                                        }
                                    </script>  
                                </div>
                        </div>
                        <div class="row infoWrapper">
                            <p class="text-center paintingInfo info">${data[i]["Descrizione"]}</p>
                        </div>
                    </div>
            `;
        content += result;
    }
    return content;
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
                                            quadri[${i}].setText(${products[i]["Codice"]});
                                        </script>
                                    </code>
                                </div>
                                <div class="row">
                                    <p class="col-12 font-weight-bold">Price: € ${prices[i]}</p>
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
                                    $("#quantity${products[i]["IdProd"]}").on('keyup change', function () {
                                        if(parseInt($(this).val()) < 1){
                                            $(this).val(1);
                                        }
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
                      <div class="row m-4">
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
        let articles = createProductsOfCategoryFromData(results, categoryName);
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
        let articles = createProductsOfCategoryFromData(results, languageName);
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
        if(data['Empty'] === 1){
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
