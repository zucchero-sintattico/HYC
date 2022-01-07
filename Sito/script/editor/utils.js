function getRelativeOffset(start, end) {
    const starting = start.getBoundingClientRect();
    const finish = end.getBoundingClientRect();
    return {
        left: finish.left - (starting.left+(start.offsetWidth/2)),
        top: finish.top - (starting.top+(start.offsetHeight/2))
    }
}

function handleObjectsMovement(relative){
    let stuffToTraslate = [];

    const mainDiv = document.querySelector("main > div *:not(button)");

    let relativePosition = getRelativeOffset(mainDiv, relative);

    mainDiv.animate([
        {
            transformOrigin: "center",
            transform: "scale(1,1) rotate(0deg) translate(0px,0px)",
            opacity: 1
        },
        {
            transformOrigin: "center",
            transform: "translate(" + relativePosition.left + "px," + relativePosition.top + "px) scale(0.1,0.1) rotate(45deg)",
            opacity: 0
        }], {duration: 1000,fill: "forwards", easing: "ease-in"}
    );


}

function executeButtonAnimation(button){

    button.animate([
        {
            transformOrigin: "bottom right",
            transform: "scale(1,1)",
            opacity: 1
        },
        {
            transformOrigin: "bottom right",
            easing: "ease-out",
            transform: "rotate(45deg) scale(1.4)",
            opacity: 0.8
        },
        {
            transformOrigin: "bottom right",
            easing: "ease-in",
            transform: "rotate(0deg) scale(1.3)",
            opacity: 0.6
        },
        {
            transformOrigin: "bottom right",
            easing: "ease-out",
            transform: "rotate(25deg) scale(1.2)",
            opacity: 0.4
        },
        {
            transformOrigin: "bottom right",
            easing: "ease-in",
            transform: "rotate(0deg) scale(1.1)",
            opacity: 0.2
        },
        {
            transformOrigin: "bottom right",
            easing: "ease-out",
            transform: "rotate(15deg) scale(1)",
            opacity: 0.1
        },
        {
            transformOrigin: "bottom right",
            easing: "ease-in",
            transform: "rotate(0deg) scale(0.1)",
            opacity: 0
        }],

        {
        duration: 700, iterations: 1, fill: "forwards"
        }
    );
}

function showPreviewPostAddition(){
    let quadroJsonInfo = quadro.toJSON();
    console.log(quadroJsonInfo.value);
    return `<div class="col d-flex justify-content-center">

                <div class="row justify-content-center">
                        <div id="codeContainer">
                            <script>
                                let addedToCartSquare = new CodeSquare(document.querySelector('#codeContainer'));
                                addedToCartSquare.getSquare();                        
                                addedToCartSquare.setWidth(${quadroJsonInfo.width});
                                addedToCartSquare.setHeight(${quadroJsonInfo.height});
                                addedToCartSquare.setPadding(${quadroJsonInfo.padding});
                                addedToCartSquare.setFramecolor('${quadroJsonInfo.frame_color}');
                                addedToCartSquare.setFontSize(${quadroJsonInfo.font_size});
                                addedToCartSquare.setLanguages('${quadroJsonInfo.language}');
                                addedToCartSquare.setStyle('${quadroJsonInfo.theme}');
                                addedToCartSquare.disable();
                                addedToCartSquare.widthScale(300);
                                addedToCartSquare.updateStyle();
                                addedToCartSquare.setText(${quadroJsonInfo.value});  
                                
                                checkOnResize($("#codeContainer").parent(),"col-4","col");
                            </script>
                        </div>
                        
                        <div class="col m-5 ">
                            <div class="row mt-3 border-bottom">
                                <a href="index.php">Continue shopping</a>
                            </div>
                            
                            <div class="row mb-3">
                                <a href="cart.php">Go to cart</a>
                            </div>
                        </div>
                        
                </div>

            </div>`;

}

$(document).on('ready', function () {

    $("#insertToCart").parent().on("click", function(){
        $(".errorMessageLoginClick").remove();
        $("#insertToCart").css("background-color", "transparent");

        $.get("bootstrap.php?infoSession=isUserLoggedIn", function (data) {
            if(data==="false"){
                const errorMessageLoginClick = $(".errorMessageLoginClick");
                $(".row-10 > div:nth-child(1)").append("<p class='errorMessageLoginClick'>You first need to login</p>")
                errorMessageLoginClick.css("color", "red");
                errorMessageLoginClick.css("position", "absolute");
                errorMessageLoginClick.css("font-size", "12px");
                $("#insertToCart").css("background-color", "red");
            }
        })

    })

    $("body").on("click", function(){
        $(".errorMessageLoginClick").remove();
        $("#insertToCart").css("background-color", "transparent");
    })

    $("#insertToCart").on("click", function (event) {
        if($(this).hasClass("buttonActivated")){
            $(this).attr("disabled", "disabled");

            let generatedSquare = showPreviewPostAddition();

            window.setTimeout(() => { handleObjectsMovement(this); }, 0);
            window.setTimeout(() => { executeButtonAnimation(this); }, 750);
            window.setTimeout(() => {
                $("main > div:first-child").hide();
                $("main").append(generatedSquare);
                $("#codeContainer").parent().parent().show();
                $('#codeContainer > .CodeMirror:nth-child(3)').remove();
            }, 1500);

            $.post("API/api-cart-addElement.php", quadro.toJSON(), function (data){
                console.log(quadro.toJSON());
            });
        }
    });

    const styleElem = $('#style');
    const frameColorElem = $('#frame-color');
    const fontSizeElem = $('#fontSize');
    const titleElem = $('#title_form');
    const languageElem = $("#language");

    quadro.setLanguages(languageElem.val());
    quadro.setStyle(styleElem.val());
    quadro.setFramecolor(frameColorElem.val());
    quadro.title = titleElem.attr('placeholder');
    quadro.setWidth($('#width .active  input').val());
    quadro.setHeight($('#height .active  input').val());
    quadro.setFontSize(fontSizeElem.val());
    quadro.updateStyle();

    styleElem.on('change', (function () {
        quadro.setStyle($('#style').val());
    }));

    languageElem.on('change', (function () {
        quadro.setLanguages($('#language').val());
    }));

    frameColorElem.on('change', (function () {
        quadro.setFramecolor($('#frame-color').val());
    }));

    $('#width').on('change', (function () {
        quadro.setWidth($('#width .active  input').val());
        quadro.updateStyle();
    }));


    $('#height').on('change', (function () {
        quadro.setHeight($('#height .active  input').val());
        quadro.updateStyle();
    }));

    fontSizeElem.on('input', (function () {
        quadro.setFontSize($('#fontSize').val());
        quadro.updateStyle();
    }));

    titleElem.on('keyup', (function () {
        quadro.title = titleElem.val();
    }));


});


