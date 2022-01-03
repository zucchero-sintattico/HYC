<?php

require_once '../bootstrap.php';

// Create the order
$dbh -> createOrder(getLoggedUserID());

// Get Order Info
$orderInfo = $dbh -> getLastOrderOfUser(getLoggedUserID());

// Create a notification
$dbh -> createNotification("Order Processed", "Your order #".$orderInfo['IdOrdine']." was processed correctly", getLoggedUserID());
// Create Shipping ????

// Give a new cart to the User
$dbh -> getNewCartForUser(getLoggedUserID());

$userName = getNameUserID();
$data = array("UserName"=>$userName, "OrderInfo"=>$orderInfo);
header('Content-Type: application/json');
echo json_encode($data);
