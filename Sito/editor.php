<?php
require_once 'bootstrap.php';
$templateParams['title'] = "HYC - Editor";
$templateParams['name'] = "editorTemplate.php";
$templateParams['style'] = "style/editor.css";
$templateParams['languages'] = $dbh->getLanguages();
$templateParams["themes"] = $dbh->getThemes();
$templateParams["js"] = array("script/editor.js");
require("template/base.php");
