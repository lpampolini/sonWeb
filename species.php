<?php

//CONECTA AO MYSQL                                       
require_once("./database/connection.php");

$dbConnection = new connection();
$dbConnection->newConnection();
		 
//Retrieve parameter
$index = $_POST["index"];
//$index = 0;

// SQL for all species
$sqlXML = "SELECT Id,Name,Code FROM Species WHERE Name <> ''";

//Execute query
$resXML = mysql_query($sqlXML);
$rowXML = mysql_num_rows($resXML);

//Check if there's any data
if($rowXML) {
   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<species>\n";
   
   // Create tags
   for($i=0; $i<$rowXML; $i++) {
      $specieId= mysql_result($resXML, $i, "Id");
      $specieName = mysql_result($resXML, $i, "Name");
      $specieCode = mysql_result($resXML, $i, "Code");
      
      $xml .= "<specie>\n";
      $xml .= "<specieId>".$specieId."</specieId>\n";
      $xml .= "<specieCode>".$specieCode."</specieCode>\n";
      
      // some species in the base have no name
      if($specieName)
        $xml .= "<specieName>".$specieName."</specieName>\n";
      else
        $xml .= "<specieName>No Name</specieName>\n";
      
      
      $xml .= "</specie>\n";
   }
   $xml .= "<indexValue>".$index."</indexValue>\n";
   $xml.= "</species>\n";
   
   
   Header("Content-type: application/xml; charset=iso-8859-1"); 
}

echo $xml;            
?>
