$(document).ready(function() {

    $(function() {
        $("#code-width").slider({
            min: 300,
            max: 500,
            values: [ 300 ],
            slide: function( event, ui ) {
                quadro.setWidth(ui.values[ 0 ]);
            }
        });
    });

    $(function() {
        $("#code-height").slider({
            min: 300,
            max: 500,
            values: [ 300 ],
            slide: function( event, ui ) {
                quadro.setHeight(ui.values[ 0 ]);
            }
        });
    });


    $(function() {
        $("#code-padding").slider({
            min: 10,
            max: 30,
            values: [ 10 ],
            slide: function( event, ui ) {
                quadro.setPadding(ui.values[ 0 ]);
            }
        });
    });


        $("#frame-color").change(function () {
            quadro.setFramecolor($("#frame-color").val());
        });

    $("#font-size").change(function () {
        quadro.setFontSize($("#font-size").val());
    });
});
