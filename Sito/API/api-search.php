<?php
require_once '../bootstrap.php';
$templateParams['query'] = $dbh -> getArticleByName($_GET["key"]);
$data = array("Risultati"=>$templateParams['query']);

echo json_encode($data);
