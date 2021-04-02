<?php 
$fp=fopen(__DIR__ .'/connexion_info.txt','r');
while(!feof($fp)) $data[]=trim(explode('=',fgets($fp))[1]);
fclose($fp);
$host=$data[0];
$user=$data[1];
$mdp=$data[2];
$base=$data[3];
$connexion=@mysqli_connect ($host,$user,$mdp,$base) or die("Connexion à la BD impossible ! Erreur : ".mysqli_connect_error());
?>