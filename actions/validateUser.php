<?php

include_once '../database/connection.php';
include_once './createSalt.php';

// Create connection
$dbConnection = new connection();
$dbConnection->newConnection();

// $_POST retrieve the name of the fields inside the form
$HTTP_POST_VARS = $_POST;

if($_GET["op"] == 'add'){
    $HTTP_POST_VARS["Salt"] = generateSalt(generateRandomKey());
}

// Execute sql (Insert|Update)
$resultData = $dbConnection->inputData($_GET["op"],$HTTP_POST_VARS);

echo '<script language="javascript">';
echo 'location.href="../userList.php";';
echo '</script>';

?>

