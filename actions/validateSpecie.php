<?php

include_once '../database/connection.php';

// Create connection
$dbConnection = new connection();
$dbConnection->newConnection();

// $_POST retrieve the name of the fields inside the form
$HTTP_POST_VARS = $_POST;

// Execute sql (Insert|Update)
$resultData = $dbConnection->inputData($_GET["op"],$HTTP_POST_VARS);

echo '<script language="javascript">';
echo 'location.href="../specieList.php";';
echo '</script>';

?>

