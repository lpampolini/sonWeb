<?php

include_once './database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

if($_GET["op"]=="edt"){
    
    // Select the user's data according to Id
    $sqlSearch = "SELECT h.*, h.Id as HarvestCode, e.EDate, e.EffortNumber,u.Username FROM Harvests as h"
        . " INNER JOIN Efforts as e"
        . " ON h.Effort=e.Id"
        . " INNER JOIN Users as u"
        . " ON u.Id=e.Fisherman"
        . " WHERE h.Id=".$_GET["cod"]
        . " ORDER BY e.EDate DESC, e.EffortNumber ASC";
    $result = $dbConnection->execSql($sqlSearch);
    $recordset = mysql_fetch_assoc($result);
}  
echo $sqlSearch.'<br>';
// Select all the individuals inside specif harvest
$sqlIndividuals = "SELECT i.Id,i.LengthTotal,i.LengthFork,i.Specie,i.Scales,s.Name FROM Individuals as i"
                . " INNER JOIN Species as s ON i.Specie=s.Id"
                . " WHERE i.Harvest=".$_GET["cod"];
$resultIndividuals = $dbConnection->execSql($sqlIndividuals);
$numberIndividuals = mysql_num_rows($resultIndividuals);

// Sql to select all the fishermen
$sqlFisherman = "SELECT Id,Username FROM Users";
$resultFisherman = $dbConnection->execSql($sqlFisherman);

// Sql to select all forms
$sqlForms = "SELECT * FROM WeightForms";
$resultForm = $dbConnection->execSql($sqlForms);

// Sql to select all species
$sqlSpecie = "SELECT * FROM Species";
$resultSpecie = $dbConnection->execSql($sqlSpecie);

?>

<html>

    <?php include_once './defaultHead.php'; ?>

    <link rel="stylesheet" type="text/css" href="styles/cssFramework/kickstart.css" media="all" />
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />

<body>
    
    <?php include_once 'topMenu.php'; ?>
    
    <p></p>
    
    <table border="1" width="100%">
                    
        <tr bgcolor="#D8D8D8" height="25px">
            <td>
                <?php  
                
                if($_GET[op]=="add"){
                    echo "Create new harvest";
                }else{
                    echo "Edit harvest";
                }
                
                ?>
                
            </td>
        </tr>
        
        <tr>
            <td>
                <p></p>
                <!-- Content Here -->
                <form class="vertical" method="post" action="<?php echo "actions/validateHarvest.php?op=".$_GET['op']; ?>" >
                    
                    <div class="col_3">
                    <!-- Text Field -->
                    <label for="HarvestCode">Effort</label>
                    <input id="HarvestCode" class="general" disabled="disabled" type="date" name="noSave" value="<?php echo $recordset["EffortNumber"]; ?>" />
                    
                    <label for="Fisherman">Fisherman</label>
                    <input id="Fisherman" class="general" disabled="disabled" type="date" name="noSave" value="<?php echo $recordset["Username"]; ?>" />
                    
                    </div>
                    
                    <div class="col_7">
                        
                        <!-- Placeholder Field -->
                        <label for="Specie" >Specie</label>
                        <?php
                        
                        echo '<select class="general" required="required" name="edtSpecie">';
                            
                            echo '<option value=""> Select Specie </option>';
                            
                            while ($recordGRTP = mysql_fetch_assoc($resultSpecie)){
                                echo '<option value='.$recordGRTP["Id"];
                                
                                if($recordGRTP["Id"] === $recordset["Specie"]){
                                    echo ' selected="selected" ';
                                }
                                
                                echo '>'.$recordGRTP["Name"].'</option>';
                            }
                        echo '</select>';
                        
                        ?>
                        
                        <!-- Text Field -->
                        <label for="grid">Form</label>
                        
                        <?php
                        
                        echo '<select required="required" name="Form" class="general">';
                            
                            echo '<option value=""> Select Form </option>';
                            
                            while ($recordForm = mysql_fetch_assoc($resultForm)){
                                echo '<option value='.$recordForm["Id"];
                                
                                if($recordset["Form"] == $recordForm["Id"]){
                                    echo ' selected="selected" ';
                                }
                               
                                echo '>'.$recordForm["Name"].'</option>';
                            }
                            
                            echo '</select>';
                        
                        ?>
                        
                        <!-- Text Field -->
                        <label for="weight">Weight</label>
                        <input id="weight" type="text" name="Weight" value="<?php echo $recordset["Weight"]; ?>" />
                        
                        <button type="submit" class="submitButton">Submit</button>
                        <input type="hidden" name="table" value="Harvests">
                        <input type="hidden" name="keyLabel" value="Id">
                        <input type="hidden" name="keyValue" value="<?php echo $recordset["HarvestCode"]; ?>">
                        
                    </div>
                
                </form>
            </td>
        </tr>
        
    </table>

</body>
</html>