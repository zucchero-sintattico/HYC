function checkoutIsOk(data) {
    let userName = data['UserName'];
    let orderInfo = data['OrderInfo'];
    let content = `
    <section>
        <div class="row justify-content-center">
            <div class="col-10 align-middle font-weight-bold  mt-4 bg-white border border-success text-center">
                <div class="invoice p-5">
                    <h2>Your order Confirmed!</h2> <span class="font-weight-bold d-block mt-4">Hello, ${userName}</span> <span>You order has been confirmed and will be shipped in next two days!</span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span>${orderInfo['Data']}</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order N°</span> <span>#${orderInfo['IdOrdine']}</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Shipping Address</span> <span>Via Cesare Pavese, 50, Cesena FC</span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </section>
    `;
    return content;
}

function validateInput() {
    let state = "valid";

    if($("#details > form > div:nth-child(2) > input").val().length != 16){
        state = "wrongCardNumberLength"
        $("#details > form > div:nth-child(2) > input").addClass("notValid");
    }

    $("input:not(:first, :last)").each(function () {
        if($(this).val() == ""){
            state = "notValid";
            $(this).addClass("notValid");
        }else{
            $(this).removeClass("notValid");
            $(this).css("border", "1px solid lightgray");
        }
    })



    return state;
}

$(document).on('ready', function () {

    //inizializzare il datepicker di Bootstrap


    $('main > div > div.row > div.col-lg-6.col-md-8.col-sm-10.offset-lg-0.offset-md-2.offset-sm-1.pt-lg-0.pt-3 > div.row.pt-lg-3.pt-2.buttons.mb-sm-0.mb-2 > div.col-md-6.pt-md-0.pt-3 > div'
    ).on('click', function () {

        $(".errorMessagePrompted").remove();

        let messageOnValidate = validateInput()
        if(messageOnValidate == "valid"){
            $.post("/API/api-checkout.php", function (data){
                const main = $('main');
                main.html("");
                main.append(checkoutIsOk(data));
            });
        }else{
            $('input').filter('.notValid').css("border", "1px solid red");

            let messageToLog = "";

            if(messageOnValidate == "notValid"){
                messageToLog = "Please compile every Field";
            }else if(messageOnValidate == "wrongCardNumberLength"){
                messageToLog = "Please insert correct card number length (16)";
            }

            $(this).parent().parent().parent().append(`
                <div class="row mt-4 errorMessagePrompted">
                    <div class="col-12 text-center">
                        <p class="text-danger">${messageToLog}</p>
                    </div>
                </div>
            `);

        }
    });
    $('body > div > main > div > div.row > div.col-lg-6.col-md-8.col-sm-10.offset-lg-0.offset-md-2.offset-sm-1.pt-lg-0.pt-3 > div.row.pt-lg-3.pt-2.buttons.mb-sm-0.mb-2 > div:nth-child(1) > div'
    ).on('click', function () {
        window.location = "/index.php";
    })

    $("#datepicker").datepicker( {
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"
    });

});
