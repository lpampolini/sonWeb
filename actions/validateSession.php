<?php
session_start();

if($_SESSION['sessionFisherman']<>session_id()) {
   header("Location: ../sonProjectSample/errorSession.php");
   exit;
}
?>