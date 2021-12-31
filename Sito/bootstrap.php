<?php
session_start();
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "HYC");
$templateParams['languages'] = $dbh->getLanguages();
$templateParams["themes"] = $dbh->getThemes();

function getPrice($height, $width, $quantity){
    $price = (($height * $width) / 7000) * $quantity;
    return round($price, 2);
}

function isUserLoggedIn(){
    return !empty($_SESSION['IdUtente']);
}
function getLoggedUserID(){
    return $_SESSION["IdUtente"];
}

function getNameUserID(){
    return $_SESSION["Username"];
}

function registerLoggedUser($user){
    $_SESSION["IdUtente"] = $user["IdUtente"];
    $_SESSION["Username"] = $user["Username"];
    $_SESSION["Nome"] = $user["Nome"];
}

function updateNameAndUsername($username, $nome){
    $_SESSION["Username"] = $username;
    $_SESSION["Nome"] = $nome;
}
