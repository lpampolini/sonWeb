<?php

include_once './database/connection.php';
include_once './actions/functions.php';
include_once './actions/createSalt.php';

$dbConnection = new connection();
$dbConnection->newConnection();

if($_GET["op"]=="edt"){    
    // Select the user's data according to Id
    $sqlSearch = "SELECT * FROM Individuals"
            . " WHERE Id=".$_GET["cod"];
    $result = $dbConnection->execSql($sqlSearch);
    $recordset = mysql_fetch_assoc($result);
}  

// Sql to select all the User Types
$sqlUserType = "SELECT * FROM UserTypes";
$resultUserType = $dbConnection->execSql($sqlUserType);

// Sql to select all the boats
$sqlBoat = "SELECT * FROM Boats";
$resultBoat = $dbConnection->execSql($sqlBoat);

// Sql to select all species
$sqlSpecie = "SELECT * FROM Species";
$resultSpecie = $dbConnection->execSql($sqlSpecie);

// Sql to select all forms
$sqlForms = "SELECT * FROM WeightForms";
$resultForm = $dbConnection->execSql($sqlForms);

// Sql to select all nets
$sqlNets = "SELECT * FROM Nets";
$resultNet = $dbConnection->execSql($sqlNets);

?>

<html>

    <?php include_once './defaultHead.php'; ?>

    <link rel="stylesheet" type="text/css" href="styles/cssFramework/kickstart.css" media="all" />
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />

<body>
    
    <?php include_once 'topMenu.php'; ?>
    
    <p></p>
    
    <table border="1" width="1914">
                    
        <tr bgcolor="#D8D8D8" height="25px">
            <td>
                <?php  
                
                if($_GET[op]=="add"){
                    echo "Create new individual";
                }else{
                    echo "Edit individual";
                }
                
                ?>
                
            </td>
        </tr>
        
        <tr>
            <td>
                <p></p>
                <form class="vertical" id="effortForm" method="post" action="<?php echo "actions/validateIndividual.php?op=".$_GET["op"]; ?>" >
                    
                    <div class="col_4">
                        
                        <!-- Text Field -->
                        <label for=“LengthTotal”>Total Length</label>
                        <input id="lengthtotal" type="text" class="general" required="required" name="LengthTotal" value="<?php echo $recordset["LengthTotal"]; ?>" />
                        
                        <label for=“LengthFork”>Fork Length</label>
                        <input id="lengthfork" type="text" required="required" name="LengthFork" class="general" value="<?php echo $recordset["LengthFork"]; ?>" />
                        
                        <label for=“roundweight”>Round Weight</label>
                        <input id="roundweight" type="text" name="RoundWeight" class="general" value="<?php echo $recordset["RoundWeight"]; ?>" />
                        
                        <label for="dressedweight">Dressed Weight</label>
                        <input id="dressedweight" type=“text” name="DressedWeight" class="general" value="<?php echo $recordset["DressedWeight"]; ?>" />
                        
                        <label for="sex">Sex</label>
                        <select name="Sex" required="required" id="sex" class="general">
                            <option value=""> Select a gender </option>
                            <option value="f" <?php if($recordset['Sex'] == 'f') echo 'selected="selected"'; ?> > Female </option>
                            <option value="m" <?php if($recordset['Sex'] == 'm') echo 'selected="selected"'; ?> > Male </option>
                        </select>
                        
                        <label for="scarswounds">Scar Wounds</label>
                        <input id="scarswounds" type=“text” name="ScarsWounds" class="general" value="<?php echo $recordset["ScarsWounds"]; ?>" />
                        
                    </div>
                        
                        
                    <div class="col_4">
                        
                        <?php
                        
                        echo '<label>Specie&nbsp&nbsp</label>';
                            
                            echo '<select required="required" name="Specie" class="general" >';
                            
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
                        
                        <label for="lamprey"> Lamprey</label>
                        <input id="lamprey" class="general" type=“text” name="Lamprey" value="<?php echo $recordset["Lamprey"]; ?>" />
                        
                        <label for="scales">Scales</label>
                        <select name="Scales" id="scales" required="required" class="general">
                            <option value=""> Select Scales </option>
                            <option value="n" <?php if($recordset['Scales']=='n') echo 'selected="selected"'; ?> > No </option>
                            <option value="s" <?php if($recordset['Scales']=='s') echo 'selected="selected"'; ?> > Yes </option>
                        </select>
                        
                        <label for="OvariesGonads">Ovaries/Gonads</label>
                        <input id="ovariesgonads" required="required" class="general" type=“text” name="OvariesGonads" value="<?php echo $recordset["OvariesGonads"]; ?>" />
                        
                        <label for="stomach">Stomach</label>
                        <input id="stomach" class="general" type=“text” name="Stomach" value="<?php echo $recordset["Stomach"]; ?>" />
                        
                        <label for="comments">Comments</label>
                        <textarea id="comments" name="Comments" rows="5" cols="50">
                            
                        </textarea>
                        
                    </div>
                    
                    <div class="col_2">
                        
                    <label for="finclips">Fin Clips</label>
                    <input id="fincips" type=“text” class="general" name="FinClips" value="<?php echo $recordset["FinClips"]; ?>" />    
                        
                    <button type="submit" class="submitButton">Submit</button>
                    
                    <input type="hidden" name="table" value="Individuals">
                    <input type="hidden" name="keyLabel" value="Id">
                    <input type="hidden" name="keyValue" value="<?php echo $recordset["Id"]; ?>">
                    
                    </div>
                    
                </form>
            </td>
        </tr>
        
        </form>
    </table>

</body>
</html>