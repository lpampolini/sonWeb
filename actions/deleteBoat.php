<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Check if there's any Effort using the boat register
$sqlBoatEff = 'SELECT Id FROM Efforts WHERE Net='.$_GET["cod"];
$resBoatEff = $dbConnection->execSql($sqlBoatEff);
$nBoatEff = mysql_num_rows($resBoatEff);

// Check if there's any User using the boat register
$sqlBoatUsr = 'SELECT Id FROM Users WHERE PrefBoat='.$_GET["cod"];
$resBoatUsr = $dbConnection->execSql($sqlBoatUsr);
$nBoatUsr = mysql_num_rows($resBoatUsr);

// If there's register using specie
if($nBoatEff > 0 OR $nBoatUsr > 0){
    
    echo '<script language="javascript">';
    echo 'location.href="../boatList.php?msg=e";';
    echo '</script>';
    
} else {
    
    $delNet = 'DELETE FROM Boats WHERE Id='.$_GET["cod"];
    $resNet = $dbConnection->execSql($delNet);
    
    echo '<script language="javascript">';
    echo 'location.href="../boatList.php";';
    echo '</script>';
}