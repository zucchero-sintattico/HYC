<?php
    require_once 'bootstrap.php';
    $templateParams['title'] = "HYC - Catalog";
    $templateParams['name'] = "catalogTemplate.php";
    $templateParams['style'] = "style/catalog.css";
    if($_GET['type'] == "c"){
        $templateParams['query'] = $dbh -> getProductByCategory($_GET['id']);
        $templateParams['argument'] = $templateParams['query'][0]['Tipo'];
    }
    if(strcmp($_GET['type'], "l")){
        $templateParams['query'] = $dbh -> getArticleByLanguage($_GET['id']);
        $templateParams['argument'] = var_dump($templateParams['query']);
    }
    require("template/base.php");
