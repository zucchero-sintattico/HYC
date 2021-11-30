<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/javascript/javascript.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/python/python.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/monokai.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/base16-light.min.css">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/code.css">
    <script src="script/CodeSquare.js"></script>
    <script src="script/editToggles.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <title><?php echo $templateParams["title"]; ?></title>
</head>
<body>
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
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <img src="img/cart.svg" alt="" /><p>Cart</p>
                    </a>
                </li><li >
                    <a href="#">
                        <img src="img/user.svg" alt=""/><p>Profile</p>
                    </a>
                </li><li>
                    <a href="#">
                        <img src="img/search.svg" alt=""/><p>Search</p>
                    </a>
                </li><li>
                    <a href="#">
                        <img src="img/settings.svg" alt=""/><p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <main>
        <?php
            require($templateParams["name"]);
        ?>
    </main>
</div>

</body>
</html>