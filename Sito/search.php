<?php
    require_once 'bootstrap.php';
    $templateParams["title"] = "HYC - Search";
    $templateParams['style'] = "style/index.css";
    $templateParams["js"] = array("script/search/searchBar.js","script/utility/filler.js","script/utility/utils.js", "script/pages/searchPage.js");
    require("template/base.php");