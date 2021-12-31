<?php
require_once '../bootstrap.php';
if(isset($_GET["key"])){
    // Filtra per nome
    $templateParams['query'] = $dbh -> getProductsByTitle($_GET["key"]);
    $data = array("Results"=>$templateParams['query'], "Title" => $_GET["key"]);
}
// Filtra per categoria
else if(isset($_GET["cat"])){
    $templateParams['query'] = $dbh -> getProductsByCategory($_GET['cat']);
    $templateParams['filterName'] = ($dbh -> getCategoryById($_GET['cat']))[0]['Tipo'];
    $data = array("Results"=>$templateParams['query'], "Title" => $templateParams['filterName']);
}
// Filtra per linguaggio
else{
    $templateParams['query'] = $dbh -> getProductsByLanguage($_GET['lan']);
    $templateParams['filterName'] = $_GET["lan"];
    $data = array("Results"=>$templateParams['query'], "Title" => $templateParams['filterName']);
}



echo json_encode($data);
