<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
          rel="stylesheet">
    <!--Notification setting-->

    <?php header('Access-Control-Allow-Origin: *'); ?>

    <!-- Import CodeMirror -->
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.css"/>
    <?php foreach ($templateParams["themes"] as $theme): ?>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/<?php echo $theme["NomeTema"]; ?>.css">
    <?php endforeach; ?>

    <?php foreach ($templateParams["languages"] as $language): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.42.2/mode/<?php echo $language["NomeLinguaggio"]; ?>/<?php echo $language["NomeLinguaggio"]; ?>.min.js"></script>
    <?php endforeach; ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Fine import CodeMirror -->

    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/code.css">
    <!--
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
    <script src="typeahead.min.js"></script>

    <script src="../script/searchBar.js"></script>
        -->
    <script src="../script/utility/CodeSquare.js"></script>
    <!--   <script src="../script/search/searchBar.js"></script> -->
    <script src="../script/utility/graphicsTemplate.js"></script>
    <script src="../script/utility/notifications.js"></script>


    <link rel="stylesheet" href="../style/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $templateParams['style'] ?>">
    <link rel="shortcut icon" href="../img/icon/favicon.ico">

    <?php
    if (isset($templateParams["js"])):
        foreach ($templateParams["js"] as $script):
            ?>
            <script src="<?php echo $script; ?>"></script>
        <?php
        endforeach;
    endif;
    ?>

    <title><?php echo $templateParams["title"]; ?></title>
</head>
<body>

<!-- Tutta la pagina qua dentro -->
<div class="container-fluid p-0 overflow-hidden">
    <!--Header-->
    <div class="row">
        <header>
            <div class="row">
                <div class="col-4">
                    <a href="../index.php">
                        <img src="../img/logos/logo.png" alt="Hang your Code Logo">
                    </a>
                </div>
                <div class="col-6">
                    <p>You select the code that inspires you the most.
                        We frame it and make sure it arrives to your home.
                    </p>
                </div>
                <div class="col-2 pr-5">
                    <label><?php
                        if (isUserLoggedIn()) {
                            echo "<script>let userId =" . getLoggedUserID() . ";</script>";
                            echo "<p>Hi " . getNameUserID() . "</p>";
                            echo "<a href='../logout.php'>LogOut</a>";
                        } else {
                            echo "<script> let userId = null </script>";
                            echo "<a href='../login.php'>LogIn</a>";
                        } ?></label>
                </div>
            </div>
        </header>
    </div>

    <!-- Menu -->
    <div class="row ">
        <div class="col-12">
            <nav>
                <ul>
                    <li>
                        <a href="../index.php" class="indexHref">
                            <img src="../img/nav/home.svg" alt="home Button"/>
                            <p>Home</p>
                        </a>
                    </li><li>
                        <a href="/cart.php" class="cartHref">
                            <img src="../img/nav/cart2.svg" alt="cart Button"/>
                            <p>Cart</p>
                        </a>
                    </li><li>
                        <a href="#" id="search" class="searchHref">
                            <img src="../img/nav/search2.svg" alt="search Button"/>
                            <p>Search</p>
                        </a>
                    </li><li>
                        <a href="/profile.php" class="profileHref">
                            <img src="../img/nav/user2.svg" alt="profile Button"/>
                            <p>Profile</p>
                        </a>
                    </li><li>
                        <a href="#">
                            <img src="../img/nav/bell.svg" alt="notifications Button"/>
                            <p id="notification">Notifications</p>
                        </a>

                    </li>

                </ul>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="../search.php">
                <label for="searchField">Search</label>
                <input type="text" name="key" id="searchField" autocomplete="off" placeholder="Search you article..."/>
                <input type="submit" value="➜">
            </form>

        </div>
    </div>

    <!-- Main -->

    <div id="popUpNotification"></div>

    <main>
        <?php
        if (isset($templateParams["name"])) {
            require($templateParams["name"]);
        }
        ?>
    </main>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block col-6">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div class="col-6">
                <a href="https://www.instagram.com/zucchero_sintattico/" title="instagram link"
                   class="mr-2 me-4 text-reset">
                    <span class="fa fa-instagram"></span>
                </a>

                <a href="https://github.com/zucchero-sintattico" title="github link" class="me-4 text-reset">
                    <span class="fab fa-github"></span>
                </a>
            </div>
            <!-- Right -->

        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <span class="fas fa-gem me-3"></span> Hang Your Code
                        </h6>
                        <p>
                            You select the code that inspires you the most.
                            We frame it and make sure it arrives to your home.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="../index.php" title="home link" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="../cart.php" title="cart link" class="text-reset">Cart</a>
                        </p>
                        <p>
                            <a href="../profile.php" title="profile link" class="text-reset">Profile</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><span class="fas fa-home me-3"></span> Via Cesare Pavese, 50, Cesena FC</p>
                        <p>
                            <span class="fas fa-envelope me-3"></span>
                            info@hyc.com
                        </p>
                        <p><span class="fas fa-phone me-3"></span> + 39 3667154519</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4">
            © 2021 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>
<script>
    $(document).on('ready', function () {
        $("body > div > div:nth-child(3) > div > form").hide();

        $("body > div > div:nth-child(2) > div > nav > ul > li:nth-child(3) > a").on("click", function (event) {
            event.preventDefault();
            $("body > div > div:nth-child(3) > div > form").slideToggle();
            $("#searchField").focus();
        });
    });
</script>
</body>

</html>