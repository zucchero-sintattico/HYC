function checkoutIsOk() {
    let content = `
    <section>
        <div class="row">
            <div class="col-12 text-center">
                <p>Order Confirmed!</p>
            </div>
        </div>
    </section>
    `;
    return content;
}

function validateInput() {
    let valid = true;
    $("input").each(function () {
        if($(this).val() == ""){
            valid = false;
            $(this).addClass("notValid");
        }
        else{
            $(this).removeClass("notValid");
            $(this).css("border", "1px solid lightgray");
        }

    })
    return valid;
}

$(document).on('ready', function () {
    let validateSignal = false;
    $('main > div > div.row > div.col-lg-6.col-md-8.col-sm-10.offset-lg-0.offset-md-2.offset-sm-1.pt-lg-0.pt-3 > div.row.pt-lg-3.pt-2.buttons.mb-sm-0.mb-2 > div.col-md-6.pt-md-0.pt-3 > div'
    ).on('click', function () {

        if(validateInput()){
            $.post("/API/api-checkout.php", function (data){
                const main = $('main');
                main.html("");
                main.append(checkoutIsOk);
            });
        }
        else{
            $('input').filter('.notValid').css("border", "1px solid red");
            if(!validateSignal){
                $(this).parent().parent().parent().append(`
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <p class="text-danger">Please compile every Field</p>
                        </div>
                    </div>
                `);
                validateSignal = true;
            }

        }
    });
    $('body > div > main > div > div.row > div.col-lg-6.col-md-8.col-sm-10.offset-lg-0.offset-md-2.offset-sm-1.pt-lg-0.pt-3 > div.row.pt-lg-3.pt-2.buttons.mb-sm-0.mb-2 > div:nth-child(1) > div'
    ).on('click', function () {
        window.location = "/cart.php";
    })
});