const formOneInputsSelector = $("div.p-2:nth-child(1) > form:nth-child(2) input");
const formTwoInputsSelector = $("div.mt-3:nth-child(2) > form:nth-child(2) input");

function didNotFIllInAllInput(formNumb, promptErrorMessage){
    return `<div class="row text-danger missedInputClass`+ formNumb +`"> <p>` + promptErrorMessage +`</p> </div>`
}



function passwordsError(promptErrorMessage){
    return `<div class="row text-danger passDontMatch"> <p>` + promptErrorMessage +`</p> </div>`
}

function validateFormInput(selector,arePasswordsToMatch){
    let valid = true;

    $(selector).each(function (){
        if($(this).val().length == 0){
            valid = false;
            $(this).addClass("not-filled");
        }
    })

    if(arePasswordsToMatch){
        if($("#pass1").val() !== $("#pass2").val()){
            valid = false;
            $("div.m-3:nth-child(3) > div:nth-child(1)").append(passwordsError( "Confirm password doesn't match new one"));
        }
    }

    return valid;
}

function printInformationUpdateStatus(formNumb, message, messageColor){
    return `<div class='row text-` + messageColor + ` infoStatusUpdate`+ formNumb +`'> <p> ` + message + ` </p> </div>`
}

function clearInputOnFormFromNotFilledClass(selector){
    selector.removeClass("not-filled");
}

$(document).on('ready', function () {

    $("div.p-2:nth-child(1) > form:nth-child(2) input").on("change", function (){

        $(".infoStatusUpdate1").remove();

        if($(this).hasClass("not-filled")){
            $(this).removeClass("not-filled");
            $(this).css("border-color","gray");
        }

        if(validateFormInput("div.p-2:nth-child(1) > form:nth-child(2) input")){
            $(".missedInputClass1").remove();
        }

    });

    $("div.mt-3:nth-child(2) > form:nth-child(2) input").on("change", function (){

        $(".infoStatusUpdate2").remove();
        $(".missedInputClass2").remove();

        if($(this).hasClass("not-filled")){
            $(this).removeClass("not-filled");
            $(this).css("border-color","gray");
        }

        let pass1 = $("#pass1").val();
        let pass2 = $("#pass2").val();

        $(".passDontMatch").remove();

        if(pass1 !== pass2){
            $("#pass2").css("border-color","red");
            $("div.m-3:nth-child(3) > div:nth-child(1)").append(passwordsError( "Confirm password doesn't match new one"));
        }else{
            $("#pass2").css("border-color","gray");
        }

    });



    $("div.row:nth-child(5) > div:nth-child(1) > button:nth-child(1)").on("click", function (event){
        event.preventDefault();

        $(".missedInputClass1").remove();
        clearInputOnFormFromNotFilledClass(formOneInputsSelector);

        if(!validateFormInput("div.p-2:nth-child(1) > form:nth-child(2) input",false)){
            $(".not-filled").css("border-color","red");
            $("div.m-3:nth-child(5) > div:nth-child(1)").append(didNotFIllInAllInput(1, "You first need to fill in all information required "));
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

                $(".infoStatusUpdate1").remove();
                if(parsedJSONinfo.informationUpdateStatus === "wrongPass"){
                    $("div.m-3:nth-child(5) > div:nth-child(1)").append(printInformationUpdateStatus(1,"Wrong password", "danger"));
                    $("div.m-3:nth-child(5) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","red");
                }else if(parsedJSONinfo.informationUpdateStatus === "rightPass"){
                    $("div.m-3:nth-child(5) > div:nth-child(1)").append(printInformationUpdateStatus(1,"Information correctly updated", "success"));
                    $("div.col-3:nth-child(3) > label:nth-child(1) > p:nth-child(2)").text("Hi " + userData.username) ;
                    $("div.m-3:nth-child(5) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","gray");
                }
            });
        }

    });

    $("div.m-3:nth-child(3) > div:nth-child(1) > button:nth-child(1)").on("click", function (event) {
        event.preventDefault();
        clearInputOnFormFromNotFilledClass(formTwoInputsSelector);

        $(".missedInputClass2").remove();
        $(".infoStatusUpdate2").remove();
        $(".passDontMatch").remove();

        if(!validateFormInput("div.mt-3:nth-child(2) > form:nth-child(2) input",true)){
            $(".not-filled").css("border-color","red");
            $("div.m-3:nth-child(3) > div:nth-child(1)").append(didNotFIllInAllInput(2, "You first need to fill in all information required "));
        }else{
            let passwordInserted = $("div.m-3:nth-child(3) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").val();
            let pass2 = $("#pass2").val();
            let baseUrl = "API/api-profile-update.php";

            let dataToUpdate = {
                newPass: pass2,
                currentPass: passwordInserted
            };

            $.post(baseUrl, {passToUpdate: dataToUpdate}, function (data) {
                let parsedJSONinfo = JSON.parse(data);

                if(parsedJSONinfo.informationUpdateStatus === "wrongPass"){
                    $("div.m-3:nth-child(3) > div:nth-child(1)").append(printInformationUpdateStatus(2,"Wrong password", "danger"));
                    $("div.m-3:nth-child(3) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","red");
                }else if(parsedJSONinfo.informationUpdateStatus === "samePass"){
                    $("div.m-3:nth-child(3) > div:nth-child(1)").append(printInformationUpdateStatus(2,"New password has to be different from current one", "danger"));
                    $("div.m-3:nth-child(3) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","red");
                }else if(parsedJSONinfo.informationUpdateStatus === "rightPass"){
                    $("div.m-3:nth-child(3) > div:nth-child(1)").append(printInformationUpdateStatus(2,"Password successfully updated", "success"));
                    $("div.m-3:nth-child(3) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","gray");
                }
            })

        }

    })

});