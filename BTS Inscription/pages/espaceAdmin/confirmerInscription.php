<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["adminID"])){
    header("location:adminlogin.php");
  }
include("../../data/sqlFunctions.php");
checkUser(1);
confirmerInscription($_GET['id'],$_GET['filiereID']);
header("location:adminListes.php?id={$_GET['filiereID']}");
?>