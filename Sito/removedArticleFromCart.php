<?php
require_once 'bootstrap.php';
$dbh -> removeProductFromCart($_GET['IdProd'], getLoggedUserID());
header("location: cart.php");

