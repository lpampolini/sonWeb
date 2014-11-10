<?php

include_once '../database/connection.php';

// My table
$dbConnection = new connection();
$dbConnection->newConnection();

$sqlHarvestsSource = "SELECT * from HarvestsDan";
$resHarvSrc = $dbConnection->execSql($sqlHarvestsSource);
$nLinesSrc = mysql_num_rows($resHarvSrc);

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

while($recordHarvSrc = mysql_fetch_assoc($resHarvSrc)){
    
    // Retrieve Effort key
    $sqlEffKey = 'SELECT Id FROM Efforts WHERE EffortNumber ="'.$recordHarvSrc['EFFORT'].'"';
    $resEffKey = $dbConnection->execSql($sqlEffKey);
    $recEffKey = mysql_fetch_assoc($resEffKey);
    $nEffkey = mysql_num_rows($resEffKey);
    echo $sqlEffKey.'<br/><br/>';
    
    // Specie key
    $sqlSpecKey = 'SELECT Id FROM Species WHERE Code ="'.$recordHarvSrc['SPC'].'"';
    $resSpecKey = $dbConnection->execSql($sqlSpecKey);
    $recSpecKey = mysql_fetch_assoc($resSpecKey);
    //$n = mysql_num_rows($resSpecKey);
    //echo $sqlSpecKey.'<br/><br/>';
    
    // Increment method code -> code pk (to fix original database)
    $HarvMethod = ((int)$recordHarvSrc['HVSMTH'])+1;
    
    // Unit: 1 -> Kg; 1 -> punds
    if($recordHarvSrc['WUT']==1)
        $unit = 'k';
    elseif($recordHarvSrc['WUT']==2)
        $unit = 'p';
    
    if($nEffkey>0){
        $newRow = 'INSERT INTO Harvests (Id,HarvestCode,Effort,Specie,HVSMTH,DIS,Form,Weight,Unit,RHVSWT_KG) values ('
                .$recordHarvSrc['Id'].', "'.$recordHarvSrc['HARVEST'].'",'.$recEffKey['Id'].','.$recSpecKey['Id'].','.$HarvMethod.','.$recordHarvSrc['DIS'].','.$recordHarvSrc['WFT'].','
                .''.$recordHarvSrc['HVSWT9'].',"'.$unit.'",'.$recordHarvSrc['RHVSWT_KG'].');';
        //$resRow = $dbConnection->execSql($newRow);
        echo $newRow.'<br/><br/>';
    }
}