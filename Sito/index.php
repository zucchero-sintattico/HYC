<?php
require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Home";
    //$templateParams["name"] = "indexTemplate.php";
    $templateParams["js"] = array("script/index/utils.js","script/index/index.js");
    $templateParams["style"] = "style/index.css";


require("template/base.php");

