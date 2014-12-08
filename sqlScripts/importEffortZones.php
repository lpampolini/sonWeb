<?php

include_once '../database/connection.php';

// My table
$dbConnection = new connection();
$dbConnection->newConnection();

$sqlEffZoneSource = "SELECT * from EffortsZoneDan";
$resEffZoneSrc = $dbConnection->execSql($sqlEffZoneSource);
$nLinesSrc = mysql_num_rows($resEffZoneSrc);
//echo $sqlIndSource;
/* Receive all the Harvests
For each row
        - SPC is a dynamic field that holds the specie Code. Change code for the id
 */

while($recordEffZoneSrc = mysql_fetch_assoc($resEffZoneSrc)){
    
    // Retrieve Effort key
    $sqlEffKey = 'SELECT Id FROM Efforts WHERE EffortNumber ="'.$recordEffZoneSrc['EFFORT'].'"';
    //echo $sqlEffKey.'<br/>';
    $resEffKey = $dbConnection->execSql($sqlEffKey);
    $recEffKey = mysql_fetch_assoc($resEffKey);
    $nEffkey = mysql_num_rows($resEffKey);
    //echo $sqlEffKey.'<br/><br/>';
    
    if($nEffkey>0){
        $newRow = 'INSERT INTO EffortsZone (Id,Effort,Region,Date)';
       
        $newRow .= ' values ('.$recordEffZoneSrc['ID'].','.$recEffKey['Id'].',"'.$recordEffZoneSrc['REGION'].'","'.$recordEffZoneSrc['DATE'].'");';
        $resRow = $dbConnection->execSql($newRow);
        echo $newRow.'<br/><br/>';
    }
}