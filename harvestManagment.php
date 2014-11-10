<?php

include_once './database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

if($_GET["op"]=="edt"){
    
    // Select the user's data according to Id
    $sqlSearch = "SELECT h.*, h.Id as HarvestCode, e.EDate, e.EffortNumber, e.Fisherman, u.Username, w.Name as FormName, sph.Specie, s.Name as SpecieName FROM Harvests as h"
        . " INNER JOIN Efforts as e"
        . " ON h.Effort=e.Id"
        . " INNER JOIN Users as u"
        . " ON e.Fisherman=u.Id"
        . " INNER JOIN WeightForms as w"
        . " ON h.Form = w.Id"
        . " INNER JOIN SpeciesPerHarvest as sph"
        . " ON h.Id = sph.Harvest"
        . " INNER JOIN Species as s"
        . " ON sph.Specie = s.Id"
        . " WHERE h.Id=".$_GET["cod"]
        . " ORDER BY e.EDate DESC, e.Fisherman, e.EffortNumber ASC";
    $result = $dbConnection->execSql($sqlSearch);
    $recordset = mysql_fetch_assoc($result);
}  

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
    
    <script>
    // function to open a new individual window
    function open_window(op, id) {
        window.open('individualManagmentWindow.php?op='+op+'&cod='+id,'mywindow','menubar=0,resizable=1,width=1500,height=600,top=200,left=200');
    }
    </script>
    
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
                        <button type="button" class="submitButton" id="addIndividual" onclick="open_window('add',<?php echo $_GET["cod"] ?>)" >Add Individual</button>
                        <input type="hidden" name="table" value="Harvests">
                        <input type="hidden" name="keyLabel" value="Id">
                        <input type="hidden" name="keyValue" value="<?php echo $recordset["HarvestCode"]; ?>">
                        
                    </div>
                
                </form>
            </td>
        </tr>
        
        <tr>
            <td>
                <div id="headHarvest" class="col_12">
                    <img src="images/fishIcon.png" height="25px" width="30px" /><br/>
                    <label class="tableText" style=" font-size: 18px;">Individual List</label>
                    <img src="images/thinBar.jpg" height="2px" width="83%"><p></p>    
                </div>
                
                <table width="1690" border="0" cellpadding="0" cellspacing="0" style="margin-left: 15px;  ">

                    <tr height="25" bgcolor="#D8D8D8" class="tableTitle">

                        <td width="400"><div align="left">&nbsp;Specie</div></td>
                        <td width="400"><div align="left">&nbsp;Total Length</div></td>
                        <td width="400"><div align="left">&nbsp;Fork Length</div></td>
                        <td width="400"><div align="left">&nbsp;Scales</div></td>
                        <td width="90"><div align="center">&nbsp;Options</div></td>

                    </tr> 
                    <tr>
                        <td>

                            <?php

                            if ($numberIndividuals>0) {

                                while ($recordsetInd = mysql_fetch_assoc($resultIndividuals)){

                                    if ($lcor) {
                                      $bg = "#F2F2F2";
                                    } else {
                                      $bg = "#ffffff";
                                    }

                                    echo '<tr class="tableText" href="" height="40" bgcolor="'.$bg.'" onMouseOver="this.bgColor=\'#C4CDD6\'" onMouseOut="this.bgColor=\''.$bg.'\'">';
                                        echo '<td><a href="javascript:open_window(\'edt\','.$recordsetInd["Id"].')">&nbsp;'.$recordsetInd["Name"].'</a></td>';
                                        echo '<td>&nbsp;'.$recordsetInd["LengthTotal"].'</td>';
                                        echo '<td align="left">&nbsp;'.$recordsetInd["LengthFork"].'</td>';
                                        echo '<td align="left">&nbsp;'.$recordsetInd["Scales"].'</td>';
                                        echo '<td align="center">'
                                            . '<a href="./actions/deleteIndividual.php?cod='.$recordsetInd["Id"].'"><img src="images/delete.png" height="25px" width="25px" /></a>'
                                            . '</td>';
                                    echo '<tr/>';

                                    $lcor = !$lcor;
                                }
                                echo '</table>';
                            } else {
                                echo '</table><br><br><br><div align="center"><font color="#678FC2" face="Tahoma, Arial, Helvetica, sans-serif" size="3">No register was found.</font></div><br><br><br>';
                            }

                            ?>
                        </td>
                    </tr>
                    
                </table>
                    
                    <p></p>
                    
            
            </td>
        </tr>
        
    </table>

</body>
</html>