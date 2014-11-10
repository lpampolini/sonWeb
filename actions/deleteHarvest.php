<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Select all individuals inside the harvest
$sqlAllInd = 'SELECT Id FROM Individuals WHERE Harvest='.$_GET["cod"];
$resAllInd = $dbConnection->execSql($sqlAllInd);

// Runs the Individuals list and delete them
while($recordAllInd = mysql_fetch_assoc($resAllInd)){
    $delInd = 'DELETE FROM Individuals WHERE Id='.$recordAllInd["Id"];
    $resInd = $dbConnection->execSql($delInd);
}

// Delete the harvest
$sql = "DELETE FROM Harvests WHERE Id=".$_GET["cod"];
$result = $dbConnection->execSql($sql);

echo '<script language="javascript">';
echo 'location.href="javascript:window.history.back(-1)";';
echo '</script>';

