<?php

include_once 'database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

$sqlList = "SELECT h.*, h.Id as harvestCode, e.EDate, e.EffortNumber, e.Fisherman, u.Username, w.Name as FormName, s.Name as SpecieName FROM Harvests as h"
        . " INNER JOIN Efforts as e"
        . " ON h.Effort=e.Id"
        . " INNER JOIN Users as u"
        . " ON e.Fisherman=u.Id"
        . " INNER JOIN WeightForms as w"
        . " ON h.Form = w.Id"
        . " INNER JOIN Species as s"
        . " ON h.Specie = s.Id";
if(isset($_GET["eff"]) and $_GET["eff"] != ""){
    $sqlList .= " WHERE Effort=".$_GET["eff"];
}
    $sqlList .= " ORDER BY e.EDate DESC, e.Fisherman";

    //echo $sqlList.'<br/>';
//  if (isset($descricao) and $descricao!="") {
//    if(isset($cond) and $cond!='')
//      $cond.= " and nome LIKE '%".$descricao."%' ";
//	else
//	  $cond.= " where nome LIKE '%".$descricao."%' ";
//  }
//
//  if (isset($Pcurso) and $Pcurso!="0") {
//    if(isset($cond) and $cond!='')
//      $cond.= " and idcurso ='".$Pcurso."'";
//	else
//	  $cond.= " where idcurso ='".$Pcurso."'";
//  }
//  
//  if (isset($Psemestre) and $Psemestre!="0") {
//    if(isset($cond) and $cond!='')
//      $cond.= " and semestre='".$Psemestre."'";
//	else
//	  $cond.= " where semestre='".$Psemestre."'";
//  }
//  
//  if (isset($Pturno) and $Pturno!="0") {
//    if(isset($cond) and $cond!='')
//      $cond.= " and turno='".$Pturno."'";
//	else
//	  $cond.= " where	 turno='".$Pturno."'";
//  }
//  
$numberLines = array();
//  $sql_values.= $cond;
//  
//  # Ordena resultado por nome
//  $sql_values.=' Order by nome'; 
$exec = $dbConnection->execSql($sqlList);
//  
//  //echo '<font color="#0000">'.$sql_values;
//  
//$recordset = mysql_fetch_assoc($exec);
$numberLines[0] = mysql_num_rows($exec);


//  $sql_values.=" limit $inicio,$pag_views";
//  $_SESSION['sql_exporta']=$sql_values;  
//
//  $exec = $cn->execsql($sql_values);
//  $nlinhas[1] = mysql_num_rows($exec);

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

                                  <td width="307"><div align="left">&nbsp;Effort</div></td>
                                  <td width="307"><div align="left">&nbsp;Date</div></td>
                                  <td width="307"><div align="left">&nbsp;Fisherman</div></td>
                                  <td width="307"><div align="left">&nbsp;Form</div></td>
                                  <td width="307"><div align="left">&nbsp;Weight</div></td>
                                  <td width="307"><div align="left">&nbsp;Specie</div></td>
                                  <td width="100" colspan="2"><div align="center">&nbsp;Options</div></td>
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
                                        echo '<td><a href="harvestManagment.php?op=edt&cod='.$recordset["harvestCode"].'">&nbsp;'.$recordset["EffortNumber"].'</a></td>';
                                        echo '<td>&nbsp;'.$recordset["EDate"].'</td>';
                                        echo '<td>&nbsp;'.$recordset["Username"].'</td>';
                                        echo '<td align="center">&nbsp;'.$recordset["FormName"].'</td>';
                                        echo '<td align="center">&nbsp;'.$recordset["Weight"].'</td>';
                                        echo '<td align="center">&nbsp;'.$recordset["SpecieName"].'</td>';
                                        echo '<td align="center" width="50"><a href="./individualList.php?eff='.$recordset["Id"].'"><img src="images/fishIcon.png" height="25px" width="35px"/></a> &nbsp;</td>'
                                            . '<td align="center" width="50"><a href="./actions/deleteHarvest.php?cod='.$recordset["Id"].'"><img src="images/delete.png" height="25px" width="25px" /></a></td>';
                                    echo '<tr/>';

                                    $lcor = !$lcor;
                                }
                                echo '</table>';
                            } else {
                                echo '</table><br><br><br><div align="center"><font color="#678FC2" face="Tahoma, Arial, Helvetica, sans-serif" size="2">Any register was found.</font></div><br><br><br>';
                            }
                            
                            ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <p></p>
                            <!--<button type="button" class="normalButton" onclick="location.href='harvestManagment.php?op=add'">Add new harvest</button>-->
                        </td>
                    </tr>
                    
                </table>
                
            </td>
        </tr>
    </table>
    
</body>

</html>