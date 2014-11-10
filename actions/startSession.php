<?php

session_start();

//Start session Id
$_SESSION['sessionFisherman'] = session_id();
//Define user type
$_SESSION['userType'] = 'fisher';

include './validateSession.php';

echo '<script language="javascript">';
echo 'location.href="../effortList.php";';
echo '</script>';

?>