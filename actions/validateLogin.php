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
$sqlLogin = "select Salt from Users where Username ='".$mail."'";
$result_search = $dbConnection->execSql($sqlLogin);
$recordset = mysql_fetch_assoc($result_search);

If($result_search){
    if($salt == $recordset["Salt"]){
        $location = "startSession.php";
    }else{
        $location = "../index.php?msg=e";
    } 
}else{
    $location =  "../index.php?msg=e";
}

header('Location: '.$location);

?>