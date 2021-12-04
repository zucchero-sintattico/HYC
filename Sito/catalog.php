<?php
    require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Catalog";
    $templateParams["name"] = "catalogTemplate.php";
    $templateParams['style'] = "style/catalog.css";
    $templateParams['query'] = $dbh -> getProductByCategory($_GET["id"]);
    require("template/base.php");