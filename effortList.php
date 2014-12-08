<?php

include_once 'database/connection.php';
$dbConnection = new connection();
$dbConnection->newConnection();

session_start();

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

// Main sql select
$sqlList = "SELECT e.*, u.FirstName, u.LastName, d.Name as effortDuration FROM Efforts as e"
        . " INNER JOIN Users as u"
        . " ON e.Fisherman=u.Id"
        . " INNER JOIN Durations as d"
        . " ON e.Duration=d.Id";

if ($_SESSION['userType']=='fisher'){
  if(isset($cond) and $cond!='')
    $cond.= " and u.Id =".$_SESSION['userId'];
  else
    $cond.= " where u.Id =".$_SESSION['userId'];
}

if (isset($_GET['sFisher']) and $_GET['sFisher']!="") {
  if(isset($cond) and $cond!='')
    $cond.= " and Fisherman ='".$_GET['sFisher']."'";
      else
        $cond.= " where Fisherman ='".$_GET['sFisher']."'";
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

if (isset($_GET['sEffortNum']) and trim($_GET['sEffortNum']!="")) {
    
    /* 
     * Add necessary zeros to the left of the number
     * e.g. If the user type 1, add extra zeros to the left in order to have
     * 00001, which is the pattern used for Effort# inside the database.
    */
    $size = strlen($_GET['sEffortNum']);
    $nZeros = (5-$size);
    $sEffortNum = $_GET['sEffortNum'];
    
    for($i = 0; $i < $nZeros; $i++) {
        $sEffortNum = "0".$sEffortNum;
    }
            
    if(isset($cond) and $cond!='')
        $cond.= " and SUBSTR(EffortNumber,10,5) ='".$sEffortNum."'";
    else
        $cond.= " where SUBSTR(EffortNumber,10,5) ='".$sEffortNum."'";

}

if (isset($_GET['sDuration']) and trim($_GET['sDuration']!="")) {
  if(isset($cond) and $cond!='')
    $cond.= " and Duration='".$_GET['sDuration']."'";
      else
        $cond.= " where Duration='".$_GET['sDuration']."'";
}

if (isset($_GET['dsYearMonth']) and trim($_GET['dsYearMonth']!="0") and trim($_GET['dsYearMonth']!="")) {
  if(isset($cond) and $cond!='')
    $cond.= " and SUBSTRING(EDate,1,7)='".$_GET['dsYearMonth']."'";
  else
    $cond.= " where SUBSTRING(EDate,1,7)='".$_GET['dsYearMonth']."'";
}

$nlinhas = array();
$sqlList.= $cond;
$sqlList.= " ORDER BY Id ASC";

$exec = $dbConnection->execSql($sqlList);
$nlinhas[0] = mysql_num_rows($exec);

$sqlList.=" limit $inicio,$pag_views";
$_SESSION['sql_exporta']=$sqlList;

$exec = $dbConnection->execsql($sqlList);
$nlinhas[1] = mysql_num_rows($exec);

// Sql to select all the fishermen
$sqlFisherman = "SELECT Id,Username FROM Users";
$resultFisherman = $dbConnection->execSql($sqlFisherman);

$sqlDurations = "SELECT * FROM Durations";
$resultDuration = $dbConnection->execSql($sqlDurations);

$sqlMonths = "SELECT DISTINCT MONTH(EDate) as Month,YEAR(EDate) as Year, MONTHNAME(EDate) as MonthName FROM Efforts ORDER BY Year,Month";
$resMonths = $dbConnection->execSql($sqlMonths);

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

function reloadList(){

    // Full url
    var url = window.location;
    url = url.toString();
    
    // Url with no atributes
    var cleanUrl = url.split("?");
    var hasPage = url.split("page=");
    var checkPage = url.indexOf("page=")
    var checkQmark = url.indexOf("?");
    var checkMonth = url.indexOf("dsYearMonth=");
    var secondHalf = null;
    var urlMonth = null;

    if(checkPage!== -1){
        secondHalf = hasPage[1].toString().substring(1,hasPage[1].toString().length);
        hasPage = hasPage[0].toString()+'page=1'+secondHalf;
    }

    var selectedValue = document.getElementById('monthFilter').value;
    document.getElementById('dsYearMonth').value = selectedValue;
    
    if(checkQmark === -1 && checkMonth === -1){
        window.location.href = cleanUrl[0] + '?dsYearMonth='+selectedValue;
    }else if(checkQmark && checkMonth === -1){
        if(checkPage)
            window.location.href = hasPage + '&dsYearMonth='+selectedValue;
        else
            window.location.href = url + '&dsYearMonth='+selectedValue;
    }else if (checkQmark && checkMonth){
        if(checkPage!== -1)
            urlMonth = hasPage.split("dsYearMonth=");
        else
            urlMonth = url.split("dsYearMonth=");
        
        window.location.href = urlMonth[0] + 'dsYearMonth='+selectedValue;
    }
}

function clearSearch(){
    document.getElementById('sStrDate').value = '';
    document.getElementById('sEndDate').value = '';
    document.getElementById('sEffortNum').value = '';
    document.getElementById('sFisher').getElementsByTagName('option')[0].selected = 'selected';
    document.getElementById('sDuration').getElementsByTagName('option')[0].selected = 'selected';
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
    $previous   = $page-1;	  
    $next = $page+1;
    ?>
    <table border="0" width="1900" cellpadding="2px">

        <tr height="20">
            <td>
                <select id="monthFilter" class="general" onchange="reloadList()">
                    <option value="0"> All </option>
                    <?php
                        while ($recordMonth = mysql_fetch_assoc($resMonths)){
                            if($recordMonth["Month"]<10) $recordMonth["Month"] = '0'.$recordMonth["Month"];

                            echo '<option value="'.$recordMonth["Year"].'-'.$recordMonth["Month"].'"';
                                if($recordMonth["Year"].'-'.$recordMonth["Month"] === $_GET["dsYearMonth"])
                                        echo 'selected="selected"';
                            echo '>'.$recordMonth["MonthName"].'/'.$recordMonth["Year"].'</option>';
                        }
                    ?>
                </select>
                <p></p>
            </td>
            <td>
                <?php if($_SESSION['userType']!=='fisher'){ ?>
                    <button style="float: right; margin-bottom: 12px;" type="button" class="normalButton" onclick="location.href='effortManagment.php?op=add'">Add new effort</button>
                <?php } ?>
            </td>
        </tr>

        <tr bgcolor="#F5F5F5">
            <td colspan="2">
                <div class="col_2" style="margin-top: 12px;">

                    <label for=“sFisher” class="tableText">Fisher</label>
                    <select id='sFisher' class='smaller' name='sFisher' onchange='reloadPage()'
                    <?php
                    if($_SESSION['userType']=='fisher' ){
                        echo "disabled='disabled'";
                    }
                    echo '>';
                        echo "<option value=''> Select fisher </option>";

                        while($recordRegions = mysql_fetch_assoc($resultFisherman)){

                            echo "<option value='".$recordRegions["Id"]."'";

                            if($_GET['sFisher']==$recordRegions["Id"]){
                                echo "selected='selected'";
                            }
                            
                            if($_SESSION['userId']==$recordRegions["Id"] && $_SESSION['userType']=='fisher' ){
                                echo "selected='selected'";
                            }

                            echo ">".$recordRegions["Username"]."</option>";

                        }
                    ?>
                    </select>
                </div>
                
                <div class="col_3" style="margin-top: 12px;">
                    <label for=“sEffortNum” class="tableText">Effort Number</label>
                    <input type="text" name="sEffortNum" id="sEffortNum" value="<?php echo $_GET['sEffortNum']; ?>"/>
                    <a href="#"><img src="images/searchIcon.png" height="20" width="20" style="float: next" onclick="reloadPage()"></a>
                </div>

                <div class="col_2" style="margin-top: 12px;">
                    <label for=“sStrDate” class="tableText">Start Date</label>
                    <input type="date" style="width: 105px;" name="sStrDate" id="sStrDate" value="<?php echo $_GET['sStrDate']; ?>"/>
                    <a href="#"><img src="images/searchIcon.png" height="20" width="20" style="float: next" onclick="reloadPage()"></a>
                </div>
                
                <div class="col_2" style="margin-top: 12px;">
                    <label for=“sEndDate” class="tableText">End Date</label>
                    <input type="date" style="width: 105px;" name="sEndDate" id="sEndDate" value="<?php echo $_GET['sEndDate']; ?>"/>
                    <a href="#"><img src="images/searchIcon.png" height="20" width="20" style="float: next" onclick="reloadPage()"></a>
                </div>

                <div class="col_3" style="margin-top: 12px;">
                    <label for=“duration” class="tableText">Duration</label>
                    <select id='sDuration' class='smaller' name='sDuration' onchange='reloadPage()'>
                    <?php
                        echo "<option value=''> Select Duration </option>";
                        while($recordDur = mysql_fetch_assoc($resultDuration)){

                            echo "<option value='".$recordDur["Id"]."'";

                            if($_GET['sDuration']==$recordDur["Id"]){
                                echo "selected='selected'";
                            }

                            echo ">".$recordDur["Name"]."&nbsp;hs</option>";
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
                      <td width="300"><div align="left">&nbsp;Effort No.</div></td>
                      <td width="00"><div align="left">&nbsp;Fisher</div></td>
                      <td width="250"><div align="left">&nbsp;Date</div></td>
                      <td width="250"><div align="left">&nbsp;Duration</div></td>
                      <td width="100" colspan="3"><div align="left">&nbsp;Options</div></td>
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
                                echo '<td><a href="effortManagment.php?op=edt&cod='.$recordset["Id"].'">&nbsp;'.$recordset["EffortNumber"].'</a></td>';
                                echo '<td>&nbsp;'.$recordset["FirstName"].' '.$recordset["LastName"].'</td>';
                                echo '<td align="center">&nbsp;'.$recordset["EDate"].'</td>';
                                echo '<td align="center">&nbsp;'.$recordset["effortDuration"].'&nbsp;hs </td>';
                                echo '<td align="center" width="50"><a href="./harvestList.php?sEffortNum='.$recordset["Id"].'"><img src="images/harvestIcon.png" height="25px" width="30px" /></a> &nbsp;</td>';
                                echo '<td align="center" width="50"><a href="./individualList.php?eff='.$recordset["Id"].'"><img src="images/fishIcon.png" height="25px" width="35px"/></a> &nbsp;</td>';
                                    if($_SESSION['userType']=='fisher') 
                                        echo '<td align="center" width="50"><img src="images/delete_disabled.png" height="25px" width="25px" /></td>';
                                    else    
                                        echo '<td align="center" width="50"><a href="./actions/deleteEffort.php?cod='.$recordset["Id"].'"><img src="images/delete.png" height="25px" width="25px" /></a></td>';
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
            <td>
                <p></p>
                <input type="hidden" id="dsYearMonth" name="dsYearMonth" value="<?php echo $_GET["dsYearMonth"]; ?>">
            </td>
        </tr>
        
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
		  if($previous>0){ 
		    echo '<a href=?page='.$previous;
			if($_GET['sFisher']<>'')
			  echo '&sFisher='.str_replace(' ','+',$_GET['sFisher']);
			if($_GET['sStrDate']<>'')
			  echo '&sStrDate='.$_GET['sStrDate'];
			if($_GET['sEndDate']<>'')
			  echo '&sEndDate='.$_GET['sEndDate'];
			if($_GET['sEffortNum']<>'')
			  echo '&sEffortNum='.$_GET['sEffortNum'];
			if($_GET['sDuration']<>'')
			  echo '&sDuration='.$_GET['sDuration'];
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
		    echo '<a href=?page='.$next;
			if($_GET['sFisher']<>'')
			  echo '&sFisher='.str_replace(' ','+',$_GET['sFisher']);
			if($_GET['sStrDate']<>'')
			  echo '&sStrDate='.$_GET['sStrDate'];
			if($_GET['sEndDate']<>'')
			  echo '&sEndDate='.$_GET['sEndDate'];
                        if($_GET['sEffortNum']<>'')
			  echo '&sEffortNum='.$_GET['sEffortNum'];
			if($_GET['sDuration']<>'')
			  echo '&sDuration='.$_GET['sDuration'];
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
        
        <input type="submit" style="visibility: hidden;">
    </table>
</form>

</body>
</html>