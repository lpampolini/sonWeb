<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Check if there's any Harvest using the specie register
$sqlFormHarv = 'SELECT Id FROM Harvests WHERE Form='.$_GET["cod"];
$resFormHarv = $dbConnection->execSql($sqlFormHarv);
$nFormHarv = mysql_num_rows($resFormHarv);

// If there's register using specie
if($nFormHarv > 0){
    
    echo '<script language="javascript">';
    echo 'location.href="../formList.php?msg=e";';
    echo '</script>';
    
} else {
    
    $delForm = 'DELETE FROM WeightForms WHERE Id='.$_GET["cod"];
    $resForm = $dbConnection->execSql($delForm);
    
    echo '<script language="javascript">';
    echo 'location.href="../formList.php";';
    echo '</script>';
}