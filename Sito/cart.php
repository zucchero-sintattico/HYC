<?php
require_once 'bootstrap.php';
$templateParams["title"] = "HYC - Cart";
$templateParams['style'] = "style/pages.css";

if (isUserLoggedIn()) {
    $templateParams['js'] = array("script/utility/utils.js","script/pages/cart.js", "script/utility/filler.js");
} else {
    header("location: login.php");
}
require("template/base.php");

