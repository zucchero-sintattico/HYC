<?php
require_once '../bootstrap.php';

if(isUserLoggedIn() && isset($_POST["title"])){
    $data = $_POST["value"];
    $product_id = $dbh->createProduct($_POST["value"],
        $_POST["frame_color"],
        $_POST["width"],
        $_POST["title"],
        $_POST["height"],
        $_POST["padding"],
        $_POST["font_size"],
        $_POST["lineNumbers"],
        $_POST["language"],
        $_POST["theme"]);
    $dbh->addProductInCart($product_id, getLoggedUserID());
    echo "success";
}


