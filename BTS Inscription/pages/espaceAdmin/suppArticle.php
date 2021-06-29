<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['adminID'])){
    include_once ("../../data/sqlFunctions.php");
    deleteArticle($_GET['id']);
    header("location:adminArticles.php");
}
?>