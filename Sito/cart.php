<?php
require_once 'bootstrap.php';
$templateParams['title'] = "HYC - Cart";
$templateParams['style'] = "style/cart.css";
$templateParams['js'] = array("script/utility/filler.js");
$templateParams['name'] = "template/cartTemplate.php";

if (isUserLoggedIn()) {
    $templateParams['query'] = $dbh -> getProductsInCart(getLoggedUserID());
} else {
    header("location: login.php");
}
require("template/base.php");

