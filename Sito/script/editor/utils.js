function getRelativeOffset(start, end) {
    const starting = start.getBoundingClientRect();
    const finish = end.getBoundingClientRect();
    return {
        left: finish.left - starting.left,
        top: finish.top - starting.top
    }
}

$(document).on('ready', function () {

    $("main > div > div > div > button").on("click", function (event) {
        let stuffToTraslate = [];

        stuffToTraslate.push(document.querySelector(".col-11 > div:nth-child(1) > div:nth-child(1)"));
        stuffToTraslate.push(document.querySelector(".col-11 > div:nth-child(1) > div:nth-child(2) > div:nth-child(1) > code:nth-child(1)"))


        for (let i = 0; i < stuffToTraslate.length; i++) {

            let relativePosition = getRelativeOffset(stuffToTraslate[i], this);

            stuffToTraslate[i].prototype.promise().done(function(){console.log("aaa");});
            stuffToTraslate[i].animate([
                {
                    transform: "translate(0px,0px) scale(1,1)",
                    opacity: 1
                },
                {
                    transform: "translate(" + relativePosition.left + "px," + relativePosition.top + "px) scale(0.1, 0.1)",
                    opacity: 0
                }], 500, function () {
                console.log("aaa");
            })


        }

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


