$(document).on('ready', function (){
    $('#style').on('change', (function () {
        quadro.setStyle($('#style').val());
    }));
});

