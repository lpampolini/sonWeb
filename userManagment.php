<?php

include_once './database/connection.php';
include_once './actions/functions.php';
include_once './actions/createSalt.php';

$dbConnection = new connection();
$dbConnection->newConnection();

if($_GET["op"]=="edt"){    
    // Select the user's data according to Id
    $sqlSearch = "SELECT * FROM Users"
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

// Sql to select all nets
$sqlProvinces = "SELECT * FROM Provinces";
$resultProv = $dbConnection->execSql($sqlProvinces);

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
                    echo "Create new user";
                }else{
                    echo "Edit user";
                }
                
                ?>
                
            </td>
        </tr>
        
        <tr>
            <td>
                <p></p>
                <form class="vertical" id="effortForm" method="post" action="<?php echo "actions/validateUser.php?op=".$_GET["op"]; ?>" >
                    <div class="col_3">
                        
                        <!-- Text Field -->
                        <label for=“username”>Username</label>
                        <input id="username" type="text" name="Username" value="<?php echo $recordset["Username"]; ?>" />
                        
                        <label for=“firstname”>First Name</label>
                        <input id="firstname" type="text" name="FirstName" class="general" value="<?php echo $recordset["FirstName"]; ?>" />
                        
                        <label for=“lastname”>Last Name</label>
                        <input id="lasttname" type="text" name="LastName" class="general" value="<?php echo $recordset["LastName"]; ?>" />
                        
                        <label for="email">Email</label>
                        <input id="email" type=“text” name="Email" class="general" value="<?php echo $recordset["Email"]; ?>" />
                        
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" name="Phone" class="general" maxlength="13" onkeypress="mask(this,phoneNumber)" value="<?php echo $recordset["Phone"]; ?>" />
                        
                        <label for="street">Street</label>
                        <input id="street" type=“text” name="Street" class="general" value="<?php echo $recordset["Street"]; ?>" />
                        
                        <label for="city">City</label>
                        <input id="city" type=“text” name="City" value="<?php echo $recordset["City"]; ?>" />
                        
                        <label for="province">Province</label>
                        
                        <?php
                        echo "<select id='province' class='province' name='Province' required='required'>";
                            echo "<option value=''> Select province</option>";
                            while($recordProv = mysql_fetch_assoc($resultProv)){

                                echo "<option value='".$recordProv["Id"]."'";

                                if($recordset["Province"] == $recordProv["Id"]){
                                    echo "selected='selected'";
                                }

                                echo ">".$recordProv["Name"]."</option>";
                            }
                         echo "</select>";   
                        ?>
                        
                    </div>
                    
                    <div class="col_7">
                        
                        <label for=“usertype”>User Type</label>
                        
                        <?php
                        echo "<select id='usertype' class='general' name='UserType' required='required'>";
                            echo "<option value=''> Select user type</option>";
                            while($recordUserType = mysql_fetch_assoc($resultUserType)){

                                echo "<option value='".$recordUserType["Id"]."'";

                                if($recordset["UserType"]==$recordUserType["Id"]){
                                    echo "selected='selected'";
                                }

                                echo ">".$recordUserType["Type"]."</option>";
                            }
                         echo "</select>";   
                        ?>
                        
                        <label for="status"> User status</label>
                        <select id="Activated" name="Activated" class="general">
                            <option value="" > Select status </option>
                            <option value="1" <?php if($recordset["Activated"]=='1') echo "selected='selected'"; ?> > Active </option>
                            <option value="0" <?php if($recordset["Activated"]=='0') echo "selected='selected'"; ?>> Inactive </option>
                        </select>
                        
                        <label for=“boat”>Boat preference</label>
                        
                        <?php
                        echo "<select id='boat' name='PrefBoat' required='required' class='general'>";
                            echo "<option value=''> Select boat preference</option>";
                            while($recordBoat = mysql_fetch_assoc($resultBoat)){

                                echo "<option value='".$recordBoat["Id"]."'";

                                if($recordset["PrefBoat"]==$recordBoat["Id"]){
                                    echo "selected='selected'";
                                }

                                echo ">".$recordBoat["Name"]."</option>";
                            }
                         echo "</select>";   
                        ?>
                        
                        <label for=“net”>Net preference</label>
                        
                        <?php
                        echo "<select id='net' name='PrefNet' required='required' class='general'>";
                            echo "<option value=''> Select net preference</option>";
                            while($recordNet = mysql_fetch_assoc($resultNet)){

                                echo "<option value='".$recordNet["Id"]."'";

                                if($recordset["PrefNet"]==$recordNet["Id"]){
                                    echo "selected='selected'";
                                }

                                echo ">".$recordNet["Name"]."</option>";
                            }
                         echo "</select>";   
                        ?>
                        
                        <label for=“prefweight”>Unit preference (Weight)</label>
                        <select id="prefweight" name="PrefWeight" class="general">
                            <option value=""> Select unit preference </option>
                            <option value="0" <?php if($recordset["PrefWeight"]=='0') echo "selected='selected'"; ?> > Pounds </option>
                            <option value="1" <?php if($recordset["PrefWeight"]=='1') echo "selected='selected'"; ?> > Kilograms </option>
                        </select>
                        
                        <label for=“prefsize”>Unit preference (Length)</label>
                        <select id="prefsize" name="PrefSize" class="general">
                            <option value=""> Select unit preference </option>
                            <option value="0" <?php if($recordset["PrefSize"]=='0') echo "selected='selected'"; ?> > Inches </option>
                            <option value="1" <?php if($recordset["PrefSize"]=='1') echo "selected='selected'"; ?> > Feet </option>
                            <option value="1" <?php if($recordset["PrefSize"]=='2') echo "selected='selected'"; ?> > Centimeters </option>
                        </select>
                        
                    <button type="submit" class="submitButton">Submit</button>
                    
                    <input type="hidden" name="table" value="Users">
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