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

    const mainDiv = document.querySelector("main > div > div:nth-child(1)");

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

$(document).on('ready', function () {

    $("main > div > div > div > button").on("click", function (event) {
        $(this).attr("disabled", "disabled");
        window.setTimeout(() => { handleObjectsMovement(this); }, 0);
        window.setTimeout(() => { executeButtonAnimation(this); }, 750);
        //Da eseguire qui la funzione che si vuole fare

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


