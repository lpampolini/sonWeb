<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Check if there's any Harvest using the specie register
$sqlSpecHarv = 'SELECT Harvest FROM SpeciesPerHarvest WHERE Specie='.$_GET["cod"];
$resSpecHarv = $dbConnection->execSql($sqlSpecHarv);
$nSpecHarv = mysql_num_rows($resSpecHarv);

// Check if there's any Individual using the specie register
$sqlSpecInd = 'SELECT Id FROM Individuals WHERE Specie='.$_GET["cod"];
$resSpecInd = $dbConnection->execSql($sqlSpecInd);
$nSpecInd = mysql_num_rows($resSpecInd);

// If there's register using specie
if($nSpecHarv > 0 or $nSpecInd > 0){
    
    echo '<script language="javascript">';
    echo 'location.href="../specieList.php?msg=e";';
    echo '</script>';
    
} else {
    
    $delSpecie = 'DELETE FROM Species WHERE Id='.$_GET["cod"];
    $resSpecie = $dbConnection->execSql($delSpecie);
    
    echo '<script language="javascript">';
    echo 'location.href="../specieList.php";';
    echo '</script>';
}