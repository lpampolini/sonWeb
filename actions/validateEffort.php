<?php

include_once '../database/connection.php';

// Create connection
$dbConnection = new connection();
$dbConnection->newConnection();

// $_POST retrieve fields inside the form
$HTTP_POST_VARS = $_POST;

$numEfforts = $HTTP_POST_VARS['numEfforts'];
//echo '$numEfforts = '.$numEfforts;

$HTTP_POST_VARS['EffortNumber'] = trim($HTTP_POST_VARS['EffortNumber']);

// Execute sql (Insert|Update)
$resultData = $dbConnection->inputData($_GET["op"],$HTTP_POST_VARS);

    for($i=1; $i<10; $i++){
        
        if($HTTP_POST_VARS['newSpecie'.$i] and $HTTP_POST_VARS['newForm'.$i] and $HTTP_POST_VARS['newWeight'.$i] and $HTTP_POST_VARS['newUnit'.$i] and $HTTP_POST_VARS['newHVSMTH'.$i]){
            
            // Effort code and year
            $EffortCode = split("-",$HTTP_POST_VARS['EffortNumber']);
            $EffortNumber = $EffortCode[(sizeof($EffortCode))-1];
            $year = $EffortCode[0];
            
            // Select Specie Code
            $sqlSpecie = "SELECT Code,CONV2,CONV3 FROM Species WHERE Id=".$HTTP_POST_VARS['newSpecie'.$i];
            $resSpecie = $dbConnection->execSql($sqlSpecie);
            $recSpecie = mysql_fetch_assoc($resSpecie);
            
            // Concatenate
            $HarvestCode = $year.'-SAU-'.$EffortNumber.'-0'.$recSpecie['Code'];
            
            // Calculate RHVSWT_KG;
            switch ($HTTP_POST_VARS['newForm'.$i]){
                case 1: 
                    $conversion = 1;
                    break;
                case 2:
                    $conversion = $recSpecie['CONV2'];
                    break;
                case 3:
                    $conversion = $recSpecie['CONV3'];
                    break;
            }
            
            $RHVSWT_KG = $HTTP_POST_VARS['newWeight'.$i]*$conversion;
            
            if($HTTP_POST_VARS['newUnit'.$i] == 'p'){
                $RHVSWT_KG = $RHVSWT_KG/2.20462;
            }
            $RHVSWT_KG = round($RHVSWT_KG);
            
            $sqlNewHarvest = "INSERT INTO Harvests (Effort, HarvestCode, Specie, Form, Weight, Unit, HVSMTH, RHVSWT_KG) VALUES (";
                    if($_GET["op"] == 'add'){
                        $sqlNewHarvest .= $resultData.",";
                    } else {
                        $sqlNewHarvest .= $HTTP_POST_VARS["keyValue"].",";
                    }
            
            $sqlNewHarvest .= "'".$HarvestCode."',".$HTTP_POST_VARS['newSpecie'.$i].",".$HTTP_POST_VARS['newForm'.$i].",".$HTTP_POST_VARS['newWeight'.$i].",'".$HTTP_POST_VARS['newUnit'.$i]."',".$HTTP_POST_VARS['newHVSMTH'.$i]
                    .",".$RHVSWT_KG.")";
            
            $newHarvest = $dbConnection->execSql($sqlNewHarvest);
            //echo $sqlNewHarvest.'<br/>';
            mysql_data_seek($resSpecie,0);

        }

        if($HTTP_POST_VARS['edtSpecie'.$i] and $HTTP_POST_VARS['edtForm'.$i] and $HTTP_POST_VARS['edtWeight'.$i] and $HTTP_POST_VARS['edtId'.$i] and $HTTP_POST_VARS['edtUnit'.$i] and $HTTP_POST_VARS['edtHVSMTH'.$i]){
            
            // Select Specie Code
            $sqlSpecie = "SELECT Code,CONV2,CONV3 FROM Species WHERE Id=".$HTTP_POST_VARS['edtSpecie'.$i];
            $resSpecie = $dbConnection->execSql($sqlSpecie);
            $recSpecie = mysql_fetch_assoc($resSpecie);
            
            // Calculate RHVSWT_KG;
            switch ($HTTP_POST_VARS['edtForm'.$i]){
                case 1: 
                    $conversion = 1;
                    break;
                case 2:
                    $conversion = $recSpecie['CONV2'];
                    break;
                case 3:
                    $conversion = $recSpecie['CONV3'];
                    break;
            }
            
            $RHVSWT_KG = $HTTP_POST_VARS['edtWeight'.$i]*$conversion;
            
            if($HTTP_POST_VARS['edtUnit'.$i] == 'p'){
                $RHVSWT_KG = $RHVSWT_KG/2.20462;
            }
            $RHVSWT_KG = round($RHVSWT_KG);
            
            $sqlUpdHarvest = "UPDATE Harvests SET Form=".$HTTP_POST_VARS['edtForm'.$i].", Weight='".$HTTP_POST_VARS['edtWeight'.$i]."', Unit='".$HTTP_POST_VARS['edtUnit'.$i]."', "
                    . "HVSMTH =".$HTTP_POST_VARS['edtHVSMTH'.$i].", RHVSWT_KG =".$RHVSWT_KG.", Specie=".$HTTP_POST_VARS['edtSpecie'.$i];
            $sqlUpdHarvest .= " WHERE Id=".$HTTP_POST_VARS['edtId'.$i];
            
            $edtHarvest = $dbConnection->execSql($sqlUpdHarvest);
            mysql_data_seek($resSpecie,0);
        }
    }

echo '<script language="javascript">';
echo 'location.href="../effortList.php";';
echo '</script>';


// If unit is kg, Convert kilo to pounds
//    if($HTTP_POST_VARS['edtUnit'.$i] === 'k'){
//        $edtWeight = $HTTP_POST_VARS['edtWeight'.$i]*2.20462;
//    }else{
//        $edtWeight = $HTTP_POST_VARS['edtWeight'.$i];
//    }
?>

