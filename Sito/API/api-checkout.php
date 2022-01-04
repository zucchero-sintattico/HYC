<?php


require_once '../bootstrap.php';

class workerThread extends Thread {

    private $notificationTypeOrdered = array("OrderProcessed","OrderReceived", "OrderPrepared", "OrderShipped", "OrderDelivered");
    private $dataToSendBackOrdered = array(" has been processed correctly", " has been received", " is being prepared", " shipped", " delivered");
    private $userID;

    public function __construct($id){
        $this->userID=$id;
    }

    public function run(){
        for($i=0;$i<count($this->notificationTypeOrdered);$i++){
            $dbh->createNotification($this->notificationTypeOrdered[$i], 'Your order N#'.$orderInfo['IdOrdine'].$this->dataToSendBackOrdered[$i].', go to <a href="../profile.php">Profile</a> to check it! ', $this->userID);
            sleep(6);
        }
    }
}


// Create the order
$dbh->createOrder(getLoggedUserID());

// Get Order Info
$orderInfo = $dbh->getLastOrderOfUser(getLoggedUserID());

// Create a notification
//$dbh->createNotification("OrderProcessed", 'Your order N#' . $orderInfo['IdOrdine'] . ' was processed correctly, go to <a href="../profile.php">Profile</a> to check it! ', getLoggedUserID());
$worker = new workerThread(getLoggedUserID());
$worker->start();

// Give a new cart to the User
$dbh->getNewCartForUser(getLoggedUserID());

$userName = getNameUserID();
$data = array("UserName" => $userName, "OrderInfo" => $orderInfo);
header('Content-Type: application/json');
echo json_encode($data);
