<?php
require_once '../bootstrap.php';
if(isset($_GET["key"])){
    // Ricerca per nome
    $templateParams['query'] = $dbh -> getArticleByName($_GET["key"]);
    $data = array("Risultati"=>$templateParams['query']);
}
// Ricerca per categoria
else{
    $templateParams['query'] = $dbh -> getProductByCategory($_GET['cat']);
    $data = array("Risultati"=>$templateParams['query']);
}



echo json_encode($data);
