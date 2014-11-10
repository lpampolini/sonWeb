<?php

include_once './database/connection.php';
include_once './actions/functions.php';

$dbConnection = new connection();
$dbConnection->newConnection();

if($_GET["op"]=="edt"){    
    // Select the user's data according to Id
    $sqlSearch = "SELECT * FROM MESH5"
            . " WHERE Id=".$_GET["cod"];
    $result = $dbConnection->execSql($sqlSearch);
    $recordset = mysql_fetch_assoc($result);
}

?>

<html>

    <?php include_once './defaultHead.php'; ?>

    <link rel="stylesheet" type="text/css" href="styles/cssFramework/kickstart.css" media="all" />
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />

<body>

    <?php include_once 'topMenu.php'; ?>
    
    <p></p>
    
    <table border="1" width="500px">
                    
        <tr bgcolor="#D8D8D8" height="25px">
            <td>
                <?php  
                
                if($_GET[op]=="add"){
                    echo "Create new MESH";
                }else{
                    echo "Edit MESH";
                }
                
                ?>
                
            </td>
        </tr>
        
        <tr>
            <td>
                <p></p>
                <form class="vertical" id="Form" method="post" action="<?php echo "actions/validateMesh.php?op=".$_GET["op"]; ?>" >
                    
                    <div class="col_3" style="margin-left: 30px">
                        <!-- Text Field -->
                        <label for=“name”>Range</label>
                        <input id="name" class="general" type="text" name="Name" value="<?php echo $recordset["Name"]; ?>" />    
                        <button type="submit" style="margin-left: 318px;" >Submit</button>
                    </div>
                    
                    <input type="hidden" name="table" value="MESH5">
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