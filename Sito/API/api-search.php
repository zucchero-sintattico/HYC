<?php
require_once '../bootstrap.php';
$templateParams['query'] = $dbh -> getArticleByName($_GET["key"]);
$data = $templateParams['query'];

echo json_encode($data);
