<?php 
session_start();
ob_start();
if(!isset($_GET['typeBac'])) header("location:candidatureBac.php");
else{
    $_SESSION['typeBac']=$_GET['typeBac'];
    header("location:candidatureForm.php");
}
?>