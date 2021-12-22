<?php
require_once 'bootstrap.php';
$dbh -> removeProductFromCart($_GET['IdProd'], getLoggedUserID());
$articles = $dbh -> getArticleInCart(getLoggedUserID());

$data = array()
echo json_encode()