<?php

require_once '../bootstrap.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["dataToUpdate"])){

        $credentialsCheckResult = $dbh->checkLoginById(getLoggedUserID(), $_POST["dataToUpdate"]["password"]);

        $response = array("informationUpdateStatus"=>"");

        if(count($credentialsCheckResult)==0){
            $response["informationUpdateStatus"] = "wrongPass";
            echo json_encode($response);
        }elseif(!$dbh->checkIfUsernameOrPassNotAlreadyPresent(getLoggedUserID(), $_POST["dataToUpdate"]["username"],$_POST["dataToUpdate"]["email"])){
            $response["informationUpdateStatus"] = "alreadyPresent";
            echo json_encode($response);
        }elseif(count($credentialsCheckResult)==1){
            if(!filter_var($_POST["dataToUpdate"]["email"], FILTER_VALIDATE_EMAIL)) {
                $response["informationUpdateStatus"] = "emailNotValid";
                echo json_encode($response);
            }else{
                updateNameAndUsername($_POST["dataToUpdate"]["username"],$_POST["dataToUpdate"]["name"]);
                $dbh->updateUserData(getLoggedUserID(), $_POST["dataToUpdate"]);
                $response["informationUpdateStatus"] = "rightPass";
                // Create a notification
                $dbh -> createNotification("EditProfile", "Your information has been successfully changed", getLoggedUserID());
                echo json_encode($response);
            }

        }
    }elseif(isset($_POST["passToUpdate"])){
        $credentialsCheckResult = $dbh->checkLoginById(getLoggedUserID(), $_POST["passToUpdate"]["currentPass"]);

        $response = array("informationUpdateStatus"=>"");

        if(strlen($_POST["passToUpdate"]["newPass"]) < 8){
            $response["informationUpdateStatus"] = "passTooShort";
            echo json_encode($response);
        }elseif(count($credentialsCheckResult)==0){
            $response["informationUpdateStatus"] = "wrongPass";
            echo json_encode($response);
        }elseif(count($credentialsCheckResult)==1){
            if($_POST["passToUpdate"]["newPass"] == $_POST["passToUpdate"]["currentPass"]){
                $response["informationUpdateStatus"] = "samePass";
            }else{
                $dbh->updateUserPass(getLoggedUserID(), $_POST["passToUpdate"]["newPass"]);
                $response["informationUpdateStatus"] = "rightPass";
                // Create a notification
                $dbh -> createNotification("EditProfile", "Your information has been successfully changed", getLoggedUserID());

            }

            echo json_encode($response);

        }
    }
}
