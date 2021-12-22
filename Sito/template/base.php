<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- Import CodeMirror -->
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.js"></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/javascript/javascript.min.js"></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/python/python.min.js"></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.42.2/mode/clike/clike.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/monokai.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/base16-light.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
    <?php header('Access-Control-Allow-Origin: *'); ?>
    <?php
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
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
            <div class="col">
                <a href="../index.php">
                    <img src="../img/logos/logo.png">
                </a>
            </div>
            <div class="col">
                <label><?php
                    if (isUserLoggedIn()) {
                        echo "<script>let userId =".getLoggedUserID().";</script>";
                        echo "Hi ".getNameUserID()."\n";
                        echo "<a href='../logout.php'>LogOut</a>";
                    } else {
                        echo "<script> let userId = null </script>";
                        echo "<a href='../login.php'>LogIn</a>";
                    } ?></label>
            </div>
        </header>



    </div>

    <!-- Menu -->
    <div class="row ">
        <div class="col-12">
            <nav>
                <ul>
                    <li>
                        <a href="../index.php">
                            <img src="../img/nav/home.svg" alt=""/>
                            <p>Home</p>
                        </a>
                    </li><li>
                        <a href="/cart.php">
                            <img src="../img/nav/cart2.svg" alt=""/>
                            <p>Cart</p>
                        </a>
                    </li><li>
                        <a href="#" id="search">
                            <img src="../img/nav/search2.svg" alt=""/>
                            <p>Search</p>
                        </a>
                    </li><li>
                        <a href="/profile.php">
                            <img src="../img/nav/user2.svg" alt=""/>
                            <p>Profile</p>
                        </a>
                    </li><li>
                        <a href="#" >
                            <img src="../img/nav/bell.svg" alt=""/>
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
                <label for="key">Search</label>
                <input type="text" name="key" id ="searchField" autocomplete="off" placeholder="Search you article..."/>
                <input type="submit" value="➜">
            </form>

        </div>
    </div>

    <!-- Main -->

    <div class="alert alert-success collapse" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> You have been signed in successfully!
    </div>

    <main>
        <?php
        if(isset($templateParams["name"])){
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
                    <a style="width: 20%" href="https://www.instagram.com/zucchero_sintattico/" class="mr-2 me-4 text-reset">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="https://github.com/zucchero-sintattico" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
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
                            <i class="fas fa-gem me-3"></i> Hang Your Code
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
                            <a href="../index.php" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="../cart.php" class="text-reset">Cart</a>
                        </p>
                        <p>
                            <a href="../profile.php" class="text-reset">Profile</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i>  Via Cesare Pavese, 50, Cesena FC</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@hyc.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 39 3667154519</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
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
            $("body > div > div:nth-child(3) > div > form > input:first-child").trigger('focus');
        });
    });
</script>
</body>

</html>