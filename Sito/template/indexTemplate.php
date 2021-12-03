<section>
    <header>
        <h1>Categories</h1>
    </header>

    <div class="container-fluid">
        <div class="row flex-row flex-nowrap">
            <div class="col-3 d-flex justify-content-center text-center">
                <div class="card card-block">
                    <img class="card-img-top" src="img/logos/videogame.png" alt="Card image cap">
                    <div class="class-footer mt-auto">
                        <p class="card-text">Videogames</p>
                    </div>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-center text-center">
                <div class="card card-block">
                    <img class="card-img-top" src="img/logos/pi.png" alt="Card image cap">
                    <div class="class-footer mt-auto">
                        <p class="card-text">Maths</p>
                    </div>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-center text-center">
                <div class="card card-block">
                    <img class="card-img-top" src="img/logos/fisica.png" alt="Card image cap">
                    <div class="class-footer mt-auto">
                        <p class="card-text">Physics</p>
                    </div>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-center text-center">
                <div class="card card-block">
                    <img class="card-img-top" src="img/logos/shuttle.png" alt="Card image cap">
                    <div class="class-footer mt-auto">
                        <p class="card-text">Aerospace</p>
                    </div>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-center text-center">
                <div class="card card-block">
                    <img class="card-img-top" src="img/logos/shuttle.png" alt="Card image cap">
                    <div class="class-footer mt-auto">
                        <p class="card-text">Aerospace</p>
                    </div>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-center text-center">
                <div class="card card-block">
                    <img class="card-img-top" src="img/logos/shuttle.png" alt="Card image cap">
                    <div class="class-footer mt-auto">
                        <p class="card-text">Aerospace</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section>
    <header>
        <h1>Most Popular</h1>
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
