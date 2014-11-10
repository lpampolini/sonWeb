<?php

include_once './database/connection.php';
include_once './actions/functions.php';

$dbConnection = new connection();
$dbConnection->newConnection();

if($_GET["op"]=="edt"){    
    // Select the user's data according to Id
    $sqlSearch = "SELECT * FROM Nets"
            . " WHERE Id=".$_GET["cod"];
    $result = $dbConnection->execSql($sqlSearch);
    $recordset = mysql_fetch_assoc($result);
}  

// Sql to select all GRTPs
$sqlGRTP = "SELECT * FROM GRTP";
$resultGRTP = $dbConnection->execSql($sqlGRTP);

// Sql to select all SETYPEs
$sqlSETYPE = "SELECT * FROM SETYPE";
$resultSETYPE = $dbConnection->execSql($sqlSETYPE);

// Sql to select all GRHTMs
$sqlGRHTM = "SELECT * FROM GRHTM";
$resultGRHTM = $dbConnection->execSql($sqlGRHTM);

// Sql to select all GRHTMs
$sqlMESH = "SELECT * FROM MESH5";
$resultMESH = $dbConnection->execSql($sqlMESH);

?>
<script type="text/javascript">
    
    function submitForm(){
        var GRDEP = document.getElementById('grdep5').value;
        var SIDEP = document.getElementById('sidep5').value;
        if(GRDEP > SIDEP){
            alert(1);
            throw "Warning: GRDEP5 must be smaller than SIDEP5";
            alert(2);
        }
    }
    
</script>
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
                <form class="vertical" id="effortForm" name="fm" method="post" action="<?php echo "actions/validateNet.php?op=".$_GET["op"]; ?>" >
                    
                    <div class="col_4">
                        
                        <!-- Text Field -->
                        <label for=“name”>Name</label>
                        <input id="name" type="text" class="general" required="required" name="Name" value="<?php echo $recordset["Name"]; ?>" />
                        
                        <?php
                        
                        echo '<label>GRTP&nbsp&nbsp</label>';
                            
                            echo '<select required="required" name="GRTP" class="general" >';
                            
                            echo '<option value=""> Select GRTP </option>';
                            
                            while ($recordGRTP = mysql_fetch_assoc($resultGRTP)){
                                echo '<option value='.$recordGRTP["Id"];
                                
                                if($recordGRTP["Id"] === $recordset["GRTP"]){
                                    echo ' selected="selected" ';
                                }
                                
                                echo '>'.$recordGRTP["Name"].'</option>';
                            }
                            echo '</select>';
                        ?>
                        
                        <label for=“grlen5”>GRLEN5</label>
                        <input id="grlen5" type="number" name="GRLEN5" class="general" max="15000" value="<?php echo $recordset["GRLEN5"]; ?>" />
                        
                        <label for=“grhtm”>GRHTM</label>
                        
                        <?php
                            
                            echo '<select required="required" name="GRHTM" class="general" >';
                            
                            echo '<option value=""> Select GRHTM </option>';
                            
                            while ($recordGRHTM = mysql_fetch_assoc($resultGRHTM)){
                                echo '<option value='.$recordGRHTM["Id"];
                                
                                if($recordGRHTM["Id"] === $recordset["GRHTM"]){
                                    echo ' selected="selected" ';
                                }
                                
                                echo '>'.$recordGRHTM["Name"].'</option>';
                            }
                            echo '</select>';
                        ?>
                        
                        <label for="mesh5">MESH5</label>
                        <select name="MESH5" class="general" id="mesh" required="required">
                            <option value="">Select MESH</option>
                            <?php
                                while ($recordMESH = mysql_fetch_assoc($resultMESH)){
                                echo '<option value='.$recordMESH["Id"];
                                
                                if($recordMESH["Id"] === $recordset["MESH5"]){
                                    echo ' selected="selected" ';
                                }
                                
                                echo '>'.$recordMESH["Name"].'</option>';
                            }
                            ?>
                        </select>
                        
                    </div>
                        
                        
                    <div class="col_4">
                        
                        <label for="grdep5"> GRDEP5</label>
                        <input id="grdep5" type="number" name="GRDEP5" class="general" max="700" value="<?php echo $recordset["GRDEP5"]; ?>" />
                        <!--onkeypress="mask(this,onlyNumbers)"--> 
                        <label for="sidep5">SIDEP5</label>
                        <input id="sidep5" required="required" class="general" max="700" onkeypress="mask(this,tel)" type="number" name="SIDEP5" value="<?php echo $recordset["SIDEP5"]; ?>" />
                        
                        <?php
                        
                        echo '<label>SETYPE</label>';
                            
                            echo '<select required="required" name="SETYPE" class="general" >';
                            
                            echo '<option value=""> Select SETYPE </option>';
                            
                            while ($recordSETYPE = mysql_fetch_assoc($resultSETYPE)){
                                echo '<option value='.$recordSETYPE["Id"];
                                
                                if($recordSETYPE["Id"] === $recordset["SETYPE"]){
                                    echo ' selected="selected" ';
                                }
                                
                                echo '>'.$recordSETYPE["Name"].'</option>';
                            }
                            echo '</select>';
                        ?>
                        
                        <button type="submit" class="submitButton" onclick="submitForm()">Submit</button>
                    
                        <input type="hidden" name="table" value="Nets">
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