<?php

include_once './actions/createSalt.php';
include_once './database/connection.php';

$Username = "bKreutz";
$FirstName = "Bruno";
$LastName = "Kreutz";
$UserType = 1;
$Phone = "2223335050";
$Email = "bkreutz@uoguelph.ca";
$Street = "Sidney Crescent";
$City = "Geulph";
$Province = "ON";
$Zip = "M9I5L7";
$CreationHour = date("h:i:s");
$Activated = 1;
$ActivationDate = date("d-m-Y");

$key = "bruno123";

$Salt = generateSalt($key);

echo $password.'<br/>';

echo '<br/>';
$sql  = "INSERT INTO Users (Username, Salt, FirstName, LastName, UserType, Phone, Email, Street, City, Province, Zip, CreationHour, Activated) values ";
$sql .= "('$Username', '$Salt', '$FirstName', '$LastName', $UserType, '$Phone', '$Email', '$Street', '$City', '$Province', '$Zip', '$CreationHour', '$Activated')";

echo '<br/>'.$sql.'<br/>';

?>