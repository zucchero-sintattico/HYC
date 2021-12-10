<?php
require_once 'bootstrap.php';
$templateParams["title"] = "HYC - profile";

$templateParams['style'] = "style/profile.css";
if(isUserLoggedIn()) {
    $templateParams["name"] = "profileTemplate.php";
}else{
    header("location: login.php");
}
require("template/base.php");

