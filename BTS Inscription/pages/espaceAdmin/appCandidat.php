<?php
session_start();
    include("../../data/sqlFunctions.php");
    approuverCandidat($_GET['id']);
    if(isset($_GET['assist'])) header("location:adminAssistant.php");
    else header("location:adminCandidatures.php");
?>