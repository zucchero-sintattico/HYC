<?php

require_once 'bootstrap.php';

if (isUserLoggedIn() && $dbh->isUserAdmin(getLoggedUserID())) {
    $templateParams['title'] = "HYC - EditorAdmin";
    $templateParams['name'] = "editorTemplate.php";
    $templateParams['style'] = "style/editor.css";
    $templateParams['languages'] = $dbh->getLanguages();
    $templateParams['themes'] = $dbh->getThemes();
    $templateParams['js'] = array("script/editor/utils.js");

    if($_GET['mode'] == "edit"){
        $templateParams["product"] = ($dbh->getProductById($_GET["id"]))[0];
    }
    if($_GET['mode'] == "add"){
        // Add a product
    }
} else {
    header("location: profile.php");
}


require("template/base.php");



