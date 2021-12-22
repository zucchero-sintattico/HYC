function getRelativeOffset(start, end) {
    const starting = start.getBoundingClientRect();
    const finish = end.getBoundingClientRect();
    return {
        left: finish.left - starting.left,
        top: finish.top - starting.top
    }
}

function handleObjectsMovement(relative){
    let stuffToTraslate = [];

    const mainDiv = document.querySelector("main > div > div:nth-child(1)");

    let relativePosition = getRelativeOffset(mainDiv, relative);

    mainDiv.animate([
        {
            transform: "translate(0px,0px) scale(1,1)",
            opacity: 1
        },
        {
            transform: "translate(" + relativePosition.left + "px," + relativePosition.top + "px) scale(0.1, 0.1)",
            opacity: 0
        }], {duration: 1000,fill: "forwards", easing: "ease-out"}
    );


}

function executeButtonAnimation(button){
    button.animate([
        {
            transform: "scale(1,1)",
            opacity: 1
        },
        {
            transform: "scale(1.5, 1.5)",
            opacity: 0
        }],{duration: 500}
    );
}

$(document).on('ready', function () {

    $("main > div > div > div > button").on("click", function (event) {

        window.setTimeout(() => { handleObjectsMovement(this); }, 0);
        window.setTimeout(() => { executeButtonAnimation(this); }, 250);
        //Da eseguire qui la funzione che si vuole fare
        $(this).attr("disabled", "disabled");

    });

    quadro.setStyle($('#style').val());
    quadro.setFramecolor($('#frame-color').val());
    quadro.setStyle($('#style').val());
    quadro.setWidth($('#width .active  input').val());
    quadro.setHeight($('#height .active  input').val());
    quadro.setFontSize($('#fontSize').val());
    quadro.updateStyle();
    $('#style').on('change', (function () {
        quadro.setStyle($('#style').val());
        console.log("test");
    }));

    $('#language').on('change', (function () {
        quadro.setLanguages($('#language').val());
    }));

    $('#frame-color').on('change', (function () {
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

    $('#fontSize').on('change', (function () {
        quadro.setFontSize($('#fontSize').val());
        quadro.updateStyle();
    }));


});


