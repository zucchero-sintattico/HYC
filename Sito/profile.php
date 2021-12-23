<?php
require_once 'bootstrap.php';
$templateParams["title"] = "HYC - profile";

$templateParams['style'] = "style/profile.css";

if(isUserLoggedIn()) {
    $templateParams["name"] = "profileTemplate.php";
    $templateParams["userID"] = getLoggedUserID();
    $templateParams["userName"] = getNameUserID();
    $templateParams["userInfo"] = ($dbh->getUserInfoById($templateParams["userID"]))[0];
    $templateParams["ordersHistory"] = $dbh->getOrdersMatchingUser($templateParams["userID"]);
    $templateParams["js"] = array("script/profile/profile.js");
}else{
    header("location: login.php");
}

require("template/base.php");

