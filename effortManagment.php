<?php

include_once './database/connection.php';
include_once './actions/functions.php';
include_once './calendar/';

session_start();

$dbConnection = new connection();
$dbConnection->newConnection();

if($_GET["op"]=="edt"){

    // Select the user's data according to Id
    $sqlSearch = "SELECT e.*,e.SPCTRG as SpcTrg, n.Name, u.Username,b.Name as BoatName"
            . " FROM Efforts AS e "
            . " INNER JOIN Users as u ON e.Fisherman=u.Id "
            . " INNER JOIN Boats as b ON e.Boat=b.Id"
            . " INNER JOIN Nets as n ON e.Boat=b.Id"
            . " WHERE e.Id=".$_GET["cod"];
    $result = $dbConnection->execSql($sqlSearch);
    $recordset = mysql_fetch_assoc($result);
    //echo $recordset['EffortNumber'];
}
//echo $sqlSearch;
// Sql to select all the fishermen
$sqlFisherman = "SELECT Id,Username FROM Users";
$resultFisherman = $dbConnection->execSql($sqlFisherman);

// Sql to select all the nets
$sqlNets = "SELECT * FROM Nets";
$resultNets = $dbConnection->execSql($sqlNets);

// Sql to select all the boats
$sqlBoat = "SELECT Id,Name FROM Boats";
$resultBoat = $dbConnection->execSql($sqlBoat);

// sql to select all the harvests
$sqlHarvest = "SELECT * FROM Harvests"
        . " WHERE Effort =".$recordset["Id"];
$resultHarvest = $dbConnection->execSql($sqlHarvest);
$nHarvest = mysql_num_rows($resultHarvest);
//echo $sqlHarvest;

// Sql to select all species
$sqlSpecie = "SELECT * FROM Species";
$resultSpecie = $dbConnection->execSql($sqlSpecie);

// Sql to select all forms
$sqlForms = "SELECT * FROM WeightForms";
$resultForm = $dbConnection->execSql($sqlForms);

// Sql to selec all Durations
$sqlDurations = "SELECT * FROM Durations";
$resultDuration = $dbConnection->execSql($sqlDurations);

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

// Sql to select all the HVSMTH
$sqlHVSMTH = "SELECT * FROM HVSMTH";
$resultHVSMTH = $dbConnection->execSql($sqlHVSMTH);

/*
 * Select most used species in harvests
 * 
SELECT sph.Specie, count(*) as 'CountSpecie', s.Name, s.Code
FROM SpeciesPerHarvest as sph
INNER JOIN Species as s ON s.Id=sph.Specie 
GROUP BY Specie ORDER BY CountSpecie DESC, Specie ASC
*/
?>

<html>

    <?php include_once './defaultHead.php'; ?>

    <link rel="stylesheet" type="text/css" href="styles/cssFramework/kickstart.css" media="all" />
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <script type="text/javascript" src="calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
    <link type="text/css" rel="stylesheet" href="calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>
    
<script language="JavaScript">
    
    //function retrieveData(key,index) {
    function retrieveData(index) {
        
      //Check if browser supports Ajax
      try {
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
      } 
      catch(e) {
        try {
               ajax = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(ex) {
            try {
               ajax = new XMLHttpRequest();
            }
            catch(exc) {
               alert("Browser does not provide support for Ajax");
               ajax = null;
            }
        }
      }
      
      //If there is support
      if(ajax) {

            var listSpec = 'newSpecie'+index;
             //Leave only the first option inside select
            
            //document.effortForm.newSpecie0.options.length = 1;
            'document.effortForm.'+listSpec+'.options.length= 1';

            idOption = document.getElementById("optionsSpecies");

            ajax.open("POST", "./species.php", true);

            ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            alert(index);

            ajax.onreadystatechange = function() {
                   // Show message while loading
                   alert(ajax.readyState);
                   if(ajax.readyState == 1) {
                      idOption.innerHTML = "Loading...";
                   }
                   // After loading
                   if(ajax.readyState == 4 ) {
                      if(ajax.responseXML) {
                             processXML(ajax.responseXML);
                             setTimeout(function() {}, 6000);
                      }
                      else {
                              //In case it does not load
                              idOption.innerHTML = "Error: Try refresh";
                      }
                   }
            }
            // Send index as parameter
            var params = "index="+index;
            //alert(params);
            ajax.send(params);
      }
    }

    function processXML(obj){
      //Retrieve XML tags <specie>
      var dataArray = obj.getElementsByTagName("specie");
      
      // Retrieve next element index
      var species = obj.getElementsByTagName("species");
      var index = species[0].getElementsByTagName("indexValue")[0].firstChild.nodeValue;
      var element = document.getElementById("newSpecie"+index);

      // If there's any specie tag
      if(dataArray.length > 0) {
             // Retrieve and process all the tags
             for(var i = 0 ; i < dataArray.length ; i++) {
                
                    var item = dataArray[i];
                    
                    //Put XML tags inside fields
                    var specieId = item.getElementsByTagName("specieId")[0].firstChild.nodeValue;
                    var specieName = item.getElementsByTagName("specieName")[0].firstChild.nodeValue;
                    var specieCode = item.getElementsByTagName("specieCode")[0].firstChild.nodeValue;
                    //var index = item.getElementsByTagName("indexValue")[0].firstChild.nodeValue;

                    //idOption.innerHTML = "Select Specie";

                    //Create new dynamic option 
                    var newOption = document.createElement("option");
                        //Set option id to options
                        newOption.setAttribute("id", "optionsSpecies");
                        //Set option's Id
                        newOption.value = specieId;
                        //Set option's text
                        newOption.text  = specieCode+' - '+specieName;

                        // Add new option to select species
                        element.add(newOption);
            }
      }
      else {
            //caso o XML volte vazio, printa a mensagem abaixo
            idOption.innerHTML = "No Species";
      }	  
    }
    
    function addHarvest() {
        numInputs = $("#harvestInputs").val();
        
        // Number of harvests already included
        var numHarvests = $('.harvest').size();
        numHarvests++;
        
        //updateEffortNumber();
        
        var limit = parseInt(numInputs)+parseInt(numHarvests);
        
        $("#noHarvest").remove();
        
        for(j=numHarvests;j<limit;j++){

        var newHarvest  = '<div class="harvest" id="harvest">';
            
            //newHarvest += '<span></span>';
            
            // First col
            newHarvest += '<div class="col_1_5">';
            newHarvest += '<label>Specie&nbsp&nbsp</label>';
            newHarvest += '<select required="required" id="newSpecie'+j+'" name="newSpecie'+j+'" class="smaller" >';
            newHarvest += '<option id="optionsSpecies" value="0" selected="selected">Select Specie</option>';
            newHarvest += '</select>';
            newHarvest += '</div>';
            
            // Seccond col
            newHarvest += '<div class="col_1_5">';
            newHarvest += '<label>Form&nbsp&nbsp</label>';
            newHarvest += '<select required="required" name="newForm'+j+'" class="smaller" >';
            newHarvest += '<option value=""> Select Form </option>';
            newHarvest += '<option value=1> Round </option>';
            newHarvest += '<option value=2> Dressed </option>';
            newHarvest += '<option value=3> Filleted </option>';
            newHarvest += '</select>';
            newHarvest += '</div>';
            
            // Third col
            newHarvest += '<div class="col_1_5">';
            newHarvest += '<label>Weight&nbsp&nbsp</label>';
            newHarvest += '<input required="required" name="newWeight'+j+'" type="text" class="smaller" />';
            newHarvest += '</div>';
            
            // Fourth col
            newHarvest += '<div class="col_1_5">';
            newHarvest += '<label>Unit&nbsp&nbsp</label>';
            newHarvest += '<select required="required" name="newUnit'+j+'" type="text" class="smaller">';
            newHarvest += '<option value=""> Select Unit </option>';
            newHarvest += '<option value="k"> Kilograms </option>';
            newHarvest += '<option value="p"> Pounds </option>';
            newHarvest += '</select>';
            newHarvest += '</div>';
            
            // Harvest col
            newHarvest += '<div class="col_1_5">';
            newHarvest += '<label>Harvest Method&nbsp&nbsp</label>';
            newHarvest += '<select required="required" name="newHVSMTH'+j+'" type="text" class="smallerMth">';
            newHarvest += '<option value=""> Select Method </option>';
            newHarvest += '<option value="1"> Box Weights Estimated  </option>';
            newHarvest += '<option value="2"> Fish Boxes Weighed </option>';
            newHarvest += '<option value="3"> Weights From Fishbuyers </option>';
            newHarvest += '<option value="4"> Buyer Reconciliation (Sum Harvest) </option>';
            newHarvest += '</select>';
            newHarvest += '</div>';
            
            // Fifth col
            newHarvest += '<div class="col_1">';
            newHarvest += '<label>&nbsp</label>';
            newHarvest += '<a href="#"><img src="images/delete.png" height="25px" width="25px" id="removeHarvest'+j+'" /></a>';
            newHarvest += '</div>';
            
            newHarvest += '<div class="col_3"></div>';
            
            newHarvest += '</div>';
            //alert(newHarvest);
        
            // Append input fields inside <div>
            $('#effortForm').append(newHarvest);
            
            // Create function to remove fields
            $('#removeHarvest'+j).on('click', function (){ $(this).parents('div').closest('.harvest').remove() });

            //alert('j = '+j+' numHarvests='+numHarvests);

            retrieveData(j);

        }
        
    }
    
    function updateEffortNumber(){
//        $('#numEfforts').val( parseInt( $('.harvest').size() ) );
//        $('#numEfforts').attr('value', parseInt($('.harvest').size()));
//        alert($('.harvest').size());
//        alert($('#numEfforts').val());
    }
    
    $(document).ready(function(){
        
        // Check user type
        var userTypeSession = '<?php echo $_SESSION["userType"]; ?>';
        
        // Add calendar icon
        var image = $("<img>");
        image.attr("src", "images/calendar.png");
        image.attr("onclick", "displayCalendar(document.effortForm.dateEffort,'yyyy-mm-dd',this)")
        
  //      if(userTypeSession==='fisher')
//            image.attr("style","visibility:hidden");
        if(userTypeSession!=='fisher')
            $("#EDatecalendar").append(image);
        
        // Set add harvest onclick function
        $('#addHarvest').click(addHarvest);
        updateEffortNumber();
        //retrieveData(i);
        
        if(userTypeSession==='fisher'){
            $("#effortForm :input").attr("disabled", true);
            $("#effortForm :select").attr("disabled", true);
            
        }
        
    });
    </script>

<body>

    <?php include_once 'topMenu.php'; ?>
    
    <p></p>
    
    <table border="1" width="100%">

        <tr bgcolor="#D8D8D8" height="25px">
            <td>
                <?php  
                
                if($_GET[op]=="add"){
                    echo "Create new effort";
                }else{
                    echo "Edit effort";
                }
                
                ?>
                
            </td>
        </tr>
        
        <tr>
            <td>
                <p></p>
                <form class="vertical" name="effortForm" id="effortForm" method="post" action="<?php echo "actions/validateEffort.php?op=".$_GET["op"]; ?>" >
                    <div class="col_3">
                        
                        <!-- Text Field -->
                        <label for=“fisherman”>Fisher</label>
                        
                        <?php
                        echo "<select id='fisherman' class='general' name='Fisherman' required='required'";
                        if($_GET["op"]=="edt"){
                            echo "disabled='disabled'";
                        }
                        echo">"; 
                            echo "<option value=''> Select fisher </option>";
                            
                            while($recordFisherman = mysql_fetch_assoc($resultFisherman)){

                                echo "<option value='".$recordFisherman["Id"]."'";

                                if($recordset["Fisherman"]==$recordFisherman["Id"]){
                                    echo "selected='selected'";
                                }

                                echo ">".$recordFisherman["Username"]."</option>";

                            }
                         echo "</select>";
                        ?>

                        <label for=“boat”>Boat</label>
                        
                        <!-- Text Field -->
                        <?php
                        echo "<select id='boat' name='Boat' class='general' required='required'>";
                            echo "<option value=''> Select boat </option>";
                            while($recordBoat = mysql_fetch_assoc($resultBoat)){

                                echo "<option value='".$recordBoat["Id"]."'";

                                if($recordset["Boat"]==$recordBoat["Id"]){
                                    echo "selected='selected'";
                                }

                                echo ">".$recordBoat["Name"]."</option>";
                            }
                         echo "</select>";   
                        ?>
                        
                        <!-- Text Field -->
                        <label for="dateEffort">Date</label>
                        <span id="EDatecalendar"><input id="dateEffort" type=“date” name="EDate" class="calendar" value="<?php echo $recordset["EDate"]; ?>"></span>
                        <!--<img src="images/calendar.png" border="0" style="margin-left: 250px; vertical-align: top;" width="22" height="22" title="calendar" onclick="displayCalendar(document.effortForm.dateEffort,'yyyy-mm-dd',this)" />-->

                        <!-- Text Field -->
                        <label for=“grid”>Grid</label>
                        <input id=“grid type=“text” name="Grid" class="general" value="<?php echo $recordset["GRID"]; ?>" />
                        
                        <!-- Text Field -->
                        <label for=“rcode”>Region Code</label>
                        <input id="rcode" type=“text” name="R_CODE" class="general" value="<?php echo $recordset["R_CODE"]; ?>" />
                        
                        <label for=“rcode”>Specie Target</label>
                        
                        <?php
                        
                        echo '<select class="general" required="required" name="SPCTRG">';
                            
                            echo '<option value=""> Select Specie </option>';
                            
                            while ($recordSpecie = mysql_fetch_assoc($resultSpecie)){
                                echo '<option value='.$recordSpecie["Id"];
                                
                                if($recordSpecie["Id"] === trim($recordset["SPCTRG"])){
                                    echo ' selected="selected" ';
                                }
                                
                                echo '>'.$recordSpecie['Code'].' - '.$recordSpecie["Name"].'</option>';
                            }
                        echo '</select>';
                        
                        ?>
                        
                    </div>
                    
                    <div class="col_3">
                        <?php
                        
                        echo '<label>Geart Type&nbsp&nbsp</label>';
                            
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
                        
                        <label for=“grlen5”>Gear Length</label>
                        <input id="grlen5" type="number" name="GRLEN5" class="general" max="15000" value="<?php echo $recordset["GRLEN5"]; ?>" />
                        
                        <label for=“grhtm”>Gear Height</label>
                        
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
                        
                        <label for="mesh5">Mesh Size</label>
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
                        
                        <label for="grdep5"> Gear Depth</label>
                        <input id="grdep5" type="number" name="GRDEP5" class="general" max="700" value="<?php echo $recordset["GRDEP5"]; ?>" />
                        <!--onkeypress="mask(this,onlyNumbers)"--> 
                        <label for="sidep5">Side Depth</label>
                        <input id="sidep5" required="required" class="general" max="700" onkeypress="mask(this,tel)" type="number" name="SIDEP5" value="<?php echo $recordset["SIDEP5"]; ?>" />
                        
                        <?php
                        //echo $var = generateEffortNumber();
//                        echo '<p></p><input type="radio" name="BoxOption" value="1"';
//                            if($recordset["BoxOption"] === '1') echo 'checked="checked" ';
//                        echo '>&nbsp;&nbsp;Fish Boxes Weighed<p></p>';
//                        
//                        echo '<input type="radio" name="BoxOption" value="2"';
//                            if($recordset["BoxOption"] === '2') echo 'checked="checked" ';
//                        echo '>&nbsp;&nbsp;Box Weights Estimated<p></p>';
//                        
//                        echo '<input type="radio" name="BoxOption" value="3"';
//                            if($recordset["BoxOption"] === '3') echo 'checked="checked" ';
//                        echo '>&nbsp;&nbsp;Box Weights from Fishbuyer<br>';
                        ?>
                        
                    
                    <p></p>
                    </div>
                    
                    <div class="col_3">
                        
                        <?php
                        
                        echo '<label>Set Type</label>';
                            
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
                        
                        echo '<label>Duration</label>';
                            
                        echo '<select required="required" name="Duration" class="general" >';

                        echo '<option value=""> Select effort duration </option>';

                        while ($recordDuration = mysql_fetch_assoc($resultDuration)){
                            echo '<option value='.$recordDuration["Id"];

                            if($recordDuration["Id"] === $recordset["Duration"]){
                                echo ' selected="selected" ';
                            }

                            echo '>'.$recordDuration["Name"].'</option>';
                        }
                        echo '</select>';
                        ?>
                        
                        <?php if($_SESSION['userType']!=='fisher'){ ?>
                            <button type="submit" class="submitButton">Submit</button>
                        <?php } ?>
                    </div>
                    
                    <div class="col_12">
                    <table width="1470" border="0">
                        <tr>
                            <td width="10">
                                <img src="images/harvestIcon.png" height="25px" width="30px" />
                            </td>
                            
                            <td width="1400">
                                <label class="tableTitle">Harvest List</label>
                            </td>
                            
                            <td width="40" style="vertical-align: top">
                                <input type="text" id="harvestInputs" name="harvestInputs" class="add" value="1" />
                            </td>
                            
                            <td width="20" style="vertical-align: top">
                                <?php if($_SESSION['userType']==='fisher'){?>
                                    <img id="addHarvestHidden" src="images/addIcon_disabled.png" height="31px" width="30px">    
                                <?php }else{ ?>
                                    <a href="#"><img id="addHarvest" src="images/addIcon.png" height="31px" width="30px"></a>    
                                <?php } ?>
                            </td>
                        </tr>
                        
                        <tr>
                            
                            <td colspan="4">
                                <img src="images/thinBar.jpg" height="2px" width="100%"><p></p>
                            </td>
                        
                        </tr>
                    </table>
                    </div>
                    <?php
                    
                    if($nHarvest == 0){
                        
                        echo '<div id="noHarvest" class="col_9"> No Harvest created for this effort.</div><br/>';
                        
                    } else {
                        
                        echo '<div id="edtHarvest'.$nHarvest.'" class="vertical">';
                        $contHarvest = 1;
                        
                        while($recordHarvest = mysql_fetch_assoc($resultHarvest)){
                            mysql_data_seek($resultSpecie,0);
                            
                            echo '<div class="harvest">';
                            echo '<input type="hidden" name="edtId'.$contHarvest.'" value="'.$recordHarvest["Id"].'">';
                            
                            // First col
                            echo '<div class="col_1_5">';
                            
                            echo '<label>Specie&nbsp&nbsp</label>';
                            
                            echo '<select required="required" name="edtSpecie'.$contHarvest.'" class="smaller" >';
                            
                            echo '<option value=""> Select Specie </option>';
                            
                            while ($recordSpecie = mysql_fetch_assoc($resultSpecie)){
                                echo '<option value='.$recordSpecie["Id"];
                                
                                if($recordSpecie["Id"] === $recordHarvest["Specie"]){
                                    echo ' selected="selected" ';
                                }
                                
                                echo '>'.$recordSpecie["Code"].' '.$recordSpecie["Name"].'</option>';
                            }
                            echo '</select>';
                            echo '</div>';
                            
                            // call javascript function
                            echo '<script language="JavaScript">';
                            echo "retrieveData("+$recordHarvest['Id']+","+$contHarvest+")";
                            echo '</script>';
                            
                            // Seccond col
                            echo '<div class="col_1_5">';
                            echo '<label>Form&nbsp&nbsp</label>';
                            echo '<select required="required" name="edtForm'.$contHarvest.'" class="smaller" >';
                            
                            echo '<option value=""> Select Form </option>';
                            
                            while ($recordForm = mysql_fetch_assoc($resultForm)){
                                echo $recordForm;
                                echo '<option value='.$recordForm["Id"];
                                
                                if($recordHarvest["Form"] == $recordForm["Id"]){
                                    echo ' selected="selected" ';
                                }
                               
                                echo '>'.$recordForm["Name"].'</option>';
                            }
                            
                            echo '</select>';
                            echo '</div>';

                            // Third col
                            if($recordHarvest["Unit"] === 'k'){
                                // Convert weight back to kilograms
                                $Weight = $recordHarvest["Weight"]/2.20462;
                            }else{
                                $Weight = $recordHarvest["Weight"];
                            }
                            
                            echo '<div class="col_1_5">';
                            echo '<label>Weight&nbsp&nbsp</label>';
                            echo '<input required="required" name="edtWeight'.$contHarvest.'" type="text" value='.$Weight.' class="smaller"/>';
                            echo '</div>';

                            // Fourth col
                            echo '<div class="col_1_5">';
                            echo '<label>Unit&nbsp&nbsp</label>';
                            echo '<select required="required" name="edtUnit'.$contHarvest.'" type="text" class="smaller">';
                            echo '<option value=""> Select Unit </option>';
                            
                            // Kilograms
                            echo '<option value="k" ';
                            if($recordHarvest["Unit"] === 'k'){
                                echo 'selected="selected"';
                            }
                            echo ' > Kilograms </option>';
                            // Pounds
                            echo '<option value="p" ';
                            if($recordHarvest["Unit"] === 'p'){
                                echo 'selected="selected"';
                            }
                            echo ' > Pounds </option>';
                            
                            echo '</select>';
                            echo '</div>';
                            
                            // Harvest method col
                            echo '<div class="col_1_5">';
                            echo '<label>Harvest Method&nbsp&nbsp</label>';
                            
                            echo '<select required="required" name="edtHVSMTH'.$contHarvest.'" type="text" class="smallerMth">';
                            echo '<option value=""> Select Method </option>';
                            while ($recordHVSMTH = mysql_fetch_assoc($resultHVSMTH)){
                                echo '<option value='.$recordHVSMTH["Id"];
                                
                                if($recordHarvest["HVSMTH"] == $recordHVSMTH["Id"]){
                                    echo ' selected="selected" ';
                                }
                               
                                echo '>'.$recordHVSMTH["Method"].'</option>';
                            }
                            
                            echo '</select>';
                            echo '</div>';
                            
                            // Delete col
                            echo '<div class="col_1">';
                            echo '<label>&nbsp</label>';
                            
                            echo '<a href="actions/deleteHarvest.php?cod='.$recordHarvest["Id"].'"';
                            
                            if($_SESSION['userType']==='fisher')
                                echo 'style="visibility:hidden"';
                            
                            echo '>';
                            echo '<img src="images/delete.png" height="25px" width="25px" /></a>';
                            
                            echo '</div>';
                            echo '<div class="col_3"></div>';
                            echo '</div>';
                            echo '</div>';
                                
                            $contHarvest++;
                            
                            mysql_data_seek($resultForm,0);
                            mysql_data_seek($resultHVSMTH,0);
                        }
                        
                    }
                    ?>
                    <div id="cointainer" ></div>
                    <input type="hidden" name="table" value="Efforts">
                    <input type="hidden" name="EffortNumber" value="
                        <?php 
                        if($_GET['op'] == 'add') 
                            echo generateEffortNumber(); 
                        else 
                            echo $recordset['EffortNumber']; 
                        ?>">
                    <input type="hidden" name="keyLabel" value="Id">
                    <input type="hidden" name="keyValue" value="<?php echo $recordset["Id"]; ?>">
                    <input type="hidden" name="LATLONG" value="1010-1010">
                    
                    <!--<input type="hidden" id="numEfforts" name="numEfforts" value="ac">-->
                    
                </form>
            </td>
        </tr>
        
        </form>
    </table>