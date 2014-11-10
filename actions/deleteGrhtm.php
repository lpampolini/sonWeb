<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Check if there's any Harvest using the specie register
$sqlGrhtmNet = 'SELECT Id FROM Nets WHERE GRHTM='.$_GET["cod"];
$resGrhtmNet = $dbConnection->execSql($sqlGrhtmNet);
$nGrhtmNet = mysql_num_rows($resGrhtmNet);

// If there's register using specie
if($nGrhtmNet > 0){
    
    echo '<script language="javascript">';
    echo 'location.href="../grhtmList.php?msg=e";';
    echo '</script>';
    
} else {
    
    $delForm = 'DELETE FROM GRHTM WHERE Id='.$_GET["cod"];
    $resForm = $dbConnection->execSql($delForm);
    
    echo '<script language="javascript">';
    echo 'location.href="../grhtmList.php";';
    echo '</script>';
}