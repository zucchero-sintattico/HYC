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

        if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $pwd = hash('sha512',  $_POST["password"]);
            $dbh->registerUser($_POST["name"],$_POST["surname"],$_POST["username"],$_POST["mail"], $pwd);
            $login_result = $dbh->checkLogin($_POST["username"],$pwd);
            registerLoggedUser($login_result[0]);
        }else{
            $templateParams["errorelogin"] = "Error! Please compile email correct";
        }

    }
    else{
        //Register fallito
        $templateParams["errorelogin"] = "Error! Please compile every field";
    }
}

if(isUserLoggedIn()){
    header("location: profile.php");
}
else{
    $templateParams["title"] = "HYC - Register";
    $templateParams["name"] = "registerTemplate.php";
}
require("template/base.php");