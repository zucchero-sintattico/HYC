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
                    data = JSON.parse(data);
                    let popUp_notification = $(".alert").show();
                    popUp_notification.append(data);
                    $("#notification").css("color", "red");
                });
            }
        }
    }


    //notification selector
    const notificationToggle = $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(5)");
    let notificationDropDown = null;
    const header = $("header")
    notificationToggle.children().on('click', function () {

        if (notificationDropDown == null) {
            $.getJSON("/API/api-notification.php?filter=all", function (data) {

                notificationToggle.append(`<div></div>`);
                notificationDropDown = notificationToggle.children().next();
                for(let i = data.length-1; i>=0; i--){
                    notificationDropDown.append("<p>"+data[i].Descrizione+"</p>");
                }

                notificationDropDown.css("position", "absolute");
                notificationDropDown.css("background", "#f1f1f1");
                notificationDropDown.css("overflow-y", "scroll");
                notificationDropDown.css("z-index", 999999);

                if ($(window).width() < 768) {
                    notificationDropDown.css("bottom", $("nav").height());
                    notificationDropDown.css("right", 0);
                    notificationDropDown.css("width", "100%");
                    notificationDropDown.css("height", $(window).height() - 100);
                } else {
                    notificationDropDown.css("width", 400);
                    notificationDropDown.css("height", 400);
                    notificationDropDown.css("top", 60);
                    notificationDropDown.css("right", 30);
                    notificationDropDown.css("-webkit-box-shadow", "-6px 7px 4px 1px rgba(0,0,0,0.56)");
                    notificationToggle.css(" box-shadow", "-6px 7px 4px 1px rgba(0,0,0,0.56)")
                }

            });

        } else {
            notificationDropDown.remove();
            notificationDropDown = null;
        }

    })


});


