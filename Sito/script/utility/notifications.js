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



    //notification selector
    const notificationToggle = $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(5) > a");
    notificationToggle.on('click', function (){
        $("main").prepend("<div style='width: 300px; height: 400px; position: absolute; right: 10px; float: end; background-color: #f1f1f1'></div>")
    })
});


