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
            notificationToggle.append("<div></div>");
            notificationDropDown = notificationToggle.children().next().next();
            notificationDropDown.css("position", "absolute");
            notificationDropDown.css("background", "#f1f1f1")

            if($(window).width() < 768){
                notificationDropDown.css("top", -$(window).height()+header.height() );
                notificationDropDown.css("right", 0);
                notificationDropDown.css("width", "95%");
                notificationDropDown.css("height", $(window).height()-header.height());
            }else{
                notificationDropDown.css("width", 200);
                notificationDropDown.css("height", 300);
                notificationDropDown.css("top", 60);
                notificationDropDown.css("right", 30);
            }

        } else {
            notificationDropDown.remove();
            notificationDropDown = null;
        }

    })


});


