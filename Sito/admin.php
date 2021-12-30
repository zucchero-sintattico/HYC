<?php

require_once 'bootstrap.php';
if (isUserLoggedIn() && $dbh->isUserAdmin(getLoggedUserID())) {
    $templateParams["style"] = "style/admin.css";
    $templateParams["title"] = "HYC- Admin";
    $templateParams["name"] = "adminTemplate.php";
} else {
    header("location: profile.php");
}
require("template/base.php");

