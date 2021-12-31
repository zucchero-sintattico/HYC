<?php
require_once 'bootstrap.php';

if (isUserLoggedIn() && $dbh->isUserAdmin(getLoggedUserID())) {
    $templateParams['title'] = "HYC - EditorAdmin";
    $templateParams['name'] = "editor-adminTemplate.php";
    $templateParams['style'] = "style/editor.css";
    $templateParams['languages'] = $dbh->getLanguages();
    $templateParams['themes'] = $dbh->getThemes();
    $templateParams['categories'] = $dbh->getCategorie();

    $templateParams['js'] = array("script/editor/utils.js");

    if($_GET['mode'] == "edit"){
        $templateParams['product'] = ($dbh->getProductInShowCaseById($_GET["id"]))[0];
        $templateParams['mode'] = "edit";
    }
    if($_GET['mode'] == "add"){
        // Add a product
        $templateParams['mode'] = "add";
    }
} else {
    header("location: profile.php");
}


require("template/base.php");



