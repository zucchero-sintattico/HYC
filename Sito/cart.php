<?php
require_once 'bootstrap.php';
$templateParams["title"] = "HYC - Cart";
$templateParams["name"] = "cartTemplate.php";
$templateParams['style'] = "style/cart.css";
// Da mettere IdUser con ????
$templateParams['query'] = $dbh -> getArticleInCart(1);
require("template/base.php");

