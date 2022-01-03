<?php
require_once 'bootstrap.php';

if (isUserLoggedIn() && $dbh->isUserAdmin(getLoggedUserID())) {
    $templateParams['title'] = "HYC - EditorAdmin";
    $templateParams['name'] = "editor-adminTemplate.php";
    $templateParams['style'] = "style/editor.css";
    $templateParams['languages'] = $dbh->getLanguages();
    $templateParams['themes'] = $dbh->getThemes();
    $templateParams['categories'] = $dbh->getCategorie();
    $templateParams['js'] = array("script/editorAdmin/editorAdmin.js");

    if(isset($_GET['id'])){
        $templateParams['id'] = $_GET['id'];
    }

    if($_GET['mode'] == "edit"){
        $templateParams['product'] = ($dbh->getProductInShowCaseById($_GET["id"]))[0];
        $templateParams['mode'] = "edit";
    }
    if($_GET['mode'] == "add"){
        // Add a product
        $templateParams['product'] = [
            "Larghezza" => 100,
            "Altezza" => 100,
            "Titolo" => "",
            "Colore_frame" => "red",
            "NomeTema" => "midnight",
            "Padding" => 3,
            "Linguaggio" => "clike",
            "IdCategoria" => 1,
            "Descrizione" => "",
            "Codice" => "``",
            "Dimensione_font" => 4
        ];
        $templateParams['mode'] = "add";
    }
    if($_GET['mode'] == 'del'){
        $dbh -> removeProduct($_GET['id']);
        // Create a notification
        $dbh -> createNotification("Product-Del", "The Product has been successfully deleted.", getLoggedUserID());
        header("location: admin.php");
    }
} else {
    header("location: profile.php");
}


require("template/base.php");



