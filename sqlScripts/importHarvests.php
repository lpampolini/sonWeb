<?php

include_once '../database/connection.php';

// My table
$dbConnection = new connection();
$dbConnection->newConnection();

$sqlHarvestsSource = "SELECT * from HarvestsDan";
$resEffZoneSrc = $dbConnection->execSql($sqlHarvestsSource);
$nLinesSrc = mysql_num_rows($resEffZoneSrc);

/* Receive all the Harvests
For each row
        - Id
        - Effort_Id
        - HarvestNumber
        - Specie
        - Form
        - Unit (1 to Kgs; 2 to pounds)
        - HRVMTH 
            0 - Box Weights Estimated
            1 - Fish Boxes Weighed
            2 - Weights From Fishbuyers
            3 - Buyer Reconciliation (Sum Harvest))
        - HVSWT9 (Weight)
        - DIS
        - RHVSWT_KG
 */

while($recordEffZoneSrc = mysql_fetch_assoc($resEffZoneSrc)){
    
    // Retrieve Effort key
    $sqlEffKey = 'SELECT Id FROM Efforts WHERE EffortNumber ="'.$recordEffZoneSrc['EFFORT'].'"';
    $resEffKey = $dbConnection->execSql($sqlEffKey);
    $recEffKey = mysql_fetch_assoc($resEffKey);
    $nEffkey = mysql_num_rows($resEffKey);
    echo $sqlEffKey.'<br/><br/>';
    
    // Specie key
    $sqlSpecKey = 'SELECT Id FROM Species WHERE Code ="'.$recordEffZoneSrc['SPC'].'"';
    $resSpecKey = $dbConnection->execSql($sqlSpecKey);
    $recSpecKey = mysql_fetch_assoc($resSpecKey);
    //$n = mysql_num_rows($resSpecKey);
    //echo $sqlSpecKey.'<br/><br/>';
    
    // Increment method code -> code pk (to fix original database)
    $HarvMethod = ((int)$recordEffZoneSrc['HVSMTH'])+1;
    
    // Unit: 1 -> Kg; 1 -> punds
    if($recordEffZoneSrc['WUT']==1)
        $unit = 'k';
    elseif($recordEffZoneSrc['WUT']==2)
        $unit = 'p';
    
    if($nEffkey>0){
        $newRow = 'INSERT INTO Harvests (Id,HarvestCode,Effort,Specie,HVSMTH,DIS,Form,Weight,Unit,RHVSWT_KG) values ('
                .$recordEffZoneSrc['Id'].', "'.$recordEffZoneSrc['HARVEST'].'",'.$recEffKey['Id'].','.$recSpecKey['Id'].','.$HarvMethod.','.$recordEffZoneSrc['DIS'].','.$recordEffZoneSrc['WFT'].','
                .''.$recordEffZoneSrc['HVSWT9'].',"'.$unit.'",'.$recordEffZoneSrc['RHVSWT_KG'].');';
        //$resRow = $dbConnection->execSql($newRow);
        echo $newRow.'<br/><br/>';
    }
}