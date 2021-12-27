<div class="col-11">
    <div class="row justify-content-center">


        <div class="col text-center">
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <button class="dropdown-toggle btn btn-outline-secondary" type="button" data-toggle="collapse"
                            data-target="#collapseSetting"
                            aria-expanded="false" aria-controls="collapseSetting">Dimension Option
                    </button>
                </div>
            </div>


            <div class="collapse text-center" id="collapseSetting">
                <div class="row justify-content-center">

                    <div class="col align-content-center">
                        <label>Width(cm)</label>
                        <div class="col" id="width">
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="btn active border border-secondary" id="width30">
                                    <input type="radio" name="options" id="width30" value="100" checked> 100
                                </label>
                                <label class="btn border border-secondary">
                                    <input type="radio" name="options" id="width70" value="120"> 120
                                </label>
                                <label class="btn border border-secondary">
                                    <input type="radio" name="options" id="width100" value="150"> 150
                                </label>
                                <label class="btn border border-secondary">
                                    <input type="radio" name="options" id="width120" value="170"> 170
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col align-content-center">
                        <label>Height(cm)</label>
                        <div class="col" id="height">
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="btn active border border-secondary">
                                    <input type="radio" name="options" id="height30" value="100" checked>100
                                </label>
                                <label class="btn border border-secondary">
                                    <input type="radio" name="options" id="height70" value="120">120
                                </label>
                                <label class="btn border border-secondary">
                                    <input type="radio" name="options" id="height100" value="150">150
                                </label>
                                <label class="btn border border-secondary">
                                    <input type="radio" name="options" id="height120" value="170">170
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-center">
                    <label>FontSize</label>
                </div>
                <label class="btn">
                    <input type="number" value="<?php echo $templateParams["product"]["Dimensione_font"] ?>"
                           id="fontSize">
                </label>


            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <label>Title</label>
                    <input class="form-control form-control-lg text-center" type="text"
                           placeholder="<?php echo $templateParams["product"]["Titolo"] ?>">

                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-10 justify-content-center">
                    <label>Style</label>
                    <select class="custom-select" id="style">
                        <?php foreach ($templateParams['themes'] as $theme): ?>
                            <?php if ($theme['NomeTema'] == $templateParams["product"]["NomeTema"]): ?>
                                <option selected="selected"> <?php echo $theme['NomeTema']; ?></option>
                            <?php else: ?>
                                <option> <?php echo $theme['NomeTema']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10 justify-content-center">
                    <label>Language</label>
                    <select id="language" class="custom-select">
                        <?php foreach ($templateParams['languages'] as $language): ?>
                            <?php if ($language['NomeLinguaggio'] == $templateParams["product"]["NomeLinguaggio"]): ?>
                                <option selected="selected"> <?php echo $language['NomeLinguaggio']; ?></option>
                            <?php else: ?>
                                <option> <?php echo $language['NomeLinguaggio']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-10 justify-content-center">
                    <label>Code frame color</label>
                    <input class="custom-select" id="frame-color" type="color" value="#ff0000">
                </div>
            </div>
        </div>


        <!-- Console -->
        <div class="col justify-content-center">
            <div class="row justify-content-center">
                <code>
                    <script>
                        let quadro = new CodeSquare($('code').get(0));
                        quadro.getSquare();

                        quadro.updateStyle();
                        quadro.widthScale(350);
                        quadro.setText('<?php echo $templateParams["product"]["Codice"]; ?>');
                        if ($(window).width() < 700) {
                            quadro.widthScale($(window).width() - 20);
                        }
                    </script>
                </code>

            </div>
        </div>

    </div>


    <div class="row justify-content-end">
        <div class="col-4">
            <button class="bnt" type="button" <?php if(!isUserLoggedIn()){echo "disabled";}; ?>>Add to Cart</button>
        </div>
    </div>

</div>