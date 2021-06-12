<?php
session_start();
include("../../data/sqlFunctions.php");
confirmerInscription($_GET['id'],$_GET['filiereID']);
header("location:adminListes.php?id={$_GET['filiereID']}");
?>