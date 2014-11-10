<?php

include '../database/connection.php';

$dbConnection = new connection();
$dbConnection->newConnection();

//
$sql = "DELETE FROM Users WHERE Id=".$_GET["cod"];
//echo $sql;
//$result = $dbConnection->execSql($sql);

echo '<script language="javascript">';
echo 'location.href="../userList.php";';
echo '</script>';