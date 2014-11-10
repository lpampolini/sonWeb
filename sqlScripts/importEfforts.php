<?php

include_once '../database/connection.php';

// My table
$dbConnection = new connection();
$dbConnection->newConnection();

$sqlEffortsSource = "SELECT * from EffortsDan";
$resEffSrc = $dbConnection->execSql($sqlEffortsSource);
$nLinesSrc = mysql_num_rows($resEffSrc);

/* Receive all the Efforts
For each row
    - Input non dynamic fields
        - ID
        - EffortNumber
        - EDate
        - Grid
        - LATLONG
        - R_CODE
        - GRLEN5
        - GRDEP5
    - Input Dynamic Fields
      - Search If they already exist in the foreign table
      If they do
          input their code
      else
          create a new one, and input the new key
 */

while($recordEffSrc = mysql_fetch_assoc($resEffSrc)){
    
    // Retrieve user key
    $sqlUsrKey = 'SELECT Id FROM Users WHERE FirstName ="'.$recordEffSrc['Fisherman'].'"';
    $resUsrKey = $dbConnection->execSql($sqlUsrKey);
    $recUsrKey = mysql_fetch_assoc($resUsrKey);
    $n = mysql_num_rows($resUsrKey);
    //echo $sqlUsrKey.'<br/><br/>';
    
    // Retrieve boat key
    $sqlBoatKey = 'SELECT Id FROM Boats WHERE Name ="'.$recordEffSrc['Boat'].'"';
    $resBoatKey = $dbConnection->execSql($sqlBoatKey);
    $recBoatKey = mysql_fetch_assoc($resBoatKey);
    $n = mysql_num_rows($resBoatKey);
    //echo $sqlBoatKey.'<br/><br/>';
    
    // Target Specie key
    $sqlSpecKey = 'SELECT Id FROM Species WHERE Code ="'.$recordEffSrc['SPCTRG'].'"';
    $resSpecKey = $dbConnection->execSql($sqlSpecKey);
    $recSpecKey = mysql_fetch_assoc($resSpecKey);
    $n = mysql_num_rows($resSpecKey);
    //echo $sqlSpecKey.'<br/><br/>';
    
    // Retrieve GRTP key
    $sqlGRTPKey = 'SELECT Id FROM GRTP WHERE Name ="'.$recordEffSrc['GRTP'].'"';
    $resGRTPKey = $dbConnection->execSql($sqlGRTPKey);
    $recGRTPKey = mysql_fetch_assoc($resGRTPKey);
    $n = mysql_num_rows($resGRTPKey);
    //echo $sqlGRTPKey.'<br/><br/>';
    
    // Retrieve MESH key
    $sqlMESHKey = 'SELECT Id FROM MESH5 WHERE Name ="'.$recordEffSrc['MESH5'].'"';
    $resMESHKey = $dbConnection->execSql($sqlMESHKey);
    $recMESHKey = mysql_fetch_assoc($resMESHKey);
    $n = mysql_num_rows($resMESHKey);
    //echo $sqlMESHKey.'<br/><br/>';
    
    // Retrieve GRHTM key
    $currentRange = "";
    $sqlGRHTMKey = 'SELECT * FROM GRHTM';
    $resGRHTMKey = $dbConnection->execSql($sqlGRHTMKey);

    while($recGRHTMKey = mysql_fetch_assoc($resGRHTMKey)){
        $GRHTMDesc = $recGRHTMKey['Name'];
        list($low,$high) = split(" - ", $GRHTMDesc);        
        if($recordEffSrc["GRHTM"]>=$low AND $recordEffSrc["GRHTM"]<=$high){
            $currentRange = $recGRHTMKey["Id"];
        }
    }
    $n = mysql_num_rows($resGRHTMKey);
    //echo $sqlGRHTMKey.'<br/><br/>';
    
    // Retrieve SETYPE key
    $sqlSETKey = 'SELECT Id FROM SETYPE WHERE Name ="'.$recordEffSrc['SETYPE'].'"';
    $resSETKey = $dbConnection->execSql($sqlSETKey);
    $recSETKey = mysql_fetch_assoc($resSETKey);
    $n = mysql_num_rows($resSETKey);
    //echo $sqlSETKey.'<br/><br/>';
    
    // Retrieve Duration key
    $sqlDURKey = 'SELECT Id FROM Durations WHERE Name ="'.$recordEffSrc['Duration'].'"';
    $resDURKey = $dbConnection->execSql($sqlDURKey);
    $recDURKey = mysql_fetch_assoc($resDURKey);
    $n = mysql_num_rows($resDURKey);
    //echo $sqlDURKey.'<br/><br/>';
    
    $newRow = 'INSERT INTO Efforts (Id,EffortNumber,Fisherman,Boat,EDate,GRID,LATLONG,R_CODE,SPCTRG,GRTP,GRLEN5,GRHTM,MESH5,GRDEP5,SIDEP5,SETYPE,Duration) values ('
            .$recordEffSrc['ID'].', "'.$recordEffSrc['EffortNumber'].'",'.$recUsrKey['Id'].','.$recBoatKey['Id'].',"'.$recordEffSrc['EDate'].'",'.$recordEffSrc['GRID'].',"'.$recordEffSrc['LATLONG'].'",'
            .'"'.$recordEffSrc['R_CODE'].'",'.$recSpecKey['Id'].','.$recGRTPKey['Id'].','.$recordEffSrc['GRLEN5'].','.$currentRange.','.$recMESHKey['Id'].','.$recordEffSrc['GRDEP5'].','.$recordEffSrc['SIDEP5'].','
            .$recSETKey['Id'].','.$recDURKey['Id'].');';
    //$resRow = $dbConnection->execSql($newRow);
    echo $newRow.'<br/><br/>';
}