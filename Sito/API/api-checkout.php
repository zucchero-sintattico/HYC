<?php

require_once '../bootstrap.php';

// Create the order
$dbh -> createOrder(getLoggedUserID());

// Create a notification
$dbh -> createNotification("Processed", "Your order was processed correctly", getLoggedUserID());
// Create Shipping ????

// Give a new cart to the User
$dbh -> getNewCartForUser(getLoggedUserID());


$data = "Success";
echo json_encode($data);
