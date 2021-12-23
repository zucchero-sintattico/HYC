function didNotFIllInAllInput(){
    return `<div class="row text-danger missedInputClass"> <p> You first need to fill in all information required </p> </div>`
}

function validateFormInput(){
    let valid = true;

    $("div.p-2:nth-child(1) > form:nth-child(2) input").each(function (){
        if($(this).val().length == 0){
            valid = false;
            $(this).addClass("not-filled");
        }
    })

    return valid;
}

function printInformationUpdateStatus(message, messageColor){
    return `<div class='row text-` + messageColor + ` infoStatusUpdate'> <p> ` + message + ` </p> </div>`
}

function clearInputFromNotFilledClass(){
    $("div.p-2:nth-child(1) > form:nth-child(2) input").removeClass("not-filled");
}

$(document).on('ready', function () {

    $("div.p-2:nth-child(1) > form:nth-child(2) input").on("change", function (){
        if($(this).hasClass("not-filled")){
            $(this).removeClass("not-filled");
            $(this).css("border-color","gray");
        }
    });

    $("div.row:nth-child(5) > div:nth-child(1) > button:nth-child(1)").on("click", function (event){
        event.preventDefault();

        $(".missedInputClass").remove();
        clearInputFromNotFilledClass();

        if(!validateFormInput()){
            $(".not-filled").css("border-color","red");
            $("div.row:nth-child(5) > div:nth-child(1)").append(didNotFIllInAllInput());
        }else{
            let passwordInserted = $("div.row:nth-child(5) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").val();

            let baseUrl = "API/api-profile-update.php";

            let userData = {
                nome: $("#first_name").val(),
                cognome: $("#last_name").val(),
                username: $("#username").val(),
                email: $("#email").val(),
                password: passwordInserted
            };

            $.post(baseUrl,{dataToUpdate: userData},function (data) {

                console.log(data);

                let parsedJSONinfo = JSON.parse(data);

                $(".infoStatusUpdate").remove();
                if(parsedJSONinfo.informationUpdateStatus === "wrongPass"){
                    $("div.row:nth-child(5) > div:nth-child(1)").append(printInformationUpdateStatus("Wrong password", "danger"));
                }else if(parsedJSONinfo.informationUpdateStatus === "rightPass"){
                    $("div.row:nth-child(5) > div:nth-child(1)").append(printInformationUpdateStatus("Information correctly updated", "success"));
                }
            });
        }


    });

});