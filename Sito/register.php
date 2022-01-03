<?php
require_once 'bootstrap.php';
$templateParams["style"] = "style/login.css";
//$templateParams["js"] = array("script/utility/utils.js", "script/profile/register.js");

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
            $result = $dbh->registerUser($_POST["name"],$_POST["surname"],$_POST["username"],$_POST["mail"], $_POST["password"]);
            if($result == "registrationSuccessfull"){
                $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
                registerLoggedUser($login_result[0]);
            }else if($result == "duplicateEmailOrUsername"){
                $templateParams["errorelogin"] = "Username or Email unavailable";
            }else if($result == "passwordTooShort"){
                $templateParams["errorelogin"] = "Password has to be at least 8 characters long";
            }

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