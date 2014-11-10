<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Check if there's any Effort using the boat register
$sqlNetEff = 'SELECT Id FROM Efforts WHERE Net='.$_GET["cod"];
$resNetEff = $dbConnection->execSql($sqlNetEff);
$nNetEff = mysql_num_rows($resNetEff);

// Check if there's any User using the boat register
$sqlNetUsr = 'SELECT Id FROM Users WHERE PrefNet='.$_GET["cod"];
$resNetUsr = $dbConnection->execSql($sqlNetUsr);
$nNetUsr = mysql_num_rows($resNetUsr);

// If there's register using specie
if($nNetEff > 0 OR $nNetUsr > 0){
    
    echo '<script language="javascript">';
    echo 'location.href="../netList.php?msg=e";';
    echo '</script>';
    
} else {
    
    $delNet = 'DELETE FROM Nets WHERE Id='.$_GET["cod"];
    $resNet = $dbConnection->execSql($delNet);
    
    echo '<script language="javascript">';
    echo 'location.href="../netList.php";';
    echo '</script>';
}