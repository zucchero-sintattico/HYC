$(document).on('ready', function () {

    if (userId != null) {
        const ws = new WebSocket("ws://hangyourcode.shop:8000/notification");
        ws.onopen = function () {
            ws.send(userId);
        };
        const popUpnotificationContainer = $('#popUpNotification');

        ws.onmessage = function (e) {
            console.log(e.data);
            if (e.data === "update_notification") {
                $.post("/API/api-notification.php?filter=last-one", function (data) {
                    data = JSON.parse(data);
                    let notificationHtml =
                        `<div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <label style="font-weight: bold">`+data.TipoNotifica+`<p>`+data.Descrizione+`</p></label>  
                         </div>         
                        `;

                    popUpnotificationContainer.append(notificationHtml);
                    const notification = $("#notification");
                    notification.css("color", "red");
                    notification.prev().css("filter", "invert(16%) sepia(96%) saturate(5152%) hue-rotate(356deg) brightness(97%) contrast(119%)");
                    notification.prev()[0].animate([
                            {
                                transform: "rotate(0deg) scale(1, 1)",
                                easing: "ease-in"
                            },
                            {
                                transform: "rotate(45deg) scale(1.2, 1.2)"
                            },
                            {
                                transform: "rotate(0deg) scale(1, 1)",
                                easing: "ease-out"
                            }],

                        {
                            duration: 200, iterations: 3
                        }
                    );

                });
            }
        }
    }


    //notification selector
    const notificationToggle = $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(5)");
    let notificationDropDown = null;


    notificationToggle.children().on('click', function () {
        const notification = $("#notification");
        notification.css("color", "black");
        notification.prev().css("filter", "none");

        if (notificationDropDown == null) {
            $.getJSON("/API/api-notification.php?filter=all", function (data) {

                notificationToggle.append(`<div></div>`);
                notificationDropDown = notificationToggle.children().next();
                for(let i = data.length-1; i>=0; i--){
                    let notificationHtml =
                        `
                            <div class="col border border-end-dark">
                                <div class="font-weight-bold">`+data[i].TipoNotifica+" | "+data[i].Data+`</div>
                                <p style="text-align: left">`+data[i].Descrizione+`</p>
                                
                            </div>
                        
                        `;
                    notificationDropDown.append(notificationHtml);
                }

                notificationDropDown.css("position", "absolute");
                notificationDropDown.css("background", "#f1f1f1");
                notificationDropDown.css("overflow-y", "scroll");
                notificationDropDown.css("overflow-x", "hidden");
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


