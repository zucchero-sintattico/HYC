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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
    <script src="../script/CodeSquare.js"></script>
    <script src="../script/searchToggle.js"></script>


    <link rel="stylesheet" href="../style/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $templateParams['style'] ?>">
    <link rel="shortcut icon" href="../img/icon/favicon.ico">
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

            <div class="col-8">
                <header class="py-2">
                <h1> H.Y.C.</h1>
                <h2>hang your code</h2>
                </header>
            </div>

            <div class="col-4 text-right">
                <label><?php
                    if (isUserLoggedIn()) {
                        echo "<a href='/logout.php'>LogOut</a>";
                    } else {
                        echo "<a href='../login.php'>LogIn</a>";
                    } ?></label>
            </div>

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
                        <a href="#">
                            <img src="../img/nav/bell.svg" alt=""/>
                            <p>Notifications</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/search.php">
                <input type="text" name="key" placeholder="Search you article..."/>
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- Main -->
    <main>
        <?php
        if(isset($templateParams["name"])){
            require($templateParams["name"]);
        }
        ?>
    </main>
</div>

</body>

</html>