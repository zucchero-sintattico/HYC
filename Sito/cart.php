<?php
require_once 'bootstrap.php';
$templateParams["title"] = "HYC - Cart";
$templateParams["name"] = "cartTemplate.php";
$templateParams['style'] = "style/cart.css";
if (isUserLoggedIn()) {
    $templateParams['query'] = $dbh->getArticleInCart(getLoggedUserID());
} else {
    header("location: login.php");
}
require("template/base.php");

