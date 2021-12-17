$(document).on('ready', function () {


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



