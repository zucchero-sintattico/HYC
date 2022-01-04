<section>
    <!-- Title -->
    <header class="text-center">
        <h1>Cart</h1>
    </header>
    <!-- Articles -->
    <div class="container-fluid">
        <div class="row flex-row justify-content-center">
            <?php foreach($templateParams["query"] as $articolo) :?>
                <div class="col-10 col-md-5">
                    <a href="../editor.php?id=<?php echo $articolo["IdProd"] ?>">
                        <article>
                            <div class="col-12">
                                <h2><?php echo $articolo["Titolo"] ?></h2>
                            </div>
                            <div class="row justify-content-center">
                                <code id="quadro<?php echo $articolo["IdProd"] ?>">
                                    <script>
                                        let quadro<?php echo $articolo["IdProd"] ?> = new CodeSquare(document.querySelector('#quadro<?php echo $articolo["IdProd"] ?>'));
                                        quadro<?php echo $articolo["IdProd"] ?>.getSquare();
                                        quadro<?php echo $articolo["IdProd"] ?>.setWidth(<?php echo $articolo["Larghezza"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setHeight(<?php echo $articolo["Altezza"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setPadding(<?php echo $articolo["Padding"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setFramecolor('<?php echo $articolo["Colore_frame"] ?>');
                                        quadro<?php echo $articolo["IdProd"] ?>.setFontSize(<?php echo $articolo["Dimensione_font"] ?>);
                                        quadro<?php echo $articolo["IdProd"] ?>.setLanguages('<?php echo $articolo["NomeLinguaggio"] ?>');
                                        quadro<?php echo $articolo["IdProd"] ?>.setStyle('<?php echo $articolo["NomeTema"] ?>');
                                        quadro<?php echo $articolo["IdProd"] ?>.disable();
                                        quadro<?php echo $articolo["IdProd"] ?>.widthScale(300);
                                        quadro<?php echo $articolo["IdProd"] ?>.updateStyle();
                                        quadro<?php echo $articolo["IdProd"] ?>.setText(<?php echo $articolo["Codice"] ?>);
                                    </script>
                                </code>
                            </div>
                            <div class="row">
                                <p class="col-12 font-weight-bold">Price: € <?php echo getPrice($articolo["Altezza"], $articolo["Larghezza"], $articolo["Quantità"]) ?></p>
                            </div>
                        </article>
                    </a>
                    <div class="row justify-content-center mt-2">
                        <label for="quantity<?php echo $articolo["IdProd"]; ?>">Quantity:</label><input id="quantity<?php echo $articolo["IdProd"]; ?>" type="number" min="1" max="" name="quantity" value="<?php echo $articolo["Quantità"];?>" title="Qty" class="input-text text-center">
                    </div>
                    <div class="row justify-content-center mt-2 mb-4">
                        <a href="#" class="text-danger" id="delete<?php echo $articolo["IdProd"]; ?>"> Delete Product </a>
                        <script>
                            $(`main > section > div.container-fluid > div > div > div > #delete<?php echo $articolo["IdProd"] ?>`).on('click', function () {
                                removeProdAndRefreshCart(<?php echo $articolo["IdProd"] ?>);
                            });

                            $("#quantity<?php echo $articolo["IdProd"]; ?>").on('change keyup', function () {
                                if(parseInt($(this).val()) < 1){
                                    $(this).val(1);
                                }
                                changeProdQuantity(<?php echo $articolo["IdProd"]; ?>, $(this).val());
                            });

                        </script>
                     </div>

                </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php if(count($templateParams["query"]) > 0) : ?>
    <div class="row m-4">
        <div class="col-12 text-center">
            <a href="../checkout.php">Checkout</a>
        </div>
    </div>
    <?php endif; ?>

</section>