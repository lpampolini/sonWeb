<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Select all the harvests inside the Effort
$sqlHarvests = "SELECT Id FROM Harvests WHERE Effort=".$_GET["cod"];
$resHarvest = $dbConnection->execSql($sqlHarvests);

// Runs the Harvests list and search for individuals inside the harvests
while($recordHarvest = mysql_fetch_assoc($resHarvest)){
    
    // Select all the individuals inside the harvest
    $sqlInd = 'SELECT * FROM Individuals WHERE Harvest='.$recordHarvest["Id"];
    $resInd = $dbConnection->execSql($sqlInd);
    
    // Runs the Individuals list
    while($recordInd = mysql_fetch_assoc($resInd)){
        // Delete Individual
        $delInd = 'DELETE FROM Individuals WHERE Id='.$recordInd["Id"].'<br/>';
        $resInd = $dbConnection->execSql($delInd);
    }
    
    // Delete Harvest
    $delHarv = 'DELETE FROM Harvests WHERE Id='.$recordHarvest["Id"].'<br/>';
    $resHarv = $dbConnection->execSql($delHarv);
}

// Delete Effort
$sql = "DELETE FROM Efforts  WHERE Id=".$_GET["cod"];
$result = $dbConnection->execSql($sql);

echo '<script language="javascript">';
echo 'location.href="../effortList.php";';
echo '</script>';