<?php 
$connexion=@mysqli_connect ("localhost","root","","bts_inscription_2021") or die("Connexion à la BD impossible ! Erreur : ".mysqli_connect_error());
error_reporting(E_ALL & ~E_NOTICE);
?>