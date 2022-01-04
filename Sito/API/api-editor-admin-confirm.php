<?php

// Controllo admin
require_once '../bootstrap.php';
// Redirect a catalogo admin

if (isUserLoggedIn() && $dbh->isUserAdmin(getLoggedUserID())) {

    // Mode edit
    if (isset($_GET['mode']) && $_GET['mode'] == "edit") {
        $dbh->editProduct(
            $_POST["value"],
            $_POST["frame_color"],
            $_POST["width"],
            $_POST["title"],
            $_POST["height"],
            $_POST["padding"],
            $_POST["font_size"],
            $_POST["lineNumbers"],
            $_POST["language"],
            $_POST["theme"],
            $_POST["description"],
            $_POST["category"],
            $_POST["idProd"]);
        // Create a notification
        $dbh->createNotification("Product-Edit", "The Product has been successfully modified.", getLoggedUserID());


    }

    // Mode add
    if (isset($_GET['mode']) && $_GET['mode'] == "add") {
        $prodId = $dbh->createProduct(
            $_POST["value"],
            $_POST["frame_color"],
            $_POST["width"],
            $_POST["title"],
            $_POST["height"],
            $_POST["padding"],
            $_POST["font_size"],
            $_POST["lineNumbers"],
            $_POST["language"],
            $_POST["theme"]);
        $dbh->addProductToShowCase($prodId, 10, $_POST['description'], $_POST['category']);
        // Create a notification
        $dbh->createNotification("Product-Add", "The Product has been successfully added.", getLoggedUserID());

    }


} else {
    header("location: profile.php");
}


