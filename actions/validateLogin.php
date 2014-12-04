<?php

include_once '../database/connection.php';
include_once '../actions/createSalt.php';

// Create connection
$dbConnection = new connection();
$dbConnection->newConnection();

$mail = $_POST['email'];
$pass = $_POST['password'];

// Generate Salt with the pass provided by the user
$salt = generateSalt($pass);

// Retrieve the Salt searching by User name
$sqlLogin = "select u.*,ut.Type from Users as u"
        . " INNER JOIN UserTypes as ut"
        . " ON u.UserType=ut.Id"
        . " WHERE Username ='".$mail."'";
$result_search = $dbConnection->execSql($sqlLogin);
$recordset = mysql_fetch_assoc($result_search);

If($result_search){
    if($salt == $recordset["Salt"]){
        
        // Start new session
        session_start();
        //Start session Id
        $_SESSION['sessionUser'] = session_id();
        //Define user type
        $_SESSION['userType'] = $recordset['Type'];
        // Define the user Id
        $_SESSION['userId'] = $recordset['Id'];
        
        include './validateSession.php';
        
        $location = "../effortList.php";
        
        
    }else{
        $location = "../index.php?msg=e";
    } 
}else{
    $location =  "../index.php?msg=e";
}

header('Location: '.$location);

?>