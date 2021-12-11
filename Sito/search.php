<?php
require_once 'bootstrap.php';
$templateParams["title"] = "HYC - Search";
//$templateParams["name"] = "searchTemplate.php";
$templateParams["js"] = array("script/search/search.js");
$templateParams['style'] = "style/catalog.css";
require("template/base.php");