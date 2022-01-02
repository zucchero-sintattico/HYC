<?php

require_once '../bootstrap.php';
$notification = "logIn or make an account to see your notification";
if(isUserLoggedIn()) {
    if ($_GET["filter"] == "all"){
        $notification = $dbh->readAllNotifications(getLoggedUserID());
    }elseif ($_GET["filter"] == "last-one"){
        $notification = ($dbh->getLastNotificationByUserId(getLoggedUserID()))[0];
    }
}
echo json_encode($notification);
