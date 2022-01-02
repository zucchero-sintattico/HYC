
<div class="col justify-content-center">
    <h1>Admin Page</h1>

    <section>
        <a href="../editor-admin.php?mode=add">Aggiungi Quadro</a>
    </section>

    <section>
        <h2>Product List</h2>
        <div class="container justify-content-end">
            <div class="row">
            <script>quadri=[]</script>
            <?php foreach ($templateParams["products"] as $i=>$square):?>
            <div class="m-3">
                <div id = "square<?php echo $i ?>">
                    <script>
                        quadri.push(new CodeSquare(document.querySelector('#square<?php echo $i ?>')));
                        quadri[<?php echo$i?>].getSquare();
                        quadri[<?php echo$i?>].updateStyle();
                        quadri[<?php echo$i?>].setWidth(<?php echo $square['Larghezza'] ?>);
                        quadri[<?php echo$i?>].setHeight(<?php echo $square['Altezza'] ?>);
                        quadri[<?php echo$i?>].widthScale(200);
                        quadri[<?php echo$i?>].setText(<?php echo $square['Codice'] ?>);
                        quadri[<?php echo$i?>].disable();


                    </script>
                </div>
                <div class="row justify-content-center">
                    <div class="coll">
                    <p>info varie</p>
                    <a href="#">edit | </a>
                    <a href="#">del</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
