<?php

include_once 'database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Pags module
if(isset($_GET['limitOfRows']))
  $pag_views = $_GET['limitOfRows'];
else
  $pag_views = 15;

if(!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$_SESSION['page_alt']=$page;
$mat = $page -1;
// If it is in the first page, start limit is zero
$inicio = $mat * $pag_views;

$sqlList = "SELECT h.*, h.Id as harvestCode, e.EDate, e.EffortNumber, e.Fisherman, u.Username, w.Name as FormName, s.Name as SpecieName, s.Code as SpecieCode FROM Harvests as h"
        . " INNER JOIN Efforts as e"
        . " ON h.Effort=e.Id"
        . " INNER JOIN Users as u"
        . " ON e.Fisherman=u.Id"
        . " INNER JOIN WeightForms as w"
        . " ON h.Form = w.Id"
        . " INNER JOIN Species as s"
        . " ON h.Specie = s.Id";

if(isset($_GET["sEffortNum"]) and $_GET["sEffortNum"] != ""){
    if(isset($cond) and $cond!='')
        $cond.= " and Effort=".$_GET["sEffortNum"];
    else
        $cond.= " where Effort=".$_GET["sEffortNum"];
}

if (isset($_GET['sSpecie']) and trim($_GET['sSpecie']!="")) {
    if(isset($cond) and $cond!='')
        $cond.= " and Specie = '".$_GET['sSpecie']."'";
    else
        $cond.= " where Specie = '".$_GET['sSpecie']."'";
}

if (isset($_GET['sStrDate']) and trim($_GET['sStrDate']!="")) {
    if(isset($cond) and $cond!='')
        $cond.= " and EDate >= '".$_GET['sStrDate']."'";
      else
        $cond.= " where EDate >= '".$_GET['sStrDate']."'";
}

if (isset($_GET['sEndDate']) and trim($_GET['sEndDate']!="")) {
    if(isset($cond) and $cond!='')
        $cond.= " and EDate <= '".$_GET['sEndDate']."'";
      else
        $cond.= " where EDate <= '".$_GET['sEndDate']."'";
}

if (isset($_GET['sDuration']) and trim($_GET['sDuration']!="")) {
    if(isset($cond) and $cond!='')
        $cond.= " and Duration='".$_GET['sDuration']."'";
      else
        $cond.= " where Duration='".$_GET['sDuration']."'";
}

$nlinhas = array();
$sqlList.= $cond;
$sqlList.= " ORDER BY e.EDate DESC, e.Fisherman";

$exec = $dbConnection->execSql($sqlList);
$nlinhas[0] = mysql_num_rows($exec);

$sqlList.=" limit $inicio,$pag_views";
$_SESSION['sql_exporta']=$sqlList;

$exec = $dbConnection->execsql($sqlList);
$nlinhas[1] = mysql_num_rows($exec);

// Sql to select all species
$sqlSpecies = "SELECT * FROM Species";
$resSpecies = $dbConnection->execSql($sqlSpecies);

?>
<link rel="stylesheet" type="text/css" href="styles/cssFramework/kickstart.css" media="all" />
<script type="text/javascript">

$(document).ready(function() {
    //alert(1);
    //document.getElementById('monthFilter').getElementsByTagName('option')[1].selected = 'selected';
});


function reloadPage(){
    $('#page').attr('value','1');
    document.fm.submit();
}

function clearSearch(){
    document.getElementById('sEffortNum').value = '';
    document.getElementById('sStrDate').value = '';
    document.getElementById('sEndDate').value = '';
    document.getElementById('sSpecie').getElementsByTagName('option')[0].selected = 'selected';
    document.fm.submit();
}

</script>

<html>
<body>
    <?php include_once './defaultHead.php'; ?>
    <?php include_once './topMenu.php'; ?>

        
    <p></p>
    
    <form name="fm" action="<?php echo $PHP_SELF;?>">
    <?php
    // Set the number of pages by dividing the number of total records by the number of records per page (25/50/70)
    $pages = $nlinhas[0] / $pag_views;
    $volta   = $page-1;	  
    $proxima = $page+1;
    ?>
    <table border="0" width="1900" >
        
        <tr bgcolor="#F5F5F5">
            <td colspan="2">
                
                <div class="col_3" style="margin-top: 12px;">
                    <label for=“sEffortNum” class="tableText">Effort Number</label>
                    <input type="text" class="smaller" name="sEffortNum" id="sEffortNum" value="<?php echo $_GET['sEffortNum']; ?>"/>
                    <a href="#"><img src="images/searchIcon.png" height="20" width="20" style="float: next" onclick="reloadPage()"></a>
                </div>

                <div class="col_3" style="margin-top: 12px;">
                    <label for=“sStrDate” class="tableText">Start Date</label>
                    <input type="date" name="sStrDate" id="sStrDate" value="<?php echo $_GET['sStrDate']; ?>"/>
                    <a href="#"><img src="images/searchIcon.png" height="20" width="20" style="float: next" onclick="reloadPage()"></a>
                </div>
                
                <div class="col_3" style="margin-top: 12px;">
                    <label for=“sEndDate” class="tableText">End Date</label>
                    <input type="date" name="sEndDate" id="sEndDate" value="<?php echo $_GET['sEndDate']; ?>"/>
                    <a href="#"><img src="images/searchIcon.png" height="20" width="20" style="float: next" onclick="reloadPage()"></a>
                </div>

                <div class="col_3" style="margin-top: 12px;">
                    <label for=“sSpecie” class="tableText">Specie</label>
                    <select id='sSpecie' class='smaller' name='sSpecie' onchange='reloadPage()'>
                    <?php
                        echo '<option value=""> Select Specie </option>';

                        while ($recSpecies = mysql_fetch_assoc($resSpecies)){
                            echo '<option value='.$recSpecies["Id"];

                            if($recSpecies["Id"] === $_GET["sSpecie"]){
                                echo ' selected="selected" ';
                            }

                            echo '>'.$recSpecies['Code'].' - '.$recSpecies['Name'].'</option>';
                        }
                    ?>
                    </select>
                    <a href="#"><img src="images/refresh.png" height="25" width="25" style="float: right; margin-top: 3px;" onclick="clearSearch()"></a>
                </div>
            </td>
        </tr>
                
        <tr>
            <td colspan="2">
                <table width="1900" border="1" cellpadding="0" cellspacing="0">
                                
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

                    if ($nlinhas[1]>0) {

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
                                echo '<td align="left">&nbsp;'.$recordset["SpecieCode"].' - '.$recordset["SpecieName"].'</td>';
                                echo '<td align="center" width="50"><a href="./individualList.php?eff='.$recordset["Id"].'"><img src="images/fishIcon.png" height="25px" width="35px"/></a> &nbsp;</td>'
                                    . '<td align="center" width="50"><a href="./actions/deleteHarvest.php?cod='.$recordset["Id"].'"><img src="images/delete.png" height="25px" width="25px" /></a></td>';
                            echo '<tr/>';

                            $lcor = !$lcor;
                        }
                        echo '</table>';
                    } else {
                        echo '</table><br><br><br><div align="center"><font color="#678FC2" face="Tahoma, Arial, Helvetica, sans-serif" size="3">No register was found.</font></div><br><br><br>';
                    }
                    
            echo '</td>';
        echo '</tr>';
        
        ?>
        
        <tr>
            <td class="resultado" colspan="2">
                <?php 
                echo '<br/>';
                echo ''.$nlinhas[0].''; 
		
		if($nlinhas[0]>1) 
		  echo " results in "; 
		else 
		  echo " results in "; 
		echo ''; 
		if ($pages!=1){
		  echo intval($pages+1);
		}else{ 
		  echo $pages; 
		} 
		echo ''; 
		if (intval($pages)>1) 
		  echo " page(s)"; 
		else 
		  echo " page(s)";?>
            </td>
        </tr>
        
        <tr>
            <td class="resultado" colspan="2">
            <?php
		  if($volta>0){ 
		    echo '<a href=?page='.$volta;
			if($_GET['sEffortNum']<>'')
			  echo '&sEffortNum='.str_replace(' ','+',$_GET['sEffortNum']);
			if($_GET['sStrDate']<>'')
			  echo '&sStrDate='.$_GET['sStrDate'];
			if($_GET['sEndDate']<>'')
			  echo '&sEndDate='.$_GET['sEndDate'];
			if($_GET['sSpecie']<>'')
			  echo '&sSpecie='.$_GET['sSpecie'];
                        if(isset($_GET['limitOfRows']))
                          echo '&limitOfRows='.$_GET['limitOfRows'];
                        if(isset($_GET['dsYearMonth']))
                          echo '&dsYearMonth='.$_GET['dsYearMonth'];
                        
			echo '><img src="images/previous_blue.jpg" width="25" height="30" border="0" align="top"></a>';
		  }else{
		    echo '<img src="images/previous_gray.jpg" width="25" height="30" border="0" align="top">'; 
			$page=1;
		  }
		  ?>
                <input name="page" id="page" type="text" class="form" id="page" value="<?php echo $page; ?>" style="text-align: center; height: 30px; width: 35px;" onkeypress="mascara(this,soNumeros)" size="1" maxlength="3"/>
          <?php 
		  if($page<$pages) { 
		    echo '<a href=?page='.$proxima;
			if($_GET['sEffortNum']<>'')
			  echo '&sEffortNum='.str_replace(' ','+',$_GET['sEffortNum']);
			if($_GET['sStrDate']<>'')
			  echo '&sStrDate='.$_GET['sStrDate'];
			if($_GET['sEndDate']<>'')
			  echo '&sEndDate='.$_GET['sEndDate'];
			if($_GET['sSpecie']<>'')
			  echo '&sSpecie='.$_GET['sSpecie'];
                        if(isset($_GET['limitOfRows']))
                          echo '&limitOfRows='.$_GET['limitOfRows'];
                        if(isset($_GET['dsYearMonth']))
                          echo '&dsYearMonth='.$_GET['dsYearMonth'];
                        
			echo '><img src="images/next_blue.jpg" width="25" height="30" border="0" align="top"></a>'; 
		  }else{ 
		    echo '<img src="images/next_gray.jpg" width="25" height="30" border="0" align="top">'; 
		  }
		  $_SESSION['retorno']='?page='.$page.'&sFisher='.str_replace(' ','+',$_GET['sFisher']).'&sDate='.$_GET['sDate'].'&sDuration='.$_GET['sDuration'].
                          '&limitOfRows='.$_GET['limitOfRows'].'&dsYearMonth='.$_GET['dsYearMonth'];
		  ?>    
            </td>
        </tr>
        
        <tr>
            <td class="resultado" colspan="2">
                Registers each page
            </td>
        </tr>
        
        <tr>
            <td class="resultado" colspan="2">
                <select name="limitOfRows" class="pageNum" onchange="reloadPage();">
                    <option value="15" <?php if($_GET['limitOfRows']=='15') echo 'selected="selected"';?>>15</option>
                    <option value="25" <?php if($_GET['limitOfRows']=='25') echo 'selected="selected"';?>>25</option>
                    <option value="50" <?php if($_GET['limitOfRows']=='50') echo 'selected="selected"';?>>50</option>
                    <option value="70" <?php if($_GET['limitOfRows']=='70') echo 'selected="selected"';?>>70</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td class="resultado" colspan="2">
                <a href="#"><img src="images/search.png" height="40px" width="40px" alt="Pesquisar" onclick="reloadPage()" ></a>
            </td>
        </tr>
        
    </table>
        
</form>
    
</body>

</html>