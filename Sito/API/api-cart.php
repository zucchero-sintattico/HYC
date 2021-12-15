<?php
require_once '../bootstrap.php';

$articles = $dbh->getArticleInCart(getLoggedUserID());
$prices = [];
for($i=0; $i<count($articles); $i++){
    $prices[$i] = getPrice(($articles[$i])["Altezza"], ($articles[$i])["Larghezza"]);
}

$data = array("Articles"=>$articles, "Prices"=>$prices);
echo json_encode($data);
