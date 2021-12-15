<?php
require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Home";
    //$templateParams["name"] = "indexTemplate.php";
    $templateParams["js"] = array("script/utility/utils.js","script/pages/index.js", "script/utility/filler.js", "script/search/searchBar.js");
    $templateParams["style"] = "style/index.css";

require("template/base.php");

