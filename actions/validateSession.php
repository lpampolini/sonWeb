<?php
session_start();

if($_SESSION['sessionUser']<>session_id()) {
   header("Location: ../sonProjectSample/errorSession.php");
   exit;
}
?>