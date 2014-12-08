<?php

include_once '../database/connection.php';

// My table
$dbConnection = new connection();
$dbConnection->newConnection();

$sqlEffZoneSource = "SELECT * from IndividualsDan";
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
    
    // Specie key
    $sqlSpecKey = 'SELECT Id FROM Species WHERE Code ="'.$recordEffZoneSrc['SPC'].'"';
    $resSpecKey = $dbConnection->execSql($sqlSpecKey);
    $recSpecKey = mysql_fetch_assoc($resSpecKey);
    //$n = mysql_num_rows($resSpecKey);
    //echo $sqlSpecKey.'<br/><br/>';
    
    if($nEffkey>0){
        $newRow = 'INSERT INTO Individuals (Id,IndividualCode,Effort,SPC,TLEN,FLEN,DRSWT,AGEST';
        
        if($recordEffZoneSrc['COMMENT'] !== "") {
            $newRow .= ',Comment';
        }
        
        $newRow .= ') values ('.$recordEffZoneSrc['ID'].',"'.$recordEffZoneSrc['FISH'].'",'.$recEffKey['Id'].','.$recSpecKey['Id'].','.$recordEffZoneSrc['TLEN'].','
                .$recordEffZoneSrc['FLEN'].','.$recordEffZoneSrc['DRSWT'].','.$recordEffZoneSrc['AGEST'];
        
        if($recordEffZoneSrc['COMMENT'] !== "") {
            $newRow .= ',"' . $recordEffZoneSrc['COMMENT'].'"';
        }
        
        $newRow .= ');';
        $resRow = $dbConnection->execSql($newRow);
        echo $newRow.'<br/><br/>';
    }
}