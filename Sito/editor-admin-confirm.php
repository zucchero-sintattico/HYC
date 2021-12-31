<?php

// Controllo admin
require_once 'bootstrap.php';
// Redirect a catalogo admin
header("location: admin.php");
if (isUserLoggedIn() && $dbh->isUserAdmin(getLoggedUserID())) {

    // Mode edit
    if(isset($_GET['mode']) && $_GET['mode'] == "edit"){

    }

    // Mode add
    if(isset($_GET['mode']) && $_GET['mode'] == "add"){
        $prodId = $dbh -> createProduct();
    }


} else {
    header("location: profile.php");
}


