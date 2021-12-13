<?php

require_once '../bootstrap.php';
$notification = "logIn or make an account to see your notificatio";
if(isUserLoggedIn()) {
    $notification = $dbh->getNotificationByUserId(getLoggedUserID());
}
echo json_encode($notification);
