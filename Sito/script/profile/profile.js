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
        if($(this).val().length === 0){
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

let historyIsBeingShowed = false;

$(document).on('ready', function () {

    $(".discardChanges").on("click", function(event){
        event.preventDefault();
        $(".editableInfo").hide();
        $(".notEditableInfo").show();
    })

    historyIsBeingShowed = modifyProfileIfMobile();
    $("#orderHistoryBtn").on("click", function(event){
        event.preventDefault();
        if(!historyIsBeingShowed){
            $("#orderHistoryBtn").text("Show Profile Information");
            $(".orderHistory").show();
            $(".editableInfo").hide();
            $(".notEditableInfo").hide();
            historyIsBeingShowed = true;
        }else{
            $("#orderHistoryBtn").text("Show Order History");
            $(".orderHistory").hide();
            $(".editableInfo").hide();
            $(".notEditableInfo").show();
            historyIsBeingShowed = false;
        }

    })
    $(".notEditableInfo").show();
    $(".editableInfo").hide()

    $("#EditProfileBtn").on("click", function(event){
        event.preventDefault();
        $(".notEditableInfo").hide();
        $(".editableInfo").show()
    });

    $(window).on("resize",function(){
        modifyProfileIfMobile();
    })

    $("div.p-2:nth-child(1) > form:nth-child(2) input").on("keyup", function (){

        $(".infoStatusUpdate1").remove();

        if($(this).hasClass("not-filled")){
            $(this).removeClass("not-filled");
            $(this).css("border-color","gray");
        }

        if(validateFormInput("div.p-2:nth-child(1) > form:nth-child(2) input")){
            $(".missedInputClass1").remove();
        }

    });

    $("div.mt-3:nth-child(2) > form:nth-child(2) input").on("keyup", function (){

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
                name: $("#first_name").val(),
                surname: $("#last_name").val(),
                username: $("#username").val(),
                email: $("#email").val(),
                password: passwordInserted
            };

            $.post(baseUrl,{dataToUpdate: userData},function (data) {

                let parsedJSONinfo = JSON.parse(data);

                $(".infoStatusUpdate1").remove();
                if(parsedJSONinfo.informationUpdateStatus==="emailNotValid"){
                    $("div.m-3:nth-child(5) > div:nth-child(1)").append(printInformationUpdateStatus(1,"Insert a valid email address", "danger"));
                    $("#email").css("border-color","red");
                }else if(parsedJSONinfo.informationUpdateStatus === "wrongPass"){
                    $("div.m-3:nth-child(5) > div:nth-child(1)").append(printInformationUpdateStatus(1,"Wrong password", "danger"));
                    $("div.m-3:nth-child(5) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","red");
                }else if(parsedJSONinfo.informationUpdateStatus === "alreadyPresent"){
                    $("div.m-3:nth-child(5) > div:nth-child(1)").append(printInformationUpdateStatus(1,"Email or Username already present", "danger"));
                    $("div.m-3:nth-child(5) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","red");
                }else if(parsedJSONinfo.informationUpdateStatus === "rightPass"){
                    $("div.m-3:nth-child(5) > div:nth-child(1)").append(printInformationUpdateStatus(1,"Information correctly updated", "success"));
                    $("div.col-3:nth-child(3) > label:nth-child(1) > p:nth-child(2)").text("Hi " + userData.username) ;
                    $("div.m-3:nth-child(5) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","gray");
                    $(".input").val("");
                    window.setTimeout(() => {
                        $(".notEditableInfo").show();
                        $(".editableInfo").hide()
                        $(".missedInputClass1").remove();
                        clearInputOnFormFromNotFilledClass(formOneInputsSelector);
                        $(".infoStatusUpdate1").remove();
                        //UPDATE DATA
                        $(".notEditableInfo > div:nth-child(1) > p:nth-child(2)").text(`NAME: ${userData.name}`);
                        $(".notEditableInfo > div:nth-child(1) > p:nth-child(3)").text(`SURNAME: ${userData.surname}`);
                        $(".notEditableInfo > div:nth-child(1) > p:nth-child(4)").text(`USERNAME: ${userData.username}`);
                        $(".notEditableInfo > div:nth-child(1) > p:nth-child(5)").text(`EMAIL: ${userData.email}`);
                        $(".col-2 > label:nth-child(1) > p:nth-child(2)").text(`Hi ${userData.username}`);
                    }, 1000);
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
                }else if(parsedJSONinfo.informationUpdateStatus === "passTooShort"){
                    $("div.m-3:nth-child(3) > div:nth-child(1)").append(printInformationUpdateStatus(2,"New password has to be 8 character long at least", "danger"));
                    $("div.m-3:nth-child(3) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","red");
                }else if(parsedJSONinfo.informationUpdateStatus === "samePass"){
                    $("div.m-3:nth-child(3) > div:nth-child(1)").append(printInformationUpdateStatus(2,"New password has to be different from current one", "danger"));
                    $("div.m-3:nth-child(3) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","red");
                }else if(parsedJSONinfo.informationUpdateStatus === "rightPass"){
                    $("div.m-3:nth-child(3) > div:nth-child(1)").append(printInformationUpdateStatus(2,"Password successfully updated", "success"));
                    $("div.m-3:nth-child(3) > div:nth-child(2) > div:nth-child(1) > input:nth-child(2)").css("border-color","gray");
                    $(".oldPass").val("");
                    window.setTimeout(() => {
                        $(".notEditableInfo").show();
                        $(".editableInfo").hide();
                        clearInputOnFormFromNotFilledClass(formTwoInputsSelector);
                        $(".infoStatusUpdate2").remove();
                    }, 1000);

                }
            })

        }

    })

});