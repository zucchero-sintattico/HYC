<!-- Called when an articles is removed to cart
<?php
require_once '../bootstrap.php';

$dbh -> removeProductFromCart($_GET['IdProd'], getLoggedUserID());
console.log("ciao");
header("Location: cart.php");

