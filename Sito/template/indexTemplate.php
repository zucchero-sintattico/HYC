<section>
    <header>
        <h1>Categories</h1>
    </header>

    <div class="container-fluid">
        <div class="row flex-row flex-nowrap">
            <?php foreach($templateParams['categories'] as $categoria): ?>
                <div class="col-3 d-flex justify-content-center text-center">

                    <div class="card card-block">
                        <img class="card-img-top" src="img/logos/<?php echo $categoria['Tipo']?>.png" alt="Card image cap">
                        <div class="class-footer mt-auto">
                            <p class="card-text"><?php echo $categoria['Tipo']?></p>
                        </div>
                    </div>

                </div>
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
            <?php foreach($templateParams['languages'] as $language): ?>
                <div class="col-3 d-flex justify-content-center text-center">

                    <div class="row justify-content-center">
                        <?php echo $language['NomeLinguaggio'];?>
                    </div>

                </div>
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
            <?php foreach($templateParams['mostPopularProducts'] as $popularProduct): ?>
                <div class="col-3 d-flex justify-content-center text-center">

                    <div class="row justify-content-center">
                        <?php echo $popularProduct['titolo'];?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>
