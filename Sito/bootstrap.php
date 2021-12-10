<?php
session_start();
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "HYC2");

function getPrice($height, $width){
    $price = ($height * $width) / 7000;
    return round($price, 2);
}
