<?php
    require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Search";
    $templateParams["name"] = "searchTemplate.php";
    $templateParams['style'] = "style/catalog.css";
    $templateParams['query'] = $dbh -> getArticleByName($_GET["key"]);
    require("template/base.php");