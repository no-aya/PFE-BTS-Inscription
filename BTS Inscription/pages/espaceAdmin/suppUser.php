<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once ("../../data/sqlFunctions.php");
    checkUser(0);
if(isset($_SESSION['adminID'])&& $_SESSION['adminID']<2){
    deleteUser($_GET['id']);
    header("location:adminUtilisateurs.php");
}
?>