<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["adminID"])){
    header("location:adminlogin.php");
  }
    include("../../data/sqlFunctions.php");
    checkUser(1);
    rejeterCandidat($_GET['id']);
    if(isset($_GET['assist'])) header("location:adminAssistant.php");
    else header("location:adminCandidatures.php");
?>