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
                                        quadro<?php echo $articolo["IdProd"] ?>.setText('<?php echo $articolo["Codice"] ?>');
                                    </script>
                                </code>
                            </div>
                            <div class="row">
                                <p class="col-12 font-weight-bold">Price: €<?php echo getPrice($articolo["Altezza"], $articolo["Larghezza"]) ?></p>
                            </div>
                        </article>
                    </a>
                    <div class="row justify-content-center my-4">
                        <p> Delete Product </p>
                        <script>$("main > section > div.container-fluid > div > div > div > p").on('click', function () {
                                console.log("chaimo");
                            removeProdAndRefreshCart(<?php echo $articolo["IdProd"] ?>);

                            });</script>
                      <!--  <a href="../removedArticleFromCart.php?IdProd=<?php echo $articolo["IdProd"] ?>" class="text-danger">Delete from cart</a> -->
                    </div>

                </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php if(count($templateParams["query"]) > 0) : ?>
    <div class="row">
        <div class="col-12 text-center">
            <a href="../checkout.php?id=<?php echo getLoggedUserID() ; ?>">Checkout</a>
        </div>
    </div>
    <?php endif; ?>

</section>