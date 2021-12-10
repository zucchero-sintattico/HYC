<!-- Title -->
<div class="row">
    <h1>Search results for "<?php echo $_GET["key"] ;?>"</h1>
</div>
<!-- Articles -->
<div class="row justify-content-center">
    <?php foreach($templateParams["query"] as $articolo) :?>
        <div class="col-10 col-md-5">
            <a href="../editor.php?id=<?php echo $articolo["IdProd"] ?>">
                <article>
                    <div class="col-12">
                        <h2><?php echo $articolo["Titolo"] ?></h2>
                    </div>
                    <div class="row justify-content-center">
                        <code id="code<?php echo $articolo["IdProd"] ?>">
                            <script>
                                let quadro<?php echo $articolo["IdProd"] ?> = new CodeSquare(document.querySelector('#code<?php echo $articolo["IdProd"] ?>'));
                                quadro<?php echo $articolo["IdProd"] ?>.getSquare();
                                quadro<?php echo $articolo["IdProd"] ?>.setText('<?php echo $articolo["Codice"] ?>');
                                quadro<?php echo $articolo["IdProd"] ?>.setWidth(<?php echo $articolo["Larghezza"] ?>);
                                quadro<?php echo $articolo["IdProd"] ?>.setHeight(<?php echo $articolo["Altezza"] ?>);
                                quadro<?php echo $articolo["IdProd"] ?>.setPadding(<?php echo $articolo["Padding"] ?>);
                                quadro<?php echo $articolo["IdProd"] ?>.setlineNumbers(<?php echo $articolo["Mostra_numero_linee"] ?>);
                                quadro<?php echo $articolo["IdProd"] ?>.setFramecolor(<?php echo $articolo["Colore_frame"] ?>)
                                quadro<?php echo $articolo["IdProd"] ?>.setFontSize(<?php echo $articolo["Dimensione_font"] ?>);
                                quadro<?php echo $articolo["IdProd"] ?>.setLanguages('<?php echo $articolo["NomeLinguaggio"] ?>');
                                quadro<?php echo $articolo["IdProd"] ?>.setStyle('<?php echo $articolo["NomeTema"] ?>');
                                quadro<?php echo $articolo["IdProd"] ?>.disable();
                                quadro<?php echo $articolo["IdProd"] ?>.updateStyle();
                            </script>
                        </code>
                    </div>
                    <div class="row">
                        <p class="col-12"><?php echo $articolo["Descrizione"] ?></p>
                    </div>
                </article>
            </a>
        </div>
    <?php endforeach ?>
</div>
