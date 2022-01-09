<div class="col justify-content-center">
    <div class="row justify-content-center">
        <h1>Admin Page</h1>
    </div>
    <div class="row justify-content-center">
        <section>
            <a href="../editor-admin.php?mode=add">Add a Square</a>
        </section>
    </div>


    <section>
        <h2>Product List</h2>
        <div class="container">
            <div class="row">
                <script>quadri = []</script>
                <?php foreach ($templateParams["products"] as $i => $square): ?>
                    <div class="m-3 col">
                        <div id="square<?php echo $i ?>">
                            <script>
                                quadri.push(new CodeSquare(document.querySelector('#square<?php echo $i ?>')));
                                quadri[<?php echo $i?>].getSquare();
                                quadri[<?php echo $i?>].setWidth(<?php echo $square['Larghezza'] ?>);
                                quadri[<?php echo $i?>].setStyle('<?php echo $square['NomeTema'] ?>');
                                quadri[<?php echo $i?>].setHeight(<?php echo $square['Altezza'] ?>);
                                quadri[<?php echo $i?>].widthScale(270);
                                quadri[<?php echo $i?>].setFramecolor('<?php echo $square['Colore_frame'] ?>')
                                quadri[<?php echo $i?>].updateStyle();
                                quadri[<?php echo $i?>].setText(<?php echo $square['Codice'] ?>);
                                quadri[<?php echo $i?>].disable();

                                /**validation code**/
                                $("span").removeAttr("cm-text");
                                $(".CodeMirror textarea").attr("title", "code main frame area").removeAttr("autocorrect");
                                $(".CodeMirror span").removeAttr("cm-text");
                                $(".CodeMirror div").removeAttr("cm-not-content").removeAttr("autocorrect");

                            </script>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><?php echo $square['Titolo'] ?></p>
                                <p><?php echo $square['Altezza'] ?>x<?php echo $square['Larghezza'] ?></p>
                                <a href="../editor-admin.php?mode=edit&id=<?php echo $square['IdProd'] ?>">Edit</a>
                                <label> | </label>
                                <a href="../editor-admin.php?mode=del&id=<?php echo $square['IdProd'] ?>">Delete</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
