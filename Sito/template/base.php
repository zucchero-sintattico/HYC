<!doctype html>
<html lang="it">
<head>
    <title><?php echo $templateParams["title"]; ?></title>
</head>
<body>
<header>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>

    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/javascript/javascript.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/python/python.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/monokai.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/base16-light.min.css">
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/code.css">
    <script src="../script/CodeSquare.js"></script>
    <script src="../script/editToggles.js"></script>
    <link rel="stylesheet" href="../style/base.css">
    <link rel="icon" href="../img/logos/hangCode.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $templateParams['style'] ?>">
</header>

<!-- Tutta la pagina qua dentro -->
<div class="container-fluid p-0 overflow-hidden">
    <!--Header-->
    <div class="row">
        <div class="col-12">
            <header class="py-2">
                <h1> H.Y.C.</h1>
                <h2>hang your code</h2>
            </header>
        </div>
    </div>
    <!-- Menu -->
    <div class="row ">
        <div class="col-12">
            <nav>
                <ul>
                    <li>
                        <a href="/cart.php">
                            <img src="../img/nav/cart.svg" alt=""/>
                            <p>Cart</p>
                        </a>
                    </li><li>
                        <a href="/profile.php">
                            <img src="../img/nav/user.svg" alt=""/>
                            <p>Profile</p>
                        </a>
                    </li><li>
                        <a href="#">
                            <img src="../img/nav/search.svg" alt=""/>
                            <p>Search</p>
                        </a>
                    </li><li>
                        <a href="#">
                            <img src="../img/nav/bells.png" alt=""/>
                            <p>Notifications</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Main -->
    <main>
        <?php
        require($templateParams["name"]);
        ?>
    </main>
</div>

</body>

</html>
