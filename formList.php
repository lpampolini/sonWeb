<?php

include_once 'database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

$sqlList = " SELECT * from WeightForms";

//echo $sqlList;
$numberLines = array();
$exec = $dbConnection->execSql($sqlList);
$numberLines[0] = mysql_num_rows($exec);

?>
<link rel="stylesheet" type="text/css" href="styles/cssFramework/kickstart.css" media="all" />
<script type="text/javascript">

jQuery(document).ready(function($) {
      $(".clickableRow").click(function() {
            window.document.location = $(this).attr("href");
      });
});

</script>
<html>

    <?php include_once './defaultHead.php'; ?>

<body>
    
    <?php include_once './topMenu.php'; ?>

        
    <p></p>
    
    <table border="0" width="1920" >
        <tr>
            <td>
                
                <table border="0" width="100%" height="100px">
                    
                    <tr>
                        <td>
                            
                            <table width="1914" border="1" cellpadding="0" cellspacing="0">
                                
                                <tr height="25" bgcolor="#D8D8D8" class="tableTitle">

                                  <td width="1641"><div align="left">&nbsp;Name</div></td>
                                  <td width="273"><div align="left">&nbsp;Options</div></td>
                                </tr> 

                            <?php
                            
                            if ($numberLines[0]>0) {
                                
                                while ($recordset = mysql_fetch_assoc($exec)){

                                    if ($lcor) {
                                      $bg = "#F2F2F2";
                                    } else {
                                      $bg = "#ffffff";
                                    }

                                    echo '<tr class="tableText" href="" height="40" bgcolor="'.$bg.'" onMouseOver="this.bgColor=\'#C4CDD6\'" onMouseOut="this.bgColor=\''.$bg.'\'">';
                                        echo '<td><a href="formManagment.php?op=edt&cod='.$recordset["Id"].'">&nbsp;'.$recordset["Name"].'</a></td>';
                                        echo '<td align="center">'
                                            . '<a href="./actions/deleteForm.php?cod='.$recordset["Id"].'"><img src="images/delete.png" height="25px" width="25px" /></a>'
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
                    
                    <tr>
                        <td>
                            <p></p>
                            <button type="button" class="normalButton" onclick="location.href='formManagment.php?op=add'">Add new form</button>
                        </td>
                    </tr>
                    
                </table>
                
            </td>
        </tr>
    </table>
    
</body>

</html>

<?php 

if($_GET["msg"] === "e"){
    echo "<script type='text/javascript'>";
    echo "alert('The form is being used for other registers. Could not be deleted.');";
    echo "</script>";
}

?>