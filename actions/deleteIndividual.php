<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

// Delete the harvest
$sql = "DELETE FROM Individuals WHERE Id=".$_GET["cod"];
$result = $dbConnection->execSql($sql);

echo '<script language="javascript">';
echo 'location.href="javascript:window.history.back(-1)";';
echo '</script>';