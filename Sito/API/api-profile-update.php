<?php

require_once '../bootstrap.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["dataToUpdate"])){

        $credentialsCheckResult = $dbh->checkLoginById(getLoggedUserID(), $_POST["dataToUpdate"]["password"]);

        $response = array("informationUpdateStatus"=>"");

        if(count($credentialsCheckResult)==0){
            $response["informationUpdateStatus"] = "wrongPass";
            echo json_encode($response);

        }elseif(count($credentialsCheckResult)==1){

            updateNameAndUsername($_POST["dataToUpdate"]["username"],$_POST["dataToUpdate"]["nome"]);

            $dbh->updateUserData(getLoggedUserID(), $_POST["dataToUpdate"]);
            $response["informationUpdateStatus"] = "rightPass";
            echo json_encode($response);

        }
    }
}
