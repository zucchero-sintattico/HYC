<section>
    <header>
        <h1>Categories</h1>
    </header>

    <div class="container-fluid">
        <div class="row flex-row flex-nowrap">
            <?php foreach ($templateParams['categories'] as $categoria): ?>
                <a href="editor.php" class="col-3 d-flex justify-content-center text-center">

                    <div class="card card-block">
                        <img class="card-img-top" src="img/logos/<?php echo $categoria['Tipo'] ?>.png"
                             alt="Card image cap">
                        <div class="class-footer mt-auto">
                            <p class="card-text"><?php echo $categoria['Tipo'] ?></p>
                        </div>
                    </div>

                </a>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<section>
    <header>
        <h1>Most Popular Languages</h1>
    </header>

    <div class="container-fluid">
        <div class="row flex-row flex-nowrap">
            <?php foreach ($templateParams['languages'] as $language): ?>
                <a href="editor.php" class="col-3 d-flex justify-content-center text-center">

                    <div class="row justify-content-center">
                        <?php echo $language['NomeLinguaggio']; ?>
                    </div>

                </a>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<section>
    <header>
        <h1>Most Popular Codes</h1>
    </header>

    <div class="container-fluid">
        <div class="row flex-row flex-nowrap">
            <?php foreach ($templateParams['mostPopularProducts'] as $popularProduct): ?>
                <a href="#" class="col-3 d-flex justify-content-center text-center">

                        <code>
                            <script>
                                let quadro<?php echo $popularProduct["IdProd"] ?> = new CodeSquare($('script').last().parent().get(0));
                                quadro<?php echo $popularProduct["IdProd"] ?>.getSquare();
                                quadro<?php echo $popularProduct["IdProd"] ?>.setText('<?php echo $popularProduct["Codice"] ?>');
                                quadro<?php echo $popularProduct["IdProd"] ?>.setWidth(<?php echo $popularProduct["Larghezza"] ?>);
                                quadro<?php echo $popularProduct["IdProd"] ?>.setHeight(<?php echo $popularProduct["Altezza"] ?>);
                                quadro<?php echo $popularProduct["IdProd"] ?>.setPadding(<?php echo $popularProduct["Padding"] ?>);
                                quadro<?php echo $popularProduct["IdProd"] ?>.setFramecolor("<?php echo $popularProduct["Colore_frame"] ?>")
                                quadro<?php echo $popularProduct["IdProd"] ?>.setFontSize(<?php echo $popularProduct["Dimensione_font"] ?>);
                                quadro<?php echo $popularProduct["IdProd"] ?>.setLanguages('<?php echo $popularProduct["NomeLinguaggio"] ?>');
                                quadro<?php echo $popularProduct["IdProd"] ?>.setStyle('<?php echo $popularProduct["NomeTema"] ?>');
                                quadro<?php echo $popularProduct["IdProd"] ?>.disable();
                                quadro<?php echo $popularProduct["IdProd"] ?>.widthScale(300);
                                quadro<?php echo $popularProduct["IdProd"] ?>.updateStyle();
                            </script>
                        </code>

                </a>
            <?php endforeach; ?>
        </div>
    </div>

</section>
