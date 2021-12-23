$(document).on('ready', function () {


    if (userId != null) {
        const ws = new WebSocket("ws://hangyourcode.shop:8000/notification");
        ws.onopen = function () {
            ws.send(userId);
        };
        ws.onmessage = function (e) {
            console.log(e.data);
            if (e.data === "update_notification") {
                $.post("/API/api-notification.php", function (data) {
                    console.log("notifiche = ", data)


                    $("#notification").css("color", "red");
                });
            }
        }
    }


    //notification selector
    const notificationToggle = $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(5) > a");
    let notificationDropDown = null;
    const header = $("header")
    notificationToggle.on('click', function () {

        if (notificationDropDown == null) {
            notificationToggle.append("<div><p>notifica 1</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p><p>notifica 2</p></div>");
            notificationDropDown = notificationToggle.children().next().next();
            notificationDropDown.css("position", "absolute");
            notificationDropDown.css("background", "#f1f1f1");
            notificationDropDown.css("overflow-y", "scroll");

            if($(window).width() < 768){
                notificationDropDown.css("bottom", $("nav").height());
                notificationDropDown.css("right", 0);
                notificationDropDown.css("width", "100%");
                notificationDropDown.css("height", $(window).height()-100);
            }else{
                notificationDropDown.css("width", 400);
                notificationDropDown.css("height", 400);
                notificationDropDown.css("top", 60);
                notificationDropDown.css("right", 30);
            }

        } else {
            notificationDropDown.remove();
            notificationDropDown = null;
        }

    })


});


