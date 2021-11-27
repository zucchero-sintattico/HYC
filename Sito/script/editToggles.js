$(document).on('ready', function (){
    $('#style').on('change', (function () {
        quadro.setStyle($('#style').val());
    }));

    $('#language').on('change', (function () {
        quadro.setLanguages($('#language').val());
    }));

    $('#frame-color').on('change', (function () {
        quadro.setFramecolor($('#frame-color').val());
    }));
});




