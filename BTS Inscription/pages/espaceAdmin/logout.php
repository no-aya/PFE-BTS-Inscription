<?php
session_start();
unset($_SESSION['adminID']);
session_destroy();
header('Location:adminlogin.php');
?>