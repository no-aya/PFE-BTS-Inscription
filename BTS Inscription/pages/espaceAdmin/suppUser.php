<?php
session_start();
if(isset($_SESSION['adminID'])&& $_SESSION['adminID']<2){
    include_once ("../../data/sqlFunctions.php");
    deleteUser($_GET['id']);
    header("location:adminUtilisateurs.php");
}
?>