<?php
require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Home";
    $templateParams["name"] = "indexTemplate.php";
    $templateParams["style"] = "style/index.css";
    $templateParams["categories"] = $dbh->getCategorie();
    $templateParams["mostPopularProducts"] = $dbh->getMostPopularProducts(2);
    $templateParams["languages"] = $dbh->getLanguages();
require("template/base.php");

