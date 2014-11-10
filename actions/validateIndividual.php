<?php

include_once '../database/connection.php';
include_once './createSalt.php';

// Create connection
$dbConnection = new connection();
$dbConnection->newConnection();

// $_POST retrieve the name of the fields inside the form
$HTTP_POST_VARS = $_POST;

// Execute sql (Insert|Update)
$resultData = $dbConnection->inputData($_GET["op"],$HTTP_POST_VARS);

echo '<script language="javascript">';

if($_GET["w"] and $_GET["w"]==1){
    echo 'window.opener.location.reload();';
    echo 'window.close();';
}else{
    echo 'location.href="../individualList.php"';
}
echo '</script>';

?>

