<?php
require_once '../bootstrap.php';

$dbh->removeProductFromCart($_POST['IdProd'], getLoggedUserID());
$products = $dbh->getProductsInCart(getLoggedUserID());
$prices = array();
for ($i = 0; $i < count($products); $i = $i + 1) {
    $prices[$i] = getPrice(($products[$i])['Altezza'], ($products[$i])['Larghezza'], ($products[$i])['Quantità']);
}
if (count($prices) == 0) {
    $empty = 1;
    $products = array();
} else {
    $empty = 0;
}

$data = array('Products' => $products, 'Prices' => $prices, 'Empty' => $empty);
header('Content-Type: application/json');
echo json_encode($data);