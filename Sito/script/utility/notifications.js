$(document).on('ready', function () {


    if (userId != null) {
        const ws = new WebSocket("ws://hangyourcode.shop:8000/notification");
        ws.onopen = function () {
            ws.send(userId);
        };
        ws.onmessage = function (e) {
            console.log(e.data);
            if(e.data === "update_notification"){
                $.post( "/API/api-notification.php", function( data ) {
                    console.log("notifiche = ", data)


                    $("#notification").css("color", "red");
                });
            }
        }
    }
});


