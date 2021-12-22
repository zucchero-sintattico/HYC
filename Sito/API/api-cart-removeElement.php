<?php
require_once 'bootstrap.php';
$dbh -> removeProductFromCart($_GET['IdProd'], getLoggedUserID());
$products = $dbh -> getArticleInCart(getLoggedUserID());
$prices[];
for($i = 0; $i < count($products); $i = $i + 1){
    $prices[$i] = getPrice(($products[$i])['Altezza'], ($products[$i])['Larghezza']);
}

$data = array("Producs"=>$products, "Prices"=>$prices);
echo json_encode($data);