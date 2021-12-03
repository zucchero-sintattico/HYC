<?php
    require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Home";
    $templateParams["name"] = "indexTemplate.php";
    $templateParams['style'] = "style/index.css";
    $templateParams["languages"] = $dbh->getLanguages();
    require("template/base.php");

