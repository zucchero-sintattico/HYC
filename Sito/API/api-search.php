<?php
require_once '../bootstrap.php';
if(isset($_GET["key"])){
    // Ricerca per nome
    $templateParams['query'] = $dbh -> getArticleByName($_GET["key"]);
    $data = array("Results"=>$templateParams['query']);
}
// Ricerca per categoria
else{
    $templateParams['query'] = $dbh -> getProductByCategory($_GET['cat']);
    $templateParams['catName'] = $dbh -> getCategoryById($_GET['cat']);
    $data = array("Results"=>$templateParams['query'], "" => $templateParams['catName']);
}



echo json_encode($data);
