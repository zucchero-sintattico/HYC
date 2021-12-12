<?php
require_once '../bootstrap.php';
if(isset($_GET["key"])){
    // Ricerca per nome
    $templateParams['query'] = $dbh -> getArticleByName($_GET["key"]);
    $data = array("Results"=>$templateParams['query'], "Title" => "Results for ".$_GET["key"].":");
}
// Ricerca per categoria
else{
    $templateParams['query'] = $dbh -> getProductByCategory($_GET['cat']);
    $templateParams['catName'] = $dbh -> getCategoryById($_GET['cat']);
    $data = array("Results"=>$templateParams['query'], "Title" => $templateParams['catName']);
}



echo json_encode($data);
