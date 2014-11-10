<?php

include_once './database/connection.php';
include_once './actions/functions.php';
include_once './actions/createSalt.php';

$dbConnection = new connection();
$dbConnection->newConnection();

if($_GET["op"]=="edt"){    
    // Select the user's data according to Id
    $sqlSearch = "SELECT * FROM Boats"
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
                    echo "Create new boat";
                }else{
                    echo "Edit boat";
                }
                
                ?>
                
            </td>
        </tr>
        
        <tr>
            <td>
                <p></p>
                <form class="vertical" id="effortForm" method="post" action="<?php echo "actions/validateBoat.php?op=".$_GET["op"]; ?>" >
                    
                    <div class="col_3" style="margin-left: 30px">
                        
                        <label for=“name”>Name</label>
                        <input id="name" class="general" type="text" name="Name" value="<?php echo $recordset["Name"]; ?>" />    
                        
                        <label for=“size”>Size</label>
                        <input id="size" class="general" type="text" name="Size" value="<?php echo $recordset["Size"]; ?>" />
                        
                        <button type="submit" style="margin-left: 318px;" >Submit</button>

                    </div>
                    
                    
                    <input type="hidden" name="table" value="Boats">
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