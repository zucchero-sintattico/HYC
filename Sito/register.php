<?php
require_once 'bootstrap.php';
$templateParams["style"] = "style/login.css";

if(isset($_POST["username"])
    && isset($_POST["password"])
    && isset($_POST["name"])
    && isset($_POST["surname"])
    && isset($_POST["mail"])
)
{
    if($_POST["mail"] != ""
    && $_POST["name"] != ""
    && $_POST["surname"] != ""
    && $_POST["password"] != ""
    && $_POST["username"] != ""){
        $dbh->registerUser($_POST["name"],$_POST["surname"],$_POST["username"],$_POST["mail"], $_POST["password"]);
        $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
        registerLoggedUser($login_result[0]);
    }
    else{
        //Register fallito
        $templateParams["errorelogin"] = "Errore! Please compile every field";
    }
}

if(isUserLoggedIn()){
    $templateParams["title"] = "HYC - Admin";
    $templateParams["name"] = "profileTemplate.php";
}
else{
    $templateParams["title"] = "HYC - Register";
    $templateParams["name"] = "registerTemplate.php";
}
require("template/base.php");