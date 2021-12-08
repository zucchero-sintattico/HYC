<!-- Title -->
<div class="row">
    <h1>Search results for "<?php echo $_GET["key"] ;?>"</h1>
</div>
<!-- Articles -->
<div class="row justify-content-center">
    <?php foreach($templateParams["query"] as $articolo) :?>
        <div class="col-10 col-md-5">
            <a href="../editor.php?id=<?php echo $articolo["idProd"] ?>">
                <article>
                    <div class="col-12">
                        <h2><?php echo $articolo["titolo"] ?></h2>
                    </div>
                    <div class="row justify-content-center">
                        <code id="code<?php echo $articolo["idProd"] ?>">
                            <script>
                                let quadro<?php echo $articolo["idProd"] ?> = new CodeSquare(document.querySelector('#code<?php echo $articolo["idProd"] ?>'));
                                quadro<?php echo $articolo["idProd"] ?>.getSquare();
                                quadro<?php echo $articolo["idProd"] ?>.setText('<?php echo $articolo["codice"] ?>');
                                quadro<?php echo $articolo["idProd"] ?>.setWidth(<?php echo $articolo["larghezza"] ?>);
                                quadro<?php echo $articolo["idProd"] ?>.setHeight(<?php echo $articolo["altezza"] ?>);
                                quadro<?php echo $articolo["idProd"] ?>.setPadding(<?php echo $articolo["padding"] ?>);
                                quadro<?php echo $articolo["idProd"] ?>.setlineNumbers(<?php echo $articolo["mostra_numero_linee"] ?>);
                                quadro<?php echo $articolo["idProd"] ?>.setFramecolor(<?php echo $articolo["colore_frame"] ?>)
                                quadro<?php echo $articolo["idProd"] ?>.setFontSize(<?php echo $articolo["dimensione_font"] ?>);
                                quadro<?php echo $articolo["idProd"] ?>.setLanguages('<?php echo $articolo["NomeLinguaggio"] ?>');
                                quadro<?php echo $articolo["idProd"] ?>.setStyle('<?php echo $articolo["NomeTema"] ?>');
                                quadro<?php echo $articolo["idProd"] ?>.disable();
                                quadro<?php echo $articolo["idProd"] ?>.updateStyle();
                            </script>
                        </code>
                    </div>
                    <div class="row">
                        <p class="col-12"><?php echo $articolo["descrizione"] ?></p>
                    </div>
                </article>
            </a>
        </div>
    <?php endforeach ?>
</div>
