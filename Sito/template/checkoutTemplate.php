<div class="wrapper">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
            <div class="mobile h5">Shipping Address & Payment</div>
            <div id="details" class="bg-white rounded pb-5">
                <div class="h6 text-center">Shipping address</div>
                <form class="needs-validation">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"> <label>City</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="Cesena" disabled></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"> <label>Zip code</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="47522" disabled> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"> <label>Address</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value=" Via Cesare Pavese, 50, Cesena FC" disabled> </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"> <label>State</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="Italy" disabled> </div>
                            </div>
                        </div>
                    </div>
                    </select>
                </form>
            </div>
            <div class="mobile h5">Payment</div>
            <div id="details" class="bg-white rounded pb-5">
                <div class="h6 text-center">Payment</div>
                <form>
                    <div class="form-group"> <label class="text-muted">Name on card</label> <input type="text" placeholder="Insert name on card" class="form-control"> </div>
                    <div class="form-group"> <label class="text-muted">Number of card</label> <input type="number" placeholder="XXXX-XXXX-XXXX-XXXX" class="form-control"> </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"> <label>Expiration</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="month" placeholder="Insert expiration date" required></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"> <label>CVV</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="password" placeholder="Insert CVV" required> </div>
                            </div>
                        </div>
                    </div>

                    </select>
                </form>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
            <div id="cart" class="bg-white rounded">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h6">Cart Summary</div>
                    <div class="h6"> <a href="../cart.php">Edit</a> </div>
                </div>
                <?php foreach($templateParams['query'] as $articolo) : ?>
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 border-bottom">
                        <div class="item pr-2">
                            <!-- Code -->
                            <div class="row">
                                <code id="quadro<?php echo $articolo["IdProd"] ?>">
                                    <script>
                                        let quadro<?php echo $articolo["IdProd"] ?> = new CodeSquare(document.querySelector('#quadro<?php echo $articolo["IdProd"] ?>'));
                                        quadro<?php echo $articolo["IdProd"] ?>.getSquare();
                                        quadro<?php echo $articolo["IdProd"] ?>.setWidth(<?php echo $articolo["Larghezza"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setHeight(<?php echo $articolo["Altezza"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setPadding(<?php echo $articolo["Padding"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setFramecolor("<?php echo $articolo["Colore_frame"] ?>");
                                        quadro<?php echo $articolo["IdProd"] ?>.setFontSize(<?php echo $articolo["Dimensione_font"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setLanguages('<?php echo $articolo["NomeLinguaggio"] ?>');
                                        quadro<?php echo $articolo["IdProd"] ?>.setStyle('<?php echo $articolo["NomeTema"] ?>');
                                        quadro<?php echo $articolo["IdProd"] ?>.disable();
                                        quadro<?php echo $articolo["IdProd"] ?>.widthScale(100);
                                        quadro<?php echo $articolo["IdProd"] ?>.updateStyle();
                                        quadro<?php echo $articolo["IdProd"] ?>.setText(<?php echo $articolo["Codice"] ;?>);
                                    </script>
                                </code>
                            </div>
                        </div>
                    <div class="d-flex flex-column px-3"> <b class="h5"><?php echo $articolo['Titolo'] ; ?></b> <a href="#" class="h5 text-primary">quadro<?php echo $articolo["IdProd"] ?></a> <p>x<?php echo $articolo["Quantità"] ;?></p> </div>
                    <div class="ml-auto"> <b class="h5">$<?php echo getPrice($articolo['Altezza'], $articolo['Larghezza'], $articolo['Quantità']);?></b> </div>
                </div>
                <?php endforeach?>
                <div class="my-3"> <input type="text" class="w-100 form-control text-center" placeholder="Gift Card or Promo Card"> </div>
                <div class="d-flex align-items-center">
                    <div class="display-5">Subtotal</div>
                    <div class="ml-auto font-weight-bold">$<?php echo $templateParams['totPrice'] ;?></div>
                </div>
                <div class="d-flex align-items-center py-2 border-bottom">
                    <div class="display-5">Shipping</div>
                    <div class="ml-auto font-weight-bold">$<?php echo $templateParams['shipping'] ?></div>
                </div>
                <div class="d-flex align-items-center py-2">
                    <div class="display-5">Total</div>
                    <div class="ml-auto d-flex">
                        <div class="text-primary text-uppercase px-3">usd</div>
                        <div class="font-weight-bold">$<?php echo $templateParams['totPrice'] + $templateParams['shipping'] ;?></div>
                    </div>
                </div>
            </div>
            <p class="text-muted">Need help with an order?</p>
            <p class="text-muted"><a href="#" class="text-danger">Hotline:</a>+3667154519 (International)</p>

            <div class="row pt-lg-3 pt-2 buttons mb-sm-0 mb-2">
                <div class="col-md-6">
                    <div class="btn text-uppercase">back to shopping</div>
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <div class="btn text-white ml-auto"> <span class="fas fa-lock"></span> Process Order</div>
                </div>
            </div>
            <div class="text-muted pt-3" id="mobile"> <span class="fas fa-lock"></span> Your information is save </div>
        </div>
    </div>
    <div class="text-muted"> <span class="fas fa-lock"></span> Your information is save </div>
</div>
