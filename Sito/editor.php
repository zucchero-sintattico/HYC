<?php
require_once 'bootstrap.php';
$templateParams['title'] = "HYC - Editor";
$templateParams['name'] = "editorTemplate.php";
$templateParams['style'] = "style/editor.css";
$templateParams['languages'] = $dbh->getLanguages();
$templateParams["themes"] = $dbh->getThemes();
$templateParams["product"] = ($dbh->getProductById($_GET["id"]))[0];
$templateParams["productDescription"] = ($dbh->getProductDescriptionById($_GET["id"]))[0]["Descrizione"];
$templateParams["js"] = array("script/editor/utils.js", "script/utility/utils.js");

require("template/base.php");

