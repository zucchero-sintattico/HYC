<nav class="bg-white">
    <div class="d-flex align-items-center">
        <div class="logo"><a href="#" class="text-uppercase">shop</a></div>
        <div class="ml-auto"><a href="#" class="text-uppercase">Back to shopping</a></div>
    </div>
</nav>
<header>
    <div class="d-flex justify-content-center align-items-center pb-3">
        <div class="px-sm-5 px-2 active">SHOPPING CART <span class="fas fa-check"></span></div>
        <div class="px-sm-5 px-2">CHECKOUT</div>
        <div class="px-sm-5 px-2">FINISH</div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0"
             aria-valuemax="100"></div>
    </div>
</header>
<div class="wrapper">
    <div class="h5 large">Billing Address</div>
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
            <div class="mobile h5">Billing Address</div>
            <div id="details" class="bg-white rounded pb-5">
                <form>
                    <div class="form-group"><label class="text-muted">Name</label> <input type="text"
                                                                                          value="David Smith"
                                                                                          class="form-control"></div>
                    <div class="form-group"><label class="text-muted">Email</label>
                        <div class="d-flex jusify-content-start align-items-center rounded p-2"><input type="email"
                                                                                                       value="david.343@gmail.com">
                            <span class="fas fa-check text-success pr-sm-2 pr-0"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"><label>City</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"><input
                                            type="text" value="Houston" disabled> <span
                                            class="fas fa-check text-success pr-2"></span></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label>Zip code</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"><input
                                            type="text" value="77001"> <span
                                            class="fas fa-check text-success pr-2"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"><label>Address</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"><input
                                            type="text" value="542 W.14th Street"> <span
                                            class="fas fa-check text-success pr-2"></span></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label>State</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"><input
                                            type="text" value="NY"> <span class="fas fa-check text-success pr-2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Country</label> <select name="country" id="country">
                        <option value="usa">USA</option>
                        <option value="ind">INDIA</option>
                    </select>
                </form>
            </div>
            <input type="checkbox" checked> <label>Shipping address is same as billing</label>
            <div id="address" class="bg-light rounded mt-3">
                <div class="h5 font-weight-bold text-primary"> Shopping Address</div>
                <div class="d-md-flex justify-content-md-start align-items-md-center pt-3">
                    <div class="mr-auto"><b>Home Address</b>
                        <p class="text-justify text-muted">542 W.14th Street</p>
                        <p class="text-uppercase text-muted">NY</p>
                    </div>
                    <div class="rounded py-2 px-3" id="register"><a href="#"> <b>Register Now</b> </a>
                        <p class="text-muted">Create account to have multiple address saved</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
            <div id="cart" class="bg-white rounded">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h6">Cart Summary</div>
                    <div class="h6"><a href="#">Edit</a></div>
                </div>
                <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                    <?php foreach (templateParams['query'] as $articolo) : ?>
                        <div class="item pr-2">
                            <!-- Code -->
                            <div class="row justify-content-center">
                                <code id="quadro<?php echo $articolo["IdProd"] ?>">
                                    <script>
                                        let quadro<?php echo $articolo["IdProd"] ?> = new CodeSquare(document.querySelector('#quadro<?php echo $articolo["IdProd"] ?>'));
                                        quadro<?php echo $articolo["IdProd"] ?>.getSquare();
                                        quadro<?php echo $articolo["IdProd"] ?>.setWidth(<?php echo $articolo["Larghezza"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setHeight(<?php echo $articolo["Altezza"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setPadding(0);
                                        quadro<?php echo $articolo["IdProd"] ?>.setFramecolor("transparent");
                                        quadro<?php echo $articolo["IdProd"] ?>.setFontSize(<?php echo $articolo["Dimensione_font"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setLanguages('<?php echo $articolo["NomeLinguaggio"] ?>');
                                        quadro<?php echo $articolo["IdProd"] ?>.setStyle('<?php echo $articolo["NomeTema"] ?>');
                                        quadro<?php echo $articolo["IdProd"] ?>.disable();
                                        quadro<?php echo $articolo["IdProd"] ?>.widthScale(300);
                                        quadro<?php echo $articolo["IdProd"] ?>.updateStyle();
                                        uadro<?php echo $articolo["IdProd"] ?>.setText(<?php echo $articolo["Codice"] ?>);
                                    </script>
                                </code>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="d-flex flex-column px-3"><b class="h5">BattleCreek Coffee</b> <a href="#"
                                                                                                 class="h5 text-primary">C-770</a>
                    </div>
                    <div class="ml-auto"><b class="h5">$80.9</b></div>
                </div>
                <div class="my-3"><input type="text" class="w-100 form-control text-center"
                                         placeholder="Gift Card or Promo Card"></div>
                <div class="d-flex align-items-center">
                    <div class="display-5">Subtotal</div>
                    <div class="ml-auto font-weight-bold">$80.9</div>
                </div>
                <div class="d-flex align-items-center py-2 border-bottom">
                    <div class="display-5">Shipping</div>
                    <div class="ml-auto font-weight-bold">$12.9</div>
                </div>
                <div class="d-flex align-items-center py-2">
                    <div class="display-5">Total</div>
                    <div class="ml-auto d-flex">
                        <div class="text-primary text-uppercase px-3">usd</div>
                        <div class="font-weight-bold">$92.98</div>
                    </div>
                </div>
            </div>
            <p class="text-muted">Need help with an order?</p>
            <p class="text-muted"><a href="#" class="text-danger">Hotline:</a>+314440160 (International)</p>
            <div class="h4 pt-3"><span class="fas fa-shield-alt text-primary pr-2"></span> Security of your shopping
            </div>
            <div id="summary" class="bg-white rounded py-2 my-4">
                <div class="table-responsive">
                    <table class="table table-borderless w-75">
                        <tbody>
                        <tr class="text-muted">
                            <td>Battlecreek Coffee</td>
                            <td>:</td>
                            <td>$80.9</td>
                        </tr>
                        <tr class="text-muted">
                            <td>Code-770</td>
                            <td>:</td>
                            <td>770</td>
                        </tr>
                        <tr class="text-muted">
                            <td>Quantity</td>
                            <td>:</td>
                            <td>
                                <div class="d-flex align-items-center"><span class="fas fa-minus btn text-muted"></span>
                                    <span>2</span> <span class="fas fa-plus btn text-muted"></span></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="border-top py-2 d-flex align-items-center ml-2 font-weight-bold">
                    <div>Total</div>
                    <div class="ml-auto text-primary">USD</div>
                    <div class="px-2">$92.98</div>
                </div>
            </div>
            <div class="row pt-lg-3 pt-2 buttons mb-sm-0 mb-2">
                <div class="col-md-6">
                    <div class="btn text-uppercase">back to shopping</div>
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <div class="btn text-white ml-auto"><span class="fas fa-lock"></span> Continue to Shopping</div>
                </div>
            </div>
            <div class="text-muted pt-3" id="mobile"><span class="fas fa-lock"></span> Your information is save</div>
        </div>
    </div>
    <div class="text-muted"><span class="fas fa-lock"></span> Your information is save</div>
</div>