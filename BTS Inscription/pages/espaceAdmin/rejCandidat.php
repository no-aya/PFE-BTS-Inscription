<?php
session_start();
    include("../../data/sqlFunctions.php");
    rejeterCandidat($_GET['id']);
    if(isset($_GET['assist'])) header("location:adminAssistant.php");
    else header("location:adminCandidatures.php");
?>