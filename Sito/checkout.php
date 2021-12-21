<?php

require_once 'bootstrap.php';
$templateParams['title'] = "HYC - Cart";
$templateParams['style'] = "style/checkout.css";
$templateParams['name'] = "template/checkoutTemplate.php";
$templateParams['prices'] = [];
$templateParams['shipping'] = 10;
$templateParams['js'] = array("script/pages/checkout.js");

if (isUserLoggedIn()) {
    $templateParams['query'] = $dbh->getArticleInCart(getLoggedUserID());
    // calcolo prezzo tot
    $sum = 0;
    $i = 0;
    foreach ($templateParams['query'] as $articolo){
        $sum = $sum + getPrice($articolo['Altezza'], $articolo['Larghezza']);
        $i = $i + 1;
    }
    $templateParams['totPrice'] = $sum;
} else {
    header("location: login.php");
}
require("template/base.php");



