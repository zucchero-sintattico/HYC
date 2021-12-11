<?php
require_once '../bootstrap.php';
$templateParams['query'] = $dbh -> getArticleByName($_GET["key"]);
$data = $templateParams['query'];
$data = array("Titolo"=>$_GET["key"], "Risultati"=>$templateParams['query']);

echo json_encode($data);
