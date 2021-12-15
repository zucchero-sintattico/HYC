<?php
require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Home";
    //$templateParams["name"] = "indexTemplate.php";
    $templateParams["js"] = array("script/utility/utils.js","script/index/index.js", "script/filler/filler.js", "script/search/searchBar.js");
    $templateParams["style"] = "style/index.css";

require("template/base.php");

