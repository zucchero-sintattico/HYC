<?php
    require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Search";
    $templateParams['style'] = "style/index.css";
    $templateParams["js"] = array("script/filler/filler.js","script/utility/utils.js", "script/search/searchPage.js");
    require("template/base.php");