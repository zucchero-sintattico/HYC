<div class="row container-fluid justify-content-center ml-1">
    <div class="col-10 justify-content-center">

        <?php if (!isUserLoggedIn()) {
            echo "<div class='col justify-content-center'><label class='alert alert-warning'>If you are not logged in, any changes will be lost.
             <br> 
             <a href='../login.php'>Click to log in</a></label></div>";
        } ?>

        <div class="row justify-content-center">


            <div class="col text-center mt-4">
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
                                    <label class='btn<?php if ($templateParams["product"]["Larghezza"] == "100") {
                                        echo " active ";
                                    } ?> border border-secondary'> 100
                                        <input title="with of 100 cm" type="radio" name="options" id="width30"
                                               value="100" <?php if ($templateParams["product"]["Larghezza"] == "100") {
                                            echo " checked ";
                                        } ?> >
                                    </label>
                                    <label class='btn<?php if ($templateParams["product"]["Larghezza"] == "120") {
                                        echo " active ";
                                    } ?> border border-secondary'> 120
                                        <input title="with of 120 cm" type="radio" name="options" id="width70"
                                               value="120"<?php if ($templateParams["product"]["Larghezza"] == "120") {
                                            echo " checked ";
                                        } ?>>
                                    </label>
                                    <label class='btn<?php if ($templateParams["product"]["Larghezza"] == "150") {
                                        echo " active ";
                                    } ?> border border-secondary'>150
                                        <input title="with of 150 cm" type="radio" name="options" id="width100"
                                               value="150"<?php if ($templateParams["product"]["Larghezza"] == "150") {
                                            echo " checked ";
                                        } ?>>
                                    </label>
                                    <label class='btn<?php if ($templateParams["product"]["Larghezza"] == "170") {
                                        echo " active ";
                                    } ?> border border-secondary'>170
                                        <input title="with of 170 cm" type="radio" name="options" id="width120"
                                               value="170"<?php if ($templateParams["product"]["Larghezza"] == "170") {
                                            echo " checked ";
                                        } ?>>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col align-content-center">
                            <label>Height(cm)</label>
                            <div class="col" id="height">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class='btn<?php if ($templateParams["product"]["Altezza"] == "100") {
                                        echo " active ";
                                    } ?> border border-secondary'>
                                        <input title="height of 100 cm" type="radio" name="options" id="height30"
                                               value="100"<?php if ($templateParams["product"]["Altezza"] == "100") {
                                            echo " checked ";
                                        } ?>>100
                                    </label>
                                    <label class='btn<?php if ($templateParams["product"]["Altezza"] == "120") {
                                        echo " active ";
                                    } ?> border border-secondary'>
                                        <input title="height of 100 cm" type="radio" name="options" id="height70"
                                               value="120"<?php if ($templateParams["product"]["Altezza"] == "120") {
                                            echo " checked ";
                                        } ?>>120
                                    </label>
                                    <label class='btn<?php if ($templateParams["product"]["Altezza"] == "150") {
                                        echo " active ";
                                    } ?> border border-secondary'>
                                        <input title="height of 100 cm" type="radio" name="options" id="height100"
                                               value="150"<?php if ($templateParams["product"]["Altezza"] == "150") {
                                            echo " checked ";
                                        } ?>>150
                                    </label>
                                    <label class='btn<?php if ($templateParams["product"]["Altezza"] == "170") {
                                        echo " active ";
                                    } ?> border border-secondary'>
                                        <input title="height of 100 cm" type="radio" name="options" id="height120"
                                               value="170"<?php if ($templateParams["product"]["Altezza"] == "170") {
                                            echo " checked ";
                                        } ?>>170
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-center">
                        <label class="bnt">FontSize:
                            <input title="chose font size" type="range" max="12" min="1"
                                   value="<?php echo $templateParams["product"]["Dimensione_font"] ?>"
                                   id="fontSize">
                        </label>

                    </div>


                </div>

                <div class="row justify-content-center">
                    <div class="col-10 justify-content-center">
                        <label>Title</label>
                        <input title="write title" class="form-control form-control-lg text-center" id="title_form"
                               type="text"
                               placeholder="<?php echo $templateParams["product"]["Titolo"] ?>">

                    </div>
                </div>


                <div class="row justify-content-center">
                    <div class="col-10 justify-content-center">
                        <label>Style</label>
                        <select title="select style" class="custom-select" id="style">
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
                        <select title="select lenguage" id="language" class="custom-select">
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
                        <input title="select the frame color" class="custom-select" id="frame-color" type="color"
                               value="#ff0000">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10 justify-content-center">
                        <label>Category</label>
                        <select title="select category" class="custom-select" id="category">
                            <?php foreach ($templateParams['categories'] as $category): ?>
                                <?php if ($category['IdCategoria'] == $templateParams['product']['IdCategoria']): ?>
                                    <option selected="selected"
                                            value="<?php echo $category['IdCategoria']; ?>"> <?php echo $category['Tipo']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $category['IdCategoria']; ?>"> <?php echo $category['Tipo']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">
                        <label for="description_form">Description</label>
                        <textarea title="write description" class="form-control form-control-lg text-center"
                                  id="description_form" type="text"
                        ><?php echo $templateParams["product"]["Descrizione"] ?></textarea>
                    </div>
                </div>

            </div>


            <!-- Console -->
            <div class="justify-content-center mt-5">

                <div id="editor">
                    <script>
                        let quadro = new CodeSquare($('#editor').get(0));
                        quadro.getSquare();
                        quadro.updateStyle();
                        $(window).on('resize load', function () {
                            if ($(window).width() > 500) {
                                quadro.widthScale(500);
                            } else {
                                quadro.widthScale($(window).width() - 30);
                            }
                            quadro.setText(<?php echo $templateParams["product"]["Codice"]; ?>);
                        });
                        const toolBox = $("main > div.row.container-fluid.justify-content-center.ml-1 > div");
                        checkOnResize(toolBox, "col-10 justify-content-center", "col justify-content-center")


                    </script>


                </div>

            </div>

        </div>


    </div>


</div>
<div class="row justify-content-center">
    <div class="row-10 justify-content-end">
        <div class="col justify-content-end">
            <button class="bnt" id="submit">
                <?php
                if ($templateParams['mode'] == "edit") {
                    echo "Edit";
                }
                if ($templateParams['mode'] == "add") {
                    echo "Add";
                }; ?>
            </button>
            <script>
                $(document).on('ready', function () {

                    $('#submit').on('click', function () {
                        <?php
                        if($templateParams['mode'] == "edit"):
                        ?>
                        $.post("/API/api-editor-admin-confirm.php?mode=edit", quadro.toJSONInShowCase($('#description_form').val(), parseInt($('#category option:selected').val()), <?php echo $templateParams['id'];?>), function (data) {
                            window.location.replace("../admin.php")
                        });
                        <?php
                        endif;
                        ;?>

                        <?php
                        if($templateParams['mode'] == "add"):
                        ?>
                        $.post("/API/api-editor-admin-confirm.php?mode=add", quadro.toJSONInShowCase($('#description_form').val(), parseInt($('#category option:selected').val()), 0), function (data) {
                            window.location.replace("../admin.php")
                        });
                        <?php
                        endif;
                        ;?>

                    });

                });
            </script>
        </div>
    </div>
</div>