<?php

require_once 'bootstrap.php';
$templateParams["style"] = "style/login.css";


if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $templateParams["title"] = "HYC - Admin";
    $templateParams["name"] = "profileTemplate.php";
}
else{
    $templateParams["title"] = "HYC- Login";
    $templateParams["name"] = "loginTemplate.php";
}


require("template/base.php");

