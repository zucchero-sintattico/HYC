<?php
require_once 'bootstrap.php';
$Categorie = $dbh->getCategorie();
$MostPopularProducts = $dbh->getMostPopularProducts(2);
$Languages = $dbh->getLanguages();

$data = array("Categorie"=>$Categorie, "ProdottiPopolari"=>$MostPopularProducts, "Linguaggi"=>$Languages);

echo json_encode($data);


