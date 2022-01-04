<?php

require_once '../bootstrap.php';

if(isUserLoggedIn()) {
    if ($_GET["filter"] == "all"){
        $notification = $dbh->readAllNotifications(getLoggedUserID());
    }elseif ($_GET["filter"] == "last-one"){
        $notification = ($dbh->getLastNotificationByUserId(getLoggedUserID()))[0];
    }
}else{
    $notification[0]["TipoNotifica"] ='Account';
    $notification[0]["Descrizione"] ='<a href="../login.php">LogIn</a> or <a href="../register.php">SignUp</a> to see your notification';
    $notification[0]["Data"] ='not logged';
}
echo json_encode($notification);
