$(document).on('ready', function () {


    quadro.setStyle($('#style').val());
    quadro.setFramecolor($('#frame-color').val());
    quadro.setStyle($('#style').val());
    quadro.setWidth($('#width .active  input').val() * 3);
    quadro.setHeight($('#height .active  input').val() * 3);


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
        quadro.setWidth($('#width .active  input').val() * 3);
    }));


    $('#height').on('change', (function () {
        quadro.setHeight($('#height .active  input').val() * 3);
    }));

});



