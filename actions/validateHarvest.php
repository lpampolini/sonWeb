<?php

include_once '../database/connection.php';

// Create connection
$dbConnection = new connection();
$dbConnection->newConnection();

// $_POST retrieve the name of the fields inside the form
$HTTP_POST_VARS = $_POST;

// Execute sql (Insert|Update)
$resultData = $dbConnection->inputData($_GET["op"],$HTTP_POST_VARS);

if($HTTP_POST_VARS['edtSpecie']){
    $sqlUpdSpecieHarv  = "UPDATE SpeciesPerHarvest SET Specie=".$HTTP_POST_VARS['edtSpecie'];
    $sqlUpdSpecieHarv .= " WHERE Harvest=".$HTTP_POST_VARS['keyValue'];
    $edtHarvSpecie = $dbConnection->execSql($sqlUpdSpecieHarv);
}

echo '<script language="javascript">';
echo 'location.href="../harvestList.php"';
echo '</script>';

?>