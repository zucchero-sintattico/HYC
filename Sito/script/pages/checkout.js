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


$(document).on('ready', function () {
    $('body > div > main > div > div.row >div.col-lg-6.col-md-8.col-sm-10.offset-lg-0.offset-md-2.offset-sm-1.pt-lg-0.pt-3 > div.row.pt-lg-3.pt-2.buttons.mb-sm-0.mb-2 > div.col-md-6.pt-md-0.pt-3 > div'
    ).on('click', function () {

       $.post("/API/api-checkout.php", function (data){
           const main = $('main');
           main.html("");
           main.append(checkoutIsOk);
        });
    });
});