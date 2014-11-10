<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Check if there's any Effort using the boat register
$sqlDurEff = 'SELECT Id FROM Efforts WHERE Duration='.$_GET["cod"];
$resDurEff = $dbConnection->execSql($sqlDurEff);
$nDurEff = mysql_num_rows($resDurEff);

// If there's register using specie
if($nDurEff > 0){
    
    echo '<script language="javascript">';
    echo 'location.href="../durationList.php?msg=e";';
    echo '</script>';
    
} else {
    
    $delNet = 'DELETE FROM Durations WHERE Id='.$_GET["cod"];
    $resNet = $dbConnection->execSql($delNet);
    
    echo '<script language="javascript">';
    echo 'location.href="../durationList.php";';
    echo '</script>';
}