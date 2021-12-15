<?php
require_once 'bootstrap.php';
$templateParams['title'] = "HYC - Cart";
$templateParams['style'] = "style/index.css";
$templateParams['name'] = "template/cartTemplate.php";
if (isUserLoggedIn()) {
    $templateParams['query'] = $dbh -> getArticleInCart(getLoggedUserID());
} else {
    header("location: login.php");
}
require("template/base.php");

